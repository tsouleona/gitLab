<?php 
    session_start();
    include_once("../models/process_factory.php");
    
    //搜尋第幾筆到第幾筆
    function factory_select($p){
        $fa = new factory();
        return $fa->select_limit($p);
    }
?>