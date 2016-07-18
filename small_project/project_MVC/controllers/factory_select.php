<?php 
    session_start();
    include_once("../models/process_factory.php");
    

    function factory_select($p){
        $fa = new factory();
        return $fa->select_limit($p);
    }
?>