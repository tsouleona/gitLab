<?php

    class signin extends connect
    {
        //搜尋該帳號的密碼
        function login_data($uname,$pwd){
            $array=array();
            $com ="SELECT * FROM `signin`";
            $row = $this->connect_getdata($com,$array);
            if($uname == $row[0]['username'] && $pwd == $row[0]['password'])
            {
                return 'ok';
                
            }
        }
        
    }
    
    
    
    
?>