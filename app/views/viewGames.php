<?php

require_once "./app/controllers/controllerGames.php";

class viewGames {
    
    public function error($error){

        echo '<h1>' .$error . '</h1>';
    }

    public function displayGames($games){
        
        echo '<h2> Juegos </h2>';
        echo '<ul>';
        foreach($games as $game){

            echo '<li> Nombre: ' . $game->titulo . '/ Precio: ' . $game->precio .  '</li>';
        }
        echo '</ul>';
    }
    public function displayDistributors($distributors){
        
        echo '<h2> Distribuidoras </h2>';
        echo '<ul>';
        foreach($distributors as $distributor){

            echo '<li> Nombre: ' . $distributor->nombre . '/ Sitio web: ' . $distributor->sitio_web .  '</li>';
        }
        echo '</ul>';
    }
    public function displayGame($game){

        echo '<h2>' . $game->titulo . '</h2>';

    }
    public function displayGameFilter($game_distributor){

        echo '<ul>';
        foreach($game_distributor as $games){

            echo '<li> Juego: ' . $games->titulo . '</li>';
        }
        echo '</ul>';
    }

}