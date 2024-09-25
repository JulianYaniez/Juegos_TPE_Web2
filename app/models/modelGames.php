<?php

require_once "./app/controllers/controllerGames.php";

class modelGames {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=juegos_tpe;charset=utf8', 'root', '');
    }

    public function getGames(){

        $query = $this->db->prepare("select * from juegos");

        $query->execute();
        $games = $query->fetchALL(PDO::FETCH_OBJ);

        return $games;
    }

}