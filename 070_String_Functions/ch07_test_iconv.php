<?php
  // header("content-type: text/html; charset=utf-8");
  header("content-type: text/html; charset=big5");
  $s = "許功蓋";
  echo strlen($s), ", ";  // 9 (佔記憶體大小)
  echo strlen(iconv("UTF-8", "big5", $s));//iconv是把UTF-8編碼轉成big5編碼
  echo "<HR>";
  //echo $s;
  echo iconv("UTF-8", "big5", $s);
?>
