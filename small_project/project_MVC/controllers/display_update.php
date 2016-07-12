<?php
    session_start();
    include_once("../models/process_display.php");
    header("Content-Type:text/html; charset=utf-8");
    
    $data = $_POST["data"];
    $id = $_POST["id"];
    $display = new display();
    $ex = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);

    $path = array("jpg","png","jpeg","JPG","PNG","JPEG");
    
    if($_FILES['file']['error'] != 4 && $_FILES['file']['error'] > 0)
    {
        echo '<h1 style="color:#ff94b6">檔案上傳失敗</h1>';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=display.php>';
    }
    if(!in_array($ex,$path) && $_FILES['file']['error'] != 4)
    {
        echo '<h1 style="color:#ff94b6">副檔名不合格</h1>' ;
        echo '<meta http-equiv=REFRESH CONTENT=1;url=display.php>';
    }
    elseif($_FILES['file']['error'] != 4 || $_FILES['file']['error'] == 4){
        
        move_uploaded_file($_FILES['file']['tmp_name'],'../views/ok_photo/'.$id.'.'.$ex);
        $display->update_dis($data,$id);
        header("Location:../views/display.php");
    }
    
    
?>