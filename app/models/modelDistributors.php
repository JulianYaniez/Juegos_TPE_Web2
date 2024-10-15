<?php
require_once "./app/controllers/controllerDistributors.php";
require_once "./app/models/model.php";

class modelDistributors extends model {
    function __construct(){
        parent::__construct();
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

    public function getDistributorGames($id_distributor){
        $query = $this->db->prepare("select * from juegos where id_distribuidora = ?" );
        $query->execute([$id_distributor]);

        return  $query->fetchALL(PDO::FETCH_OBJ);
    }

    public function addDistributor($name, $foundation_year, $headquarters, $web, $img){
        $query = $this->db->prepare("INSERT INTO distribuidoras(nombre, año_fundacion, pais_sede, sitio_web, imagen) VALUES(?, ?, ?, ?, ?)");
        $query->execute(array($name, $foundation_year, $headquarters, $web, $img));
        $new_distributor = $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function deleteDistributor($id){

        $query = $this->db->prepare("DELETE FROM distribuidoras WHERE id = ?");
        $query->execute([$id]);
    }
    public function updateDistributor($name, $foundation_year, $headquarters, $web, $img, $id){

        $query = $this->db->prepare("UPDATE distribuidoras SET nombre=?, año_fundacion=?, pais_sede=?, sitio_web=?, imagen=? WHERE id=?");
        $query->execute([$name, $foundation_year, $headquarters, $web, $img, $id]);
    }
}