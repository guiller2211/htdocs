<?php
session_start();

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
        //hasta aqui
    }
}
