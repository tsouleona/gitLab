<?php
    include_once("mysql_connect.inc.php");
    
    class process_joinus extends connect_one{
        
        
        //刪除資料
        function delete_jo($id){
            $com=" DELETE FROM `joinus` where `join_id` = '".$id."';";
            $this->connect_mysql($com);
        }
        //新增資料
        function insert_jo($ans,$name,$email,$phone,$date){
            $com = "INSERT INTO `joinus` (`join_id`,`join_name`,`join_email`,`join_cellphone`,`join_date`)
            VALUES ('".$ans."','".$name."','".$email."','".$phone."','".$date."');";
            $this->connect_mysql($com);
        }
        
        
    }
    
    
?>