<?php
session_start();

class RecepcionController
{
    public function index()
    {      
        if (isset($_SESSION['nivelUsuario']) && $_SESSION['nivelUsuario'] == 2) {
            require_once VIEWS_PATH . 'layout/header.php';
            include VIEWS_PATH . "recepcion/index.php";
            require_once VIEWS_PATH . 'layout/footer.php';
        } else {
            require_once VIEWS_PATH . 'layout/header.php';
            include VIEWS_PATH . 'error/index.php';
            require_once VIEWS_PATH . 'layout/footer.php';
        }
    }
}
