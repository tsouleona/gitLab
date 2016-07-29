<?php
    include_once("mysql_getdata.php");
    
    class process_display_select extends connect_two
    {
        
        //搜尋實績展示的資料表
        function select_data(){
            $com="SELECT * FREM display;";
            $row2= $this->connect_getdata($com);
            return $row2;
        }
        
        //搜尋第幾筆開始，有九筆的資料
        function select_limit($p){
            $com="SELECT * FROM `display`  LIMIT ". ($p*9).",9";
            $row2 = $this->connect_getdata($com);
            return $row2;
        }
        
        
        //搜尋由大排到小的圖片編號
        function select_desc($date2){
            $com="SELECT `display_id` FROM `display` WHERE `display_id` like '%$date2%' ORDER BY `display_id` DESC LIMIT 0,1";
            $row2 = $this->connect_getdata($com);
            return $row2;
        }
       
        
        
    }
    
    
?>