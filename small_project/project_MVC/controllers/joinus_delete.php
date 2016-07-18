<?php
    session_start();
    include_once("../models/process_joinus.php");
    header("Content-Type:text/html; charset=utf-8");
    
    //抓GET過來的編號
    $id = $_GET["jo_id"];
    //刪除該筆資料
    $joinus = new joinus();
    $joinus->delete_jo($id);
    
    header("Location:../views/joinus.php");


?>