<?php

require_once "./app/controllers/controllerDistributors.php";

class viewDistributor {
    
    private $user = null;

    public function __construct($res){
        $this->user = $res;
    }

    public function displayDistributors($distributors){
        require_once('./templates/distributorsList.phtml');

        require_once('./templates/footer.phtml');
    }

    public function displayDistributor($game_distributor, $name_distributor){
        require_once('./templates/distributorsGamesList.phtml');
        require_once('./templates/footer.phtml');
    }

    public function displayUpdateDistributor($distributor, $formAction){
        require_once('./templates/formDistributor.phtml');
        require_once('./templates/footer.phtml');
    }
}