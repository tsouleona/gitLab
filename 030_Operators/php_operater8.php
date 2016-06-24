<?php
    
    //require失敗就不會執行後面的動作
    echo "flag 1<br>";
    @require("MyLibrary.php");//加@不會出現錯誤訊息
    echo "flag 2<br>";

?>