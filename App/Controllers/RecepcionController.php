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

    public function buscarId(){
        $json = file_get_contents('php://input');
        $dataJson = json_decode($json, true);


        if ($dataJson === null && json_last_error() !== JSON_ERROR_NONE) {
            echo json_encode(['success' => false, 'message' => 'Error: Datos no recibidos' . json_last_error_msg() . '']);
            return;
        }

        $id = $dataJson['id'];

        $recepcion = new RecepcionDaoImpl();

        $recepcionModel = new RecepcionModel();
        $recepciononModel->setId($id);

        $result = $recepcion->buscarId($recepcionModel);

        if($result instanceof mysqli_result){
            $data = array();

            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }

            echo json_encode($data);

        }else{
            echo json_encode(['success' => false, 'message' => 'Error en la actualización']);
        }
    }
}
