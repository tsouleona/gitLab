<?php

$fileDir = dirname ( __FILE__ );//目錄名
$fileResource = opendir ( $fileDir );//開目錄

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>

	<p>File list:</p>
	<ul>
	<?php while ($item = readdir($fileResource)) : //讀取檔名放置 item?> 
		<li><?php echo $item; ?></li>
	<?php endwhile; ?>
	</ul>

<?php closedir($fileResource); ?>
</body>
</html>
