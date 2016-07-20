<?php
    session_start();
    include_once("../models/process_display.php");
    header("Content-Type:text/html; charset=utf-8");
    $p = $_POST['page'];
    //傳過來的專案內容
    $data = $_POST["data"];
    //傳過來的圖片編號
    $id = $_POST["id"];
    
    if(preg_match("/'/",$data))
    {
        echo '<h1 style="color:#ff94b6">不能輸入特殊字元</h1>';
        echo "<meta http-equiv=REFRESH CONTENT=1;url=../views/display.php?&p={$p}>";
    }
    else
    {
        $display = new display();
    
        //抓副檔名
        $ex = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
        
        //存可以上傳的檔案類型
        $path = array("jpg","jpeg","JPG","JPEG");
        
        //error=4表示沒有上傳的檔案，但是新增可以不上傳檔案
     
        if($_FILES['file']['error'] > 0 && $_FILES['file']['error'] != 4 )
        {
            echo '<h1 style="color:#ff94b6">檔案上傳失敗</h1>';
            echo "<meta http-equiv=REFRESH CONTENT=1;url=../views/display.php?&p={$p}>";
        }
        //如果不是jpg png jepg檔案類型不能上傳
        if(!in_array($ex,$path) && $_FILES['file']['error'] != 4)
        {
            echo '<h1 style="color:#ff94b6">副檔名不合格</h1>' ;
            echo "<meta http-equiv=REFRESH CONTENT=1;url=../views/display.php?&p={$p}>";
        }
      
        
        //如果檔案為空亦可上傳
        else{

            move_uploaded_file($_FILES['file']['tmp_name'],'../views/ok_photo/'.$id.".".$ex);//複製檔案
            //更新專案內容
            $display->update_dis($data,$id);
            
            echo "<meta http-equiv=REFRESH CONTENT=0;url=../views/display_2.php?id={$id}&p={$p}>";
        }
    }
    
    
    
?>