<?php 
    require_once("mysql_connect.inc.php");
    class process_factory extends connect_one{
        
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
            $com=" DELETE FROM `factory` where `fac_id` = '".$id."';";
            $this->connect_mysql($com);
        }
    }
    
    
?>