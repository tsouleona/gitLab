<?php 
    class indexLeona extends Controller{
        
//-----------------------------------回首頁-------------------------------------------------------------
        function index(){
            $row = $this->select_about();
            $row2 = $this->select_contact();
            $this->view("index",Array($row,$row2));
            
        }
        
        
//---------------------------------顯示公司簡介--------------------------------------------------------
        function select_about(){
            $introduction = $this->model("introduction");
            return $introduction->selest_ab();
        }
        
//---------------------------------更新公司簡介--------------------------------------------------------
        function insert_about(){
            $data = $_POST["about_data"];
            //更新資料
            $introduction = $this->model("introduction");
            
            if($this->str($data)){
                //顯示錯誤訊息
                $this->point_error("不能輸入特殊符號");
            }
            else{
                $op = $introduction->about($data);
                if($op == 'go')
                {
                    header("location:".$this->result."index");
                    
                }
                
                
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
                $index = $this->model("contact");
                $op = $index->contact_update($address,$phone,$tax,$email);
                
                
                
            }
        }
        
//--------------------------------顯示聯絡我們--------------------------------------------------------
        function select_contact()
        {
            $con = $this->model("contact");
            return $con->selest_con();
        }
        
//-----------------------------------登入----------------------------------------------------------------
        function login_in(){
            $uname = $_POST["username"];
            $pwd = $_POST["password"];
            
           //比對有沒有輸入特殊字元
            if($uname!="" && $pwd!="" && $this->str($uname)!=true && $this->str($pwd)!=true)
            {
                $row = $this ->model("signin");
                $op = $row->login_data($uname,$pwd);
                if($op == 'ok')
                {
                    $session = $this ->model("session");
                    $op2 = $session->username($uname);
                    exit;
                }
                if(!$op2)
                {
                    header("location:".$this->result);
                }
                
            }
        }
        
//------------------------------------登出-----------------------------------------------------------------
        function login_out(){
            $out = $this->model("session");
            //把session的值清掉
            
            $op = $out->unset_username();
           
            header("location:".$this->result);
            
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
            $a = '<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4><strong>'.$error.'</strong></h4></div>';
            $b='';
            $this->debug($a,$b);
        }
        public function success($success){
            $a = '<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4><strong>'.$success.'</strong></h4></div>';
            $b='';
            $this->debug($a,$b);
        }
    
    }
?>