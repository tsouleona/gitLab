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
    //factory的id處理
    $result = $factory->select_like($date2);
    $row = mysql_fetch_array($result);
    $one="1";
    if($row[0] == NULL)
    {
        $ans = $date2.$one;
        
    }
    else{
        $result2 = $factory->select_desc();
        $row2 = mysql_fetch_array($result2);
        $ans = substr($row2[0],8);
        
        $ans = (int)($ans) + 1;
        $ans = $date2.$ans;
    }
    $factory->insert_fa($ans,$name,$people,$phone,$address,$url,$email,$cellphone,$tax,$data,$date);
    
    header("Location:../views/factory.php");
    
?>