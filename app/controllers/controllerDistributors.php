<?php

require_once './app/models/modelDistributors.php';
require_once './app/views/viewDistributor.php';

class controllerDistributors{

    private $model;
    private $view;
    private $viewAll;
    private $user = null;

    function __construct($res){
        $this->model = new modelDistributors();
        $this->view = new viewDistributor($res);
        $this->viewAll = new viewAll($res);
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
    
    public function getDistributorById($id_distributor){

        $name_distributor = $this->model->getDistributorName($id_distributor);
        $game_distributor = $this->model->getDistributorGames($id_distributor);
        if(!isset($game_distributor) || empty($game_distributor)){
            $this->viewAll->displayError('No existe esa distribuidora y/o no tiene juegos');
        }else{
            $this->view->displayDistributor($game_distributor, $name_distributor[0]);
        }
    }
    public function getDistributorDataById($id_distributor){
        $distributor = $this->model->getNameDistributor($id_distributor);
        return $distributor[0];
    }
    public function addDistributor(){

        if(!empty($_POST["name"]) && !empty($_POST["foundation_year"]) && preg_match('/^\d{4}$/', $_POST["foundation_year"]) && !empty($_POST["headquarters"]) && !empty($_POST["web"]) && !empty($_POST["img"])){
            $name = htmlspecialchars($_POST["name"]);
            $foundation_year = htmlspecialchars($_POST["foundation_year"]);
            $headquarters = htmlspecialchars($_POST["headquarters"]);
            $web = htmlspecialchars($_POST["web"]);
            $img = htmlspecialchars($_POST["img"]);

            $this->model->addDistributor($name, $foundation_year, $headquarters, $web, $img);
            header("location: " . BASE_URL . "administracion");
        }else{
            $this->viewAll->displayError('Complete todos los campos del formulario correctamente');
            header("Refresh: 2; URL=" . BASE_URL . "administracion");
        }
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
            $this->viewAll->displayError("Distribuidora no encontrada");
            header("Refresh: 2; URL=" . BASE_URL . "administracion");
        }
    }

    public function updateDistributor($id){
        if(!empty($_POST["name"]) && !empty($_POST["foundation_year"]) && preg_match('/^\d{4}$/', $_POST["foundation_year"]) && !empty($_POST["headquarters"]) && !empty($_POST["web"]) && !empty($_POST["img"])){
            
            $name = htmlspecialchars($_POST["name"]);
            $foundation_year = htmlspecialchars($_POST["foundation_year"]);
            $headquarters = htmlspecialchars($_POST["headquarters"]);
            $web = htmlspecialchars($_POST["web"]);
            $img = htmlspecialchars($_POST["img"]);

            $this ->model->updateDistributor($name, $foundation_year, $headquarters, $web, $img, $id);
            header("location: " . BASE_URL . "administracion");
            
        }else{
            $this->viewAll->displayError('Complete todos los campos del formulario correctamente');
            header("Refresh: 2; URL=" . BASE_URL . "editarDistribuidora/" . $id);
        }
    }
}