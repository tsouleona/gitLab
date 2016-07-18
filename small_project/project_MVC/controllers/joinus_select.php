<?php
    session_start();
    include_once("../models/process_joinus.php");
    
    function joinus_select($p){
        
        $jo = new joinus();
        return $jo->select_limit($p);
    }
?>