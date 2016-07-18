<?php
    
    include_once("../models/check_login.php");
    header("Content-Type:text/html; charset=utf-8");
    
    //檢查帳號對不對
    function check(){
        $check = new login();
        return $check->check();
    }
    
?>