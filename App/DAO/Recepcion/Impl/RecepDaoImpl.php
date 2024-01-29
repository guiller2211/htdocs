<?php
require_once __DIR__ . '/../../../Models/Paciente_model.php';
require_once __DIR__ . '/../../../Models/Examen_model.php';
require_once __DIR__ . '/../../../Models/error_model.php';
require_once __DIR__ . '/../../../Database.php';
require_once __DIR__ . '/../RecepDao.php';

class RecepDaoImpl implements RecepDao
{

    private $db;
    private $error;
    private $tableName = "pacientes";

    public function __construct()
    {
        $this->error = new Error_model();
        $this->db = new Database();
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
        $rut = $admin->getRut();
        $nombre = $admin->getNombre();
        $apPat = $admin->getApPat();
        $apMat = $admin->getApMat();
        $telefono = $admin->getTelefono();
        $direccion = $admin->getDireccion();
        $mail = $admin->getMail();
        $fecha = $admin->getFecha();
        $centroToma = $admin->getCentroToma();
    
        if (empty($rut)) {
            $this->error->handlerErrorBBDD(null, "El campo 'rut' no puede ser nulo");
            return false;
        }
    
        $userExistQuery = "SELECT * FROM pacientes WHERE rut = ?";
        $stmtUserExists = mysqli_prepare($this->db->getConnection(), $userExistQuery);
        mysqli_stmt_bind_param($stmtUserExists, 's', $rut);
        mysqli_stmt_execute($stmtUserExists);
        $resultUserExists = mysqli_stmt_get_result($stmtUserExists);
    
        if (mysqli_num_rows($resultUserExists) === 0) {
            $this->error->handlerErrorBBDD(null, "El usuario no existe");
            return false;
        }
    
        $insertQuery = "INSERT INTO registroexamen (rut, nombre, apPat, apMat, telefono, mail, centroToma, fecha, direccion) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($this->db->getConnection(), $insertQuery);
    
        mysqli_stmt_bind_param($stmt, 'sssssssss', $rut, $nombre, $apPat, $apMat, $telefono, $mail, $centroToma, $fecha, $direccion);
        $result = mysqli_stmt_execute($stmt);
    
        if (!$result) {
            $this->error->handlerErrorBBDD(null, "Error al insertar el registro del examen");
            return false;
        }
    
        mysqli_stmt_close($stmt);
    
        return true;
    }
    
}
