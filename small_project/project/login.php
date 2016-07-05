<?php
    session_start();
    include_once("mysql_connect.inc.php");
    
    header("Content-Type:text/html; charset=utf-8");
    
    $uname = $_POST["username"];
    $_SESSION["username"] = $uname;
    $pwd = $_POST["password"];
    
    $sql="select * from signin where username='$uname'";
    $result = mysql_query($sql);
    $row = @mysql_fetch_row($result);
    
    if($uname == $row[0] && $pwd == $row[1])
    {
        echo '<strong><h1 style="color:#ff94b6" >登入成功</h1></strong>';
        //echo $uname;
        //echo $pwd;
        echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
    }
    else
    {
        echo '<strong><h1 style="color:#ff94b6">帳號密碼錯誤</h1></strong>';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
    }
?>