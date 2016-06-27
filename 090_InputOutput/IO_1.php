<?php

echo "Path and FileName:" . __FILE__ . "<br />"; //路徑 顯示到檔名
echo "Path: " . dirname ( __FILE__ ); //路徑 顯示到目錄
echo "<br>Filename: " . basename ( __FILE__ ) . "<br />"; //檔名
echo "Filesize: " . filesize ( __FILE__ ); //檔案大小
?> 
