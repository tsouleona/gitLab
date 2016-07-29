<?php 
    class process_factory extends connect_two{
        
        //新增資料
        function insert_fa($ans,$factory,$date){
            $com = "INSERT INTO `factory` (`fac_id`,`fac_name`,`fac_people`,`fac_phone`,
            `fac_address`,`fac_url`,`fac_email`,`fac_cellphone`,
            `fac_tax`,`fac_data`,`fac_date`) VALUES ('".$ans."','".$factory['name']."','".$factory['people']."',
            '".$factory['phone']."','".$factory['address']."','".$factory['url']."','".$factory['email']."',
            '".$factory['cellphone']."','".$factory['tax']."','".$factory['data']."','".$date."')";
            $this->connect_mysql($com);
        }
        
        //刪除該筆資料
        function delete_fa($id){
            $com=" DELETE FROM `factory` WHERE `fac_id` = '".$id."';";
            $this->connect_mysql($com);
        }
        function select_fa(){
            $com="SELECT * FROM factory;";
            $row = $this->connect_getdata($com);
            return $row;
        }
        //搜尋第幾筆開始，共10筆
        function select_limit($p){
            $com="SELECT * FROM `factory` LIMIT ". ($p*10).",10";
            $row = $this->connect_getdata($com);
            return $row;
        }
        //搜尋當天資料由大排到小
        function select_desc($date2){
            $com="SELECT `fac_id` FROM `factory` WHERE `fac_id` like '%$date2%' ORDER BY `fac_id` DESC LIMIT 0,1";
            $row = $this->connect_getdata($com);
            return $row;
        }
    }
    
    
?>