<?php 
    
    class contact extends connect{
        
        
        //更新聯絡我們的資料
        function contact($address,$phone,$tax,$email){
        
            $com  = "UPDATE `contact` SET `con_address`= '".$address."',
            `con_phone`= '".$phone."',
            `con_tax`= '".$tax."',
            `con_email`= '".$email."';";
            $this->connect_mysql($com);
            
            
        }
        
        //搜尋聯絡我們的資料
        function selest_con(){
            $com="SELECT * FROM contact";
            $row = $this->connect_getdata($com);
            return $row;
        }
        
    }
        
    
    
    
?>