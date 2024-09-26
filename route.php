<?php
    require_once "./app/controllers/controllerGames.php";
    require_once "./app/controllers/controllerDistributors.php";
    require_once "./app/routerFunctions.php";

    $action = $_GET["action"];
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    if($action == NULL){
        showAll();
    }else{
        if (isset($action)){
            $params = explode("/", $action);
            switch ($params[0]) {
                case 'juegos':
                    showGames($params[1]);
                    break;
                case 'distribuidoras':
                    showDistributors($params[1]);
                    break;
                case 'verListas':
                    showAll();
                    break;
                default:
                    echo "hola no anda jaja";
                break;
            }
        }
    }