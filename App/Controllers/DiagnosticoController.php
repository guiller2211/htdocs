<?php

session_start();

require_once __DIR__ . '/../DAO/Diagnostico/Impl/DiagnosticoDaoImpl.php';

class DiagnosticoController
{
    public function index()
    {
        if (isset($_SESSION['nivelUsuario']) && $_SESSION['nivelUsuario'] == 4) {
            require_once VIEWS_PATH . 'layout/header.php';

            $diagnostico = new DiagnosticoDaoImpl();
            $data = $diagnostico->getDataDiagnostico();

            include VIEWS_PATH . 'diagnostico/index.php';
            require_once VIEWS_PATH . 'layout/footer.php';
        } else {
            require_once VIEWS_PATH . 'layout/header.php';
            include VIEWS_PATH . 'error/index.php';
            require_once VIEWS_PATH . 'layout/footer.php';
        }
    }
}
