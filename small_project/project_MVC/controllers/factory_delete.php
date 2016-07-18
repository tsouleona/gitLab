<?php 
    session_start();
    include_once("../models/process_factory.php");
    header("Content-Type:text/html; charset=utf-8");
    
    //街道傳過來的編號
    $id = $_GET["fa_id"];
    //刪除該筆資料
    $factory = new factory();
    $factory->delete_fa($id);
    
    header("Location:../views/factory.php");

?>