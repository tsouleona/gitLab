<?php
    //樂透作業
    header("Content-Type:text/html; charset=utf-8");
    echo "最笨的方法，檢查重複的再重新產生一次<br>";
    for($i=0;$i<6;$i++)
    {
        $x = rand(1,49);
        for($j=0;$j<$i;$j++)
        {
            if($x == $y[$j])
            {
                $x = rand(1,49);
                $j = 0; 
            }
            
        }
        $y[$i] = $x;
    }
        foreach($y as $value){  //把陣列內的亂數讀出
        echo $value . " ";
        
    }
    echo "<br>------------------------------<br>";
    //-----------------------------------------------------
    //產生49個號碼
    for($i=1;$i<50;$i++)
    {
        $x = rand(1,49);
        for($j=1;$j<$i;$j++)
        {
            if($x == $y[$j])
            {
                $x = rand(1,49);
                $j = 0; 
            }
            
            $y[$i] = $x;
        }
    }
    
    //-----------------------------------
    echo "法一 開獎過的往前移<br>";
    
    for($i=1;$i<7;$i++)
    {
        $a = rand($i,49);
        echo $y[$a]." ";
        $temp = $y[$a];
        $y[$a]=$y[$i];
        $y[$i]=$temp;
    }
    //----------------------------------
    echo "<br>------------------------------<br>";
    echo "法二 消除<br>";
    
    $i=0;
    while($i<6)
    {
        $q = rand(1,49);
        if($y[$q]!="")
        {
            echo $y[$q]." ";
            $y[$q]="";
            $i++;
        }
        continue;
        
    }
    
    /*for($i=0;$i<6;$i++)
    {
        $q[$i] = rand(1,49);
        if($y[$q[$i]]!="")
        {
            echo $y[$q[$i]]." ";
            $y[$q[$i]]="";
        
        }
        continue;
        
    }*/
    
    

?>