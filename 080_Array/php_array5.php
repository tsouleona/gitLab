<?php
header("content-type: text/html; charset=utf-8");

$season = array('春', '夏', '秋', '冬'); 

echo "每年的四季分別為：";
/*for($i=0;$i<4;$i++)
{
    $value = $season[$i];
    echo $value;
}*/

foreach ($season as $value)//foreach...as 把陣列的每一項取出 代入到 value
{  
	echo $value;
}

?>