<?php

require_once "./app/controllers/controllerGames.php";

class viewGames {
    private $user = null;

    public function __construct($res){
        $this->user = $res;
    }
    public function displayGames($games){
        require_once ('./templates/gamesList.phtml');

        require_once('./templates/footer.phtml');
    }
    
    public function displayGame($game, $distributor){
        require_once('./templates/game.phtml');
    }
    
    public function displayUpdateGame($game, $distributors, $formAction){
        require_once('./templates/formGame.phtml');
        require_once('./templates/footer.phtml');
    }
}