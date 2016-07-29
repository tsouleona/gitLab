<?php 
    class displayLeona extends Controller{
        protected $result;
        
        function __construct(){
            $con = new connect_db();
            $this->result = $con->db();
        }
//--------------------------------------回實績展示-------------------------------------------------------------
        function display(){
            
            $t = $this->display_page();
            $row3 = $this->select_contact();
            $p = $t[0];
            $r = $t[1];
            $this->view("display",Array($p,$r,$row3));
            
        }
        
//--------------------------------------新增實績展示-------------------------------------------------------------
        function display_add()
        {
            $p = $_GET['p'];
            if($p=="")
            {
                $p = 0;
            }
            
            //傳過來的專案內容
            $data = $_POST["add_data"];
            //如果是空的不能上傳檔案
                //比對特殊字元
            if($this->str($data))
            {
                
                $a = '<h1 style="color:#ff94b6">不能輸入特殊字元</h1>';
                $b = "<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io".$this->result."display/display?p={$p}>";
            
                $this->debug($a,$b);
            }
            else
            {
                //抓日期
                $date = date("Y-m-d");
                $date2 = date("Ymd");
                
                //搜尋當天資料由大排到小
                $display =  $this->model("process_display");
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
                    $b = "<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io".$this->result."display/display?p={$p}>";
                
                    $this->debug($a,$b);
                }
                //如果不是jpg png jepg檔案類型不能上傳
                if(!in_array($ex,$path) && $_FILES['file']['error'] != 4)
                {
                    $a = '<h1 style="color:#ff94b6">副檔名不合格</h1>';
                    $b = "<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io".$this->result."display/display?p={$p}>";
                
                    $this->debug($a,$b);
                }
                
                
                //如果檔案為空亦可上傳
                else{
                    $display2 =  $this->model("process_display");
                    
                    if($_FILES['file']['error'] == 4)
                    {
                        
                        $display2->insert_dis($ans,$data,$date);
                        $b = "<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io".$this->result."display/display?p={$p}>";   
                    
                        $a = '<strong><h1 style="color:#ff94b6">更新中...</h1></strong>';
                        $this->debug($a,$b);
                    }
                    else{
                        
                        //上傳檔案到對的位置
                        move_uploaded_file($_FILES['file']['tmp_name'],'views/ok_photo/'.$ans.".".$ex);
                        //新增專案內容與圖片編號
                        $display2->insert_dis($ans,$data,$date);
                        //導頁
                        $b = "<meta http-equiv=REFRESH CONTENT=3;url=https://lab1-srt459vn.c9users.io".$this->result."display_2/display_2?id={$ans}&p={$p}>";   
                        $a = '<strong><h1 style="color:#ff94b6">上傳中...</h1></strong>';
                        $this->debug($a,$b);
                    }
                    
                    
                }
            }
            
            
            
        }
//-----------------------------------刪除實績展示-------------------------------------------------------------
        function display_delete()
        {
            //抓送過來的圖片編號
            $p = $_GET['p'];
            if($p=="")
            {
                $p = 0;
            }
            $id = $_GET["dis_id"];
            //刪除該圖片
            if(is_file("views/ok_photo/$id.jpg")) {
                
                unlink("views/ok_photo/$id.jpg");
            } 
            $display =  $this->model("process_display");
            $display->delete_dis($id);
            //導頁
            $b = "<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io".$this->result."display/display?p={$p}>";
            $a = '<strong><h1 style="color:#ff94b6">刪除中...</h1></strong>';
            $this->debug($a,$b);
        }
        
//------------------------------------分頁實績展示--------------------------------------------------------------
        
        function display_page(){
            
            $table = $this->model("process_display");
            //搜尋全部有幾筆資料
            $row = $table->select_data();
            $total = count($row);
            //計算頁數
            $pagecount = ceil($total/9);
             
            return $t= array($pagecount,$row);
            
        }
        
//------------------------------------更新實績展示-------------------------------------------------------------
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
            //專案內容不能為空
            //比對特殊字元
            if($this->str($data))
            {
                
                $this->point_error("不能輸入特殊字元");
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
                    $b = "<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io".$this->result."display/display?p={$p}>";
                
                    $this->view("point",Array($a,$b));
                }
                //如果不是jpg png jepg檔案類型不能上傳
                if(!in_array($ex,$path) && $_FILES['file']['error'] != 4)
                {
                    $a = '<h1 style="color:#ff94b6">副檔名不合格</h1>' ;
                    $b = "<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io".$this->result."display/display?p={$p}>";
                    $this->debug($a,$b);
                    
                }
              
                
                //如果檔案為空亦可上傳
                else{
                    
                    move_uploaded_file($_FILES['file']['tmp_name'],'views/ok_photo/'.$id.".".$ex);//複製檔案
                    //更新專案內容
                    $display->update_dis($data,$id);
                    $b = "<meta http-equiv=REFRESH CONTENT=3;url=https://lab1-srt459vn.c9users.io".$this->result."display_2/display_2?id={$id}&p={$p}>";
                    $a = '<strong><h1 style="color:#ff94b6">上傳中...</h1></strong>';
                    $this->debug($a,$b);
                    
                }
                
            }
            
        }
//----------------------------------------更新聯絡我們--------------------------------------------------------
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
            //比對特殊字元
            if($this->str($address)==true || $this->str($phone)==true || $this->str($tax)==true || $this->str($email)==true)
            {
                $this->point_error("不能輸入特殊字元");
            }
            else
            {
                //更新資料
                $index = $this->model("process_index");
                $index->contact($address,$phone,$tax,$email);
                //導頁
                $b = "<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io".$this->result."display/display?p={$p}>";
                $a = '<strong><h1 style="color:#ff94b6">更新中...</h1></strong>';
                $this->debug($a,$b);
            }
        }
        
//--------------------------------------顯示聯絡我們--------------------------------------------------------
        function select_contact()
        {
            $con = $this->model("process_index");
            return $con->selest_con();
        }
//-----------------------------------顯示錯誤訊息或導頁------------------------------------------------------------
        public function debug($a,$b){
            
            $this->view("point",Array($a,$b));
        }
//------------------------------------比對有沒有輸入特殊字元---------------------------------------------------
        public function str($x){
                if(preg_match("/'/",$x)){
                    return true;
                }
                else{
                    return false;
                }
        }
        public function point_error($error){
            echo '<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4><strong>'.$error.'</strong></h4></div>';
        }
        public function success($success){
            echo '<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4><strong>'.$success.'</strong></h4></div>';
        }
        
    }

?>