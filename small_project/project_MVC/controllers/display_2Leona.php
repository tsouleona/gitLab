<?php
    session_start();
    
    class display_2Leona extends Controller{
//---------------------------------回裁切畫面----------------------------------------------------------------------
        function display_2(){
            $this->view("display_2");
        }
//----------------------------------裁切圖片----------------------------------------------------------------------
        function crop_photo(){
     		$p = $_POST['page'];//頁數
     		
    	    $id = $_POST['id'];//圖片id
    	    
    		$targ_w = $_POST['w'];//圖片寬
    		
    		$targ_h = $_POST['h'];//圖片高
    		
    		$src = 'views/ok_photo/'.$id.'.jpg';//抓圖片
    		
    		$img_r = imagecreatefromjpeg($src);
    		
    		$dst_r = ImageCreateTrueColor($targ_w,$targ_h);
    		//縮成自己要的大小
    		imagecopyresampled($dst_r,$img_r,0,0,$_POST['x1'],$_POST['y1'],$targ_w,$targ_h,$_POST['w'],$_POST['h']);
    		//把圖片丟到要的位置
    		imagejpeg($dst_r,'views/ok_photo/'.$id.'.jpg');
    		//導頁並傳頁數
    		$a = "<meta http-equiv=REFRESH CONTENT=0;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/display/display?p={$p}>";
     	    $b = "";
            $this->debug($a,$b);
        }
//--------------------------------顯示錯誤訊息或導頁----------------------------------------------------------------
        public function debug($a,$b){
            
            $this->view("point",Array($a,$b));
        }
    }
?>