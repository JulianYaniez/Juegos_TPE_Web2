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

    public function getGame($id_game){

        $game = $this->model->getGame($id_game);
        
        if(!isset($game) || empty($game)){
            $error = 'El juego señalado no existe';
            $this->view->error($error);
        }else{
            $this->view->displayGame($game[0]);
        }
    }

    public function getDistributors(){

        $distributors = $this->model->getDistributors();
        $this->view->displayDistributors($distributors);
    }

    public function getGameFilter($id_distributor){

        $game_distributor = $this->model->getGameFilter($id_distributor);
        if(!isset($game_distributor) || empty($game_distributor)){
            $error = 'No existe esa distribuidora';
            $this->view->error($error);
        }else{
            $this->view->displayGameFilter($game_distributor);
        }
    }
}