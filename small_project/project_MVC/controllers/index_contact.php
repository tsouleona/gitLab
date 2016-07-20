<?php
    session_start();
    include_once("../models/process_index.php");
    header("Content-Type:text/html; charset=utf-8");
    //接收POST過來的資料
    $address=$_POST["ab_address"];
    $phone=$_POST["ab_phone"];
    $tax=$_POST["ab_tax"];
    $email=$_POST["ab_email"];
    
    function str($x){
        if(preg_match("/'/",$x)){
            return true;
        }
        else{
            return false;
        }
    }
    
    if(str($address)==true || str($phone)==true || str($tax)==true || str($email)==true)
    {
        echo '<strong><h1 style="color:#ff94b6">不能輸入特殊符號</h1></strong>';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=../views/index.php>';
    }
    else
    {
        //更新資料
        $index = new index();
        $index->contact($address,$phone,$tax,$email);
        
        header("Location:../views/index.php");
    }
    
?>