<?php

/**
 * Jcrop image cropping plugin for jQuery
 * Example cropping script
 * @copyright 2008-2009 Kelly Hallman
 * More info: http://deepliquid.com/content/Jcrop_Implementation_Theory.html
 */

    $id = $_POST['id'];
	$targ_w = $_POST['w'];
	
	$targ_h = $_POST['h'];

	$src = '../views/ok_photo/'.$id.'.jpg';
	
	$img_r = imagecreatefromjpeg($src);
	
	$dst_r = ImageCreateTrueColor($targ_w,$targ_h);
	
	imagecopyresampled($dst_r,$img_r,0,0,$_POST['x1'],$_POST['y1'],$targ_w,$targ_h,$_POST['w'],$_POST['h']);
	
	imagejpeg($dst_r,'../views/ok_photo/'.$id.'.jpg');
    header("location:../views/display.php");



// If not a POST request, display page below:

?>