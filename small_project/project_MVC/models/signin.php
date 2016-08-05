<?php

    class signin extends connect
    {
        //搜尋該帳號的密碼
        function login_data($uname,$pwd){
            $com ="SELECT * FROM `signin`";
            $row = $this->connect_getdata($com);
            if($uname == $row[0]['username'] && $pwd == $row[0]['password'])
            {
                return 'ok';
                
            }
        }
        //清掉session
        function login_out(){
            unset($_SESSION["username"]);
            session_destroy();
        }
    }
    
    
    
    
?>