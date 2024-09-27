<?php

require_once "./app/controllers/controllerDistributors.php";
require_once "./app/controllers/controllerGames.php";

class viewGames {
    
    public function displayError($error){
        require_once('./templates/header.phtml');
        require_once('./templates/errors.phtml');
        require_once('./templates/footer.phtml');
    }

    public function displayGames($games){
        require_once('./templates/header.phtml');
        require_once ('./templates/gamesList.phtml');
        require_once('./templates/footer.phtml');
    }

    public function displayDistributors($distributors){
        require_once('./templates/header.phtml');
        require_once('./templates/distributorsList.phtml');
        require_once('./templates/footer.phtml');
    }
    
    public function displayGame($game){
        require_once('./templates/header.phtml');
        echo '<h2>' . $game->titulo . '</h2>';
        require_once('./templates/footer.phtml');
    }
    public function displayGameFilter($game_distributor, $name_distributor){
        require_once('./templates/header.phtml');
        echo  '<h1> Juegos de ' . $name_distributor->nombre . '</h1>';
        
        echo '<ul>';
        foreach($game_distributor as $games){
            
            echo '<li>' . $games->titulo . ' ('.$games->fecha_salida.')</li>';
        }
        echo '</ul>';
        require_once('./templates/footer.phtml');
    }
}