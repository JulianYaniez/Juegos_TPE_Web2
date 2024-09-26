<?php


function showGames($element){
    require('./templates/header.phtml');

    if(isset($element) && $element != NULL) {
        $controller = new controllerGames();
        $controller->getGame($element);

    }
    else {
        $controller = new controllerGames();
        $controller->getGames();
    }
    
    require('./templates/footer.phtml');
}
function showDistributors($element){
    require('./templates/header.phtml');
    
    if(isset($element) && $element != NULL){
        $controllerD = new controllerDistributors();
        $controllerD->getGameFilter($element);
    }
    else{
        $controller = new controllerDistributors();
        $controller->getDistributors();
    }
    require('./templates/footer.phtml');
}
function showAll(){
    require('./templates/header.phtml');

    $controller = new controllerGames();
    $controllerD = new controllerDistributors();
    $controller->getGames();
    $controllerD->getDistributors();

    require('./templates/footer.phtml');
}