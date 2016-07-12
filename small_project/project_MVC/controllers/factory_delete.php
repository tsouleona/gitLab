<?php 
    session_start();
    include_once("../models/process_factory.php");
    header("Content-Type:text/html; charset=utf-8");
    
    $id = $_GET["fa_id"];
    //echo $id;
    $factory = new factory();
    $factory->delete_fa($id);
    
    header("Location:../views/factory.php");

?>