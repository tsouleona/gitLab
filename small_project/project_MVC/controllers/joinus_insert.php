<?php 
    session_start();
    include_once("../models/process_joinus.php");
    header("Content-Type:text/html; charset=utf-8");
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["cellphone"];
    
    $joinus = new joinus();
    
    if($email == "")
    {
        $email = "沒有留下資料";
    }
    
    $date = date("Y-m-d");
    $date2 = date("Ymd");
    //echo $date;
    //factory的id處理
    $joinus = new joinus();
    $result = $joinus->select_like($date2);
    $row = mysql_fetch_array($result);
    $one="1";
    if($row[0] == NULL)
    {
        $ans = $date2.$one;
    }
    else{
        $result2 = $joinus->select_desc();
        $row2 = mysql_fetch_array($result2);
        $ans = substr($row2[0],8);
        $ans = (int)($ans) + 1;
        $ans = $date2.$ans;
    }
    
    $joinus->insert_jo($ans,$name,$email,$phone,$date);
    header("Location:../views/joinus.php");

?>