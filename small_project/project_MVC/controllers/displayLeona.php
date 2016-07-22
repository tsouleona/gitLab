<?php 
    session_start();
    
    header("Content-Type:text/html; charset=utf-8");
    class displayLeona extends Controller{
        
        //回實績展示-------------------------------------------------------------
        function display(){
            $t = $this->display_page();
            $row3 = $this->select_contact();
            $p = $t[0];
            $r = $t[1];
            $this->view("display",Array($p,$r,$row3));
            
        }
        
        //新增實績展示-------------------------------------------------------------
        function display_add()
        {
            $p = $_GET['p'];
            if($p=="")
            {
                $p = 0;
            }
            //傳過來的專案內容
            $data = $_POST["add_data"];
            if($data == "")
            {
                $a = '<h1 style="color:#ff94b6">尚未輸入專案內容</h1>';
                $b = "<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/display/display?p={$p}>";
            
                $this->debug($a,$b);
            }
            else{
                if(preg_match("/'/",$data))
                {
                    $a = '<h1 style="color:#ff94b6">不能輸入特殊字元</h1>';
                    $b = "<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/display/display?p={$p}>";
                
                    $this->debug($a,$b);
                }
                else
                {
                    //抓日期
                    $date = date("Y-m-d");
                    $date2 = date("Ymd");
                    
                    //搜尋當天資料由大排到小
                    $display =  $this->model("process_display_select");
                    $row = $display->select_desc($date2);
                    
                    $one="001";
                    
                    //圖片編號如果是當天第一筆則從1開始編號
                    if($row[0]["display_id"] == NULL)
                    {
                        $ans = $date2.$one;
                    }
                    //圖片編號若不為第一筆則從當天的最後一筆+1
                    else{
                        $ans = substr($row[0]['display_id'],8,3);
                        $ans = (int)($ans) + 1;
                        $ans = str_pad($ans,3, "0", STR_PAD_LEFT);
                        $ans = $date2.$ans;
                    }
                    //抓副檔名
                    $ex = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                    //存可以上傳的檔案類型
                    $path = array("jpg","jpeg","JPG","JPEG");
                    
                    //error=4表示沒有上傳的檔案，但是新增可以不上傳檔案
                
                    if( $_FILES['file']['error'] > 0 && $_FILES['file']['error'] != 4)
                    {  
                        
                        $a = '<h1 style="color:#ff94b6">檔案上傳失敗</h1>';
                        $b = "<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/display/display?p={$p}>";
                    
                        $this->debug($a,$b);
                    }
                    //如果不是jpg png jepg檔案類型不能上傳
                    if(!in_array($ex,$path) && $_FILES['file']['error'] != 4)
                    {
                        $a = '<h1 style="color:#ff94b6">副檔名不合格</h1>';
                        $b = "<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/display/display?p={$p}>";
                    
                        $this->debug($a,$b);
                    }
                    
                    
                    //如果檔案為空亦可上傳
                    else{
                        $display2 =  $this->model("process_display");
                        
                        if($_FILES['file']['error'] == 4)
                        {
                            $display2->insert_dis($ans,$data,$date);
                            $a = "<meta http-equiv=REFRESH CONTENT=0;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/display/display?p={$p}>";   
                        
                            $b="";
                            $this->debug($a,$b);
                        }
                        else{
                            
                        
                            move_uploaded_file($_FILES['file']['tmp_name'],'views/ok_photo/'.$ans.".".$ex);//複製檔案
                            //新增專案內容與圖片編號
                            $display2->insert_dis($ans,$data,$date);
                            $a = "<meta http-equiv=REFRESH CONTENT=0;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/display_2/display_2?id={$ans}&p={$p}>";   
                            $b="";
                            $this->debug($a,$b);
                        }
                        
                        
                    }
                }
            }
            
            
        }
        //刪除實績展示-------------------------------------------------------------
        function display_delete()
        {
            //抓送過來的圖片編號
            $p = $_GET['p'];
            if($p=="")
            {
                $p = 0;
            }
            $id = $_GET["dis_id"];
            //刪除該圖片及專案內容
            $display =  $this->model("process_display");
            unlink("views/ok_photo/$id.jpg");
            $display->delete_dis($id);
            
            
            $a = "<meta http-equiv=REFRESH CONTENT=0;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/display/display?p={$p}>";
            $b = "";
            $this->debug($a,$b);
        }
        
        //分頁實績展示-------------------------------------------------------------
        
        function display_page(){
            
            $table = $this->model("process_display_select");
            //搜尋全部有幾筆資料
            $row = $table->select_data();
            $total = count($row);
            //計算頁數
            $pagecount = ceil($total/9);
             
            return $t= array($pagecount,$row);
            
        }
        
        //更新實績展示-------------------------------------------------------------
        function display_update()
        {
            $p = $_GET['p'];
            if($p=="")
            {
                $p = 0;
            }
            //傳過來的專案內容
            $data = $_POST["data"];
            //傳過來的圖片編號
            $id = $_POST["id"];
             if($data == "")
            {
                $a = '<h1 style="color:#ff94b6">尚未輸入專案內容</h1>';
                $b = "<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/display/display?p={$p}>";
            
                $this->debug($a,$b);
            }
            else{
                if(preg_match("/'/",$data))
                {
                    $a = '<h1 style="color:#ff94b6">不能輸入特殊字元</h1>';
                    $b = "<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/display/display?p={$p}>";
                    $this->debug($a,$b);
                }
                else
                {
                    $display = $this->model("process_display");
                
                    //抓副檔名
                    $ex = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
                    
                    //存可以上傳的檔案類型
                    $path = array("jpg","jpeg","JPG","JPEG");
                    
                    //error=4表示沒有上傳的檔案，但是新增可以不上傳檔案
                 
                    if($_FILES['file']['error'] > 0 && $_FILES['file']['error'] != 4 )
                    {
                        $a = '<h1 style="color:#ff94b6">檔案上傳失敗</h1>';
                        $b = "<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/display/display?p={$p}>";
                    
                        $this->view("point",Array($a,$b));
                    }
                    //如果不是jpg png jepg檔案類型不能上傳
                    if(!in_array($ex,$path) && $_FILES['file']['error'] != 4)
                    {
                        $a = '<h1 style="color:#ff94b6">副檔名不合格</h1>' ;
                        $b = "<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/display/display?p={$p}>";
                        $this->debug($a,$b);
                        
                    }
                  
                    
                    //如果檔案為空亦可上傳
                    else{
                        
                        move_uploaded_file($_FILES['file']['tmp_name'],'views/ok_photo/'.$id.".".$ex);//複製檔案
                        //更新專案內容
                        $display->update_dis($data,$id);
                        $a = "<meta http-equiv=REFRESH CONTENT=0;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/display_2/display_2?id={$id}&p={$p}>";
                        $b="";
                        $this->debug($a,$b);
                        
                    }
                    
                }
            }
            
        }
        //更新聯絡我們--------------------------------------------------------
        function insert_contact()
        {
            $address=$_POST["ab_address"];
            $phone=$_POST["ab_phone"];
            $tax=$_POST["ab_tax"];
            $email=$_POST["ab_email"];
            
            $p = $_GET['p'];
            
            if($p == "")
            {
                $p = 0 ;
            }
            function str($x){
                if(preg_match("/'/",$x)){
                    return true;
                }
                else{
                    return false;
                }
            }
            
            if(str($address)==true || str($phone)==true || str($tax)==true || str($email)==true)
            {
                $a = '<strong><h1 style="color:#ff94b6">不能輸入特殊符號</h1></strong>';
                $b = "<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/display/display?p={$p}>";
            
                $this->debug($a,$b);
            }
            else
            {
                //更新資料
                $index = $this->model("process_index");
                $index->contact($address,$phone,$tax,$email);
                
                $a = "<meta http-equiv=REFRESH CONTENT=0;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/display/display?p={$p}>";
                $b="";
                $this->debug($a,$b);
            }
        }
        
        //顯示聯絡我們--------------------------------------------------------
        function select_contact()
        {
            $con = $this->model("process_index_select");
            return $con->selest_con();
        }
        //顯示錯誤訊息------------------------------------------------------------
        public function debug($a,$b){
            
            $this->view("point",Array($a,$b));
        }
    }

?>
