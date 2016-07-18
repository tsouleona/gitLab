<?php
    session_start();
    include_once("../models/process_index.php");
    header("Content-Type:text/html; charset=utf-8");
    //接收POST過來的資料
    $address=$_POST["ab_address"];
    $phone=$_POST["ab_phone"];
    $tax=$_POST["ab_tax"];
    $email=$_POST["ab_email"];
    //更新資料
    $index = new index();
    $index->contact($address,$phone,$tax,$email);
    
    header("Location:../views/index.php");
?>