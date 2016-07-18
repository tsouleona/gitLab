<?php
    session_start();
    include_once("../models/process_joinus.php");
    
    //搜尋第幾筆開始，共幾筆
    function joinus_select($p){
        
        $jo = new joinus();
        return $jo->select_limit($p);
    }
?>