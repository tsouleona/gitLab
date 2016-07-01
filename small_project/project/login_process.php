<?php 
    session_start();
    
        $_SESSION['username']=$_POST['username'];
        $id=$_SESSION['username'];
        $pwd=$_POST['password'];
        $sql="select * from signin where username='$id'";
        $result = mysql_query($sql);
        $row = @mysql_fetch_row($result);
        
        if($id==$row[0] && $pwd==$row[1])           



?>