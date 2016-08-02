<?php
    class factoryLeona extends Controller{
        
//----------------------------回廠商招募-------------------------------------------------------------
        function factory(){
            $row3 = $this->select_contact();
            $t = $this->factory_page();
            $row4 = $this->factory_select();
            $row5 = $this->factory_select();
            $p = $t[0];
            $r = $t[1];
            $this->view("factory",Array($p,$r,$row4,$row5,$row3));
        }
//---------------------------新增實績展示-------------------------------------------------------------
        function factory_insert(){
            //接POST過來的資料
            $name = $_POST["name"];
            $people = $_POST["people"];
            $phone = $_POST["phone"];
            $address = $_POST["address"];
            $url = $_POST["url"];
            $email = $_POST["email"];
            $cellphone = $_POST["cellphone"];
            $tax = $_POST["tax"];
            $data = $_POST["data"];
            
            //比對特殊字元
            if($this->str($name) == true || $this->str($people) == true || 
            $this->str($phone) == true || $this->str($address) == true ||
            $this->str($url) == true || $this->str($email) == true || 
            $this->str($cellphone) == true || $this->str($tax) == true)
            {
                $this->point_error("不能輸入特殊符號");
            }
            //若為空，內容為"沒有留下資料"
            else{
                
                
                $factory = $this->model("process_factory");
                
                $date = date("Y-m-d");
                $date2 = date("Ymd");
                //搜尋當天資料
                $ans = $factory->select_desc($date2);
                
                
                
                //新增資料
                $op = $factory->insert_fa($ans,$_POST,$date);
                if($op == 'go')
                {
                    $this->success("輸入成功");
                }
                
            }
        }
        
//-------------------------------顯示實績展示-------------------------------------------------------------
        function factory_page(){
               
            $fa =$this->model("process_factory");
            //搜尋全部資料共幾筆
            $row = $fa->select_fa();
            $total = count($row);
            //計算頁數
            $pagecount =  ceil($total/10);
            return $t = array($pagecount,$row);
        }
        
//------------------------------搜尋實績展示-------------------------------------------------------------
        function factory_select(){
            $fa = $this->model("process_factory");
            return $fa->select_fa();
        }
        
//------------------------------刪除實績展示-------------------------------------------------------------
        function factory_delete(){
            $p = $_POST['page'];
            //傳過來的編號
            $id = $_POST["fac_id"];
            //刪除該筆資料
            $factory = $this->model("process_factory");
            $op = $factory->delete_fa($id);
            //導頁
            if($op == 'go')
            {
                $b = "<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io".$this->result."factory/factory?p={$p}>";
                $a = '<strong><h1 style="color:#ff94b6">刪除中...</h1></strong>';
                $this->debug($a,$b);
            }
            
        }
//-----------------------------更新聯絡我們--------------------------------------------------------
        function insert_contact()
        {
            $address=$_POST["ab_address"];
            $phone=$_POST["ab_phone"];
            $tax=$_POST["ab_tax"];
            $email=$_POST["ab_email"];
            
            $p = $_POST['page'];
            if($p == "")
            {
                $p = 0 ;
            }
            
            
            if($this->str($address)==true || $this->str($phone)==true || $this->str($tax)==true || $this->str($email)==true)
            {
                //顯示錯誤訊息
                $this->point_error("不能輸入特殊字元");
                
            }
            else
            {
                //更新資料
                $index = $this->model("process_index");
                $op = $index->contact($address,$phone,$tax,$email);
                //導頁
                if($op == 'go')
                {
                    $b = "<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io".$this->result."factory/factory?p={$p}>";
                    $a = '<strong><h1 style="color:#ff94b6">更新中...</h1></strong>';
                    $this->debug($a,$b);
                }
                
            }
        }
        
//----------------------------------顯示聯絡我們--------------------------------------------------------
        function select_contact()
        {
            $con = $this->model("process_index");
            return $con->selest_con();
        }
        
//------------------------------顯示錯誤訊息或導頁------------------------------------------------------------
        public function debug($a,$b){
            
            $this->view("point",Array($a,$b));
        }
//----------------------------比對有沒有輸入特殊字元---------------------------------------------------
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