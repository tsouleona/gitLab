<?php 
    
    function showstar($howMany,$git="*") //預設圖案是 *
    {
        if($howMany > 20)
        {
            echo "howMany <= 20 please.";
            return;
        }
        if($howMany <= 0)
        {
            echo "howMany > 0 please.";
            return;
        }
        
        $result="";//先預設空值
        for($i=1;$i<=$howMany;$i++)
        {
            $result .=$git; //$result=$result."*"
        }
        echo $result;//印星星
   
        
       
        
    }
    
    //執行程式並給值
    showstar(5,"$");//圖案是 $
    echo "</br>";
    showstar(8);//圖案是 *
    echo "</br>";
    showstar(-1);//會出現提醒要大於0
    
    
    
    //------------標準------------------------------------------------
    /*function showstar($howMany,$git="*") //預設圖案是 *
    {
        if($howMany > 0)
        {
            if($howMany <= 20)
            {
                $result="";//先預設空值
                for($i=1;$i<=$howMany;$i++)
                {
                    $result .=$git; //$result=$result."*"
                }
                echo $result;//印星星
            }
            else
            {
                echo "howMany <= 20 please.";
            }
           
        }
        else 
        {
            echo "howMany > 0 please.";
        }
        
    }
    
    //執行程式並給值
    showstar(5,"$");//圖案是 $
    echo "</br>";
    showstar(8);//圖案是 *
    echo "</br>";
    showstar(-1);//會出現提醒要大於0*/
?>