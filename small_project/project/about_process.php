<?php 
    session_start();
    include_once("mysql_connect.inc.php");
    header("Content-Type:text/html; charset=utf-8");
    
    $data = $_POST["about_data"];
    //echo $data;
    $sql2 = "UPDATE `introduction` SET `intro_data`= '".$data."';";
    mysql_query($sql2);
    header("Location: index.php");
?>