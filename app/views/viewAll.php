<?php

require_once "./app/controllers/controllerAll.php";

class viewAll {

    public function displayError($error){
        require('./templates/errors.phtml');
    }
}