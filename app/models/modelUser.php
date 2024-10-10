<?php
    require_once "./app/controllers/controllerUser.php";

class modelUser {

    private $db;

    function __construct(){

        $this->db = new PDO('mysql:host=localhost;'.'dbname=juegos_tpe;charset=utf8', 'root', '');
    }

    public function checkUser($user){

        $query = $this->db->prepare("SELECT * FROM usuarios WHERE nombre = ?");
        $query->execute([$user]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}