<?php

class connect_one{
        protected $result;
        function connect_mysql($com){
               //資料庫設定
                //資料庫位置
                $db_server = "localhost";
                //資料庫名稱
                $db_name = "project";
                //資料庫管理者帳號
                $db_user = "tsouleona";
                //資料庫管理者密碼
                $db_passwd = "830606";
                //對資料庫連線
                $dbconnect = "mysql:host=".$db_sever.";dbname=".$db_name;
                $dbgo = new PDO($dbconnect, $db_user, $db_passwd);
                $dbgo-> query("SET NAMES utf8");
                $this->result = $dbgo->query($com);
                //法二
                // $this->Link = mysql_connect($db_server, $db_user, $db_passwd) or die("無法對資料庫連線");
                // //資料庫連線採UTF8
                // $this->result = mysql_query("SET NAMES utf8",$this->Link);
                // mysql_selectdb($db_name, $this->Link);
                //$this->result = mysql_query($com);
                $dbgo = NULL;         
                
                
        }
        
}
        
?> 