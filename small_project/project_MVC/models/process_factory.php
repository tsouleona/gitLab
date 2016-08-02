<?php 
    class process_factory extends connect_two{
        
        //新增資料
        function insert_fa($ans,$factory,$date){
            if($factory['email'] == "")
                {
                    $factory['email'] = "沒有留下資料";
                }
                if($factory['tax'] == "")
                {
                    $factory['tax'] = "沒有留下資料";
                }
                if($factory['address'] == "")
                {
                    $factory['address'] = "沒有留下資料";
                }
                if($factory['url'] == "")
                {
                    $factory['url'] = "沒有留下資料";
                }
            $com = "INSERT INTO `factory` (`fac_id`,`fac_name`,`fac_people`,`fac_phone`,
            `fac_address`,`fac_url`,`fac_email`,`fac_cellphone`,
            `fac_tax`,`fac_data`,`fac_date`) VALUES ('".$ans."','".$factory['name']."','".$factory['people']."',
            '".$factory['phone']."','".$factory['address']."','".$factory['url']."','".$factory['email']."',
            '".$factory['cellphone']."','".$factory['tax']."','".$factory['data']."','".$date."')";
            $this->connect_mysql($com);
            return 'go';
        }
        
        //刪除該筆資料
        function delete_fa($id){
            $com=" DELETE FROM `factory` WHERE `fac_id` = '".$id."';";
            $this->connect_mysql($com);
            return 'go';
        }
        function select_fa(){
            $com="SELECT * FROM factory;";
            $row = $this->connect_getdata($com);
            return $row;
        }
        //搜尋第幾筆開始，共10筆
        function select_limit($p){
            $com="SELECT * FROM `factory` LIMIT ". ($p*10).",10";
            $row = $this->connect_getdata($com);
            return $row;
        }
        //搜尋當天資料由大排到小
        function select_desc($date2){
            $com="SELECT `fac_id` FROM `factory` WHERE `fac_id` LIKE '%$date2%' ORDER BY `fac_id` DESC LIMIT 0,1";
            $row = $this->connect_getdata($com);
            $one="001";
            //圖片編號若不為第一筆則從當天的最後一筆+1
            if($row[0]['fac_id'] == NULL)
            {
                $ans = $date2.$one;
                
            }
            //圖片編號若不為第一筆則從當天的最後一筆+1
            else{
                $ans = substr($row[0]['fac_id'],8,3);
                $ans = (int)($ans) + 1;
                $ans = str_pad($ans,3, "0", STR_PAD_LEFT);
                $ans = $date2.$ans;
            }
            return $ans;
        }
    }
    
    
?>