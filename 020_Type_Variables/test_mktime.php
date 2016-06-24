<?php
  $d = mktime(13, 30, 0, 9, 10, 2012); //時,分,秒,月,日,年
  echo $d;
  echo "<br>";//換行
  echo date("Y-m-d H:i:s", $d);//格式化 H採24小時制 ，大小寫要注意
?>
