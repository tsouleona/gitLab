<?php
    
    $x = 300;
    $z = ($y = $x);
    
    echo $z;//300
    
    //法一
    while( $row=mysql_fetch_row() )
    {
        //.....
    }
    
    //法二
    $row=mysql_fetch_row();
    while($row)
    {
        //....
        if($i)
        {
             $row=mysql_fetch_row();
             continue;
        }
        $row=mysql_fetch_row();
    }
    

?>