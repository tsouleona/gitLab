<?php 
    session_start();
    include_once("mysql_connect.inc.php");
    header("Content-Type:text/html; charset=utf-8");
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["cellphone"];
    
    $date = date("Y-m-d");
    $date2 = date("Ymd");
    //echo $date;
    //factory的id處理
    $sql="select `join_id` from `joinus` where `join_id` like '%$date2%';";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    $one="1";
    if($row["join_id"] == NULL)
    {
        $ans = $date2.$one;
    }
    else{
        $sql2="select `join_id` from `joinus` ORDER BY `join_id` DESC limit 0,1";
        $result2 = mysql_query($sql2);
        $row2= mysql_fetch_assoc($result2);
        
        $ans = substr($row2['join_id'],8);
        $ans = (int)($ans) + 1;
        $ans = $date2.$ans;
    }
    
    
    
    $sql3 = "INSERT INTO `joinus` (`join_id`,`join_name`,`join_email`,`join_cellphone`,`join_date`)
    VALUES ('".$ans."','".$name."','".$email."','".$phone."','".$date."');";
    mysql_query($sql3);
    header("Location: joinus.php");

?>