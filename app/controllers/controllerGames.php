<?php
require_once "./app/models/modelGames.php";
require_once "./app/views/viewGames.php";


class controllerGames{
    private $model;
    private $view;
    private $user = null;

    
    public function __construct($res){
        $this->model = new modelGames();
        $this->view = new viewGames($res);
        $this->user = $res;
    }
    public function getGameById($id_game){

        $game = $this->model->getGameById($id_game);
        
        if(!isset($game) || empty($game)){
            $this->view->displayError('El juego señalado no existe');
        }else{
            $this->view->displayGame($game);
        }
    }

    public function getGames(){
        $games = $this->model->getGames();
        $this->view->displayGames($games);
    }
    public function addGame(){
        if(isset($_POST["title"]) && isset($_POST["genre"]) && isset($_POST["distributor"]) && isset($_POST["launch_date"]) && isset($_POST["price"])){

            $title = htmlspecialchars($_POST["title"]);
            $genre = htmlspecialchars($_POST["genre"]);
            $distributor = htmlspecialchars($_POST["distributor"]);
            $launch_date = htmlspecialchars($_POST["launch_date"]);
            $price = htmlspecialchars($_POST["price"]);

            $this->model->addGame($title, $genre, $distributor, $launch_date, $price);
            
        }else{
            $this->view->displayError('Complete el formulario');
        }
        header("location: " . BASE_URL . "administracion");
    }
    public function deleteGame($id){
        $this->model->deleteGame($id);
        header("location: " . BASE_URL . "administracion");
    }
    public function editGame($id, $distributors){
        $game = $this->model->getGameById($id);
        if ($game) {
            $this->view->displayUpdateGame($game, $distributors, "edit");
        } else {
            $this->view->displayError("Juego no encontrado");
        }
    }
    public function updateGame($id){
        if(isset($_POST["title"]) && isset($_POST["genre"]) && !empty($_POST["distributor"]) && isset($_POST["launch_date"]) && isset($_POST["price"])){
            
            $title = htmlspecialchars($_POST["title"]);
            $genre = htmlspecialchars($_POST["genre"]);
            $distributor = htmlspecialchars($_POST["distributor"]);
            $launch_date = htmlspecialchars($_POST["launch_date"]);
            $price = htmlspecialchars($_POST["price"]);
            
            $this ->model->updateGame($title, $genre, $distributor, $launch_date, $price, $id);
        }else{
            $this->view->displayError('Complete el formulario');
        }
        
        header("location: " . BASE_URL . "administracion");
    }
}