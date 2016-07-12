<?php
    session_start();
    include_once("../models/check_login.php");
    header("Content-Type:text/html; charset=utf-8");
    
    function check(){
        $check = new login();
        return $check->check();
    }
    
?>