<?php
    session_start();
    include_once("../models/mysql_connect.inc.php");
    
    
    class display{
        function select_data(){
            $sql2="select * from display ;";
            $result2 = mysql_query($sql2);
            return $result2;
            
        }
        function update_dis($data,$id){
            $sql = "UPDATE `display` SET `display_data`='".$data."' where `display_id`='".$id."';";
            mysql_query($sql);
        }
        function insert_dis($ans,$data,$date){
            $sql2 = "insert into `display` (`display_id`,`display_data`,`display_date`) VALUES ('".$ans."','".$data."','".$date."');";
            mysql_query($sql2);
        }
        function select_desc(){
            $sql2="select `display_id` from `display` ORDER BY `display_id` DESC limit 0,1";
            $result2 = mysql_query($sql2);
            $row2= mysql_fetch_assoc($result2);
            return $row2;
        }
        function select_like($date2){
            $sql="select `display_id` from `display` where `display_id` like '%$date2%';";
            $result = mysql_query($sql);
            $row = mysql_fetch_array($result);
            return $row;
        }
        function delete_dis($id){
            $sql="delete from `display` where `display_id` = '".$id."'";
            $result = mysql_query($sql);
            $row = mysql_fetch_array($result);
        }
        
    }
    
    
?>