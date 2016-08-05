<?php 
    
    class introduction extends connect{
        
        //更新公司簡介的資料
        function about($data){
            $array = array($data);
            $com = "UPDATE `introduction` SET `intro_data`= ?;";
            $this->connect_mysql($com,$array);
            
        }
       
        
        //搜尋公司簡介的資料
        function selest_ab(){
            $array = array();
            $com="SELECT * FROM `introduction`;";
            $row = $this->connect_getdata($com,$array);
            return $row;
        }
        
        
        
    }
        
    
    
    
?>