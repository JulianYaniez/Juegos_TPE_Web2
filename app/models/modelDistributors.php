<?php

require_once "./app/controllers/controllerDistributors.php";

class modelDistributors {
        
        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=juegos_tpe;charset=utf8', 'root', '');
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
        public function getNameDistributor($id_distributor){

            $query = $this->db->prepare("select * from distribuidoras where id = " . $id_distributor);
            $query->execute();
            $name_distributor = $query->fetchALL(PDO::FETCH_OBJ);

            return $name_distributor;
        }
}