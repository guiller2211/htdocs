<?php
require_once __DIR__ . '/../../../Models/error_Model.php';
require_once __DIR__ . '/../../../Database.php';
require_once __DIR__ . '/../DiagnosticoDao.php';

class DiagnosticoDaoImpl implements DiagnosticoDao
{
    private $db;
    private $error;
    private $tableName = "Examenes";

    public function __construct()
    {
        $this->error = new Error_model();
        // Instancia de la clase Database
        $this->db = new Database();
    }

    public function getDataDiagnostico()
    {

        $query = "SELECT * FROM Examenes as E INNER JOIN Pacientes as P ON E.paciente_id = P.id";
        
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
