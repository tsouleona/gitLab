<?php
function ShowStar($iCount, $sWhat = "*")
{
	if($iCount > 0)
	{
		$result = "";
		for ($i = 1; $i <= $iCount; $i++)
		{
			$result .= $sWhat;
		}
		echo $result;
	}
	else {
		echo "<h2>Error!input num > 0 please.</h2>";
	}
}

$iHowMany = 9;
ShowStar($iHowMany);
?>