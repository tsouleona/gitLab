<?php
    session_start();
    include_once("mysql_connect.inc.php");
    header("Content-Type:text/html; charset=utf-8");
    
    $data = $_POST["data"];
    $id = $_POST["id"];
    
    $sql = "UPDATE `display` SET `display_data`='".$data."' where `display_id`='".$id."';";
    mysql_query($sql);
    
    header("Location:display.php");
?>