<?php
    require_once("mysql_getdata.php");
    class check_login extends connect_two
    {
        //搜尋該帳號的密碼
        function login_data($uname,$pwd){
            $com ="SELECT * FROM `signin`";
            $row = $this->connect_getdata($com);
            if($uname == $row[0]['username'] && $pwd == $row[0]['password'])
            {
                $_SESSION["username"] = $uname;
                return 'go';
            }
            else
            {
                return 'error';
            }
        }
        //清掉session
        function login_out(){
            unset($_SESSION["username"]);
            session_destroy();
            return 'go';
        }
    }
    
    
    
    
?>