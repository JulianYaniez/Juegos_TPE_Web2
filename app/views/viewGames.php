<?php

require_once "./app/controllers/controllerGames.php";

class viewGames {
    private $controller;

    function __construct(){
        $this->controller = new controllerGames();
    }

    public function getGame($games){
        
        echo '<ul>';
        foreach($games as $game){

            echo '<li>' . $game->titulo . '</li>';
            echo '<li>' . $game->genero . '</li>';
            echo '<li>' . $game->precio . '</li>';
            echo '<li>' . $game->fecha_salida . '</li>';
        }
        echo '</ul>';
    }

}