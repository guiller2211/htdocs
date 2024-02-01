<?php
require_once __DIR__ . '/../../../Models/Paciente_model.php';
require_once __DIR__ . '/../../../Database.php';
require_once __DIR__ . '/../RecepcionDao.php';

class RecepcionDaoImpl implements RecepcionDao // se implementa la interface de mi archivoRecepcionDao.php
{

    private $db;
    private $error;
    private $tableName = "pacientes";

    public function __construct()
    {
        $this->error = new Error_model();
        // Instancia de la clase Database
        $this->db = new Database();
    }

    public function getRegistroRecepcion()
    {

        $query = "SELECT E.id, rut, nombre, apPat, apMat,telefono,E.centro_codigo, E.fecha
        FROM Pacientes AS P
        INNER JOIN Examenes AS E ON P.id = E.paciente_id
        where E.diagnostico_codigo IS NOT NULL;";

        $conn = $this->db->getConnection();
        $stmt = mysqli_prepare($conn, $query);

        if (!$stmt) {
            $this->error->handlerErrorBBDD($stmt, "error en la busqueda");
            return false;
        }
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) === 0) {
            return false;
        }

        mysqli_stmt_close($stmt);

        return $result;
    }



    public function buscarRut(PacienteModel $paciente)
    {
        $rut = $paciente->getRut();
        $query = "SELECT * FROM pacientes WHERE rut LIKE '%$rut%'";
        $conn = $this->db->getConnection();
        $stmt = mysqli_prepare($conn, $query);

        if (!$stmt) {
            $this->error->handlerErrorBBDD($stmt, "error en la busqueda");
            return false;
        }

        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) === 0) {
            return false;
        }

        mysqli_stmt_close($stmt);

        return $result;
    }

    public function consultaExamenRut(PacienteModel $paciente)
    {
        $rut = $paciente->getRut();

        $query = "SELECT *
        FROM Pacientes AS P
        INNER JOIN Examenes AS E ON P.id = E.paciente_id
        where P.rut = '$rut' and E.diagnostico_codigo IS NOT NULL;";

        $conn = $this->db->getConnection();
        $stmt = mysqli_prepare($conn, $query);

        if (!$stmt) {
            $this->error->handlerErrorBBDD($stmt, "error en la busqueda");
            return false;
        }

        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) === 0) {
            return false;
        }

        mysqli_stmt_close($stmt);

        return $result;
    }


    public function getUsuarios()
    {
        $query = "SELECT * FROM Pacientes";

        $conn = $this->db->getConnection();
        $stmt = mysqli_prepare($conn, $query);

        if (!$stmt) {
            $this->error->handlerErrorBBDD($stmt, "error en la busqueda");
            return false;
        }

        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) === 0) {
            return false;
        }

        mysqli_stmt_close($stmt);

        return $result;
    }
    public function insertUser(PacienteModel $admin)
    {
        $validateQuery = "INSERT INTO pacientes(rut, nombre, apPat, apMat, telefono, direccion, mail, fechaNacimiento, genero) 
        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($this->db->getConnection(), $validateQuery);

        $rut = $admin->getRut();
        $nombre = $admin->getNombre();
        $apPat = $admin->getApPat();
        $apMat = $admin->getApMat();
        $telefono = $admin->getTelefono();
        $direccion = $admin->getDireccion();
        $mail = $admin->getMail();
        $Fnac = $admin->getFechaNacimiento();
        $genero = $admin->getGenero();

        if (empty($nombre)) {
            // Manejo del error, por ejemplo, mostrar un mensaje o log
            $this->error->handlerErrorBBDD(null, "El campo 'nombre' no puede ser nulo");
            return false;
        }

        // Asociar parámetros a la consulta preparada
        mysqli_stmt_bind_param($stmt, 'sssssssss', $rut, $nombre, $apPat, $apMat, $telefono, $direccion, $mail, $Fnac, $genero);

        // Ejecutar la consulta
        $result = mysqli_stmt_execute($stmt);

        return true;
    }

    public function insertExamen(ExamenModel $admin)
    {
        $paciente_id = $admin->getPacienteId();
        $centroToma = $admin->getCentroCodigo();
        $fecha = $admin->getFecha();

        $insertQuery = "INSERT INTO Examenes (paciente_id, fecha, centro_codigo) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($this->db->getConnection(), $insertQuery);

        mysqli_stmt_bind_param($stmt, 'iss', $paciente_id, $fecha, $centroToma);
        $result = mysqli_stmt_execute($stmt);

        if (!$result) {
            $this->error->handlerErrorBBDD(null, "Error al insertar el registro del examen");
            return false;
        }

        // Obtener el ID del examen recién insertado
        $examen_id = mysqli_insert_id($this->db->getConnection());

        // Insertar una tinción asociada al examen recién insertado
        $insertTincionQuery = "INSERT INTO Tincion (examen_id, confirmacion) VALUES (?, '0')";
        $stmtTincion = mysqli_prepare($this->db->getConnection(), $insertTincionQuery);
        mysqli_stmt_bind_param($stmtTincion, 'i', $examen_id);
        $resultTincion = mysqli_stmt_execute($stmtTincion);

        if (!$resultTincion) {
            $this->error->handlerErrorBBDD(null, "Error al insertar la tinción asociada al examen");
            return false;
        }

        mysqli_stmt_close($stmt);
        mysqli_stmt_close($stmtTincion);

        return true;
    }

    
    // prueba para crear pdf
    public function getDataPacienteById($buscar)
    {
        $query = "SELECT 
            E.*,
            P.rut AS rut_paciente,
            P.nombre AS nombre_paciente,
            P.apPat  AS apPat_paciente,
            P.apMat  AS apMat_paciente,
            P.telefono AS telefono_paciente,
            P.direccion  AS direccion_paciente,
            P.mail AS mail_paciente,
            p.fechaNacimiento as fechaNacimiento_paciente,
            P.genero  AS genero_paciente,
            C.nombre AS nombre_centro,
            E.fecha,
            T.fecha AS fecha_tincion,
            T.hora,
            D.fecha AS fecha_diagnostico,
            D.descripcion,
            DATEDIFF(D.fecha, E.fecha) AS dias_entre_examenes_diagnostico
            FROM Examenes AS E
            INNER JOIN Pacientes P ON E.paciente_id = P.id 
            INNER JOIN centrodetomas C ON E.centro_codigo = C.codigo 
            INNER JOIN tincion T ON E.id = T.examen_id
            INNER JOIN diagnostico D ON E.diagnostico_codigo = D.codigo 
            INNER JOIN perfiles p2 ON E.centro_codigo = p2.procedencia
            WHERE
            E.id = ?";

        $conn = $this->db->getConnection();
        $stmt = mysqli_prepare($conn, $query);

        if (!$stmt) {
            $this->error->handlerErrorBBDD($stmt, "error en la busqueda");
            return false;
        }

        // Vincular parámetros
        mysqli_stmt_bind_param($stmt, "i", $buscar);

        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) === 0) {
            return false;
        }

        // Puedes almacenar los datos en un array si necesitas seguir utilizando el resultado después de cerrar la declaración.
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

        mysqli_stmt_close($stmt);

        return $data;
    }
}
