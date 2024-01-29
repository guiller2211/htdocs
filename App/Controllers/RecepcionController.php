<?php
session_start();

require_once __DIR__ . '/../DAO/Recepcion/Impl/RecepcionDaoImpl.php';
require_once __DIR__ . '/../Models/Paciente_model.php';
require_once __DIR__ . '/../Models/Examen_model.php';

class RecepcionController
{
    public function index()
    {
        if (isset($_SESSION['nivelUsuario']) && $_SESSION['nivelUsuario'] == 2) {
            require_once VIEWS_PATH . 'layout/header.php';

            $recep = new RecepcionDaoImpl();
            $data = $recep->getRegistroRecepcion();


            include VIEWS_PATH . "recepcion/index.php";
            require_once VIEWS_PATH . 'layout/footer.php';
        } else {
            require_once VIEWS_PATH . 'layout/header.php';
            include VIEWS_PATH . 'error/index.php';
            require_once VIEWS_PATH . 'layout/footer.php';
        }
    }

    public function insertUser()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
            echo json_encode(['success' => false, 'message' => 'Error: Datos no recibidos' . json_last_error_msg() . '']);
            return;
        }

        $rut=$data['rut']; 
        $nombre = $data['nombre'];
        $apPat=$data['apPat'];
        $apMat=$data['apMat'];
        $telefono = $data['telefono'];
        $direccion = $data['direccion'];
        $mail=$data['mail'];
        $Fnac = $data['Fnac'];
        $genero = $data['genero'];
        
        $admin= new RecepDaoImpl();
        
        $PacienteModel = new Paciente_Model();
        $PacienteModel->SetRut($rut);
        $PacienteModel->SetNombre($nombre);
        $PacienteModel->SetApPat($apPat);
        $PacienteModel->SetApMat($apMat);
        $PacienteModel->SetTelefono($telefono);
        $PacienteModel->SetDireccion($direccion);
        $PacienteModel->SetMail($mail);
        $PacienteModel->SetFnac($Fnac);
        $PacienteModel->SetGenero($genero);
      
        $result = $admin->insertUser($PacienteModel);

        if ($result) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Actualización exitosa']);
            
        } else {
            echo json_encode(['success' => true, 'message' => 'Error en la actualización']);
        }
    }

    public function insertExamen()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
            echo json_encode(['success' => false, 'message' => 'Error: Datos no recibidos' . json_last_error_msg() . '']);
            return;
        }

        $rut=$data['rut']; 
        $nombre = $data['nombre'];
        $apPat=$data['apPat'];
        $apMat=$data['apMat'];
        $telefono = $data['telefono'];
        $direccion = $data['direccion'];
        $mail=$data['mail'];
        $fecha = $data['fecha'];
        $opciones = $data['opciones'];
        
        $admin= new RecepDaoImpl();
        $ExamenModel = new ExamenModel();
        $ExamenModel->SetRut($rut);
        $ExamenModel->SetNombre($nombre);
        $ExamenModel->SetApPat($apPat);
        $ExamenModel->SetApMat($apMat);
        $ExamenModel->SetTelefono($telefono);
        $ExamenModel->SetDireccion($direccion);
        $ExamenModel->SetMail($mail);
        $ExamenModel->SetFecha($fecha);
        $ExamenModel->SetOpciones($opciones);
      
        $result = $admin->insertExamen($ExamenModel);

        if (!$result) {
            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'message' => 'Error en la actualización']);
            
        } else {
            echo json_encode(['success' => false, 'message' => 'Actualización exitosa']);

        }
    }
  
    public function buscarRut()
    {
        $json = file_get_contents('php://input');



        $dataJson = json_decode($json, true);


        if ($dataJson === null && json_last_error() !== JSON_ERROR_NONE) {
            echo json_encode(['success' => false, 'message' => 'Error: Datos no recibidos' . json_last_error_msg() . '']);
            return;
        }
        $rut = $dataJson['rut'];

        $recepcion = new RecepcionDaoImpl();

        $recepcionModel = new PacienteModel();

        $recepcionModel->setRut($rut);

        $result = $recepcion->buscarRut($recepcionModel);

        if ($result instanceof mysqli_result) {
            $data = array();

            while ($row = $result->fetch_assoc()) {

                $data[] = $row;
            }

            echo json_encode($data);
        } else {

            echo json_encode(['success' => false, 'message' => 'Error en la actualización']);
        }
    }
}
