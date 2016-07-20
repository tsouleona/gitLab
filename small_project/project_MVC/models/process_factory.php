<?php 
    session_start();
    include_once("models/mysql_connect.inc.php");
    
    
    class process_factory{
        //搜尋全部資料
        function select_fa(){
            $sql2="select * from factory;";
            $result2 = mysql_query($sql2);
            return $result2;
        }
        //搜尋第幾筆開始，共10筆
        function select_limit($p){
            $sql2="select *
            from `factory` limit ". ($p*10).",10";
            $result4 = mysql_query($sql2);
            return $result4;
        }
        //新增資料
        function insert_fa($ans,$name,$people,$phone,$address,$url,$email,$cellphone,$tax,$data,$date){
            $sql3 = "INSERT INTO `factory` (`fac_id`,`fac_name`,`fac_people`,`fac_phone`,
            `fac_address`,`fac_url`,`fac_email`,`fac_cellphone`,
            `fac_tax`,`fac_data`,`fac_date`) VALUES ('".$ans."','".$name."','".$people."',
            '".$phone."','".$address."','".$url."','".$email."',
            '".$cellphone."','".$tax."','".$data."','".$date."')";
            mysql_query($sql3);
        }
        //搜尋當天資料由大排到小
        function select_desc($date2){
            $sql2="select `fac_id` from `factory` where `fac_id` like '%$date2%' ORDER BY `fac_id` DESC limit 0,1";
            $result2 = mysql_query($sql2);
            return $result2;
        }
        //刪除該筆資料
        function delete_fa($id){
            $sql=" DELETE FROM `factory` where `fac_id` = '".$id."';";
            mysql_query($sql);
        }
    }
    
    
?>