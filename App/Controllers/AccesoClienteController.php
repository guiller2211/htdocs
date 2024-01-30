<?php
session_start();
require_once __DIR__ . '/../DAO/user/Impl/UserDaoImpl.php';
require_once __DIR__ . '/../Models/access_model.php';
require_once __DIR__ . '/../Nodes/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

class AccesoClienteController
{
    public function index()

    {
        if (isset($_SESSION['nivelUsuario']) && $_SESSION['nivelUsuario'] == 5) {
            require_once VIEWS_PATH . 'layout/header.php';
            include VIEWS_PATH . 'accesoCliente/index.php';
            require_once VIEWS_PATH . 'layout/footer.php';
        } else {
            require_once VIEWS_PATH . 'layout/header.php';
            include VIEWS_PATH . 'error/index.php';
            require_once VIEWS_PATH . 'layout/footer.php';
        }
    }

    public function buscarID()
    {
        $json = file_get_contents('php://input');
        $dataJson = json_decode($json, true);


        if ($dataJson === null && json_last_error() !== JSON_ERROR_NONE) {
            echo json_encode(['success' => false, 'message' => 'Error: Datos no recibidos' . json_last_error_msg() . '']);
            return;
        }


        $userDAO = new UserDaoImpl();
        $dato = $dataJson['buscar'];
        $procedencia = isset($_SESSION['procedencia']) ? $_SESSION['procedencia'] : '';
        $nivel = isset($_SESSION['nivelUsuario']) ?  $_SESSION['nivelUsuario']  : '';

        $result = $userDAO->getDataPaciente($dato, $procedencia, $nivel);

        if ($result instanceof mysqli_result) {
            $data = array();

            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }

            echo json_encode($data);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error en la actualización ' . $procedencia . $nivel . '']);
            echo "<script>alert('Datos no encontrados');</script>";
        }
    }

    public function crearPdf()
    {
        $json = file_get_contents('php://input');
        $dataJson = json_decode($json, true);


        if ($dataJson === null && json_last_error() !== JSON_ERROR_NONE) {
            echo json_encode(['success' => false, 'message' => 'Error: Datos no recibidos' . json_last_error_msg() . '']);
            return;
        }

        $userDAO = new UserDaoImpl();
        $dato = $dataJson['buscar'];
        $procedencia = isset($_SESSION['procedencia']) ? $_SESSION['procedencia'] : '';
        $nivel = isset($_SESSION['nivelUsuario']) ?  $_SESSION['nivelUsuario']  : '';

        $data = $userDAO->getDataPaciente($dato, $procedencia, $nivel);

        ob_start();

        //incluye contenido, el cual contiene el HTML que queremos converir a PDF.
        require_once __DIR__. '/../Hooks/Formatopdf.php';
        
        //Captura el contenido del búfer de salida (que incluye el HTML generado por misDatosPdf.php).
        $html = ob_get_clean();
        
        // para leer el contenido del archivo CSS especificado ('css/examen.css') y lo almacena en la variable CSS
        $css = file_get_contents('css/examen.css');
        
        //Agrega los estilos CSS ($css) al contenido HTML ($html) utilizando la etiqueta <style>
        $html = '<style>' . $css . '</style>' . $html;
        
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
