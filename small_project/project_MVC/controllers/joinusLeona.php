<?php
    session_start();
    include_once("models/process_joinus.php");
    
    class joinusLeona extends Controller{
        //回廠商招募-------------------------------------------------------------
        function joinus(){
            $this->view("joinus");
        }
        //搜尋加入我們-------------------------------------------------------------
        function joinus_select($p){
            
            $jo = $this->model("process_joinus");
            return $jo->select_limit($p);
        }
        
        //顯示加入我們-------------------------------------------------------------
        function joinus_page1(){
            
            //抓頁數
            $p = $_GET['p'];
            //搜尋全部資料共幾筆
            $jo = $this->model("process_joinus");
            $result = $jo->select_jo();
            $total = mysql_num_rows($result);
            //計算頁數
            return $pagecount = ceil($total/10);
        }
        
        //顯示加入我們-------------------------------------------------------------
        function joinus_page2($p){
            
            if($p=="")
            {
                $p = 0;
            }
            $jo = $this->model("process_joinus");
            //搜尋第幾筆資料開始，共10筆
            return $result2 = $jo->select_limit($p);
        }
        //新增加入我們-------------------------------------------------------------
        function joinus_insert(){
            //接POST過來的資料
            $name = $_POST["name"];
            $email = $_POST["email"];
            $phone = $_POST["cellphone"];
            
             function str($x){
                if(preg_match("/'/",$x)){
                    return true;
                }
                else{
                    return false;
                }
            }
            if(str($name)==true || str($email)==true || str($phone)==true){
                
                echo '<strong><h1 style="color:#ff94b6">不能輸入特殊符號</h1></strong>';
                echo '<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io/project_MVC/joinus/joinus>';
            }
            else
            {
                $joinus = $this->model("process_joinus");
                //如果為空，則內容為"沒有留下資料"
                if($email == "")
                {
                    $email = "沒有留下資料";
                }
                
                $date = date("Y-m-d");
                $date2 = date("Ymd");
                
                //搜尋當天資料由大排到小
                $joinus = $this->model("process_joinus");
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
                //新增資料
                $joinus->insert_jo($ans,$name,$email,$phone,$date);
                header("Location:https://lab1-srt459vn.c9users.io/project_MVC/joinus/joinus");
            }
                    
        }
        //刪除加入我們-------------------------------------------------------------
        function joinus_delete(){
            $p = $_GET['p'];
            //抓GET過來的編號
            $id = $_GET["jo_id"];
            //刪除該筆資料
            $joinus = $this->model("process_joinus");
            $joinus->delete_jo($id);
            
            echo "<meta http-equiv=REFRESH CONTENT=0;url=https://lab1-srt459vn.c9users.io/project_MVC/joinus/joinus?p={$p}>";
        }
        
        
        
        
    }
    
?>