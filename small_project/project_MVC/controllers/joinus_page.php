<?php
    session_start();
    include_once("../models/process_joinus.php");
    
    class joinus_page{
        
        function page_count(){
        
            $jo = new joinus();
            $result = $jo->select_jo();
            $total = mysql_num_rows($result);
            return ceil($total/10);
        }
        
        function page($p){
            if($p=="")
            {
                $p = 0;
            }
            $fa = new joinus();
            return $fa->select_limit($p);
        }
    }
    
    
?>