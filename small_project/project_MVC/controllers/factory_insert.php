<?php
    session_start();
    include_once("../models/process_factory.php");
    header("Content-Type:text/html; charset=utf-8");
    
    //接POST過來的資料
    $name = $_POST["name"];
    $people = $_POST["people"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $url = $_POST["url"];
    $email = $_POST["email"];
    $cellphone = $_POST["cellphone"];
    $tax = $_POST["tax"];
    $data = $_POST["data"];
    
    //若為空，內容為"沒有留下資料"
    if($email == "")
    {
        $email = "沒有留下資料";
    }
    if($tax == "")
    {
        $tax = "沒有留下資料";
    }
    if($address == "")
    {
        $address = "沒有留下資料";
    }
    if($url == "")
    {
        $url = "沒有留下資料";
    }
    
    $factory = new factory();
    
    $date = date("Y-m-d");
    $date2 = date("Ymd");
    //搜尋當天資料由大排到小
    $result = $factory->select_desc($date2);
    $row = mysql_fetch_array($result);
    
    $one="1";
    //圖片編號若不為第一筆則從當天的最後一筆+1
    if($row[0] == NULL)
    {
        $ans = $date2.$one;
        
    }
    //圖片編號若不為第一筆則從當天的最後一筆+1
    else{
        $ans = substr($row[0],8);
        
        $ans = (int)($ans) + 1;
        $ans = $date2.$ans;
    }
    //新增資料
    $factory->insert_fa($ans,$name,$people,$phone,$address,$url,$email,$cellphone,$tax,$data,$date);
    
    header("Location:../views/factory.php");
    
?>