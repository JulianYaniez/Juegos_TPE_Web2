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
function showAddDistributor(){
    $controllerD = new controllerDistributors();
    $controllerD->addDistributor();
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
    
    $controller = new controllerAll();
    $controller->getAlllists();
}
function showError($error){
    $view = new viewGames();
    $view->displayError($error);
}