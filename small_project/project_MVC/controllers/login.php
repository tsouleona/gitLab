<?php
    session_start();
    header("Content-Type:text/html; charset=utf-8");
    include_once("../models/check_login.php");
    
    $uname = $_POST["username"];
    $pwd = $_POST["password"];
    $row = new login();
    $row2 = $row->login_data($uname);
    
    if($uname == $row2[0] && $pwd == $row2[1])
    {
        $_SESSION["username"] = $uname;
        echo '<strong><h1 style="color:#ff94b6" >登入成功</h1></strong>';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=../views/index.php>';
    }
    else
    {
        echo '<strong><h1 style="color:#ff94b6">帳號密碼錯誤</h1></strong>';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=../views/index.php>';
    }
?>