<?php 
    class factory extends connect{
        
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
            $array = array($ans,$factory['name'],$factory['people'],$factory['phone'],$factory['address'],$factory['url'],$factory['email'],$factory['cellphone'],$factory['tax'],$factory['data'],$date);
            $com = "INSERT INTO `factory` (`fac_id`,`fac_name`,`fac_people`,`fac_phone`,`fac_address`,`fac_url`,`fac_email`,`fac_cellphone`,`fac_tax`,`fac_data`,`fac_date`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            $this->connect_mysql($com,$array);
            return 'go';
        }
        
        //刪除該筆資料
        function delete_fa($id){
            $array = array($id);
            $com=" DELETE FROM `factory` WHERE `fac_id` = ?;";
            $this->connect_mysql($com,$array);
            
        }
        function select_fa(){
            $array = array();
            $com="SELECT * FROM factory;";
            $row = $this->connect_getdata($com,$array);
            return $row;
        }
        //搜尋第幾筆開始，共10筆
        function select_limit($p){
            $p = $p*10;
            $array = array($p);
            $com="SELECT * FROM `factory` LIMIT ?,10";
            $row = $this->connect_getdata($com,$array);
            return $row;
        }
        //搜尋當天資料由大排到小
        function select_desc($date2){
            $array = array('%'.$date2.'%');
            $com="SELECT `fac_id` FROM `factory` WHERE `fac_id` LIKE ? ORDER BY `fac_id` DESC LIMIT 0,1";
            $row = $this->connect_getdata($com,$array);
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