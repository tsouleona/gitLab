<?php
    session_start();
    header("Content-Type:text/html; charset=utf-8");
    
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
                $a = '<strong><h1 style="color:#ff94b6">不能輸入特殊符號</h1></strong>';
                $b = '<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/factory/factory>';
            
                $this->debug($a,$b);
            }
            //若為空，內容為"沒有留下資料"
            else{
                if($email == "")
                {
                    $email = "沒有留下資料";
                }
                if($tax == "")
                {
                    $tax = "沒有留下資料";
                }
                if($address == "")
                {
                    $address = "沒有留下資料";
                }
                if($url == "")
                {
                    $url = "沒有留下資料";
                }
                
                $factory = $this->model("process_factory_select");
                
                $date = date("Y-m-d");
                $date2 = date("Ymd");
                //搜尋當天資料
                $result = $factory->select_desc($date2);
                $row = mysql_fetch_array($result);
                $one="001";
                //圖片編號若不為第一筆則從當天的最後一筆+1
                if($row[0] == NULL)
                {
                    $ans = $date2.$one;
                    
                }
                //圖片編號若不為第一筆則從當天的最後一筆+1
                else{
                    $ans = substr($row[0],8,3);
                    $ans = (int)($ans) + 1;
                    $ans = str_pad($ans,3, "0", STR_PAD_LEFT);
                    $ans = $date2.$ans;
                }
                
                $factory2 = $this->model("process_factory");
                
                //新增資料
                $factory2->insert_fa($ans,$name,$people,$phone,$address,$url,$email,$cellphone,$tax,$data,$date);
                
                header("Location:https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/factory/factory");
            }
        }
        
//-------------------------------顯示實績展示-------------------------------------------------------------
        function factory_page(){
               
            $fa =$this->model("process_factory_select");
            //搜尋全部資料共幾筆
            $row = $fa->select_fa();
            $total = count($row);
            //計算頁數
            $pagecount =  ceil($total/10);
            return $t = array($pagecount,$row);
        }
        
//------------------------------搜尋實績展示-------------------------------------------------------------
        function factory_select(){
            $fa = $this->model("process_factory_select");
            return $fa->select_fa();
        }
        
//------------------------------刪除實績展示-------------------------------------------------------------
        function factory_delete(){
            $p = $_GET['p'];
            //傳過來的編號
            $id = $_GET["fa_id"];
            //刪除該筆資料
            $factory = $this->model("process_factory");
            $factory->delete_fa($id);
            //導頁
            $a = "<meta http-equiv=REFRESH CONTENT=0;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/factory/factory?p={$p}>";
            $b = "";
            $this->debug($a,$b);
        }
//-----------------------------更新聯絡我們--------------------------------------------------------
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
            
            
            if($this->str($address)==true || $this->str($phone)==true || $this->str($tax)==true || $this->str($email)==true)
            {
                //顯示錯誤訊息並導頁
                $a = '<strong><h1 style="color:#ff94b6">不能輸入特殊符號</h1></strong>';
                $b = "<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/factory/factory?p={$p}>";
                $this->debug($a,$b);
                
            }
            else
            {
                //更新資料
                $index = $this->model("process_index");
                $index->contact($address,$phone,$tax,$email);
                //導頁
                $a = "<meta http-equiv=REFRESH CONTENT=0;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/factory/factory?p={$p}>";
                $b = "";
                $this->debug($a,$b);
            }
        }
        
//----------------------------------顯示聯絡我們--------------------------------------------------------
        function select_contact()
        {
            $con = $this->model("process_index_select");
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
    }
    
    
    
?>