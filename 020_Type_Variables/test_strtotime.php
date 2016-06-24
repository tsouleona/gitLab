<?php
  $d = strtotime("2012-09-10");//年,月,日
  //$d = strtotime("2012-09-10 -3 days"); //前三天
  //$d = strtotime("2012-09-10 +1 month");//後1個月
  echo $d; //integer型態
  echo "<br>";
  echo date("Y-m-d", $d);
?>
