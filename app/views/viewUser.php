<?php
require_once "./app/controllers/controllerUser.php";

class viewUser {
    private $user = null;

    public function __construct($res){
        $this->user = $res;
    }
    public function displayFormUser(){
        require_once('./templates/loginUser.phtml');
    }
}