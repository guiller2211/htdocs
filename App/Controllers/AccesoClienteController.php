<?php
session_start();
require_once __DIR__ . '/../DAO/user/Impl/UserDaoImpl.php';
require_once __DIR__ . '/../Models/access_model.php';

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

    public function buscarID()
    {
        $json = file_get_contents('php://input');
        $dataJson = json_decode($json, true);


        if ($dataJson === null && json_last_error() !== JSON_ERROR_NONE) {
            echo json_encode(['success' => false, 'message' => 'Error: Datos no recibidos' . json_last_error_msg() . '']);
            return;
        }

        $dato = $dataJson['dato'];

        $userDAO = new UserDaoImpl();
        $procedencia = isset($_SESSION['procedencia']) ? $_SESSION['procedencia'] : '';

        $result = $userDAO->getDataPaciente($dato, $procedencia);
        $result = $userDAO->getDataResultados($dato);
        //$result = $userDAO->getDataPaciente($dato, $procedencia);

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

