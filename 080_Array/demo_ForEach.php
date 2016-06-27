<?php
header("Content-Type:text/html; charset=utf-8");

$a = array('1', '2');//0 1   1 2
foreach ($a as $k => $x)
{
	$x = '3';
}

foreach ($a as $k => $x)
{
	echo "$k => $x <br>"; //印出位置 =>值
}

?>