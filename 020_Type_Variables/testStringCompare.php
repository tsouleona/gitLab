<?php
//前兩個一樣，比最後一個
$x = "ABC";
$y = "AB";
if ($x >= $y)
	echo "$x >= $y";
else
	echo "$x < $y";

echo "<hr>";

//第一個比，B比較大
$x = "ABC";
$y = "BA";
if ($x >= $y)
	echo "$x >= $y";
else
	echo "$x < $y";

echo "<hr>";

//當字串可以當數字時，比大小即可
$x = "123";
$y = "12";
if ($x >= $y)
	echo "$x >= $y";
else
	echo "$x < $y";

echo "<hr>";

//當字串可以當數字時，比大小即可
$x = "123";
$y = "21";
if ($x >= $y)
	echo "$x >= $y";
else
	echo "$x < $y";

echo "<hr>";
		
		
?>