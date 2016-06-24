<?php
  $x = 1;
  $y = $x++;//先丟X值到Y，X才+1
  //$y = $x;
  //$x++;
  echo "x = $x, y = $y";
  
  echo "<br>";

  $x = 1;
  $y = ++$x;//先把X+1，再把X值丟到Y
  //++$x;
  //$y = $x;
  echo "x = $x, y = $y";
?>
