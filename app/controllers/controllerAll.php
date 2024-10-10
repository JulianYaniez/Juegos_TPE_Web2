<?php
require_once "./app/models/modelAll.php";
require_once "./app/views/viewGames.php";
require_once "./app/views/viewAll.php";

class controllerAll {

    private $model;
    private $view;
    private $viewAll;

    function __construct(){
        $this->model = new modelAll();
        $this->view = new viewGames();
        $this->viewAll = new viewAll();
    }

    public function getAllLists(){

        $games = $this->model->getGames();
        $distributors = $this->model->getDistributors();
        $this->view->displayAllLists($games, $distributors);
    }
    public function getForms(){
        $formAction = "añadir";
        $games = $this->model->getGames();
        $distributors = $this->model->getDistributors();
        $this->view->displayForms($games, $distributors, $formAction);
    }
}