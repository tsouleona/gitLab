<?php
$f = fopen("pick3.txt", "r");//讀取pick3.txt檔案
while (!feof($f))//函數檢測是否已到達文件末尾(eof)
{
	$line = fgets($f);//抓字串
	echo "$line<br>";
}
fclose($f);
echo "--End--";
?>