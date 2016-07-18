<?php 
    session_start();
    include_once("../models/process_factory.php");
    
    
    $p = $_GET['p'];    
    $fa = new factory();
    $result = $fa->select_fa();
    $total = mysql_num_rows($result);
    $pagecount =  ceil($total/10);


    if($p=="")
    {
        $p = 0;
    }
    
    $result2 = $fa->select_limit($p);
    
?>