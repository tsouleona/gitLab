<?php
    session_start();
    include_once("../models/process_display.php");
    
    
        $p = $_GET['p'];
        $table = new display();
        $result = $table->select_data();
        $total = mysql_num_rows($result);
        $pagecount = ceil($total/9);
    
        if($p=="")
        {
            $p = 0;
        }
        $result2 = $table->select_limit($p);
        
        

    
?>