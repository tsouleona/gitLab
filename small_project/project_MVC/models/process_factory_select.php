<?php 
    include_once("models/mysql_getdata.php");
    
    
    class process_factory_select extends connect_two{
        //搜尋全部資料
        function select_fa(){
            $com="select * from factory;";
            $row = $this->connect_getdata($com);
            return $row;
        }
        //搜尋第幾筆開始，共10筆
        function select_limit($p){
            $com="select * from `factory` limit ". ($p*10).",10";
            $row = $this->connect_getdata($com);
            return $row;
        }
        //搜尋當天資料由大排到小
        function select_desc($date2){
            $com="select `fac_id` from `factory` where `fac_id` like '%$date2%' ORDER BY `fac_id` DESC limit 0,1";
            $row = $this->connect_getdata($com);
            return $row;
        }
        
    }
    
    
?>