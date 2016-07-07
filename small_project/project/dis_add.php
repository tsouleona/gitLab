<?php
    session_start();
    include_once("mysql_connect.inc.php");
    header("Content-Type:text/html; charset=utf-8");
    
    $data = $_POST["add_data"];
    
    $date = date("Y-m-d");
    $date2 = date("Ymd");
    //echo $date;
    //factory的id處理
    $sql="select `display_id` from `display` where `display_id` like '%$date2%';";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    $one="1";
    if($row["display_id"] == NULL)
    {
        $ans = $date2.$one;
    }
    else{
        $sql2="select `display_id` from `display` ORDER BY `display_id` DESC limit 0,1";
        $result2 = mysql_query($sql2);
        $row2= mysql_fetch_assoc($result2);
        
        $ans = substr($row2['display_id'],8);
        $ans = (int)($ans) + 1;
        $ans = $date2.$ans;
    }
    
    $sql2 = "insert into `display` (`display_id`,`display_data`,`display_date`) VALUES ('".$ans."','".$data."','".$date."');";
    mysql_query($sql2);
    
    header("Location:display.php");
?>