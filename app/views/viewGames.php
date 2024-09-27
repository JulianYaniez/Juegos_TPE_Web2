<?php

require_once "./app/controllers/controllerDistributors.php";
require_once "./app/controllers/controllerGames.php";

class viewGames {
    
    public function displayError($error){
        require('./templates/errors.phtml');
    }

    public function displayGames($games){
        require ('./templates/gamesList.phtml');
    }

    public function displayDistributors($distributors){

        require('./templates/distributorsList.phtml');
    }
    
    public function displayGame($game){

        echo '<h2>' . $game->titulo . '</h2>';

    }
    public function displayGameFilter($game_distributor, $name_distributor){

        echo  '<h1> Juegos de ' . $name_distributor->nombre . '</h1>';
        
        echo '<ul>';
        foreach($game_distributor as $games){

            echo '<li> Juego: ' . $games->titulo . '</li>';
        }
        echo '</ul>';
    }
}