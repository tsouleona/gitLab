<?php
    class process_joinus extends connect_two{
        
        
        //刪除資料
        function delete_jo($id){
            $com=" DELETE FROM `joinus` WHERE `join_id` = '".$id."';";
            $this->connect_mysql($com);
        }
        //新增資料
        function insert_jo($ans,$name,$email,$phone,$date){
            $com = "INSERT INTO `joinus` (`join_id`,`join_name`,`join_email`,`join_cellphone`,`join_date`)
            VALUES ('".$ans."','".$name."','".$email."','".$phone."','".$date."');";
            $this->connect_mysql($com);
        }
        //搜尋全部資料
        function select_jo(){
            $com="SELECT * FROM `joinus` ";
            $row = $this->connect_getdata($com);
            return $row;
        }
        //搜尋第幾筆開始，共幾筆
        function select_limit($p){
            $com="SELECT * FROM `joinus`  LIMIT ".($p*10).",10";
            $row = $this->connect_getdata($com);
            return $row;
        }
        
        //搜尋當天資料由大排到小
        function select_desc($date2){
            $com="SELECT `join_id` FROM `joinus` WHERE `join_id` like '%$date2%' ORDER BY `join_id` DESC LIMIT 0,1";
            $row = $this->connect_getdata($com);
            return $row;
        }
        
    }
    
    
?>