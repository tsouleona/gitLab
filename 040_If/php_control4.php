<?php
	header("content-type: text/html; charset=utf-8");
	$num = 3;
	//看括號內給的值是什麼，再選擇執行的動作
	//break 是跳出迴圈以外並往下執行
	switch ($num){
		case 0:
			echo "零";
			break;
		case 1:
			echo "壹";
			break;
		case 2:
			echo "貳";
			break;
		case 3:
			echo "參";
			break;
		case 4:
			echo "肆";
			break;
		case 5:
			echo "伍";
			break;
		case 6:
			echo "陸";
			break;
		case 7:
			echo "柒";
			break;
		case 8:
			echo "捌";
			break;
		case 9:
			echo "玖";
			break;
		default: // 以上皆不為括號的內容，則執行下面動作
			echo "unknown";
	}  // end of switch
?>