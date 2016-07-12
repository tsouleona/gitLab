<?php
    session_start();
    include_once("mysql_connect.inc.php");
    header("Content-Type:text/html; charset=utf-8");
    
    $data = $_POST["add_data"];
        
    $date = date("Y-m-d");
    $date2 = date("Ymd");
 
    $sql="select `display_id` from `display` where `display_id` like '%$date2%';";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    $one="1";
    if($row["display_id"] == NULL)
    {
        $ans = $date2.$one;
    }
    else{
        $sql2="select `display_id` from `display` ORDER BY `display_id` DESC limit 0,1";
        $result2 = mysql_query($sql2);
        $row2= mysql_fetch_assoc($result2);
        
        $ans = substr($row2['display_id'],8);
        $ans = (int)($ans) + 1;
        $ans = $date2.$ans;
    }
    
    // $ex = explode(".",$p);
    //  echo $ex[1];
    $ex = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $path = array("jpg","png","jpeg","JPG","PNG","JPEG");
    if($_FILES['file']['error']>0){
        echo '<h1 style="color:#ff94b6">檔案上傳失敗</h1>';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=display.php>';
    }
    if(!in_array($ex,$path))
    {
        echo '<h1 style="color:#ff94b6">副檔名不合格</h1>';
        //echo '<a href="ok_photo/'.$_FILES['file']['name'].'">ok_photo/'.$ans.'.'.$ex.'</a>';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=display.php>';
    }
    else{
         move_uploaded_file($_FILES['file']['tmp_name'],'ok_photo/'.$ans.'.'.$ex);
         
         //echo '<meta http-equiv=REFRESH CONTENT=1;url=display.php>';
        
        $sql2 = "insert into `display` (`display_id`,`display_data`,`display_date`) VALUES ('".$ans."','".$data."','".$date."');";
        mysql_query($sql2);
        header("Location:display.php");
    }
    
?>