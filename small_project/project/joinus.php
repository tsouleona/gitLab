<!DOCTYPE html>
<?php 
    session_start();
    include_once("mysql_connect.inc.php");
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Creative - Start Bootstrap Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

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
    <script src="vendor/jquery/jquery.js"></script>

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
                <a class="navbar-brand page-scroll" href="index.php">沅淯駿營造有限公司</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

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
                        <a class="page-scroll" href="joinus.php">
                            <font color="#ffbed3">加入我們</font>
                        </a>
                    </li>
<!--------------------------------------------登錄判斷------------------------------------------------------------------------>
                    <?php 
                        $id=$_SESSION['username'];
                        
                        $sql="select * from signin where username='$id'";
                        $result = mysql_query($sql);
                        $row = mysql_fetch_row($result);
                    ?>
                    <?php 
                        if( $id==$row[0] &&  $id!=NULL ) { 
                    ?>
                    <li>
                        <button type="button" class="btn btn-primary btn-lg"><a style="color:white" href="logout.php">管理員登出</a></button>
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

<!--------------------------------------------登錄帳號密碼------------------------------------------------------------------------>
    <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="login.php" method="POST" id="form1">
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

                        <input type="submit" onclick="check()" class="btn btn-primary" name="login" value="確認">
                    </div>
                </div>
            </form>
        </div>
    </div>
<!--------------------------------------------判斷 帳號密碼是否為空------------------------------------------------------------------------>
    <script type="text/javascript">
        function check() {
            if (form1.username.value == "") {
                alert("尚未輸入帳號");
            }
            if (form1.password.value == "") {
                alert("尚未輸入密碼");
            }
            else {
                form1.submit();
            }
        }
    </script>

<!--------------------------------------------header(顯示)------------------------------------------------------------------------>    
    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1 ><strong>專業&nbsp;&nbsp;&nbsp;勤懇&nbsp;&nbsp;&nbsp;誠信</strong></h1>
                <!--<hr>-->

                <!--<a href="#joinus" class="btn btn-primary btn-xl page-scroll">find out more</a>-->
            </div>
        </div>
    </header>
<!--------------------------------------------員工福利(顯示)------------------------------------------------------------------------>
    <?php 
        
        if( $id==NULL || $id!=$row[0] ) { 
    ?>
    <section id="joinus">
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-3 col-sm-3" style="background-color:#ff94b6">
                    <div class="container">
                        <h2 class="section-heading" style="color:white"><strong>員工福利</strong></h2>
                        
                        <h4 class="text-faded" style="color:white">1.勞健保</h4><br>
                        <h4 class="text-faded" style="color:white">2.年終獎金</h4><br>
                        <h4 class="text-faded" style="color:white">3.餐費補助</h4><br>
                        <h4 class="text-faded" style="color:white">4.三節禮金</h4><br>
                        <h4 class="text-faded" style="color:white">5.婚喪喜慶補助</h4><br>
                        <h4 class="text-faded" style="color:white">6.尾牙、春酒</h4><br>
                        <!--<a href="#services" class="page-scroll btn btn-default btn-xl sr-button">Get Started!</a>-->
                    </div>
                </div>
                
<!--------------------------------------------加入我們(輸入聯絡資訊)------------------------------------------------------------------------>
                <div class="col-lg-5  text-center">
                    <form action="join_process.php" method="POST" id ="form2">
                        <table class="table table-hover">
                            <thead>
                                <td align="center">
                                    <h4><strong>若您有意願加入本公司，請於下列欄位填寫資料，<br><font color="#ff94b6">"粉色項目"</font> 請務必填寫，我們將會盡速與您聯絡!!</strong></h4></td>
                            </thead>
                            <tr>
                                <td align="center">
                                    <h4><strong><font color="#ff94b6">您的姓名 </font></strong><input type="text" id="name" name="name" /></h4>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <h4><strong>電子郵件 </strong><input type="text" name="email" /></h4>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <h4><strong><font color="#ff94b6">連絡電話 </font></strong><input type="text" id="cellphone" name="cellphone" /></h4>
                                </td>
                            </tr>

                        </table>
                        <input class="btn btn-primary btn-xl" type="button" id="ok2" name="ok2" value="確認" />
                        <div id="debug" ></div>
                    </form>
                    <script>
                        
                        $(document).ready(function() {
                            $("#ok2").on("click", function() {
                                if ($("#name").val() == "" || $("#cellphone").val() == "" ) {
                                    $("#debug").html("<br><h3><strong>粉色項目要輸入!!<strong></h3>");
                                }
                                else {
                                    $("#form2").submit();
                                }

                            });
                        });
                    </script>
                    <div>
                    </div>
                </div>
            </div>
    </section>
    
<!--------------------------------------------管理員畫面[加入我們(顯示並可刪除)]------------------------------------------------------------------------>
    <?php } ?>
    <?php 
        if( $id==$row[0] && $id!=NULL) { 
        $sql2="select * from `joinus` ";
        $result2 = mysql_query($sql2);
        //$row2 = mysql_fetch_row($result2);
    ?>
    <section >
        
        <div class="container">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10  text-center">
                    <table class="table table-hover">
                        <thead>
                            <td align="center">
                                <h4><strong><span class="glyphicon glyphicon-bell" aria-hidden="true"></span>&nbsp;時間</strong></h4>
                            </td>
                            <td align="center">
                                <h4><strong><font color="#ff94b6"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;您的姓名</font></strong></h4>
                            </td>
                            <td align="center">
                                <h4><strong><font color="#ff94b6"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;連絡電話</font></strong></h4>
                            </td>
                            <td align="center">
                                <h4><strong><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>&nbsp;電子郵件</strong></h4>
                            </td>
                            <td align="center">
                                <h4><strong><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>&nbsp;刪除</strong></h4>
                            </td>
                        </thead>
                        <?php while($row2 = mysql_fetch_assoc($result2)){ ?>
                        <tr>
                            <td align="center">
                                <h4><?php echo $row2['join_date'];?></h4>
                            </td>
                            <td align="center">
                                <h4 type="text" name="name"><?php echo $row2['join_name'];?></h4>
                            </td>
                        
                        
                            <td align="center">
                                <h4 type="text" name="email"><?php echo $row2["join_cellphone"];?></h4>
                            </td>
                        
                        
                            <td align="center">
                                <h4 type="text" name="cellphone"><?php echo $row2["join_email"];?></h4>
                            </td>
                            
                            <td align="center">
                                <button class="btn btn-primary btn-xl" type="button" id="del" name="del"><a style="color:white" href="join_del.php?jo_id=<?php echo $row2['join_id'];?>">刪除</a></button>
                            </td>
                        </tr>
                    <?php }?>    
                    </table>
                    
                </div>
            </div>
        </div>
        <?php }?>
    </section>

<!--------------------------------------------聯絡我們(顯示)------------------------------------------------------------------------>
    <?php
        $sql3="select * from contact";
        $result3 = mysql_query($sql3);
        $row3 = mysql_fetch_row($result3);
    ?>
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
                <div class="col-lg-8" align="center">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3623.218590882442!2d121.07314621465075!3d24.753693339318758!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346848016c097263%3A0x2a171f1f83f3bac7!2zMzEw5Y-w54Gj5paw56u557ij56u55p2x6Y6u5Lit6IiI6Lev5LiA5q61MTA45be3MTHomZ8!5e0!3m2!1szh-TW!2stw!4v1467621946714"
                        width="900" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3  text-center">
                        <i class="fa  fa-3x sr-contact"><span class="glyphicon glyphicon-file" aria-hidden="true"></span></i>
                        <p>
                            <?php echo $row3[0];?>
                        </p>
                    </div>
                    <div class="col-lg-3  text-center">
                        <i class="fa fa-phone fa-3x sr-contact"></i>
                        <p>
                            <?php echo $row3[1];?>
                        </p>
                    </div>
                    <div class="col-lg-3  text-center">
                        <i class="fa  fa-3x sr-contact"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></i>
                        <p>
                            <?php echo $row3[2];?>
                        </p>
                    </div>
                    <div class="col-lg-3 text-center">
                        <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                        <p>
                            <a style="color:#FFFFFF" href="mailto:<?php echo $row3[3];?>">
                                <?php echo $row3[3];?>
                            </a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-5"></div>
                <div class="col-lg-5">
                    <?php 
                    if( $id==$row[0] && $id!=NULL ) { 
                ?>
                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#contact_modal">編輯</button>
                    <?php }?>
                </div>
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6 text-center">
                        <p>Chungyo Leona © 2016 / <a style="color:#FFFFFF" href="mailto:srt459vn31@gmail.com">srt459vn31@gmail.com</a></p>
                    </div>
                </div>
            </div>
        </section>

<!--------------------------------------------管理員畫面[聯絡我們(編輯)]------------------------------------------------------------------------>
        <div class="modal fade" id="contact_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="contact_process.php" method="POST" id="form3">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title" id="myModalLabel" style="color:#white"><strong>修改簡介</strong></h3>
                        </div>
                        <div class="modal-body">

                            <h3 class="section-heading"><strong>聯絡我們</strong></h3>
                            <hr>
                            <h4>地址<h4>
                    <input class="form-control" type="text" name="ab_address" value="<?php echo $row3[0];?>" />
                    <h4>電話<h4>
                    <input class="form-control" type="text" name="ab_phone" value="<?php echo $row3[1];?>" />
                    <h4>傳真<h4>
                    <input class="form-control" type="text" name="ab_tax" value="<?php echo $row3[2];?>" />
                    <h4>Email<h4>
                    <input class="form-control" type="text" name="ab_email" value="<?php echo $row3[3];?>" />
                    <br>
                    <br>
                  </div>
                  <div class="modal-footer">
                    <input type="submit" onclick="submit3();" class="btn btn-primary"  value="確認">
                  </div>
                </div>
                
           </form>
           <script>
                    function submit3(){
                        
                        form3.submit();
                    }
                </script>
      </div>
    </div>

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
