<?php 
    session_start();
    include_once("../models/process_display.php");
    header("Content-Type:text/html; charset=utf-8");
    
    //抓送過來的圖片編號
    $id = $_GET["dis_id"];
    //刪除該圖片及專案內容
    $display = new display();
    $display->delete_dis($id);
    unlink("../views/ok_photo/$id.jpg");
    
    header("Location:../views/display.php");
?>