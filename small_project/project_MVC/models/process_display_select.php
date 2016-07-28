<?php
    include_once("mysql_getdata.php");
    
    class process_display_select extends connect_two
    {
        
        //搜尋實績展示的資料表
        function select_data(){
            $com="select * from display;";
            $row2= $this->connect_getdata($com);
            return $row2;
        }
        
        //搜尋第幾筆開始，有九筆的資料
        function select_limit($p){
            $com="select * from `display`  limit ". ($p*9).",9";
            $row2 = $this->connect_getdata($com);
            return $row2;
        }
        
        
        //搜尋由大排到小的圖片編號
        function select_desc($date2){
            $com="select `display_id` from `display` where `display_id` like '%$date2%' ORDER BY `display_id` DESC limit 0,1";
            $row2 = $this->connect_getdata($com);
            return $row2;
        }
       
        
        
    }
    
    
?>