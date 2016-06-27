<?php
$sData = "908872526535442041985072568716";
$result = "01234567890";
$iLen = strlen($sData);//字串長度
for ($iPos = 0; $iPos < $iLen; $iPos++)
{
	$ch = substr($sData, $iPos, 1); 
	$result = $ch . str_replace($ch, "", $result);
	//str_replace 要找的字串,取代的值,被搜尋的字串
}
echo substr($result, 0, 5) . "-" . substr($result, 5, 5);
?>