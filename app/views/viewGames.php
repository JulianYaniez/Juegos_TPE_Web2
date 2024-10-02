<?php

require_once "./app/controllers/controllerDistributors.php";
require_once "./app/controllers/controllerGames.php";

class viewGames {
    
    public function displayError($error){
        require('./templates/errors.phtml');
    }

    public function displayGames($games){
        require('./templates/header.phtml');

        require ('./templates/gamesList.phtml');

        require('./templates/footer.phtml');
    }

    public function displayDistributors($distributors){
        require('./templates/header.phtml');

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
        require('./templates/header.phtml');
        echo  '<h1> Juegos de ' . $name_distributor->nombre . '</h1>';
        
        echo '<ul>';
        foreach($game_distributor as $games){
            
            echo '<li>' . $games->titulo . ' ('.$games->fecha_salida.')</li>';
        }
        echo '</ul>';
        require('./templates/footer.phtml');
    }
    public function displayForms($games, $distributors){

        require('./templates/forms.phtml');
    }
}