<?php 
    session_start();
    include_once("../models/process_display.php");
    header("Content-Type:text/html; charset=utf-8");
    
    $id = $_GET["dis_id"];
    $display = new display();
    $display->delete_dis($id);
    unlink("../views/ok_photo/$id.jpg");
    
    header("Location:../views/display.php");
?>