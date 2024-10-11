<?php

require_once "./app/controllers/controllerAll.php";

class viewAll {
    private $user = null;

    public function __construct($res){
        $this->user = $res;
    }
    
    public function displayError($error){
        require_once('./templates/errors.phtml');
    }
    public function displayForms($games, $distributors, $formAction){

        require_once('./templates/forms.phtml');
    }
    public function displayAllLists($games, $distributors){

        require ('./templates/allLists.phtml');
    }
}