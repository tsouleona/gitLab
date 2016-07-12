<?php 
    session_start();
    include_once("../models/process_index.php");
    
    function contact_select(){
        $con = new index();
        return $con->selest_con();
    }
    
?>