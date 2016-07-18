<?php
    session_start();
    include_once("../models/process_display.php");
    header("Content-Type:text/html; charset=utf-8");
    
    //傳過來的專案內容
    $data = $_POST["add_data"];
    
    //抓日期
    $date = date("Y-m-d");
    $date2 = date("Ymd");
    
    //搜尋當天資料由大排到小
    $display = new display();
    $row = $display->select_desc($date2);
    
    $one="1";
    
    //圖片編號如果是當天第一筆則從1開始編號
    if($row["display_id"] == NULL)
    {
        $ans = $date2.$one;
    }
    //圖片編號若不為第一筆則從當天的最後一筆+1
    else{
        $ans = substr($row['display_id'],8,3);
        $ans = (int)($ans) + 1;
        $ans = str_pad($ans,3, "0", STR_PAD_LEFT);
        $ans = $date2.$ans;
    }
    //抓副檔名
    $ex = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    //存可以上傳的檔案類型
    $path = array("jpg","png","jpeg","JPG","PNG","JPEG");
    
    //error=4表示沒有上傳的檔案，但是新增可以不上傳檔案
    if($_FILES['file']['error'] != 4)
    {
        if( $_FILES['file']['error'] > 0)
        {  
            echo '<h1 style="color:#ff94b6">檔案上傳失敗</h1>';
            echo "<meta http-equiv=REFRESH CONTENT=1;url=../views/display.php>";
        }
        //如果不是jpg png jepg檔案類型不能上傳
        if(!in_array($ex,$path))
        {
            echo '<h1 style="color:#ff94b6">副檔名不合格</h1>';
            echo "<meta http-equiv=REFRESH CONTENT=1;url=../views/display.php>";
        }
    }
    
    //如果檔案為空亦可上傳
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
        //新增專案內容與圖片編號
        $display->insert_dis($ans,$data,$date);
        header("Location:../views/display.php");
    }
    
?>