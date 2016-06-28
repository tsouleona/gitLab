<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<?php
    $username="Guest";
    if(isset($_COOKIE["userid"]))
    {
      $username=$_COOKIE["userid"];
    }
   
  ?>

  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Lab - index</title>
  </head>

  <body>
    <div class="col-md-4"></div>
    <div class="col-md-4 " border="1" style="background-image:url('001.jpg');border:1px #000 solid;border-radius:10px;">

      <h7 align="center" valign="center" style="visibility:hidden"><strong>中佑花會</strong></h7>
      <table class="table table-hover"  width="300" cellpadding="5">
        <thead>
          <td align="center">
            <h4 color="#FFFFFF"><strong>會員系統 - 首頁</strong></h4></td>
        </thead>

        <?php  if(!isset($_COOKIE["userid"])){ //style="visibility:hidden"?>
        <tr>
          <td align="center"><a href="login.php" style="color:black;"><h5><strong>登入</strong></h5></a></td>
        </tr>
        <tr>
          <td align="center"><a href="secret.php" style="color:black;"><h5><strong>會員專用頁</strong></h5></a></td>
        </tr>
        <?php }?>

        <?php  if(isset($_COOKIE["userid"])){?>
        <tr>
          <td align="center"><a href="login.php?sign=1" style="color:black;"><h5><strong>登出</strong></h5></a></td>
        </tr>
        <tr>
          <td align="center"><a href="secret.php" style="color:black;"><h5><strong>會員專用頁</strong></h5></a></td>
        </tr>
        <?php }?>

        <thead>
          <td align="center">
            <h4>Hello!!<?php echo $username;?></h4></td>
        </thead>

      </table>
    </div>
  </body>

</html>