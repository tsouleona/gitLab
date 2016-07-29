<?php
    
    class process_display extends connect_two{
        
        function insert_dis($ans,$data,$date){
            $com = "INSERT INTO `display` (`display_id`,`display_data`,`display_date`) 
            VALUES ('".$ans."','".$data."','".$date."');";
            $this->connect_mysql($com);
            
        }
        //更新專案內容
        function update_dis($data,$id){
            $com = "UPDATE `display` SET `display_data`='".$data."' 
            where `display_id`='".$id."';";
            $this->connect_mysql($com);
        }
        //刪除該筆資料
        function delete_dis($id){
            $com="DELETE FROM `display` WHERE `display_id` = '".$id."'";
            $this->connect_mysql($com);
        }
        //搜尋實績展示的資料表
        function select_data(){
            $com="SELECT * FROM display;";
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