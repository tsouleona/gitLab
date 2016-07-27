<?php 
    session_start();
   
    class indexLeona extends Controller{
//-----------------------------------回首頁-------------------------------------------------------------
        function index(){
            $row = $this->select_about();
            $row2 = $this->select_contact();
            $this->view("index",Array($row,$row2));
            
        }
        
//---------------------------------顯示公司簡介--------------------------------------------------------
        function select_about(){
            $select=$this->model("process_index_select");
            return $select->selest_ab();
        }
        
//---------------------------------更新公司簡介--------------------------------------------------------
        function insert_about(){
            $data = $_POST["about_data"];
            //更新資料
            $index = $this->model("process_index");
            
            if($this->str($data)){
                //顯示錯誤訊息
                $this->point_error("不能輸入特殊符號");
            }
            else{
                $index->about($data);
                $a = '<strong><h1 style="color:#ff94b6">修改成功</h1></strong>';
                $b = '<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/index>';
            
                $this->debug($a,$b);
            }
                
            
        }
        
//---------------------------------更新聯絡我們--------------------------------------------------------
        function insert_contact()
        {
            $address=$_POST["ab_address"];
            $phone=$_POST["ab_phone"];
            $tax=$_POST["ab_tax"];
            $email=$_POST["ab_email"];
            
            //比對有沒有輸入特殊字元
            if($this->str($address)==true || $this->str($phone)==true || $this->str($tax)==true || $this->str($email)==true)
            {
                //顯示錯誤訊息與導頁
                $this->point_error("不能輸入特殊符號");
            }
            else
            {
                //更新資料
                $index = $this->model("process_index");
                $index->contact($address,$phone,$tax,$email);
                
                $b = "<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/index>";
                $a = '<strong><h1 style="color:#ff94b6">更新中...</h1></strong>';
                $this->debug($a,$b);
            }
        }
        
//--------------------------------顯示聯絡我們--------------------------------------------------------
        function select_contact()
        {
            $con = $this->model("process_index_select");
            return $con->selest_con();
        }
        
//-----------------------------------登入----------------------------------------------------------------
        function login_in(){
            $uname = $_POST["username"];
            $pwd = $_POST["password"];
            
           //比對有沒有輸入特殊字元
            if($this->str($uname) || $this->str($pwd)){
                
            $this->point_error("不能輸入特殊符號");
                
            }
            if(!preg_match("/'/",$uname) && !strpos("/'/",$pwd)){
                $row = $this ->model("check_login");
                $row2 = $row->login_data($uname);
                //如果登入成功並且記錄至SESSION
                if($uname == $row2[0]['username'] && $pwd == $row2[0]['password'])
                {
                    $_SESSION["username"] = $uname;
                    $a = '<strong><h1 style="color:#ff94b6">登入成功</h1></strong>';
                    $b = '<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/index>';
                    
                    $this->debug($a,$b);
                    
                }
                //登入失敗
                else
                {
                    
                    $a = '<strong><h1 style="color:#ff94b6">帳號密碼錯誤</h1></strong>';
                    $b = '<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/index>';
                
                    $this->debug($a,$b);
                }
                
            }
        }
        
//------------------------------------登出-----------------------------------------------------------------
        function login_out(){
            $out = $this->model("check_login");
            //把session的值清掉
            $out->login_out();
            $a = '<strong><h1 style="color:#ff94b6">登出中...</h1></strong>';
            $b = '<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/index>';
            $this->debug($a,$b);
            
        }
//--------------------------顯示錯誤訊息或導頁-----------------------------------------------------------
        public function debug($a,$b){
            
            $this->view("point",Array($a,$b));
        }
//------------------------比對有沒有輸入特殊字元---------------------------------------------------
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