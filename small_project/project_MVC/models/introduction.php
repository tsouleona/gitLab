<?php 
    
    class introduction extends connect{
        
        //更新公司簡介的資料
        function about($data){
            
            $com = "UPDATE `introduction` SET `intro_data`= '".$data."';";
            $this->connect_mysql($com);
            
        }
       
        
        //搜尋公司簡介的資料
        function selest_ab(){
            $com="SELECT * FROM introduction";
            $row = $this->connect_getdata($com);
            return $row;
        }
        
        
        
    }
        
    
    
    
?>