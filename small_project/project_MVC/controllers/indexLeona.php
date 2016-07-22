<?php 
    session_start();
    header("Content-Type:text/html; charset=utf-8");
    class indexLeona extends Controller{
        //回首頁-------------------------------------------------------------
        function index(){
            $row = $this->select_about();
            $row2 = $this->select_contact();
            $this->view("index",Array($row,$row2));
            
        }
        
        //顯示公司簡介--------------------------------------------------------
        function select_about(){
            $select=$this->model("process_index_select");
            return $select->selest_ab();
        }
        
        //更新公司簡介--------------------------------------------------------
        function insert_about(){
            //接收POST的資料---------------------------------------------------
            $data = $_POST["about_data"];
            //更新資料
            $index = $this->model("process_index");
            
            if(preg_match("/'/",$data)){
                
                $a = '<strong><h1 style="color:#ff94b6">不能輸入特殊符號</h1></strong>';
                $b = '<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/index>';
            
                $this->debug($a,$b);
            }
            else{
                $index->about($data);
                header("Location:https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/index");
            }
                
            
        }
        
        //更新聯絡我們--------------------------------------------------------
        function insert_contact()
        {
            $address=$_POST["ab_address"];
            $phone=$_POST["ab_phone"];
            $tax=$_POST["ab_tax"];
            $email=$_POST["ab_email"];
            
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
                $b = '<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/index>';
            
                $this->debug($a,$b);
                
            }
            else
            {
                //更新資料
                $index = $this->model("process_index");
                $index->contact($address,$phone,$tax,$email);
                
                header("Location:https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/index");
            }
        }
        
        //顯示聯絡我們--------------------------------------------------------
        function select_contact()
        {
            $con = $this->model("process_index_select");
            return $con->selest_con();
        }
        
        //登入----------------------------------------------------------------
        function login_in(){
            $uname = $_POST["username"];
            $pwd = $_POST["password"];
            
           
            if(preg_match("/'/",$uname) || strpos("/'/",$pwd)){
                
            $a = '<strong><h1 style="color:#ff94b6">不能輸入特殊符號</h1></strong>';
            $b = '<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/index>';
            
            $this->debug($a,$b);
                
            }
            if(!preg_match("/'/",$uname) && !strpos("/'/",$pwd)){
                $row = $this ->model("check_login");
                $row2 = $row->login_data($uname);
                //如果帳號密碼都對則登入並且記錄至SESSION
                if($uname == $row2[0]['username'] && $pwd == $row2[0]['password'])
                {
                    $_SESSION["username"] = $uname;
                    $a = '<strong><h1 style="color:#ff94b6">登入成功</h1></strong>';
                    $b = '<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/index>';
                    
                    $this->debug($a,$b);
                    
                }
                else
                {
                    
                    $a = '<strong><h1 style="color:#ff94b6">帳號密碼錯誤</h1></strong>';
                    $b = '<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/index>';
                
                    $this->debug($a,$b);
                }
                
            }
        }
        
        //登出-----------------------------------------------------------------
        function login_out(){
            $out = $this->model("check_login");
            //把session的值清掉
            $out->login_out();
            echo '<strong><h1 style="color:#ff94b6">登出中...</h1></strong>';
            echo '<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/index>';
        }
        //顯示錯誤訊息
        public function debug($a,$b){
            
            $this->view("point",Array($a,$b));
        }
        
    
    }
?>