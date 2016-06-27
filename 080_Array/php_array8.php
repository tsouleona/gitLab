<?php
	$testArray = array("A1", "A2", "A18");
	sort($testArray); //標準排序法，升序
	var_dump($testArray);
	
	echo "<br />";
	
	natsort($testArray); //自然排序法
	var_dump($testArray);
?>
