<?php
require_once "./app/models/model.php";

class modelAll extends model{

    function __construct(){
        parent::__construct();
    }

    public function getGames(){

        $query = $this->db->prepare("select * from juegos");

        $query->execute();
        $games = $query->fetchALL(PDO::FETCH_OBJ);

        return $games;
    }
    public function getDistributors(){
        $query = $this->db->prepare("select * from distribuidoras");
        $query->execute();
        $distributors = $query->fetchALL(PDO::FETCH_OBJ);

        return $distributors; 
    }
}