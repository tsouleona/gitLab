<?php
    include_once("../models/mysql_connect.inc.php");
    header("Content-Type:text/html; charset=utf-8");
    class login
    {
        //搜尋資料
        function check(){
            $sql="select * from signin";
            $result = mysql_query($sql);
            $row = mysql_fetch_row($result);
            return $row;
        }
        //搜尋該帳號的密碼
        function login_data($uname){
            $sql="select * from signin where username='$uname'";
            $result = mysql_query($sql);
            $row = mysql_fetch_row($result);
            
            return $row;
        }
        //清掉session
        function login_out(){
            unset($_SESSION["username"]);
            session_destroy();
        }
    }
    
    
    
    
?>