<?php 
    session_start();
    include_once("../models/process_factory.php");
    
    function factory_select(){
        $fa = new factory();
        return $fa->select_fa();
    }
?>