<?php
    session_start();
    include_once("../models/process_display.php");
    
    function display_select(){
        $dis = new display();
        return $dis->select_data();
    }
    
    
?>