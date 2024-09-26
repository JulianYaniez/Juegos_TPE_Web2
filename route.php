<?php
    require_once "./app/controllers/controllerGames.php";

    $action = $_GET["action"];
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    if($action == ''){
        $controller = new controllerGames();
        $controller->GetGames();
        $controller->getDistributors();
    }else{
        if (isset($action)){
            $params = explode("/", $action);
            switch ($params[0]) {
                case 'juegos':
                    if(isset($params[1])) {
                        $controller = new controllerGames();
                        $controller->getGame($params[1]);
                    }
                    else {
                        $controller = new controllerGames();
                        $controller->getGames();
                    }
                    break;
                case 'distribuidoras':
                    $controller = new controllerGames();
                    $controller->getDistributors();
                    break;
                case 'verListas':
                    $controller = new controllerGames();
                    $controller->getGames();
                    $controller->getDistributors();
                    break;
                case 'juegos':
                default:
                    echo "hola no anda jaja";
                break;
            }
        }
    }