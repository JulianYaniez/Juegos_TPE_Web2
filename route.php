<?php
    require_once "./app/controllers/controllerGames.php";
    require_once "./app/controllers/controllerDistributors.php";
    require_once "./app/controllers/controllerAll.php";

    $action = $_GET["action"];
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
    
    if($action == NULL){
        showAll();
    }else{
        if (isset($action)){
            $params = explode("/", $action);
            switch ($params[0]) {
                case 'juegos':
                    if(isset($params[1]) && $params[1] != NULL) {
                        $controller = new controllerGames();
                        $controller->getGame($params[1]);
                    }else {
                        $controller = new controllerGames();
                        $controller->getGames();
                    }
                    break;
                case 'distribuidoras':
                    if(isset($params[1]) && $params[1] != NULL){
                        $controllerD = new controllerDistributors();
                        $controllerD->getGameFilter($params[1]);
                    }
                    else{
                        $controller = new controllerDistributors();
                        $controller->getDistributors();
                    }
                    break;
                case 'principal':
                    $controller = new controllerAll();
                    $controller->getAllLists();
                    break;
                    case'administracion':
                        $controller = new controllerAll();
                        $controller->getForms();
                        break;
                case 'añadirDistribuidora':
                    $controllerD = new controllerDistributors();
                    $controllerD->addDistributor();
                    break;
                    case'eliminarDistribuidora':
                        if(isset($params[1])){
                            $controller = new controllerDistributors();
                            $controller->deleteDistributor($params[1]);
                        }else{
                            $view = new viewGames();
                            $view->displayError('No hay ninguna distribuidora seleccionada');
                        }
                        break;
                    case'modificarDistribuidora':
                        if(isset($params[1])){
                            $controller = new controllerDistributors();
                            $controller->updateDistributor($params[1]);
                        }else{
                            $view = new viewGames();
                            $view->displayError('No hay ninguna distribuidora seleccionada');
                        }
                        break;
                case 'añadirJuego':
                    $controllerG = new controllerGames();
                    $controllerG->addGame();
                    break;
                case 'eliminarJuego':
                    if (isset($params[1])){
                        $controllerG = new controllerGames();
                        $controllerG->deleteGame($params[1]);
                    } 
                    else{
                        $view = new viewGames();
                        $view->displayError('No hay ningún juego seleccionado');
                    }
                    break;
                case 'modificarJuego':
                    if (isset($params[1])){
                        $controllerG = new controllerGames();
                        $controllerG->updateGame($params[1]);
                    } 
                    else{
                        $view = new viewGames();
                        $view->displayError('No hay ningún juego seleccionado');
                    }
                    break;
                default:
                    $error= "hola no anda jaja";
                    $view = new viewGames();
                    $view->displayError($error);
                break;
            }
        }
    }