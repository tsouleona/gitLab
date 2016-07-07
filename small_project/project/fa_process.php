<?php
    session_start();
    include_once("mysql_connect.inc.php");
    header("Content-Type:text/html; charset=utf-8");
    
    //接POST過來的資料
    $name = $_POST["name"];
    $people = $_POST["people"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $url = $_POST["url"];
    $email = $_POST["email"];
    $cellphone = $_POST["cellphone"];
    $tax = $_POST["tax"];
    $data = $_POST["data"];
    
    // echo $name,"<br>";
    // echo $people,"<br>";
    // echo $phone,"<br>";
    // echo $address,"<br>";
    // echo $url,"<br>";
    // echo $email,"<br>";
    // echo $cellphone,"<br>";
    // echo $tax,"<br>";
    // echo $data,"<br>";
    
    //存取當天日期
    $date = date("Y-m-d");
    $date2 = date("Ymd");
    //echo $date;
    //factory的id處理
    $sql="select `fac_id` from `factory` where `fac_id` like '%$date2%';";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    $one="1";
    if($row["fac_id"] == NULL)
    {
        $ans = $date2.$one;
    }
    else{
        $sql2="select `fac_id` from `factory` ORDER BY `fac_id` DESC limit 0,1";
        $result2 = mysql_query($sql2);
        $row2= mysql_fetch_assoc($result2);
        
        $ans = substr($row2['fac_id'],8);
        $ans = (int)($ans) + 1;
        $ans = $date2.$ans;
    }
    
     
    // echo $ans;
    
    $sql3 = "INSERT INTO `factory` (`fac_id`,`fac_name`,`fac_people`,`fac_phone`,
    `fac_address`,`fac_url`,`fac_email`,`fac_cellphone`,
    `fac_tax`,`fac_data`,`fac_date`) VALUES ('".$ans."','".$name."','".$people."',
    '".$phone."','".$address."','".$url."','".$email."',
    '".$cellphone."','".$tax."','".$data."','".$date."')";
    mysql_query($sql3);
    
    header("Location:factory.php");
    
?>