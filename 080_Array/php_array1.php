<?php
//括號內可指定可不指定，沒有數字會自動編
$bloodType[0] = 'A';
$bloodType[3] = 'B';
$bloodType[] = 'AB';
$bloodType[6] = 'O';

for ($i = 0; $i <= 6; $i++) {
	echo $bloodType[$i] . "<br />";
}
?>