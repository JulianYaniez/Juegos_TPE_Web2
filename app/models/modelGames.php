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

   /* public function addGame($titulo, $genero, $id_distribuidora, $precio, $fecha_salida){

        $query = $this->db->prepare("INSERT INTO distribuidoras(titulo, genero, id_distribuidora, precio, fecha_salida) VALUES(?,?,?,?,?)")
        $query->execute([$titulo, $genero, $id_distribuidora, $precio, $fecha_salida]);
        $new_game = $query->fetchAll(PDO::FETCH_OBJ);

        return $new_game;
    }

    public function deleteGame($id){
        $query = $this->db->prepare("DELETE FROM juegos WHERE id = " . $id);
        $query->execute();
    }

    public function updateGame($id){
        $query = $this->db->prepare("UPDATE juegos SET titulo=?, genero=?, id_distribuidora=?, precio=?, fecha_salida=? WHERE id=?");
        $query->execute([$titulo, $genero, $id_distribuidora, $precio, $fecha_salida, $id]);
    }
    */
}