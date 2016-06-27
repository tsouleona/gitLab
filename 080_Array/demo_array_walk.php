<?php
$result = '';
function glue ($val)
{
	global $result;
	$result .= $val; // abcd
}
$array = array ('a', 'b', 'c', 'd');
array_walk ($array, 'glue');//對數組中的每個元素應用自定義函式
echo $result;
?>