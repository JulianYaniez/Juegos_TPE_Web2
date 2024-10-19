<?php
require_once "./app/models/modelGames.php";
require_once "./app/views/viewGames.php";


class controllerGames{
    private $model;
    private $view;
    private $viewAll;
    private $user = null;

    const MIN_YEAR = 1900;


    public function __construct($res){
        $this->model = new modelGames();
        $this->view = new viewGames($res);
        $this->viewAll = new viewAll($res);
        $this->user = $res;
    }
    public function getGameById($id_game){

        $game = $this->model->getGameById($id_game);
        
        if(!isset($game) || empty($game)){
            $this->viewAll->displayError('El juego señalado no existe');
        }else{
            $distributor = $this->model->getGameDistributor($game->id_distribuidora);
            $this->view->displayGame($game, $distributor);
        }
    }

    public function getGames(){
        $games = $this->model->getGames();
        $this->view->displayGames($games);
    }
    
    public function addGame(){  
        if(!empty($_POST["title"]) && !empty($_POST["genre"]) && !empty($_POST["distributor"]) && !empty($_POST["launch_date"]) && preg_match('/^\d{4}$/', $_POST["launch_date"]) && !empty($_POST["price"]) && is_numeric($_POST["price"]) && $_POST["price"] > 0){

            $title = htmlspecialchars($_POST["title"]);
            $genre = htmlspecialchars($_POST["genre"]);
            $distributor = htmlspecialchars($_POST["distributor"]);
            $launch_date = htmlspecialchars($_POST["launch_date"]);
            $price = htmlspecialchars($_POST["price"]);

            if ($launch_date > self::MIN_YEAR && $launch_date <= date("Y")) {
                $this->model->addGame($title, $genre, $distributor, $launch_date, $price);
                header("URL=" . BASE_URL . "administracion");
            }else{
                $this->viewAll->displayError("La fecha de lanzamiento debe ser mayor a 1900 y menor a la actual");
                header("Refresh: 2; URL=" . BASE_URL . "administracion");
            }
        }else{
            $this->viewAll->displayError('Complete todos los campos del formulario correctamente');
            header("Refresh: 2; URL=" . BASE_URL . "administracion");
        }
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
            $this->viewAll->displayError("Juego no encontrado");
            header("Refresh: 2; URL=" . BASE_URL . "administracion");
        }
    }
    public function updateGame($id){
        if(!empty($_POST["title"]) && !empty($_POST["genre"]) && !empty($_POST["distributor"]) && !empty($_POST["launch_date"]) && preg_match('/^\d{4}$/', $_POST["launch_date"]) && !empty($_POST["price"]) && is_numeric($_POST["price"]) && $_POST["price"] > 0){
            
            $title = htmlspecialchars($_POST["title"]);
            $genre = htmlspecialchars($_POST["genre"]);
            $distributor = htmlspecialchars($_POST["distributor"]);
            $launch_date = htmlspecialchars($_POST["launch_date"]);
            $price = htmlspecialchars($_POST["price"]);

            if ($launch_date > self::MIN_YEAR && $launch_date <= date("Y")) {
                $this->model->updateGame($title, $genre, $distributor, $launch_date, $price, $id);
                header("location: " . BASE_URL . "administracion");
            }else{
                $this->viewAll->displayError("La fecha de lanzamiento debe ser mayor a 1900 y menor a la actual");
                header("Refresh: 2; URL=" . BASE_URL . "editarJuego/" . $id);
            }
        }else{
            $this->viewAll->displayError('Complete todos los campos del formulario correctamente');
            header("Refresh: 2; URL=" . BASE_URL . "editarJuego/" . $id);
        }
    }
}