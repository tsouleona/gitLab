<?php 
    session_start();
    include_once("../models/process_joinus.php");
    header("Content-Type:text/html; charset=utf-8");
    //接POST過來的資料
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["cellphone"];
    
     function str($x){
        if(preg_match("/'/",$x)){
            return true;
        }
        else{
            return false;
        }
    }
    if(str($name)==true || str($email)==true || str($phone)==true){
        
        echo '<strong><h1 style="color:#ff94b6">不能輸入特殊符號</h1></strong>';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=../views/joinus.php>';
    }
    else
    {
        $joinus = new joinus();
        //如果為空，則內容為"沒有留下資料"
        if($email == "")
        {
            $email = "沒有留下資料";
        }
        
        $date = date("Y-m-d");
        $date2 = date("Ymd");
        
        //搜尋當天資料由大排到小
        $joinus = new joinus();
        $result = $joinus->select_desc($date2);
        $row = mysql_fetch_array($result);
        $one="0001";
        //圖片編號若不為第一筆則從當天的最後一筆+1
        if($row[0] == NULL)
        {
            $ans = $date2.$one;
        }
        else{
            $ans = substr($row[0],8,4);
            $ans = (int)($ans) + 1;
            $ans = str_pad($ans,4, "0", STR_PAD_LEFT);
            $ans = $date2.$ans;
        }
        //新增資料
        $joinus->insert_jo($ans,$name,$email,$phone,$date);
        header("Location:../views/joinus.php");
    }
    

?>