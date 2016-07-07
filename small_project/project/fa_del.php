<?php 
    session_start();
    include_once("mysql_connect.inc.php");
    header("Content-Type:text/html; charset=utf-8");
    
    $id = $_GET["fa_id"];
    //echo $id;
    $sql=" DELETE FROM `factory` where `fac_id` = '".$id."';";
    mysql_query($sql);
    
    header("Location: factory.php");

?>
