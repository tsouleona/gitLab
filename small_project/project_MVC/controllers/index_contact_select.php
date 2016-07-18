<?php 
    session_start();
    include_once("../models/process_index.php");
    
    //搜尋資料
    function contact_select(){
        $con = new index();
        return $con->selest_con();
    }
    
?>