<?php
	header("content-type: text/html; charset=utf-8");
	$contents = file_get_contents('data.txt');//讀取整個文件
	echo (str_replace("\r\n", "<br />", $contents)); //把\r\n取代成 <br/>
?>