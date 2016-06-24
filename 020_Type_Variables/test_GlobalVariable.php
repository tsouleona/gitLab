<?php
$a = 20;
function myfunction($b) {
	print "a=$a<br>";//空
	$a = 30;
	print "a=$a<br>";//30
	global $a, $c; //宣告為全域變數
	print "a=$a<br>";//20
	return $c = ($b + $a); //40+20=60
}
print myfunction(40) + $c;//60+60

echo "<br>----------------------------<br>";
//test 
$b = 10;
function test()
{
	echo "flag1<br>";
	if(isset($b))
	{
		echo"yes, it's exist.";
	}
	else
	{
		echo"no, it's not exist.";
	}
	echo "<br>flag2";
}
test();

?>