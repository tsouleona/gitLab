<?php
    
    class display extends connect{
        
        function insert_dis($ans,$data,$date){
            $array = array($ans,$data,$date);
            $com = "INSERT INTO `display` (`display_id`,`display_data`,`display_date`) 
            VALUES (?,?,?);";
            $this->connect_mysql($com,$array);
            return 'go';
        }
        //更新專案內容
        function update_dis($data,$id){
            $array = array($data,$id);
            $com = "UPDATE `display` SET `display_data`=? where `display_id`=?;";
            $this->connect_mysql($com,$array);
            return 'go';
        }
        //刪除該筆資料
        function delete_dis($id){
            $array = array($id);
            $com="DELETE FROM `display` WHERE `display_id` = ?";
            $this->connect_mysql($com,$array);
            return 'go';
        }
        //搜尋實績展示的資料表
        function select_data(){
            $array = array();
            $com="SELECT * FROM display;";
            $row2= $this->connect_getdata($com,$array);
            return $row2;
        }
        
        //搜尋第幾筆開始，有九筆的資料
        function select_limit($p){
            $p = $p*9;
            $array = array($p);
            $com="SELECT * FROM `display`  LIMIT ?,9";
            $row2 = $this->connect_getdata($com,$array);
            return $row2;
        }
        
        
        //搜尋由大排到小的圖片編號
        function select_desc($date2){
            $array = array('%'.$date2.'%');
            $com="SELECT `display_id` FROM `display` WHERE `display_id` LIKE  ?  ORDER BY `display_id` DESC LIMIT 0,1";
            $row = $this->connect_getdata($com,$array);
            $one="001";
            //圖片編號如果是當天第一筆則從1開始編號
            if($row[0]["display_id"] == NULL)
            {
                $ans = $date2.$one;
            }
            //圖片編號若不為第一筆則從當天的最後一筆+1
            else{
                $ans = substr($row[0]['display_id'],8,3);
                $ans = (int)($ans) + 1;
                $ans = str_pad($ans,3, "0", STR_PAD_LEFT);
                $ans = $date2.$ans;
            }
            return $ans;
        }
    }
        
?>