<?php
require_once "./app/controllers/controllerGames.php";
require_once "./app/controllers/controllerDistributors.php";
require_once "./app/controllers/controllerAll.php";
require_once "./app/controllers/controllerUser.php";

require_once "./app/middlewares/auth.php";
require_once "./libs/libUser.php";

    $action = $_GET["action"];
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    $res = new response();
    
    if($action == NULL){
        $controllerA = new controllerAll($res);
        $controllerA->getAllLists();
    }else{
        if (isset($action)){
            $params = explode("/", $action);
            switch ($params[0]) {
                case 'juegos':
                    if(isset($params[1]) && $params[1] != NULL) {
                        $controllerG = new controllerGames($res);
                        $controllerG->getGameById($params[1]);
                    }else {
                        $controllerG = new controllerGames($res);
                        $controllerG->getGames();
                    }
                    break;
                case 'distribuidoras':
                    if(isset($params[1]) && $params[1] != NULL){
                        $controllerD = new controllerDistributors($res);
                        $controllerD->getDistributorById($params[1]);
                    }
                    else{
                        $controllerD = new controllerDistributors($res);
                        $controllerD->getDistributors();
                    }
                    break;
                case 'principal':
                    $controllerA = new controllerAll($res);
                    $controllerA->getAllLists();
                    break;
                case'administracion':
                    auth($res);
                    $controllerA = new controllerAll($res);
                    $controllerA->getForms();
                    break;
                case'iniciarSesion':
                    $controllerU = new controllerUser($res);
                    $controllerU->login();
                    break;
                case'cerrarSesion':
                    $controllerU = new controllerUser($res);
                    $controllerU->logout();
                    break;
                case'chequearUsuario':
                    $controllerU = new controllerUser($res);
                    $controllerU->checkAdmin();
                    break;
                case 'añadirDistribuidora':
                    auth($res);
                    $controllerD = new controllerDistributors($res);
                    $controllerD->addDistributor();
                    break;
                case'eliminarDistribuidora':
                    auth($res);
                    if(isset($params[1])){
                        $controllerD = new controllerDistributors($res);
                        $controllerD->deleteDistributor($params[1]);
                    }else{
                        $viewA = new viewAll($res);
                        $viewA->displayError('No hay ninguna distribuidora seleccionada');
                    }
                    break;
                case'editarDistribuidora':
                    auth($res);
                    if(isset($params[1])){
                        $controllerD = new controllerDistributors($res);
                        $controllerD->editDistributor($params[1]); 
                    }
                    break;
                case 'actualizarDistribuidora':
                    auth($res);
                    if (isset($params[1])){
                        $controllerD = new controllerDistributors($res);
                        $controllerD->updateDistributor($params[1]);
                    }
                    break;
                case 'añadirJuego':
                    auth($res);
                    $controllerG = new controllerGames($res);
                    $controllerG->addGame();
                    break;
                case 'eliminarJuego':
                    auth($res);
                    if (isset($params[1])){
                        $controllerG = new controllerGames($res);
                        $controllerG->deleteGame($params[1]);
                    } 
                    else{
                        $viewA = new viewAll($res);
                        $viewA->displayError('No hay ningún juego seleccionado');
                    }
                    break;
                case 'editarJuego':
                    auth($res);
                    if (isset($params[1])){
                        $controllerD = new controllerDistributors($res);
                        $distributors = $controllerD->getDistributorsData();
                        $controllerG = new controllerGames($res);
                        $controllerG->editGame($params[1], $distributors);
                    }
                    break;
                case 'actualizarJuego':
                    auth($res);
                    if (isset($params[1])){
                        $controllerG = new controllerGames($res);
                        $controllerG->updateGame($params[1]);
                    }
                    break;
                default:
                    $viewA = new viewAll($res);
                    $view->displayError("404 - No se encontró la página");
                break;
            }
        }
    }