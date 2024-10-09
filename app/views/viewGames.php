<?php

require_once "./app/controllers/controllerDistributors.php";
require_once "./app/controllers/controllerGames.php";

class viewGames {
    
    public function displayError($error){
        require('./templates/errors.phtml');
    }

    public function displayGames($games){
        require ('./templates/gamesList.phtml');

        require('./templates/footer.phtml');
    }

    public function displayDistributors($distributors){
        require('./templates/distributorsList.phtml');

        require('./templates/footer.phtml');
    }
    public function displayAllLists($games, $distributors){

        require ('./templates/allLists.phtml');
    }
    public function displayGame($game){

        require('./templates/game.phtml');
    }
    public function displayGameFilter($game_distributor, $name_distributor){

        require('./templates/gameFilter.phtml');
    }

    public function displayUpdateGame($game, $distributors, $formAction){
        require_once('./templates/formGame.phtml');
        require_once('./templates/footer.phtml');
    }

    public function displayUpdateDistributor($distributor, $formAction){
        require_once('./templates/formDistributor.phtml');
        require_once('./templates/footer.phtml');
    }

    public function displayForms($games, $distributors, $formAction){

        require_once('./templates/forms.phtml');
    }
}