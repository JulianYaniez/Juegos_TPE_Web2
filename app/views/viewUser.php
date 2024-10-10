<?php
require_once "./app/controllers/controllerUser.php";

class viewUser {

    public function displayFormUser(){

        require('./templates/loginUser.phtml');
    }
}