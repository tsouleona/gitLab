<?php
$a = 20;
function myfunction($b) {
	print "a=$a<br>";
	$a = 30;
	print "a=$a<br>";
	global $a, $c; //宣告為全域變數
	print "a=$a<br>";
	return $c = ($b + $a); //40+20=60
}
print myfunction(40) + $c;//60+60
?>