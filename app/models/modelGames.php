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
    public function getGame($id){
        $query = $this->db->prepare("select * from juegos where id = " . $id);
        $query->execute();
        $game = $query->fetchALL(PDO::FETCH_OBJ);

        return $game;
    }
    public function getDistributors(){
        $query = $this->db->prepare("select * from distribuidoras");
        $query->execute();
        $distributors = $query->fetchALL(PDO::FETCH_OBJ);

        return $distributors; 
    }
    public function getGameFilter($id_distributor){
        $query = $this->db->prepare("select * from juegos where id_distribuidora = " . $id_distributor);
        $query->execute();
        $gameFilter = $query->fetchALL(PDO::FETCH_OBJ);

        return $gameFilter;
    }

}