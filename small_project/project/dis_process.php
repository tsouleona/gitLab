<?php
    session_start();
    include_once("mysql_connect.inc.php");
    header("Content-Type:text/html; charset=utf-8");
    
    $data = $_POST["data"];
    $id = $_POST["id"];
    
    $ex = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
    echo $ex;
    $path = array("jpg","png","jpeg","JPG","PNG","JPEG");
    
    if($_FILES['file']['error'] != 4 || $_FILES['file']['error'] >0)
    {
        echo '<h1 style="color:#ff94b6">檔案上傳失敗</h1>';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=display.php>';
    }
    if(!in_array($ex,$path) && $_FILES['file']['error'] != 4)
    {
        echo '<h1 style="color:#ff94b6">副檔名不合格</h1>' ;
        //echo '<a href="ok_photo/'.$_FILES['file']['tmp_name'].'">ok_photo/'.$id.'.'.$ex.'</a>';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=display.php>';
    }
    elseif($_FILES['file']['error'] != 4 || $_FILES['file']['error'] == 4){
        move_uploaded_file($_FILES['file']['tmp_name'],'ok_photo/'.$id.'.'.$ex);
        
        
        $sql = "UPDATE `display` SET `display_data`='".$data."' where `display_id`='".$id."';";
        mysql_query($sql);
        header("Location:display.php");
    }
    
    
?>