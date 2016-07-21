<?php
    include_once("mysql_getdata.php");
    
    class process_joinus_select extends connect_two{
        
        //搜尋全部資料
        function select_jo(){
            $com="select * from `joinus` ";
            $row = $this->connect_getdata($com);
            return $row;
        }
        //搜尋第幾筆開始，共幾筆
        function select_limit($p){
            $com="select * from `joinus`  limit ".($p*10).",10";
            $row = $this->connect_getdata($com);
            return $row;
        }
        
        //搜尋當天資料由大排到小
        function select_desc($date2){
            $com="select `join_id` from `joinus` where `join_id` like '%$date2%' ORDER BY `join_id` DESC limit 0,1";
            $row = $this->connect_getdata($com);
            return $row;
        }
        
    }
    
    
?>