<?php 
    session_start();
    include_once("../models/mysql_connect.inc.php");
    
    
    class index{
        function selest_ab(){
            $sql2="select * from introduction";
            $result2 = mysql_query($sql2);
            $row2 = mysql_fetch_row($result2);
            return $row2;
        }
        function about($data){
            
            $sql2 = "UPDATE `introduction` SET `intro_data`= '".$data."';";
            mysql_query($sql2);
        }
        function selest_con(){
            $sql3="select * from contact";
            $result3 = mysql_query($sql3);
            $row3 = mysql_fetch_row($result3);
            return $row3;
        }
        function contact($address,$phone,$tax,$email){
        
            $sql  = "UPDATE `contact` SET `con_address`= '".$address."';";
            mysql_query($sql);
            $sql2 = "UPDATE `contact` SET `con_phone`= '".$phone."';";
            mysql_query($sql2);
            $sql3 = "UPDATE `contact` SET `con_tax`= '".$tax."';";
            mysql_query($sql3);
            $sql4 = "UPDATE `contact` SET `con_email`= '".$email."';";
            mysql_query($sql4);
        }
    }
        
    
    
    
?>