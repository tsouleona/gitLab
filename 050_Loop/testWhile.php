<?php
$iSum = 0;
$i = 1;
while ($i <= 10)
{
	$iSum += $i;//1 3 6 10 15 21 28 36 45 55
	$i += 1;    //2 3 4 5  6  7  8  9  10
}
echo $iSum;

echo "<hr>";//分隔線

$iSum = 0;
$i = 0;
while ($i < 10)
{
	$i++;          //1 2 3 4  5  6  7  8  9  10 
	$iSum += $i;   //1 3 6 10 15 21	28 36 45 55
}
echo $iSum
?>