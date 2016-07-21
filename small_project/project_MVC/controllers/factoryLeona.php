<?php
    session_start();
    include_once("models/process_factory.php");
    header("Content-Type:text/html; charset=utf-8");
    
    class factoryLeona extends Controller{
        //回廠商招募-------------------------------------------------------------
        function factory(){
            $this->view("factory");
        }
        //新增實績展示-------------------------------------------------------------
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
            
            //若為空，內容為"沒有留下資料"
            function str($x){
                if(preg_match("/'/",$x)){
                    return true;
                }
                else{
                    return false;
                }
            }
            if(str($name) == true || str($people) == true || 
            str($phone) == true || str($address) == true ||
            str($url) == true || str($email) == true || 
            str($cellphone) == true || str($tax) == true)
            {
                 echo '<strong><h1 style="color:#ff94b6">不能輸入特殊符號</h1></strong>';
                 echo '<meta http-equiv=REFRESH CONTENT=1;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/factory/factory>';
            }
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
                
                $factory = $this->model("process_factory");
                
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
                
                //新增資料
                $factory->insert_fa($ans,$name,$people,$phone,$address,$url,$email,$cellphone,$tax,$data,$date);
                
                header("Location:https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/factory/factory");
            }
        }
        
        //顯示實績展示-------------------------------------------------------------
        function factory_page1(){
               
            $fa =$this->model("process_factory");
            //搜尋全部資料共幾筆
            $result = $fa->select_fa();
            $total = mysql_num_rows($result);
            //計算頁數
            return $pagecount =  ceil($total/10);
        }
        
        //顯示實績展示-------------------------------------------------------------
        function factory_page2(){
            $p = $_GET['p']; 
            if($p=="")
            {
                $p = 0;
            }
            $fa = $this->model("process_factory");
            //搜尋第幾筆資料開始，共10筆
            return $result2 = $fa->select_limit($p);
        }
        
        //搜尋實績展示-------------------------------------------------------------
        function factory_select($p){
            $fa = $this->model("process_factory");
            return $fa->select_limit($p);
        }
        
        //刪除實績展示-------------------------------------------------------------
        function factory_delete(){
            $p = $_GET['p'];
            //街道傳過來的編號
            $id = $_GET["fa_id"];
            //刪除該筆資料
            $factory = $this->model("process_factory");
            $factory->delete_fa($id);
            echo "<meta http-equiv=REFRESH CONTENT=0;url=https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/factory/factory?p={$p}>";
        }
        
    }
    
    
    
?>