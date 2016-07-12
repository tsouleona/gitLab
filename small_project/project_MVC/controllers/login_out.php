<?php
    session_start();
    header("Content-Type:text/html; charset=utf-8");
    include_once("../models/check_login.php");
    
    $out = new login();
    $out->login_out();
    echo '<strong><h1 style="color:#ff94b6">登出中...</h1></strong>';
    echo '<meta http-equiv=REFRESH CONTENT=1;url=../views/index.php>';
?>