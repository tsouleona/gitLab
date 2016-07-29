<?php
    include_once("mysql_getdata.php");
    
    class process_joinus_select extends connect_two{
        
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