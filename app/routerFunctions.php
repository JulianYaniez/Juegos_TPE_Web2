<?php


function showGames($element){

    if(isset($element) && $element != NULL) {
        $controller = new controllerGames();
        $controller->getGame($element);

    }
    else {
        $controller = new controllerGames();
        $controller->getGames();
    }
}
function showDistributors($element){

    if(isset($element) && $element != NULL){
        $controllerD = new controllerDistributors();
        $controllerD->getGameFilter($element);
    }
    else{
        $controller = new controllerDistributors();
        $controller->getDistributors();
    }
}
function showAll(){
    
    $controller = new controllerGames();
    $controllerD = new controllerDistributors();
    $controller->getGames();
    $controllerD->getDistributors();
}
function showError($error){
    $view = new viewGames();
    $view->displayError($error);
}