<?php
    require_once("mysql_getdata.php");
    class check_login extends connect_two
    {
        //搜尋該帳號的密碼
        function login_data(){
            $com ="SELECT * FROM `signin`";
            $row = $this->connect_getdata($com);
            return $row;
        }
        //清掉session
        function login_out(){
            unset($_SESSION["username"]);
            session_destroy();
        }
    }
    
    
    
    
?>