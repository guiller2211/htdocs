<?php
session_start();

class AdminController
{
    public function index()
    {
        if(isset($_SESSION['nivelUsuario']) && $_SESSION['nivelUsuario'] == 1){

            require_once VIEWS_PATH . 'layout/header.php';
            include VIEWS_PATH . 'admin/index.php';
            require_once VIEWS_PATH . 'layout/footer.php';
        }
        else{
            require_once VIEWS_PATH . 'layout/header.php';
            include VIEWS_PATH . 'error/index.php';
            require_once VIEWS_PATH . 'layout/footer.php';
        }
    }
}
