<?php 
    session_start();
    include_once("models/process_index.php");
    include_once("models/check_login.php");
    
    class indexLeona extends Controller{
        //回首頁-------------------------------------------------------------
        function index(){
            $this->view("index");
        }
        
        //顯示公司簡介--------------------------------------------------------
        function select_about(){
            $select_ab=$this->model("process_index");
            return $select_ab->selest_ab();
        }
        
        //更新公司簡介--------------------------------------------------------
        function insert_about(){
            //接收POST的資料---------------------------------------------------
            $data = $_POST["about_data"];
            //更新資料
            $index = $this->model("process_index");
            $index->about($data);
            
            header("Location:https://lab1-srt459vn.c9users.io/project_MVC/index");
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
                echo '<strong><h1 style="color:#ff94b6">不能輸入特殊符號</h1></strong>';
                echo '<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io/project_MVC/index>';
            }
            else
            {
                //更新資料
                $index = $this->model("process_index");
                $index->contact($address,$phone,$tax,$email);
                
                header("Location:https://lab1-srt459vn.c9users.io/project_MVC/index");
            }
        }
        
        //顯示聯絡我們--------------------------------------------------------
        function select_contact()
        {
            $con = $this->model("process_index");
            return $con->selest_con();
        }
        
        //登入----------------------------------------------------------------
        function login_in(){
            $uname = $_POST["username"];
            $pwd = $_POST["password"];
            //搜尋資料
            if($uname == "" || $pwd== ""){
                echo '<strong><h1 style="color:#ff94b6">尚未輸入帳號密碼</h1></strong>';
                echo '<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io/project_MVC/index>';
            }
            
            if($uname != "" && $pwd != "")
            {
                if(preg_match("/'/",$uname) || strpos("/'/",$pwd)){
                echo '<strong><h1 style="color:#ff94b6">不能輸入特殊符號</h1></strong>';
                echo '<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io/project_MVC/index>';
                }
                if(!preg_match("/'/",$uname) && !strpos("/'/",$pwd)){
                    $row = $this ->model("check_login");
                    $result2 = $row->login_data($uname);
                    $row2 = mysql_fetch_array($result2);
                    //如果帳號密碼都對則登入並且記錄至SESSION
                    if($uname == $row2[0] && $pwd == $row2[1])
                    {
                        $_SESSION["username"] = $uname;
                        echo '<strong><h1 style="color:#ff94b6">登入成功</h1></strong>';
                        echo '<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io/project_MVC/index>';
                    }
                    else
                    {
                        echo '<strong><h1 style="color:#ff94b6">帳號密碼錯誤</h1></strong>';
                        echo '<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io/project_MVC/index>';
                    }
                }
            }
        }
        
        //登出-----------------------------------------------------------------
        function login_out(){
            $out = $this->model("check_login");
            //把session的值清掉
            $out->login_out();
            echo '<strong><h1 style="color:#ff94b6">登出中...</h1></strong>';
            echo '<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io/project_MVC/index>';
        }
        
        //檢查帳號密碼----------------------------------------------------------
        function check_ck(){
            $check = $this->model("check_login");
            return $check->check();
        }
    }
?>