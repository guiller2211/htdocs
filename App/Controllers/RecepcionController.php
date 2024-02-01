<?php
session_start();

require_once __DIR__ . '/../DAO/Recepcion/Impl/RecepcionDaoImpl.php';
require_once __DIR__ . '/../Models/Paciente_model.php';
require_once __DIR__ . '/../Models/Examen_model.php';
require_once __DIR__ . '/../Nodes/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

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

    public function getData()
    {
        $admin= new RecepcionDaoImpl();
        $data = $admin->getUsuarios();

        if ($data instanceof mysqli_result) {
            $result = array();

            while ($row = $data->fetch_assoc()) {
                $result[] = $row;
            }

            echo json_encode($result);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error en la actualización']);
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
        
        $admin= new RecepcionDaoImpl();
        
        $PacienteModel = new PacienteModel();

        $PacienteModel->SetRut($rut);
        $PacienteModel->SetNombre($nombre);
        $PacienteModel->SetApPat($apPat);
        $PacienteModel->SetApMat($apMat);
        $PacienteModel->SetTelefono($telefono);
        $PacienteModel->SetDireccion($direccion);
        $PacienteModel->SetMail($mail);
        $PacienteModel->SetFechaNacimiento($Fnac);
        $PacienteModel->SetGenero($genero);
      
        $result = $admin->insertUser($PacienteModel);

        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Actualización exitosa']);
            
        } else {
            echo json_encode(['success' => false, 'message' => 'Error en la actualización']);
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
        
        $paciente_id = $data['paciente_id']; 
        $fecha = $data['fecha']; 
        $centro_codigo = $data['centroCodigo']; 

        $recepcionDao= new RecepcionDaoImpl();
        $ExamenModel = new ExamenModel();
        $ExamenModel->setPacienteId($paciente_id);
        $ExamenModel->setCentroCodigo($centro_codigo);
        $ExamenModel->SetFecha($fecha);
      
        $result = $recepcionDao->insertExamen($ExamenModel);

        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Actualización exitosa']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error en la actualización']);
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

    public function evaluarRut() // EVALUAR RUT PARA VER SI TIENE DIAGNOSTICO
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

        $result = $recepcion->consultaExamenRut($recepcionModel);

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
    // crear pdf
    public function crearPdf()
    {
        $json = file_get_contents('php://input');
        $dataJson = json_decode($json, true);


        if ($dataJson === null && json_last_error() !== JSON_ERROR_NONE) {
            echo json_encode(['success' => false, 'message' => 'Error: Datos no recibidos' . json_last_error_msg() . '']);
            return;
        }

        $recepcionDAO = new RecepcionDaoImpl();
        $dato = $dataJson['buscar'];

        ob_start();

        //incluye contenido, el cual contiene el HTML que queremos converir a PDF.
        require_once __DIR__. '/../Hooks/Formatopdf.php';
        
        //Captura el contenido del búfer de salida (que incluye el HTML generado por misDatosPdf.php).
        $html = ob_get_clean();
        
        // para leer el contenido del archivo CSS especificado ('css/examen.css') y lo almacena en la variable CSS
       
        //se crea una instancia de la clase donde se utiliza y renderiza el HTML aplicando los css y genra el PDF
        $dompdf = new Dompdf();
        
        // Configura chroot para permitir rutas relativas
        // permite que Dompdf acceda al directorio actual y resuelve rutas relativas desde allí.
        $dompdf->set_option('chroot', realpath('.'));
        
        //Configura el tamaño del papel del PDF.
        $dompdf->setPaper("letter");
        
        //Carga el contenido HTML en la instancia de Dompdf. El contenido HTML con css
        $dompdf->loadHtml($html);
        
        //Renderiza el contenido HTML y aplica los estilos para preparar el archivo PDF.
        $dompdf->render();
        //Genera el archivo PDF y lo envía al navegador para su visualización o descarga.
        $dompdf->stream('reportePdf.pdf', array('Attachment' => false));

    }
}
