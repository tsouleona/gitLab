<?php
    session_start();
    include_once("../models/process_joinus.php");
    
    function joinus_select(){
        
        $jo = new joinus();
        return $jo->select_jo();
    }
?>