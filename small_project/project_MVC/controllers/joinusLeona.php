<?php
    session_start();
    
    header("Content-Type:text/html; charset=utf-8");
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
            
            $jo = $this->model("process_joinus_select");
            return $jo->select_limit($p);
        }
        
//---------------------------顯示加入我們-------------------------------------------------------------
        function joinus_page(){
            
            //搜尋全部資料共幾筆
            $jo = $this->model("process_joinus_select");
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
                
                $a = '<strong><h1 style="color:#ff94b6">不能輸入特殊符號</h1></strong>';
                $b = '<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/joinus/joinus>';
            
                $this->debug($a,$b);
            }
            else
            {
                
                //如果為空，則內容為"沒有留下資料"
                if($email == "")
                {
                    $email = "沒有留下資料";
                }
                //抓日期
                $date = date("Y-m-d");
                $date2 = date("Ymd");
                
                //搜尋當天資料由大排到小
                $joinus = $this->model("process_joinus_select");
                $result = $joinus->select_desc($date2);
                $row = mysql_fetch_array($result);
                $one="0001";
                //圖片編號若不為第一筆則從當天的最後一筆+1
                if($row[0] == NULL)
                {
                    $ans = $date2.$one;
                }
                else{
                    $ans = substr($row[0],8,4);
                    $ans = (int)($ans) + 1;
                    $ans = str_pad($ans,4, "0", STR_PAD_LEFT);
                    $ans = $date2.$ans;
                }
                 $joinus2 = $this->model("process_joinus");
                //新增資料
                $joinus2->insert_jo($ans,$name,$email,$phone,$date);
                header("Location:https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/joinus/joinus");
            }
                    
        }
//------------------------------刪除加入我們-------------------------------------------------------------
        function joinus_delete(){
            $p = $_GET['p'];
            //抓GET過來的編號
            $id = $_GET["jo_id"];
            //刪除該筆資料
            $joinus = $this->model("process_joinus");
            $joinus->delete_jo($id);
            //導頁
            $b = "<meta http-equiv=REFRESH CONTENT=0;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/joinus/joinus?p={$p}>";
            $a = '<strong><h1 style="color:#ff94b6">刪除中...</h1></strong>';
            $this->debug($a,$b);
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
                $a = '<strong><h1 style="color:#ff94b6">不能輸入特殊符號</h1></strong>';
                $b = "<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/joinus/joinus?p={$p}>";
            
                $this->debug($a,$b);
            }
            else
            {
                //更新資料
                $index = $this->model("process_index");
                $index->contact($address,$phone,$tax,$email);
                
                $b = "<meta http-equiv=REFRESH CONTENT=0;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/joinus/joinus?p={$p}>";
                $a = '<strong><h1 style="color:#ff94b6">更新中...</h1></strong>';
                $this->debug($a,$b);
            }
        }
        
//-----------------------------顯示聯絡我們--------------------------------------------------------
        function select_contact()
        {
            $con = $this->model("process_index_select");
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
        
    }
    
?>