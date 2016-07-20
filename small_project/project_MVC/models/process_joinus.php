<?php
    session_start();
    include_once("models/mysql_connect.inc.php");
    
    class process_joinus{
        
        //搜尋全部資料
        function select_jo(){
            $sql2="select * from `joinus` ";
            $result2 = mysql_query($sql2);
            return $result2;
        }
        //搜尋第幾筆開始，共幾筆
        function select_limit($p){
            $sql2="select * from `joinus`  limit ".($p*10).",10";
            $result2 = mysql_query($sql2);
            return $result2;
        }
        //刪除資料
        function delete_jo($id){
            $sql=" DELETE FROM `joinus` where `join_id` = '".$id."';";
            mysql_query($sql);
        }
        //新增資料
        function insert_jo($ans,$name,$email,$phone,$date){
            $sql3 = "INSERT INTO `joinus` (`join_id`,`join_name`,`join_email`,`join_cellphone`,`join_date`)
            VALUES ('".$ans."','".$name."','".$email."','".$phone."','".$date."');";
            mysql_query($sql3);
        }
        //搜尋當天資料由大排到小
        function select_desc($date2){
            $sql2="select `join_id` from `joinus` where `join_id` like '%$date2%' ORDER BY `join_id` DESC limit 0,1";
            $result2 = mysql_query($sql2);
            return $result2;
        }
        
    }
    
    
?>