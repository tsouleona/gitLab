<?php
    session_start();
    include_once("../models/process_joinus.php");
    header("Content-Type:text/html; charset=utf-8");
    
    $id = $_GET["jo_id"];
    $joinus = new join();
    $joinus->delete_jo($id);
    
    header("Location:../views/joinus.php");


?>