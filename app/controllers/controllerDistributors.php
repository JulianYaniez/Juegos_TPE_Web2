<?php

require_once './app/models/modelDistributors.php';
require_once './app/views/viewDistributor.php';

class controllerDistributors{

    private $model;
    private $view;
    private $viewAll;
    private $user = null;

    const MIN_YEAR = 1900;

    function __construct($res){
        $this->model = new modelDistributors();
        $this->view = new viewDistributor($res);
        $this->viewAll = new viewAll($res);
        $this->user = $res;
    }

    public function getDistributors(){
        $distributors= $this->getDistributorsData();
        $this->view->displayDistributors($distributors);

        return $distributors;
    }

    public function getDistributorsData(){

        $distributors = $this->model->getDistributors();        
        return $distributors;
    }
    
    public function getDistributorById($id_distributor){
        
        $distributor = $this->model->getDistributorById($id_distributor);
        if($distributor){
            $distributor_games = $this->model->getDistributorGames($id_distributor);
            $this->view->displayDistributor($distributor_games, $distributor);
        } else{
            $this->viewAll->displayError("No existe la distribuidora seleccionada");
            header("Refresh: 2; URL=" . BASE_URL . "distribuidoras");
        }

    }
    public function addDistributor(){

        if(!empty($_POST["name"]) && !empty($_POST["foundation_year"]) && preg_match('/^\d{4}$/', $_POST["foundation_year"]) && !empty($_POST["headquarters"]) && !empty($_POST["web"]) && !empty($_POST["img"])){
            
            $name = htmlspecialchars($_POST["name"]);
            $foundation_year = htmlspecialchars($_POST["foundation_year"]);
            $headquarters = htmlspecialchars($_POST["headquarters"]);
            $web = htmlspecialchars($_POST["web"]);
            $img = htmlspecialchars($_POST["img"]);

            if ($foundation_year > self::MIN_YEAR && $foundation_year <= date("Y")) {
                $this->model->addDistributor($name, $foundation_year, $headquarters, $web, $img);
                header("location: " . BASE_URL . "administracion");
            }
            else{
                $this->viewAll->displayError("La fecha de fundación debe ser mayor a 1900 y menor a la actual");
                header("Refresh: 2; URL=" . BASE_URL . "administracion");
            }
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

            if ($foundation_year > self::MIN_YEAR && $foundation_year <= date("Y")) {
                $this ->model->updateDistributor($name, $foundation_year, $headquarters, $web, $img, $id);
                header("location: " . BASE_URL . "administracion");
            }else{
                $this->viewAll->displayError("La fecha de fundación debe ser mayor a 1900 y menor a la actual");
                header("Refresh: 2; URL=" . BASE_URL . "editarDistribuidora/" . $id);
            }
        }else{
            $this->viewAll->displayError('Complete todos los campos del formulario correctamente');
            header("Refresh: 2; URL=" . BASE_URL . "editarDistribuidora/" . $id);
        }
    }
}