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
    }
    public function addDistributor(){
        $new_distributor = $this->model->addDistributor();
        $this->view->displayDistributors($new_distributor);
        //header("location: " . BASE_URL);
    }
    public function deleteDistributor($id){
        $this->model->deleteDistributor($id);
        //header("location: " . BASE_URL);
    }
    public function updateDistributor(){
        $this ->model->updateDistributor();
        //header("location: " . BASE_URL/administracion);
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