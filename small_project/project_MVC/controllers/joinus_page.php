<?php
    session_start();
    include_once("../models/process_joinus.php");
    
    //抓頁數
    $p = $_GET['p'];
    //搜尋全部資料共幾筆
    $jo = new joinus();
    $result = $jo->select_jo();
    $total = mysql_num_rows($result);
    //計算頁數
    $pagecount = ceil($total/10);

    if($p=="")
    {
        $p = 0;
    }
    //搜尋第幾筆資料開始，共10筆
    $result2 = $jo->select_limit($p);
    
    
?>