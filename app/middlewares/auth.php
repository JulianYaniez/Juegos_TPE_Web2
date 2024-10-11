<?php
    function auth($res) {
        if($res->user == null){
            header("location: " . BASE_URL);
            die();
        }
    }
    function checkUser($res){
        if(isset($_SESSION['user'])){
            $res->user = new stdClass();
            $res->user->usuario = $_SESSION['user'];
        }
    }