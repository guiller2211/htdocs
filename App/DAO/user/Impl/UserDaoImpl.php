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

        $query = "SELECT * FROM pacientes P  
        INNER JOIN examenes e ON p.id = e.paciente_id  
        INNER JOIN perfiles AS p2 ON e.centro_codigo = p2.procedencia
        WHERE rut='$buscador' OR nombre LIKE '%$buscador%' AND p2.procedencia = '$procedencia' LIMIT 1;";

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

    public function getDataResultados($buscador)
    {
        $query =
        "SELECT
        P.*,
        C.NOMBRE as nombre_centro,
        E.fecha,
        T.fecha,
        T.hora,
        D.fecha,
        D.descripcion
     from 
     pacientes as P
     inner join Examenes as E on P.id= E.paciente_id 
     inner join Centrodetomas as C on E.centro_codigo= c.codigo 
     inner join Tincion as T on E.paciente_id =T.id
     inner join Diagnostico as D on E.diagnostico_codigo = d.codigo 
     where P.rut= '$buscador';";


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

    public function fechasexamen($buscador)
    {
        
    }

}