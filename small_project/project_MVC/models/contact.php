<?php 
    
    class contact extends connect{
        
        
        //更新聯絡我們的資料
        function contact_update($address,$phone,$tax,$email){
            $array = array($address,$phone,$tax,$email);
            $com  = "UPDATE `contact` SET `con_address`= ?,`con_phone`= ?,`con_tax`= ?,`con_email`= ?;";
            $this->connect_mysql($com,$array);
            
            
        }
        
        //搜尋聯絡我們的資料
        function selest_con(){
            $array = array();
            $com="SELECT * FROM `contact`";
            $row = $this->connect_getdata($com,$array);
            return $row;
        }
        
    }
        
    
    
    
?>