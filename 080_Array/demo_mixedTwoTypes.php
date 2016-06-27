<?php
header("Content-Type:text/html; charset=utf-8");
$a = array('xxx', 
            'book' => '書籍', 
            'yyy', 
            'desk' => '書桌', 
            'pen' => '筆');
//0 => xxx
//book => 書籍
//1 => yyy
//desk => 書桌
//pen => 筆
foreach ($a as $k => $s)
{
	 echo "$k = $s<br>";
}

?>