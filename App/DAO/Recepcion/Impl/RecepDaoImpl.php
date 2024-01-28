<?php
require_once __DIR__ . '/../../../Models/Paciente_Model.php';
require_once __DIR__ . '/../../../Models/Registro_Examen.php';
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

        // if (!$result) {
        //     // Error en la actualización, mostrar un mensaje de error
        //     $this->error->handlerErrorBBDD($result, "Error al ejecutar la actualización");
        //     return false;
        // }
        return true;
    }

    public function insertExamen(Registro_Examen $admin)
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

        // if (!$result) {
        //     // Error in the insertion, show an error message
        //     $this->error->handlerErrorBBDD($result, "Error al ejecutar la inserción");
        //     return false;
        // }

        // Close the prepared statement
        mysqli_stmt_close($stmt);

        return true;
    }

}