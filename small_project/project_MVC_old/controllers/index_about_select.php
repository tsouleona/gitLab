<?php
    session_start();
    include_once("../models/process_index.php");
    
    //搜尋資料
    function select_about(){
        $celect_ab = new index();
        return $celect_ab->selest_ab();
    }
    
?>
