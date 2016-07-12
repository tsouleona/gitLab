<?php 
    session_start();
    include_once("../models/process_index.php");
    header("Content-Type:text/html; charset=utf-8");
    
    $data = $_POST["about_data"];
    $index = new index();
    $index->about($data);
    
    header("Location:../views/index.php");
    
?>