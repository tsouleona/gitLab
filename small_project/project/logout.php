<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//將session清空
unset($_SESSION['id']);
echo '<meta http-equiv=REFRESH CONTENT=0;url=index.php>';
?>