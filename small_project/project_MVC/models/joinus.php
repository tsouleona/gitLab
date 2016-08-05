<?php
    class joinus extends connect{
        
        
        //刪除資料
        function delete_jo($id){
            $array = array($id);
            $com=" DELETE FROM `joinus` WHERE `join_id` = ?;";
            $this->connect_mysql($com,$array);
            
        }
        //新增資料
        function insert_jo($ans,$joinus,$date){
            $array = array($ans,$joinus['name'],$joinus['email'],$joinus['cellphone'],$date);
            $com = "INSERT INTO `joinus` (`join_id`,`join_name`,`join_email`,`join_cellphone`,`join_date`)
            VALUES (?,?,?,?,?);";
            $this->connect_mysql($com,$array);
            return 'go';
        }
        //搜尋全部資料
        function select_jo(){
            $array = array();
            $com="SELECT * FROM `joinus` ";
            $row = $this->connect_getdata($com,$array);
            return $row;
        }
        //搜尋第幾筆開始，共幾筆
        function select_limit($p){
            $p = $p*10;
            $array = array($p);
            $com="SELECT * FROM `joinus`  LIMIT ?,10";
            $row = $this->connect_getdata($com,$array);
            return $row;
        }
        
        //搜尋當天資料由大排到小
        function select_desc($date2){
            $array = array('%'.$date2.'%');
            $com="SELECT `join_id` FROM `joinus` WHERE `join_id` LIKE ? ORDER BY `join_id` DESC LIMIT 0,1";
            $row = $this->connect_getdata($com,$array);
            //如果為空，則內容為"沒有留下資料"
                $one="0001";
                //圖片編號若不為第一筆則從當天的最後一筆+1
                if($row[0]['join_id'] == NULL)
                {
                    $ans = $date2.$one;
                }
                else{
                    $ans = substr($row[0]['join_id'],8,4);
                    $ans = (int)($ans) + 1;
                    $ans = str_pad($ans,4, "0", STR_PAD_LEFT);
                    $ans = $date2.$ans;
                }
                return $ans;
        }
        
    }
    
    
?>