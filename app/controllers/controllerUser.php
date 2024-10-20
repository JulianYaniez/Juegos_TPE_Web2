<?php
    require_once "./app/models/modelUser.php";
    require_once "./app/views/viewUser.php";
    require_once "./app/views/viewAll.php";

class controllerUser {
    private $model;
    private $view;
    private $viewAll;
    private $user = null;

    function __construct($res){
        $this->model = new modelUser();
        $this->view = new viewUser($res);
        $this->viewAll = new viewAll($res);
    }

    public function checkAdmin(){
        
        $pass = $_POST["pass"];

        $user = $this->model->checkUser($_POST["user"]);

        if(isset($user) && $user != NULL && password_verify($pass, $user->contraseña)){
            session_start();
            $_SESSION["user"] = $user->nombre;
            header("location: " . BASE_URL . "administracion");
        }else{
            $this->viewAll->displayError("Credenciales incorrectas");
            header("Refresh: 2; URL=" . BASE_URL . "iniciarSesion/");
        }
    }
    public function logout(){
        session_start();
        session_destroy();
        header("location: " . BASE_URL . "principal");
    }
    public function login(){
        $user = $this->view->displayFormUser();
    }
}