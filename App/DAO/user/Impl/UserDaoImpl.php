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

        $query = "SELECT * FROM pacientes P  
        INNER JOIN examenes e ON p.id = e.paciente_id  
        INNER JOIN perfiles AS p2 ON e.centro_codigo = p2.procedencia
        WHERE rut='$buscador' OR nombre LIKE '%$buscador%' AND p2.procedencia = '$procedencia' AND p2.nivel = '$nivel';";

        $conn = $this->db->getConnection();
        $stmt = mysqli_prepare($conn, $query);
        if (!$stmt) {
            $this->error->handlerErrorBBDD($stmt, "error en la busqueda");
            return false;
        }

        // Ejecutar la consulta
        $result = mysqli_stmt_execute($stmt);

        // Verificar si la actualización fue exitosa
        if (!$result) {
            // Error en la actualización, mostrar un mensaje de error
            $this->error->handlerErrorBBDD($result, "Error al ejecutar la actualización");

            return false;
        }
        return $result;

    }

}