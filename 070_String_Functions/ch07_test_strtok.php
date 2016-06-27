<?php
$showStr = "Genius is|one/percent inspiration and ninety-nine percent perspiration.";
$s = strtok($showStr, " ");//逐一分割字串
while ($s != "")// 不為空繼續印
{
   echo $s. "*" . "<br>";
   $s = strtok(" .|/");
   
   
   // 如果這麼寫，程式會沒完沒了...
   // $s = strtok($showStr, " ");
}
?>