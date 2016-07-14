<?php 
    session_start();
    include_once("../models/mysql_connect.inc.php");
    
    
    class factory{
        function select_fa(){
            $sql2="select * from factory;";
            $result2 = mysql_query($sql2);
            return $result2;
        }
        function insert_fa($ans,$name,$people,$phone,$address,$url,$email,$cellphone,$tax,$data,$date){
            $sql3 = "INSERT INTO `factory` (`fac_id`,`fac_name`,`fac_people`,`fac_phone`,
            `fac_address`,`fac_url`,`fac_email`,`fac_cellphone`,
            `fac_tax`,`fac_data`,`fac_date`) VALUES ('".$ans."','".$name."','".$people."',
            '".$phone."','".$address."','".$url."','".$email."',
            '".$cellphone."','".$tax."','".$data."','".$date."')";
            mysql_query($sql3);
        }
        function delete_fa($id){
            $sql=" DELETE FROM `factory` where `fac_id` = '".$id."';";
            mysql_query($sql);
        }
        function select_desc(){
            $sql2="select `fac_id` from `factory` ORDER BY `fac_id` DESC limit 0,1";
            $result2 = mysql_query($sql2);
            $row2= mysql_fetch_assoc($result2);
        }
        function select_like($date2){
            $sql="select `fac_id` from `factory` where `fac_id` like '%$date2%';";
            $result = mysql_query($sql);
            $row = mysql_fetch_array($result);
        }
    }
    
    
?>