<?php

$x = 100;
$y = &$x; //找出X的位置，指標!!Y存的是X的位置

$y = 200;
echo "x = $x </br>";

unset($x); //不儲存在X的位置
echo "y = $y </br>";

?>