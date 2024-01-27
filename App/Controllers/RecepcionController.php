<?php
session_start();
require_once __DIR__ . '/../DAO/Recepcion/Impl/RecepcionDaoImpl.php';


class RecepcionController
{
    public function index()
    {

        if (isset($_SESSION['nivelUsuario']) && $_SESSION['nivelUsuario'] == 2) {
            require_once VIEWS_PATH . 'layout/header.php';
            $recepcion = new RecepcionDaoImpl();
            $data = $recepcion->getRegistroRecepcion();
            include VIEWS_PATH . 'recepcion/index.php';
            
            
            require_once VIEWS_PATH . 'layout/footer.php';
        } else {
            require_once VIEWS_PATH . 'layout/header.php';
            include VIEWS_PATH . 'error/index.php';
            require_once VIEWS_PATH . 'layout/footer.php';
        }
    }
    
}
