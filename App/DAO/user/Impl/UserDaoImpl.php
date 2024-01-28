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

    public function getDataPaciente($buscador, $procedencia)
    {

        $query = "SELECT * from pacientes p  
        inner join examenes e  on p.id  = e.paciente_id  
        inner join perfiles as p2 on e.centro_codigo = p2.procedencia
        where rut='$buscador' or nombre like '%'.$buscador.'%' and p2.procedencia = $procedencia' limit 1; ";

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