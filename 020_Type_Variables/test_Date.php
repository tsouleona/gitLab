<?php
  $x = getdate();
  echo gettype($x), "<br>";//看型態 array
  echo var_dump($x);//看陣列
  
  $x = date('Y-m-d H:i:s');
  echo $x, "<br>"; //印出現在日期與時間
  echo gettype($x), "<br>";//看型態 string
  
  $x = gmdate('Y-m-d H:i:s');
  echo $x, "<br>"; //印出現在日期與時間
  
  $x = strtotime(gmdate('Y-m-d H:i:s'));
  echo $x, "<br>";//時間戳記: 從 1970-01-01 00:00:00 算到特定時刻所經過的秒數。
  echo gettype($x), "<br>";//看型態 integer
  
?>