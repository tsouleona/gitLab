<?php
    header("Content-Type:text/html; charset=utf-8");
    
    echo "------切字串--------------</br></br>";
    $s = "12345678";
    $result= substr($s,2,3);//要處理的字串 第幾個開始 擷取多長
    echo $result;
    
    echo "</br></br>------找字串--------------</br></br>";
    $s = "ABC1234ABC";
    
    $iPos = strpos($s,"ABC");
    
    if($iPos !== false) //找到，多一個 "="可以判斷資料型態
    {
        echo "found";
    }
    else{ //沒有找到
        echo "not found";
    }
    
    echo "</br></br>------叫函式--------------</br></br>";
    
    function test($i)
    {
        return $i+1;
    }
    function test100($i)
    {
        return $i+100;
    }
    $x = 2;
    $p = "test";
    $p2 = "test100";
    echo $p2($x);
    echo "</br>";
    echo $p($x);
    
?>