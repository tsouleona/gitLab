<?php 
    session_start();
    include_once("../models/process_index.php");
    header("Content-Type:text/html; charset=utf-8");
    
    //接收POST的資料
    $data = $_POST["about_data"];
    //更新資料
    $index = new index();
    $index->about($data);
    
    header("Location:../views/index.php");
    
?>