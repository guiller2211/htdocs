<?php
require_once __DIR__ . '/../../../Models/usuario_model.php';
require_once __DIR__ . '/../../../Models/error_model.php';
require_once __DIR__ . '/../../../Database.php';
require_once __DIR__ . '/../UserDao.php';

class UserDaoImpl implements UserDao
{

    private $db;
    private $error;
    private $tablename = "pacientes";


    public function __construct()
    {
        $this->error = new Error_model();
        // Instancia de la clase Database
        $this->db = new Database();
    }

    public function getDataPaciente($buscador, $procedencia, $nivel)
    {
        $query = "   SELECT 
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
        p2.procedencia = '$procedencia'
        AND p2.nivel = '$nivel'
        AND (P.rut = '$buscador' OR P.nombre LIKE '%$buscador%')";
        



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

}
