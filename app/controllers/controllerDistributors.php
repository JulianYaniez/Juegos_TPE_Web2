<?php

require_once './app/models/modelDistributors.php';
require_once './app/views/viewDistributor.php';

class controllerDistributors{

    private $model;
    private $view;
    private $user = null;

    function __construct($res){
        $this->model = new modelDistributors();
        $this->view = new viewDistributor($res);
        $this->user = $res;
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

        if(isset($_POST["name"]) && isset($_POST["foundation_year"]) && isset($_POST["headquarters"]) && isset($_POST["web"]) && isset($_POST["img"])){
            $name = htmlspecialchars($_POST["name"]);
            $foundation_year = htmlspecialchars($_POST["foundation_year"]);
            $headquarters = htmlspecialchars($_POST["headquarters"]);
            $web = htmlspecialchars($_POST["web"]);
            $img = htmlspecialchars($_POST["img"]);

            $this->model->addDistributor($name, $foundation_year, $headquarters, $web, $img);
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
            $this->view->displayUpdateDistributor($distributor, "edit");
        } else {
            $this->view->displayError("Distribuidora no encontrada");
        }
    }

    public function updateDistributor($id){
        if(isset($_POST["name"]) && isset($_POST["foundation_year"]) && isset($_POST["headquarters"]) && isset($_POST["web"]) && isset($_POST["img"])){
            
            $name = htmlspecialchars($_POST["name"]);
            $foundation_year = htmlspecialchars($_POST["foundation_year"]);
            $headquarters = htmlspecialchars($_POST["headquarters"]);
            $web = htmlspecialchars($_POST["web"]);
            $img = htmlspecialchars($_POST["img"]);

            $this ->model->updateDistributor($name, $foundation_year, $headquarters, $web, $img, $id);
            
        }else{
            $this->view->displayError('Complete el formulario');
        }
        header("location: " . BASE_URL . "administracion");
    }

    public function getDistributorById($id_distributor){

        $name_distributor = $this->model->getNameDistributor($id_distributor);
        $game_distributor = $this->model->getDistributorGames($id_distributor);
        if(!isset($game_distributor) || empty($game_distributor)){
            $this->view->displayError('No existe esa distribuidora y/o no tiene juegos');
        }else{
            $this->view->displayDistributor($game_distributor, $name_distributor[0]);
        }
    }
}