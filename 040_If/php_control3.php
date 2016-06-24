<?php
	$score = 95;
	if ($score >=60 && $score < 70) { //大於等於60並且小於70
		echo 'D';
	} elseif ($score>=70 && $score<80) {//大於等於70並且小於80
		echo 'C';
	} elseif ($score>=80 && $score<90) {//大於等於80並且小於90
		echo 'B';		
	} elseif ($score>=90 && $score<=100) {//大於等於90並且小於等於100
		echo 'A';		
	} else { //如果上面條件都不成立則執行下面動作
		echo 'Fail';
	}
?>