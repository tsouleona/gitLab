<?php 
    session_start();
    include_once("../models/process_factory.php");
    
    //抓頁數
    $p = $_GET['p'];    
    $fa = new factory();
    //搜尋全部資料共幾筆
    $result = $fa->select_fa();
    $total = mysql_num_rows($result);
    //計算頁數
    $pagecount =  ceil($total/10);

    
    if($p=="")
    {
        $p = 0;
    }
    //搜尋第幾筆資料開始，共10筆
    $result2 = $fa->select_limit($p);
    
?>