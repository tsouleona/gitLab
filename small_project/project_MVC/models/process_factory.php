<?php 
    include_once("models/mysql_connect.inc.php");
    
    
    class process_factory extends connect_one{
        
        //新增資料
        function insert_fa($ans,$name,$people,$phone,$address,$url,$email,$cellphone,$tax,$data,$date){
            $com = "INSERT INTO `factory` (`fac_id`,`fac_name`,`fac_people`,`fac_phone`,
            `fac_address`,`fac_url`,`fac_email`,`fac_cellphone`,
            `fac_tax`,`fac_data`,`fac_date`) VALUES ('".$ans."','".$name."','".$people."',
            '".$phone."','".$address."','".$url."','".$email."',
            '".$cellphone."','".$tax."','".$data."','".$date."')";
            $row = $this->connect_mysql($com);
        }
        
        //刪除該筆資料
        function delete_fa($id){
            $com=" DELETE FROM `factory` where `fac_id` = '".$id."';";
            $row = $this->connect_mysql($com);
        }
    }
    
    
?>