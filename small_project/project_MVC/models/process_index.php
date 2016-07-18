<?php 
    session_start();
    include_once("../models/mysql_connect.inc.php");
    
    
    class index{
        //搜尋公司簡介的資料
        function selest_ab(){
            $sql2="select * from introduction";
            $result2 = mysql_query($sql2);
            $row2 = mysql_fetch_row($result2);
            return $row2;
        }
        //更新公司簡介的資料
        function about($data){
            
            $sql2 = "UPDATE `introduction` SET `intro_data`= '".$data."';";
            mysql_query($sql2);
        }
        //搜尋聯絡我們的資料
        function selest_con(){
            $sql3="select * from contact";
            $result3 = mysql_query($sql3);
            $row3 = mysql_fetch_row($result3);
            return $row3;
        }
        //更新聯絡我們的資料
        function contact($address,$phone,$tax,$email){
        
            $sql  = "UPDATE `contact` SET `con_address`= '".$address."',
            `con_phone`= '".$phone."',
            `con_tax`= '".$tax."',
            `con_email`= '".$email."';";
            mysql_query($sql);
            
        }
    }
        
    
    
    
?>