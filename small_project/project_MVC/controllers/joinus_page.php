<?php
    session_start();
    include_once("../models/process_joinus.php");
    
    
    $p = $_GET['p'];
    $jo = new joinus();
    $result = $jo->select_jo();
    $total = mysql_num_rows($result);
    $pagecount = ceil($total/10);

    if($p=="")
    {
        $p = 0;
    }
    $fa = new joinus();
    $result2 = $fa->select_limit($p);
    
    
?>