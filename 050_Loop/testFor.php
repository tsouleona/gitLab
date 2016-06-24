<?php

for ($i = 1; $i <= 3; $i++) {//i從1開始並+1到3
	for ($j = 1; $j <= 4; $j++) {//j從1開始並+1到4
		echo "$i , $j <br>";
		if (($i + $j) % 4 == 0)//當i+j可以被4整除時 跳出J的迴圈
		{
			break ;//立即中斷最接近break的迴圈執行，並脫離該迴圈
			//continue;//continue 當次程式不執行，回到迴圈的開頭
		}
		     
	}
	echo "-----<br>"; //break出來 印出
	//回到i的迴圈
}


?>