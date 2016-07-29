<?php 
    include_once("mysql_getdata.php");
    
    
    class process_index_select extends connect_two{
        //搜尋公司簡介的資料
        function selest_ab(){
            $com="SELECT * FROM introduction";
            $row = $this->connect_getdata($com);
            return $row;
        }
        
        //搜尋聯絡我們的資料
        function selest_con(){
            $com="SELECT * FROM contact";
            $row = $this->connect_getdata($com);
            return $row;
        }
        
    }
        
    
    
    
?>