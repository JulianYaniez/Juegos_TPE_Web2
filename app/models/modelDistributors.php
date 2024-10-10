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
    public function getDistributorById($id_distributor) {
        $query = $this->db->prepare("SELECT * FROM distribuidoras WHERE id = ?");
        $query->execute([$id_distributor]);
        return $query->fetch(PDO::FETCH_OBJ);
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
    public function addDistributor($name, $foundation_year, $headquarters, $web, $img){
        $query = $this->db->prepare("INSERT INTO distribuidoras(nombre, año_fundacion, pais_sede, sitio_web, imagen) VALUES(?, ?, ?, ?, ?)");
        $query->execute(array($name, $foundation_year, $headquarters, $web, $imagen));
        $new_distributor = $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function deleteDistributor($id){

        $query = $this->db->prepare("DELETE FROM distribuidoras WHERE id = " . $id);
        $query->execute();
    }
    public function updateDistributor($name, $foundation_year, $headquarters, $web, $img, $id){

        $query = $this->db->prepare("UPDATE distribuidoras SET nombre=?, año_fundacion=?, pais_sede=?, sitio_web=?, imagen=? WHERE id=?");
        $query->execute([$name, $foundation_year, $headquarters, $web, $img, $id]);
    }
}