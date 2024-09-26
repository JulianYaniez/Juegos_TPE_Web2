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

    public function getGameFilter($id_distributor){

        $name_distributor = $this->model->getNameDistributor($id_distributor);
        $game_distributor = $this->model->getGameFilter($id_distributor);
        if(!isset($game_distributor) || empty($game_distributor)){
            $error = 'No existe esa distribuidora y/o no tiene juegos';
            $this->view->error($error);
        }else{
            $this->view->displayGameFilter($game_distributor, $name_distributor[0]);
        }
    }
}