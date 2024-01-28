<?php
session_start();
require_once __DIR__ . '/../DAO/Diagnostico/Impl/DiagnosticoDaoImpl.php';

use Dompdf\Dompdf;

class DiagnosticoController
{
    //se declara una variable global para poder ocuparla en todos los metodos.
  
    private $diagnosticoService;
    public function __construct(){
        $this->diagnosticoService = new DiagnosticoDaoImpl();

    }
    public function index()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = $_POST['idExamen'];
            $nombre = $_POST['nombrePaciente'];
            $fechaCreacion = $_REQUEST['fechaCreacion'];
            $examenes = $this->diagnosticoService->getAllExamenesFilter($id, $nombre, $fechaCreacion);
        }else{
            $examenes = $this->diagnosticoService->getDataDiagnostico();
        }
        if (isset($_SESSION['nivelUsuario']) && $_SESSION['nivelUsuario'] == 4) {
            require_once VIEWS_PATH . 'layout/header.php';
            include VIEWS_PATH . 'diagnostico/index.php';
            require_once VIEWS_PATH . 'layout/footer.php';
        } else {
            require_once VIEWS_PATH . 'layout/header.php';
            include VIEWS_PATH . 'error/index.php';
            require_once VIEWS_PATH . 'layout/footer.php';
        }
    }
}
