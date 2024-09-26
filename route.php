<?php
    require_once "./app/controllers/controllerGames.php";

    $action = $_GET["action"];
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    if($action == NULL){
        $controller = new controllerGames();
        $controllerD = new controllerDistributors();
        $controller->getGames();
        $controllerD->getDistributors();
    }else{
        if (isset($action)){
            $params = explode("/", $action);
            switch ($params[0]) {
                case 'juegos':
                    if(isset($params[1]) && $params[1] != NULL) {
                        $controller = new controllerGames();
                        $controller->getGame($params[1]);
                    }
                    else {
                        $controller = new controllerGames();
                        $controller->getGames();
                    }
                    break;
                case 'distribuidoras':
                    if(isset($params[1]) && $params[1] != NULL){
                        $controllerD = new controllerDistributors();
                        $controllerD->getGameFilter($params[1]);
                    }else{
                        $controller = new controllerDistributors();
                        $controller->getDistributors();
                    }
                    break;
                case 'verListas':
                    $controller = new controllerGames();
                    $controllerD = new controllerDistributors();
                    $controller->getGames();
                    $controllerD->getDistributors();
                    break;
                default:
                    echo "hola no anda jaja";
                break;
            }
        }
    }