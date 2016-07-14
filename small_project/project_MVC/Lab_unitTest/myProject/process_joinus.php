<?php
    session_start();
    include_once("../models/mysql_connect.inc.php");
    
    class joinus{
        function select_jo(){
            $sql2="select * from `joinus` ";
            $result2 = mysql_query($sql2);
            return $result2;
        }
        function delete_jo($id){
            $sql=" DELETE FROM `joinus` where `join_id` = '".$id."';";
            mysql_query($sql);
        }
        function insert_jo($ans,$name,$email,$phone,$date){
            $sql3 = "INSERT INTO `joinus` (`join_id`,`join_name`,`join_email`,`join_cellphone`,`join_date`)
            VALUES ('".$ans."','".$name."','".$email."','".$phone."','".$date."');";
            mysql_query($sql3);
        }
        function select_desc(){
            $sql2="select `join_id` from `joinus` ORDER BY `join_id` DESC limit 0,1";
            $result2 = mysql_query($sql2);
            $row2= mysql_fetch_assoc($result2);
        }
        function select_like($date2){
            $sql="select `join_id` from `joinus` where `join_id` like '%$date2%';";
            $result = mysql_query($sql);
            $row = mysql_fetch_array($result);
        }
    }
    
    
?>