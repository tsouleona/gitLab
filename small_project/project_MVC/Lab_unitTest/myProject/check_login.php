<?php
    session_start();
    include_once("../models/mysql_connect.inc.php");
    header("Content-Type:text/html; charset=utf-8");
    
    namespace myProject;
    
    class login
    {
        function check(){
            $id=$_SESSION['username'];            
            $sql="select * from signin where username='$id'";
            $result = mysql_query($sql);
            $row = mysql_fetch_row($result);
            return $row;
        }
        function login_data($uname){
            $sql="select * from signin where username='$uname'";
            $result = mysql_query($sql);
            $row = mysql_fetch_row($result);
            
            return $row;
        }
        function login_out(){
            unset($_SESSION["username"]);
            
        }
    }
    
    
    
    
?>