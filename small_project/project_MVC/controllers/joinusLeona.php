<?php
    class joinusLeona extends Controller{
        
//--------------------------------回廠商招募-------------------------------------------------------------
        function joinus(){
            $p = $_GET['p'];
            $t = $this->joinus_page();
            $row3 = $this->select_contact();
            $row4 = $this->joinus_select($p);
            $row5 = $this->joinus_select($p);
            $page = $t[0];
            $r = $t[1];
            $this->view("joinus",Array($page,$r,$row4,$row5,$row3));
        }
//-----------------------------搜尋加入我們-------------------------------------------------------------
        function joinus_select($p){
            
            $jo = $this->model("process_joinus");
            return $jo->select_limit($p);
        }
        
//---------------------------顯示加入我們-------------------------------------------------------------
        function joinus_page(){
            
            //搜尋全部資料共幾筆
            $jo = $this->model("process_joinus");
            $row = $jo->select_jo();
            $total = count($row);
            //計算頁數
            $pagecount = ceil($total/10);
            
            return $t = array($pagecount,$row);
        }
        
//---------------------------新增加入我們-------------------------------------------------------------
        function joinus_insert(){
            //接POST過來的資料
            $name = $_POST["name"];
            $email = $_POST["email"];
            $phone = $_POST["cellphone"];
            
             //比對特殊字元
            if($this->str($name)==true || $this->str($email)==true || $this->str($phone)==true){
                
                $this->point_error("不能輸入特殊符號");
            }
            else
            {
                //抓日期
                $date = date("Y-m-d");
                $date2 = date("Ymd");
                $joinus = $this->model("process_joinus");
                $ans = $joinus->select_desc($date2);
                if($_POST["email"] == "")
                {
                    $_POST["email"] = "沒有留下資料";
                }
                //新增資料
                $op = $joinus->insert_jo($ans,$_POST,$date);
                if($op == 'go')
                {
                    $this->success("輸入成功");
                }
                
            }
                    
        }
//------------------------------刪除加入我們-------------------------------------------------------------
        function joinus_delete(){
            $p = $_POST['page'];
            //抓GET過來的編號
            $id = $_POST["join_id"];
            //刪除該筆資料
            $joinus = $this->model("process_joinus");
            $op = $joinus->delete_jo($id);
            //導頁
            if($op == 'go')
            {
                $b = "<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io".$this->result."joinus/joinus?p={$p}>";
                $a = '<strong><h1 style="color:#ff94b6">刪除中...</h1></strong>';
                $this->debug($a,$b);
            }
            
        }
//------------------------------更新聯絡我們--------------------------------------------------------
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
                //顯示錯誤訊息並導頁
                $this->point_error("不能輸入特殊符號");
            }
            else
            {
                //更新資料
                $index = $this->model("process_index");
                $op = $index->contact($address,$phone,$tax,$email);
                if($op == 'go')
                {
                    $b = "<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io".$this->result."joinus/joinus?p={$p}>";
                    $a = '<strong><h1 style="color:#ff94b6">更新中...</h1></strong>';
                    $this->debug($a,$b);
                }
            }
        }
        
//-----------------------------顯示聯絡我們--------------------------------------------------------
        function select_contact()
        {
            $con = $this->model("process_index");
            return $con->selest_con();
        }
//-----------------------顯示錯誤訊息或導頁------------------------------------------------------------
        public function debug($a,$b){
            
            $this->view("point",Array($a,$b));
        }
//---------------------比對有沒有輸入特殊字元---------------------------------------------------
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