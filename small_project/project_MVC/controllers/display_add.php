<?php
    session_start();
    include_once("../models/process_display.php");
    header("Content-Type:text/html; charset=utf-8");
    
    $data = $_POST["add_data"];
    $date = date("Y-m-d");
    $date2 = date("Ymd");
    $display = new display();
    $row = $display->select_like($date2);
    $one="1";
    if($row["display_id"] == NULL)
    {
        $ans = $date2.$one;
    }
    else{
        $row2 = $display->select_desc();
        
        $ans = substr($row2['display_id'],8);
        $ans = (int)($ans) + 1;
        $ans = $date2.$ans;
    }
    $ex = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $path = array("jpg","png","jpeg","JPG","PNG","JPEG");
    if($_FILES['file']['error'] != 4 && $_FILES['file']['error'] > 0)
    {  
        echo '<h1 style="color:#ff94b6">檔案上傳失敗</h1>';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=../views/display.php>';
    }
    if(!in_array($ex,$path) && $_FILES['file']['error'] != 4)
    {
        echo '<h1 style="color:#ff94b6">副檔名不合格</h1>';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=../views/display.php>';
    }
    elseif($_FILES['file']['error'] != 4 || $_FILES['file']['error'] == 4){
    
        // 取得上傳的圖片
        $src = imagecreatefromjpeg($_FILES['file']['tmp_name']);
        
        // 取得圖片的寬
        $src_w = imagesx($src);
        
        // 取得圖片的長
        $src_h = imagesy($src);
        
        $new_w = $src_w;
        $new_h = $src_h;
        
        // 定義一個圖形
        $newpc = imagecreatetruecolor($new_w,$new_h);
        
        // 抓取截圖
        imagecopy($newpc, $src, 0, 0,$srt_w,$srt_h,$new_w,$new_h );
        
        // 建立縮圖
        $finpic = imagecreatetruecolor($new_w,$new_h);
        
        // 開始縮圖
        imagecopyresampled($finpic,$newpc, 0, 0, 0, 0, 650,490,$new_w,$new_h);
        
        // 儲存縮圖到指定的目錄存放
        imagejpeg($finpic,'../views/ok_photo/'.$ans.'.'.$ex);
            
        $display->insert_dis($ans,$data,$date);
        header("Location:../views/display.php");
    }
    
?>