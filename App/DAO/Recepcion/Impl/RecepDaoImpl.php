<?php
require_once __DIR__ . '/../../../Models/Paciente_Model.php';
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
    public function insertUser(Paciente_Model $admin)
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
        $Fnac = $admin->getFnac();
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
        $opciones = $admin->getOpciones();

        // Check if the user with the specified RUT exists in the 'pacientes' table
        $userExistQuery = "SELECT * FROM pacientes WHERE rut = ?";
        $stmtUserExists = mysqli_prepare($this->db->getConnection(), $userExistQuery);
        mysqli_stmt_bind_param($stmtUserExists, 's', $rut);
        mysqli_stmt_execute($stmtUserExists);
        $resultUserExists = mysqli_stmt_get_result($stmtUserExists);
        if (empty($rut)) {
            // Manejo del error, por ejemplo, mostrar un mensaje o log
            $this->error->handlerErrorBBDD(null, "El campo 'rut' no puede ser nulo");
            return false;
        }

        if (mysqli_num_rows($resultUserExists) === 0) {
            // The user does not exist, handle this case
            echo "<script>alert('El usuario no existe');</script>";
            return false;
        }

        // The user exists, proceed with the exam record insertion
        $validateQuery = "INSERT INTO registroexamen(rut, nombre, apPat, apMat, telefono, mail, centroToma, fecha, direccion) 
            values(?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($this->db->getConnection(), $validateQuery);

        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, 'sssssssss', $rut, $nombre, $apPat, $apMat, $telefono, $mail, $opciones, $fecha, $direccion);

        // Execute the query
        $result = mysqli_stmt_execute($stmt);

        // Close the prepared statement
        mysqli_stmt_close($stmt);

        return true;
    }

}