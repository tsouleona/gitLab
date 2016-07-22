<?php
    session_start();
    
    class display_2Leona extends Controller{
        function display_2(){
            $this->view("display_2");
        }
        
        function crop_photo(){
     		$p = $_POST['page'];
     		
    	    $id = $_POST['id'];
    	    
    		$targ_w = $_POST['w'];
    		
    		$targ_h = $_POST['h'];
    		
    		$src = 'views/ok_photo/'.$id.'.jpg';
    		
    		$img_r = imagecreatefromjpeg($src);
    		
    		$dst_r = ImageCreateTrueColor($targ_w,$targ_h);
    		
    		imagecopyresampled($dst_r,$img_r,0,0,$_POST['x1'],$_POST['y1'],$targ_w,$targ_h,$_POST['w'],$_POST['h']);
    		
    		imagejpeg($dst_r,'views/ok_photo/'.$id.'.jpg');
    		
    		$a = "<meta http-equiv=REFRESH CONTENT=0;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/display/display?p={$p}>";
     	    $b = "";
            $this->debug($a,$b);
        }
     	//顯示錯誤訊息----------------------------------------------------------------
        public function debug($a,$b){
            
            $this->view("point",Array($a,$b));
        }
    }
?>