<?php
    require_once "./app/controllers/controllerGames.php";

    $action = $_GET["action"];
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    if($action == ''){
        $controller = new controllerGames();
        $controller->GetGames();
    }else{
        if (isset($action)){
            
            $params = explode("/", $action);
            switch ($params[0]) {
                case 'home':
                    $controller = new controllerGames();
                    $controller->getGames();
                    break;
                default:
                    echo "hola no anda jaja";
                    break;
            }
        }
    }    
