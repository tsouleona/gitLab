<html>
<?php
  if(isset($_GET["sign"]))
  {
    setcookie("userid","Guest",time()-3600);
    header("location:index.php");
    exit();
  }
  if(isset($_POST["btnOK"]))
  {
    if($_POST["txtUserName"]!=NULL)
    {
      setcookie("userid",$_POST["txtUserName"]);
      header("location:index.php");
      exit();
    }
  }
  if(isset($_POST["btnHome"]))
  {
      header("location:index.php");
      exit();
  }

?>

  <head>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Lab - Login</title>
  </head>

  <body>
    <div class="col-md-4"></div>
    <form id="form1" name="form1" method="post" action="login.php">
    <div class="col-md-4 " border="1" style="background-image:url('001.jpg');border:1px #000 solid;border-radius:10px;">
      <h7 align="center" valign="center" style="visibility:hidden"><strong>中佑花會</strong></h7>
      <table class="table table-hover" width="300" cellpadding="5">
        <thead>
          <td colspan="2" align="center">
            <h4 color="#FFFFFF"><strong>會員系統 - 首頁</strong></h4></td>
        </thead>
        <tr>
          <td align="center">帳號</td>
          <td><input type="text" name="txtUserName" id="txtUserName" /></td>
        </tr>
        <tr>
          <td align="center">密碼</td>
          <td><input type="password" name="txtPassword" id="txtPassword" /></td>
        </tr>
        <thead>
          <td colspan="2" align="center">
            <input type="submit" class="btn btn-primary" name="btnOK" id="btnOK" value="登入" />
            <input type="reset"  class="btn btn-primary" name="btnReset" id="btnReset" value="重設" />
            <input type="submit" class="btn btn-primary" name="btnHome" id="btnHome" value="回首頁" />
          </td>
        </thead>
      </table>
    </div>
   </form> 

  </body>

</html>