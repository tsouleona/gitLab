<?php 
    session_start();
    include_once("../models/process_factory.php");
    
    
    class factory_page{
        
        function page_count(){
            
            $fa = new factory();
            $result = $fa->select_fa();
            $total = mysql_num_rows($result);
            return ceil($total/10);
        }
        function page($p){
            if($p=="")
            {
                $p = 0;
            }
            $fa = new factory();
            return $fa->select_limit($p);
        }
        
    }
    
?>