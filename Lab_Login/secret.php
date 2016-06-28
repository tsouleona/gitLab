<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<?php
    if(!isset($_COOKIE["userid"]))
    {
      header("location:login.php");
      exit();
    }
  
  ?>
  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Lag - Member Page</title>
  </head>

  <body>
    <div class="col-md-4"></div>
    <div class="col-md-4 " border="1" style="border:1px #000 solid;border-radius:10px;">
      <h7 align="center" valign="center"><strong>中佑花會</strong></h7>
      <table class="table table-hover" background="001.jpg" width="300" cellpadding="5">

        <thead>
          <td align="center">
            <h4 color="#FFFFFF"><strong>會員專用</strong></h4></td>
        </thead>

        <tr>
          <td align="center" >This page for member only.</td>
        </tr>
        <tr>
          <td align="center" ><a href="login.php?sign=1" style="color:black;"><h5><strong>登出</strong></h5></a></td>
        </tr>
      </table>
    </div>

  </body>

</html>