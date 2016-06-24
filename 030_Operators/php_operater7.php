<?php
  $x = 3;
  if ($x >= 10 && foo()) //&&要兩邊都成立的意思 &&就是and，所以前面不成立後面就不會做
    echo "yes";          //便宜的寫前面，貴的寫後面
  else
    echo "no";
    
  echo "<hr>";

  $x = 3;
  if ($x >= 10 & foo()) //前面有沒有成立都會執行後面的動作
    echo "yes";
  else
    echo "no";
    
function foo()
{
   echo "foo() is running.<br>";
}

?>