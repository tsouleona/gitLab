<?php
    session_start();
    include_once("../models/process_display.php");
    
    
    class display_page
    {
        
        function page_count(){
            $table = new display();
            $result = $table->select_data();
            $total = mysql_num_rows($result);
            return ceil($total/9);
        }
        
        function page($p){
            if($p=="")
            {
                $p = 0;
            }
            $table = new display();
            return $table->select_limit($p);
        
        
        }
    }
    
?>