<?php
    include_once("models/mysql_connect.inc.php");
    
    //新增專案內容及圖片編號
    class process_display extends connect_one{
        
        function insert_dis($ans,$data,$date){
            $com = "insert into `display` (`display_id`,`display_data`,`display_date`) 
            VALUES ('".$ans."','".$data."','".$date."');";
            $row2 = $this->connect_mysql($com);
            
        }
        //更新專案內容
        function update_dis($data,$id){
            $com = "UPDATE `display` SET `display_data`='".$data."' 
            where `display_id`='".$id."';";
            $row = $this->connect_mysql($com);
        }
        //刪除該筆資料
        function delete_dis($id){
            $com="delete from `display` where `display_id` = '".$id."'";
            $row2 = $this->connect_mysql($com);
        }
    }
        
?>