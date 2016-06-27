<?php
//以陣列內容排序
$a = array('a1', 'a3', 'a20', 'a15');

natsort($a);// 1 3 15 20

//var_dump(natsort($a));
//echo "<br>";

foreach ($a as $k => $x)
{
	echo "$k => $x <br>";
}

?>
