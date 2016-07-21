<?php 
    include_once("mysql_connect.inc.php");
    
    
    class process_index extends connect_one{
        
        //更新公司簡介的資料
        function about($data){
            
            $com = "UPDATE `introduction` SET `intro_data`= '".$data."';";
            $row = $this->connect_mysql($com);
        }
       
        //更新聯絡我們的資料
        function contact($address,$phone,$tax,$email){
        
            $com  = "UPDATE `contact` SET `con_address`= '".$address."',
            `con_phone`= '".$phone."',
            `con_tax`= '".$tax."',
            `con_email`= '".$email."';";
            $row = $this->connect_mysql($com);
            
        }
    }
        
    
    
    
?>