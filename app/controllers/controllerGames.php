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

    public function addGame(){
        $new_game = $this->model->addGame();
        $this->view->displayGames($new_game);
        //header("location: " . BASE_URL);
    }
    public function deleteGame($id){
        $this->model->deleteGame($id);
        //header("location: " . BASE_URL);
    }
    public function updateGame($id){
        $changed_game = $this ->model->updateGame($id);
        $this->view->changedGame($changed_game);
        //header("location: " . BASE_URL);
    }

    public function getGame($id_game){

        $game = $this->model->getGame($id_game);
        
        if(!isset($game) || empty($game)){
            $error = 'El juego señalado no existe';
            $this->view->displayError($error);
        }else{
            $this->view->displayGame($game[0]);
        }
    }
}