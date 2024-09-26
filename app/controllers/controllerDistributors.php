<?php

require_once './app/models/modelDistributors.php';
require_once './app/views/viewGames.php';

class modelDistributors{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=juegos_tpe;charset=utf8', 'root', '');
    }

}