<?php 
    session_start();
    include_once("mysql_connect.inc.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Creative - Start Bootstrap Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/creative.min.css" rel="stylesheet">
    <link href="css/creative.css" rel="stylesheet">
    <!-- Jquery-->
    <script src="vendor/bootstrap/jquery/jquery.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">沅淯駿營造有限公司</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="index.php">首頁</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">聯絡我們</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="display.php">實績展示</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="factory.php">廠商招募</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="joinus.php">加入我們</a>
                    </li>
                    <!--登錄判斷-->
                    <?php 
                        $_SESSION['username']=$_POST['username'];
                        $id=$_SESSION['username'];
                        $pwd=$_POST['password'];
                        $sql="select * from signin where username='$id'";
                        $result = mysql_query($sql);
                        $row = @mysql_fetch_row($result);
                    ?>
                    <?php 
                        if( $id==$row[0] && $pwd==$row[1] && $id!=NULL && $pwd!=NULL) { 
                    ?>
                    <li>
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#mymodal">管理員登出</button>
                    </li>
                    <?php } ?>
                    <?php 
                        if( $id==NULL || $id!=$row[0] ) { 
                    ?>
                    <li>
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#mymodal">管理員登錄</button>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <!-- Modal -->
    <!--判斷 帳號密碼是否為空-->
    <script type="text/javascript">
    function check()
    {
        if(form1.username.value == "")
        {
            alert("尚未輸入帳號");
        }
        if(form1.password.value == "")
        {
            alert("尚未輸入密碼");
        }
        else
        {
            form1.submit();
        }
    }
    </script>
    <!-- Modal -->
    <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
           <form action="factory.php" method="POST">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="myModalLabel" style="color:#f05f40"><strong>管理員登錄</strong></h3>
                  </div>
                  <div class="modal-body">
                        
                    <h4><strong>帳號 </strong><input type="text" name="username" /></h4>
                    <h4><strong>密碼 </strong><input  type="password" name="password" /></h4>
                   
                  </div>
                  <div class="modal-footer">
                    
                    <input type="submit" class="btn btn-primary" name="login" value="確認">
                  </div>
                </div>
           </form>
      </div>
    </div>
    <!-- modal end-->
    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h2 id="homeHeading"><strong>專業 負責 誠信</strong></h2>
                <hr>

                <a href="#factory" class="btn btn-primary btn-xl page-scroll">find out more</a>
            </div>
        </div>
    </header>

    <section id="factory">
        <div class="container">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10  text-center" border="1">
                    <form action="fa_process.php" method="POST">
                        <table class="table table-hover">
                            <thead>
                                <td align="center">
                                    <h4><strong>貴公司若有意承攬本公司的工程，請於下列欄位填寫資料，<font color="#f05f40">"橘色項目"</font> 請務必填寫，我們將會盡速與您聯絡!!</strong></h4></td>
                            </thead>
                            <tr>
                                <td align="center">
                                    <h4><strong><font color="#f05f40">公司名稱 </font></strong><input type="text" name="name" />|<strong>電子郵件 </strong><input type="text" name="email" /></h4>
                                </td>    
                            </tr>
                            <tr>
                                <td align="center">
                                    <h4><strong><font color="#f05f40">公司電話 </font></strong><input type="text" name="phone" />|<strong>公司傳真 </strong><input type="text" name="tax" /></h4>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <h4><strong><font color="#f05f40">聯絡人 </font></strong><input type="text" name="people" />|<strong><font color="#f05f40">聯絡電話 </font></strong><input type="text" name="cellphone" /></h4>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <h4><strong>公司地址 </strong></h4>
                                    <input class="form-control" type="text" name="address" />
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <h4><strong>公司網址 </strong></h4>
                                    <input class="form-control" type="text" name="url" />
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <h4><strong><font color="#f05f40">經營項目 </font></strong></h4>
                                    <input class="form-control" type="text" name="data" />
                                </td>
                            </tr>
                        </table>
                        <input class="btn btn-primary btn-xl" type="submit" name="ok" value="確認" />
                    </form>
                    <div>
                    </div>
                </div>
    </section>
    <section class="bg-primary" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12  text-center">
                    <h2 class="section-heading">聯絡我們</h2>
                    <hr class="light">
                </div>
            </div>
        </div>
        <br>
        <div class="row">    
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
            <iframe align="center" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d362
            3.4306118425516!2d121.07983925910875!3d24.746420798388232!2m3!1f0!2f0!3f
            0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346847fd794ecf57%3A0xfceff2d54a
            54b14!2zMzEw5paw56u557ij56u55p2x6Y6u5Lit6IiI6Lev5LiA5q61MTHomZ8!5e0!3m2!1sz
            h-TW!2stw!4v1467354397955" width="800" height="450" frameborder="0" style="border:0" 
            allowfullscreen></iframe>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-3  text-center">
                    <i class="fa  fa-3x sr-contact"><span class="glyphicon glyphicon-file" aria-hidden="true"></span></i>
                    <p>新竹縣竹東鎮中興路一段108巷11號</p>
                </div>
                <div class="col-lg-3  text-center">
                    <i class="fa fa-phone fa-3x sr-contact"></i>
                    <p>03-5954678</p>
                </div>
                <div class="col-lg-3  text-center">
                    <i class="fa  fa-3x sr-contact"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></i>
                    <p>03-5111453</p>
                </div>
                <div class="col-lg-3 text-center">
                    <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                    <p><a  style="color:#FFFFFF" href="mailto:your-email@your-domain.com">feedback@startbootstrap.com</a></p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6 text-center">
                <p>Chungyo Leona © 2016 / <a  style="color:#FFFFFF" href="mailto:your-email@your-domain.com">srt459vn31@gmail.com</a></p>
                </div>
            </div>
        </div>
    </section>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/creative.min.js"></script>

</body>

</html>
