<?php
    session_start();
    include_once("../models/process_display.php");
    
        //抓頁數
        $p = $_GET['p'];
        $table = new display();
        //搜尋全部有幾筆資料
        $result = $table->select_data();
        $total = mysql_num_rows($result);
        //計算頁數
        $pagecount = ceil($total/9);
    
        if($p=="")
        {
            $p = 0;
        }
        //抓第幾筆到第幾筆
        $result2 = $table->select_limit($p);
        
        

    
?>