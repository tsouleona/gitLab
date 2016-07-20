<?php
    session_start();
    include_once("models/mysql_connect.inc.php");
    
    
    class process_display{
        
        //搜尋實績展示的資料表
        function select_data(){
            $sql2="select * from display;";
            $result2 = mysql_query($sql2);
            return $result2;
        }
        
        //搜尋第幾筆開始，有九筆的資料
        function select_limit($p){
            $sql2="select * from `display`  limit ". ($p*9).",9";
            $result4 = mysql_query($sql2);
            return $result4;
        }
        //更新專案內容
        function update_dis($data,$id){
            $sql = "UPDATE `display` SET `display_data`='".$data."' 
            where `display_id`='".$id."';";
            mysql_query($sql);
        }
        //新增專案內容及圖片編號
        function insert_dis($ans,$data,$date){
            $sql2 = "insert into `display` (`display_id`,`display_data`,`display_date`) 
            VALUES ('".$ans."','".$data."','".$date."');";
            mysql_query($sql2);
        }
        //搜尋由大排到小的圖片編號
        function select_desc($date2){
            $sql2="select `display_id` from `display` where `display_id` like '%$date2%' ORDER BY `display_id` DESC limit 0,1";
            $result2 = mysql_query($sql2);
            $row2= mysql_fetch_assoc($result2);
            return $row2;
        }
       
        //刪除該筆資料
        function delete_dis($id){
            $sql="delete from `display` where `display_id` = '".$id."'";
            mysql_query($sql);
        }
        
    }
    
    
?>