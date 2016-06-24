<?php

$obj = new CTest();
$obj->Foo(1, 2, 3, 4);


class CTest {
	
	function __call($MethodName, $Parameters) {
		echo "Name: ", $MethodName, "<br>"; //Foo
		echo "<pre>" . var_dump($Parameters) ."</pre>"; //看陣列
		echo "<hr>"; //分隔線
	}
	
}


?>
