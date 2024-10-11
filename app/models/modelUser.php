<?php
require_once "./app/controllers/controllerUser.php";
require_once "./app/models/model.php";

class modelUser extends model {

    function __construct(){
        parent::__construct();
    }

    public function checkUser($user){

        $query = $this->db->prepare("SELECT * FROM usuarios WHERE nombre = ?");
        $query->execute([$user]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}