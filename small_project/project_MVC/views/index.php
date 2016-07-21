<!DOCTYPE html>
<?php 
    session_start();
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
    <link href="views/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="views/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="views/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="views/css/creative.min.css" rel="stylesheet">
    <link href="views/css/creative.css" rel="stylesheet">
    <!-- Jquery-->
    <script src="views/vendor/jquery/jquery.js"></script>
    
     

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
                <a class="navbar-brand page-scroll" href="https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/index">沅淯駿營造有限公司</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

                    <li>
                        <a class="page-scroll" href="#contact">
                            <h4><strong>聯絡我們</strong></h4></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="display/display">
                            <h4><strong>實績展示</strong></h4></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="factory/factory">
                            <h4><strong>廠商招募</strong></h4></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="joinus/joinus">
                            <h4><strong>加入我們</strong></h4></a>
                    </li>
<!--------------------------------------------登錄判斷------------------------------------------------------------------------>
                    <?php 
                        $id = $_SESSION["username"];
                        if( $id!=NULL ) { 
                    ?>
                    <li>
                        <button type="button" class="btn btn-primary btn-lg"><a style="color:white" href="index/login_out">管理員登出</a></button>
                    </li>
                    <?php } ?>

                    <?php 
                        if( $id==NULL ) { 
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
        <div class="modal-dialog modal-sm" role="document">
            <form action="index/login_in" method="POST" id="form1">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title" id="myModalLabel" style="color:#f05f40"><strong>管理員登錄</strong></h3>
                    </div>
                    <div class="modal-body">

                        <h4><strong>帳號 </strong><input type="text" name="username" id="username" /></h4>
                        <h4><strong>密碼 </strong><input  type="password" name="password" id="password" /></h4>
                        <div id="check_login"></div>
                    </div>
                    <div class="modal-footer">

                        <input type="submit" class="btn btn-primary" name="login" id="login" value="確認" />
                    </div>
                </div>
            </form>
        </div>
    </div><!--model end-->

<!--------------------------------------------header(顯示)------------------------------------------------------------------------>    
    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1 ><strong>專業&nbsp;&nbsp;&nbsp;勤懇&nbsp;&nbsp;&nbsp;誠信</strong></h1>
                <hr>

                <a href="#about" class="btn btn-primary btn-xl page-scroll">find out more</a>
            </div>
        </div>
    </header>
    
<!--------------------------------------------公司簡介(顯示)------------------------------------------------------------------------>
    <?php
    
        $row2 = $data[0];
    ?>
    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10 " align="center">
                    <h2 class="section-heading"><strong>公司簡介</strong></h2>
                    <hr>
                    <h3><?php echo $row2[0]["intro_data"];?></h3>
                    <br>
                    <br>
<!--------------------------------------------管理員畫面[公司簡介(編輯)]------------------------------------------------------------------------>    
                    <?php 
                        if( $id!=NULL ) { 
                    ?>
                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#about_modal" >編輯</button>
                    <?php }?>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="about_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
           <form action="index/insert_about" method="POST" id="form2">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="myModalLabel" style="color:#white"><strong>修改簡介</strong></h3>
                  </div>
                  <div class="modal-body">
                        
                    <h3 class="section-heading"><strong>公司簡介</strong></h3>
                    <hr>
                    
                    <textarea cols="50" class="form-control" name="about_data"><?php echo $row2[0]["intro_data"];?></textarea>
                    <br>
                    <br>
                  </div>
                  <div class="modal-footer">
                    <button  onclick="submit();" class="btn btn-primary" name="login">確認</button>
                  </div>
                </div>
                
           </form>
           <script>
                    function submit(){
                        
                        form2.submit();
                    }
                </script>
      </div>
    </div><!--model end-->
    
<!--------------------------------------------服務項目(顯示)------------------------------------------------------------------------>    
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"><strong>服務項目</strong></h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x text-primary sr-icons"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></i>
                        <h3><strong>土木工程</strong></h3>
                        <!--<p class="text-muted">.......</p>-->
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x text-primary sr-icons"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></i>
                        <h3><strong>維修保固</strong></h3>
                        <!--<p class="text-muted">.......</p>-->
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-newspaper-o text-primary sr-icons"></i>
                        <h3><strong>鋼構工程</strong></h3>
                        <!--<p class="text-muted">.......</p>-->
                    </div>
                </div>

            </div>
        </div>
    </section>
    
<!--------------------------------------------聯絡我們(顯示)------------------------------------------------------------------------>    
    <?php
        $row3 = $data[1];
        
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
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3623.218590882442!2d121.07314621465075!3d24.753693339318758!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346848016c097263%3A0x2a171f1f83f3bac7!2zMzEw5Y-w54Gj5paw56u557ij56u55p2x6Y6u5Lit6IiI6Lev5LiA5q61MTA45be3MTHomZ8!5e0!3m2!1szh-TW!2stw!4v1467621946714" width="900" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-3  text-center">
                    <i class="fa  fa-3x sr-contact"><span class="glyphicon glyphicon-file" aria-hidden="true"></span></i>
                    <p><?php echo $row3[0]["con_address"];?></p>
                </div>
                <div class="col-lg-3  text-center">
                    <i class="fa fa-phone fa-3x sr-contact"></i>
                    <p><?php echo $row3[0]["con_phone"];?></p>
                </div>
                <div class="col-lg-3  text-center">
                    <i class="fa  fa-3x sr-contact"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></i>
                    <p><?php echo $row3[0]["con_tax"];?></p>
                </div>
                <div class="col-lg-3 text-center">
                    <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                    <p><a  style="color:#FFFFFF" href="mailto:<?php echo $row3[0]["con_email"];?>"><?php echo $row3[0]["con_email"];?></a></p>
                </div>
            </div>
            <div class="col-lg-5"></div>
            <div class="col-lg-5">
<!--------------------------------------------管理員畫面[聯絡我們(編輯)]------------------------------------------------------------------------>    
                <?php 
                    if($id!=NULL ) { 
                ?>
                <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#contact_modal" >編輯</button>
                <?php }?>
            </div>
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6 text-center">
                <p>Chungyo Leona © 2016 / <a  style="color:#FFFFFF" href="mailto:srt459vn31@gmail.com">srt459vn31@gmail.com</a></p>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="contact_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
           <form action="index/insert_contact" method="POST" id="form3">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="myModalLabel" style="color:#white"><strong>修改簡介</strong></h3>
                  </div>
                  <div class="modal-body">
                        
                    <h3 class="section-heading"><strong>聯絡我們</strong></h3>
                    <hr>
                    <h4>地址<h4>
                    <input class="form-control" type="text" name="ab_address" value="<?php echo $row3[0]["con_address"];?>" />
                    <h4>電話<h4>
                    <input class="form-control" type="text" name="ab_phone" value="<?php echo $row3[0]["con_phone"];?>" />
                    <h4>傳真<h4>
                    <input class="form-control" type="text" name="ab_tax" value="<?php echo $row3[0]["con_tax"];?>" />
                    <h4>Email<h4>
                    <input class="form-control" type="text" name="ab_email" value="<?php echo $row3[0]["con_email"];?>" />
                    <br>
                    <br>
                  </div>
                  <div class="modal-footer">
                    <button onclick="submit3();" class="btn btn-primary" >確認</button>
                  </div>
                </div>
                
           </form>
           <script>
                    function submit3(){
                        
                        form3.submit();
                    }
                </script>
      </div>
    </div><!--model end-->
    <!-- Bootstrap Core JavaScript -->
    <script src="views/vendor/bootstrap/js/bootstrap.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="views/vendor/scrollreveal/scrollreveal.js"></script>
    
    <script src="views/vendor/magnific-popup/jquery.magnific-popup.js"></script>

    <!-- Theme JavaScript -->
    <script src="views/js/creative.js"></script>

</body>

</html>
