<?php
require_once "./app/controllers/controllerGames.php";
require_once "./app/models/model.php";

class modelGames extends model {

    function __construct(){
        parent::__construct();
    }

    public function getGames(){

        $query = $this->db->prepare("select * from juegos");

        $query->execute();
        $games = $query->fetchALL(PDO::FETCH_OBJ);

        return $games;
    }
    public function getGameById($id){
        $query = $this->db->prepare("select * from juegos where id = " . $id);
        $query->execute();
        $game = $query->fetch(PDO::FETCH_OBJ);

        return $game;
    }

    public function addGame($title, $genre, $distributor, $launch_date, $price){
        $query = $this->db->prepare("INSERT INTO juegos(titulo, genero, id_distribuidora, precio, fecha_salida) VALUES(?,?,?,?,?)");
        $query->execute([$title, $genre, $distributor, $price, $launch_date]);
        $new_game = $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function deleteGame($id){
        $query = $this->db->prepare("DELETE FROM juegos WHERE id = " . $id);
        $query->execute();
    }

    public function updateGame($title, $genre, $distributor, $launch_date, $price, $id){
        $query = $this->db->prepare("UPDATE juegos SET titulo=?, genero=?, id_distribuidora=?, precio=?, fecha_salida=? WHERE id=?");
        $query->execute([$title, $genre, $distributor, $price, $launch_date, $id]);
    }
    
}