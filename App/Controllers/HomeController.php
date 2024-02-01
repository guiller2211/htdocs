<?php

session_start();

require_once __DIR__ . '/../Models/access_model.php';

class HomeController
{
    public function index()
    {
        $_SESSION['pagina_local'] = '/ipleones/labMuest/';

        require_once VIEWS_PATH . 'layout/header.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handlePostRequests();
        }

        $accessModel = new access_models();
        $tableName = "Perfiles";
        $showCreateTableButton = $accessModel->tableExists($tableName);
        include VIEWS_PATH . 'home/index.php';

        require_once VIEWS_PATH . 'layout/footer.php';
    }

    private function handlePostRequests()
    {
        if (isset($_POST['op'])) {
            switch ($_POST['op']) {
                case 'CREAR_TABLA':
                    $this->createTable();
                    break;
                case 'VALIDAR':
                    $this->handleAuthentication();
                    break;
                case 'CERRAR_SESION':
                    $this->logout();
                    break;
            }
        }
    }

    private function logout()
    {
        session_destroy();
         echo"<script language='javascript'>window.location='/ipleones/labMuest/'</script>;";
        exit();
    }

    private function createTable()
    {
        $accessModel = new access_models();
        $tableName = "CentroDeTomas";
        $accessModel->createTable($tableName);
    }

    private function handleAuthentication()
    {
        $rut = htmlspecialchars($_POST['rut'] ?? '');
        $clave = htmlspecialchars($_POST['clave'] ?? '');

        $accessModel = new access_models();
        $isUserValid = $accessModel->validateUser($rut, $clave);

        if ($isUserValid) {
            $_SESSION['nivelUsuario'] = $accessModel->getNivelUsuario();
            $this->checklevelPage($_SESSION['nivelUsuario']);
        } else {
            showErrorMessage("Usuario o contraseña incorrectos");
        }
    }

    private function checklevelPage($userLevel)
    {
        switch ($userLevel) {
            case 1:
                $_SESSION['pagina_local'] = 'admin';
                break;
            case 2:
                $_SESSION['pagina_local'] = 'recepcion';
                break;
            case 3:
                $_SESSION['pagina_local'] = 'tincion';
                break;
            case 4:
                $_SESSION['pagina_local'] = 'diagnostico';
                break;
            case 5:
                $_SESSION['pagina_local'] = 'accesoCliente';
                break;
        }

        echo"<script language='javascript'>window.location='".$_SESSION['pagina_local']."'</script>;";
        exit();
    }
}

function showErrorMessage($message)
{
    echo "<script>alert('$message');</script>";
}
