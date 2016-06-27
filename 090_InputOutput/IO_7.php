<?php
header("content-type: text/html; charset=utf-8");
 
$sData = "";
$f = fopen("data.txt", "r");//r 讀檔 

while (!feof($f))
{
	$line = fgets($f);//讀一行
	$sData .= Trim($line) . "<br>";//移除字串兩側的字符
	
}

/*
while ($line = fgets($f))
{
	$sData .= Trim($line) . "<br>";
}
*/

fclose($f);
echo $sData;



?>
