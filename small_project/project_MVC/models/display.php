<?php
    
    class display extends connect{
        
        function insert_dis($ans,$data,$date){
            $com = "INSERT INTO `display` (`display_id`,`display_data`,`display_date`) 
            VALUES ('".$ans."','".$data."','".$date."');";
            $this->connect_mysql($com);
            return 'go';
        }
        //更新專案內容
        function update_dis($data,$id){
            $com = "UPDATE `display` SET `display_data`='".$data."' 
            where `display_id`='".$id."';";
            $this->connect_mysql($com);
            return 'go';
        }
        //刪除該筆資料
        function delete_dis($id){
            $com="DELETE FROM `display` WHERE `display_id` = '".$id."'";
            $this->connect_mysql($com);
            return 'go';
        }
        //搜尋實績展示的資料表
        function select_data(){
            $com="SELECT * FROM display;";
            $row2= $this->connect_getdata($com);
            return $row2;
        }
        
        //搜尋第幾筆開始，有九筆的資料
        function select_limit($p){
            $com="SELECT * FROM `display`  LIMIT ". ($p*9).",9";
            $row2 = $this->connect_getdata($com);
            return $row2;
        }
        
        
        //搜尋由大排到小的圖片編號
        function select_desc($date2){
            $com="SELECT `display_id` FROM `display` WHERE `display_id` LIKE '%$date2%' ORDER BY `display_id` DESC LIMIT 0,1";
            $row2 = $this->connect_getdata($com);
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