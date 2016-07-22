<?php 
    class compareLeona extends Controller{
        function compare_string(){
            $tmp = $_GET['data'];
                if(preg_match("/@/",$tmp))
                {
                    echo "one";
                }
                if($tmp == "")
                {
                    echo "two";
                }
                else{
                    echo "ok";
                }
            
        }
    }

?>