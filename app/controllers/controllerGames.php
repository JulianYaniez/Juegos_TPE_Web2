<?php
require_once "./app/models/modelGames.php";
require_once "./app/views/viewGames.php";


class controllerGames{
    private $model;
    private $view;
    
    function __construct(){
        $this->model = new modelGames();
        $this->view = new viewGames();
    }
    public function getGames(){
        $games = $this->model->getGames();
        $this->view->displayGames($games);
    }
}