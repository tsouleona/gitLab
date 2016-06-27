<?php
header("Content-Type: image/png");//跟瀏覽器說明讀取的型態為圖檔
//MIME 編碼方式
$filename = "cc.png";
$fileHandle = fopen($filename, "rb");
echo fread($fileHandle, filesize($filename));
//fread不會干涉檔案內容並原封不動交出去
fclose($filename);

?>