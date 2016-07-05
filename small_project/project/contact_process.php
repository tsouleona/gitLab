<?php
    session_start();
    include_once("mysql_connect.inc.php");
    header("Content-Type:text/html; charset=utf-8");

    $address=$_POST["ab_address"];
    $phone=$_POST["ab_phone"];
    $tax=$_POST["ab_tax"];
    $email=$_POST["ab_email"];
    
    $sql  = "UPDATE `contact` SET `con_address`= '".$address."';";
    mysql_query($sql);
    $sql2 = "UPDATE `contact` SET `con_phone`= '".$phone."';";
    mysql_query($sql2);
    $sql3 = "UPDATE `contact` SET `con_tax`= '".$tax."';";
    mysql_query($sql3);
    $sql4 = "UPDATE `contact` SET `con_email`= '".$email."';";
    mysql_query($sql4);
    
    header("Location: index.php");
?>