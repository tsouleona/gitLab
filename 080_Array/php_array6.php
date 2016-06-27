<?php
header("content-type: text/html; charset=utf-8");

$season = array(
    'spring' => '春', 
    'summer' => '夏', 
    'autumn' => '秋', 
    'winter' => '冬'); 

echo "每年的四季分別為：<br>";
foreach ($season as $key => $value){   //把陣列的每一項逐一代入key 和 value 
	echo $key, "=>", $value, "<br>";   
}
/*
foreach ($season as $key ){   //還是輸出value，主要是代出 值  不是key
	echo $key, "=>", $value, "<br>";   
}*/

?>