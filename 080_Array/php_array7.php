<?php
header("content-type: text/html; charset=utf-8");

$season = array(
    'spring' => '春', 
    'summer' => '夏', 
    'autumn' => '秋', 
    'winter' => '冬'); 
    
print_r($season); //輸出陣列
echo "<hr>";
var_dump($season); //印出變數的相關訊息於螢幕上 (程式在第幾行...等等)
?>