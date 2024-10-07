<?php

require_once './app/models/modelDistributors.php';
require_once './app/views/viewGames.php';

class controllerDistributors{

    private $model;
    private $view;

    function __construct(){
        $this->model = new modelDistributors();
        $this->view = new viewGames();
    }

    public function getDistributors(){

        $distributors = $this->model->getDistributors();
        $this->view->displayDistributors($distributors);

        return $distributors;
    }

    public function getDistributorsData(){

        $distributors = $this->model->getDistributors();        
        return $distributors;
    }
    public function addDistributor(){

        if(isset($_POST["name"]) && isset($_POST["foundation_year"]) && isset($_POST["headquarters"]) && isset($_POST["web"])){
            $name = $_POST["name"];
            $foundation_year = $_POST["foundation_year"];
            $headquarters = $_POST["headquarters"];
            $web = $_POST["web"];

            $this->model->addDistributor($name, $foundation_year, $headquarters, $web);
        }else{
            $this->view->displayError('Complete el formulario');
        }
        header("location: " . BASE_URL . "administracion");
    }
    public function deleteDistributor($id){
        $this->model->deleteDistributor($id);
        header("location: " . BASE_URL . "administracion");
    }
    
    public function editDistributor($id){
        $distributor = $this->model->getDistributorById($id);
        if ($distributor) {
            $formAction = "edit";
            $this->view->displayUpdateDistributor($distributor, $formAction);
        } else {
            $this->view->displayError("Distribuidora no encontrada");
        }
    }

    public function updateDistributor($id){
        if(isset($_POST["name"]) && isset($_POST["foundation_year"]) && isset($_POST["headquarters"]) && isset($_POST["web"])){
            
            $name = $_POST["name"];
            $foundation_year = $_POST["foundation_year"];
            $headquarters = $_POST["headquarters"];
            $web = $_POST["web"];

            $this ->model->updateDistributor($name, $foundation_year, $headquarters, $web, $id);
            
        }else{
            $this->view->displayError('Complete el formulario');
        }
        header("location: " . BASE_URL . "administracion");
    }

    public function getGameFilter($id_distributor){

        $name_distributor = $this->model->getNameDistributor($id_distributor);
        $game_distributor = $this->model->getGameFilter($id_distributor);
        if(!isset($game_distributor) || empty($game_distributor)){
            $error = 'No existe esa distribuidora y/o no tiene juegos';
            $this->view->displayError($error);
        }else{
            $this->view->displayGameFilter($game_distributor, $name_distributor[0]);
        }
    }
}