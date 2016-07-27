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
    <link href="/gitlab/small_project/project_MVC/views/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/gitlab/small_project/project_MVC/views/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="/gitlab/small_project/project_MVC/views/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="/gitlab/small_project/project_MVC/views/css/creative.min.css" rel="stylesheet">
    <link href="/gitlab/small_project/project_MVC/views/css/creative.css" rel="stylesheet">
    <!-- Jquery-->
    <script src="/gitlab/small_project/project_MVC/views/vendor/jquery/jquery.js"></script>
    

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
                <a class="navbar-brand page-scroll" href="https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/index"></h4>沅淯駿營造有限公司</h4></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

                    <li>
                        <a class="page-scroll" href="#contact"><h4><strong>聯絡我們</strong></h4></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/display/display"><h4><strong>實績展示</strong></h4></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/factory/factory">
                            <font color="#00ffff"><h4><strong>廠商招募</strong></h4></font>
                        </a>
                    </li>
                    <li>
                        <a class="page-scroll" href="https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/joinus/joinus"><h4><strong>加入我們</strong></h4></a>
                    </li>
<!--------------------------------------------登錄判斷------------------------------------------------------------------------>
                    <?php 
                       
                        $id = $_SESSION["username"];
                        
                    ?>
                    <?php 
                        if( $id!=NULL ) { 
                    ?>
                    <li>
                        <button type="button" class="btn btn-primary btn-lg"><a style="color:white" href="https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/index/login_out">管理員登出</a></button>
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
            <form action="https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/index/login_in" method="POST" id="form1">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title" id="myModalLabel" style="color:#f05f40"><strong>管理員登錄</strong></h3>
                    </div>
                    <div class="modal-body">

                        <h4><strong>帳號 </strong><input type="text" name="username" id="username" /></h4>
                        <div id="danger1"></div>
                        <h4><strong>密碼 </strong><input  type="password" name="password" id="password"/></h4>
                        <div id="danger2"></div>
                    </div>
                    <div class="modal-footer">

                        <input type="button" class="btn btn-primary" name="login" id="login" value="確認" />
                    </div>
                </div>
            </form>
            <script>
                $("#login").on("click",function(){
                    if($("#username").val()=="")
                    {
                        $("#danger1").html('<h4 style="color:red"><strong>尚未輸入帳號</strong></h4>');
                    }
                    if($("#password").val()=="")
                    {
                        $("#danger2").html('<h4 style="color:red"><strong>尚未輸入密碼</strong></h4>');
                    }
                    else
                    {
                        $("#form1").submit();                
                        
                    }
                })
            </script>
        </div>
    </div><!--model end-->
    
<!--------------------------------------------header(顯示)------------------------------------------------------------------------>    
    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1 ><strong>專業&nbsp;&nbsp;&nbsp;勤懇&nbsp;&nbsp;&nbsp;誠信</strong></h1>
                <!--<hr>-->

                <!--<a href="#factory" class="btn btn-primary btn-xl page-scroll">find out more</a>-->
            </div>
        </div>
    </header>
    
<!--------------------------------------------廠商招募(輸入資料)------------------------------------------------------------------------>    
    <?php 
        if( $id==NULL ) { 
    ?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6  text-center" border="1">
                    <form action="https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/factory/factory_insert" method="POST" id="form2">
                        <table class="table table-hover">
                            <thead>
                                <td align="center">
                                    <h4><strong>貴公司若有意承攬本公司的工程，請於下列欄位填寫資料，<font color="#ff94b6">"粉色項目"</font> 請務必填寫，我們將會盡速與您聯絡!!</strong></h4></td>
                            </thead>
                            <tr>
                                <td align="center">
                                    <h4><strong><font color="#ff94b6">公司名稱 </font></strong></h4>
                                    <input class="form-control" type="text" name="name" id="name" />
                                    <div id="factory1"></div>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <h4><strong>電子郵件 </strong></h4>
                                    <input class="form-control" type="text" name="email" id="email" />
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <h4><strong><font color="#ff94b6">公司電話 </font></strong></h4>
                                    <input class="form-control" type="text" name="phone" id="phone" />
                                    <div id="factory2"></div>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <h4><strong>公司傳真 </strong></h4>
                                    <input class="form-control" type="text" name="tax" id="tax" />
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <h4><strong><font color="#ff94b6">聯絡人 </font></strong></h4>
                                    <input class="form-control" type="text" name="people" id="people" />
                                    <div id="factory3"></div>
                            </tr>
                            <tr>
                                <td align="center">
                                    <h4><strong><font color="#ff94b6">聯絡電話 </font></strong></h4>
                                    <input class="form-control" type="text" name="cellphone" id="cellphone" />
                                    <div id="factory4"></div>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <h4><strong>公司地址 </strong></h4>
                                    <input class="form-control" type="text" name="address" id="address" />
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <h4><strong>公司網址 </strong></h4>
                                    <input class="form-control" type="text" name="url" id="url" />
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <h4><strong><font color="#ff94b6">經營項目 </font></strong></h4>
                                    <textarea cols="50" class="form-control" name="data" id="data"></textarea>
                                    <div id="factory5"></div>
                                </td>
                            </tr>
                        </table>
                        <input class="btn btn-primary btn-xl" type="button" id="ok" name="ok" value="確認" />
                        <div id="debug"></div>
                    </form>
    
    <!--------------------------------------------檢查必要的資料有沒有輸入------------------------------------------------------------------------>    
                    <script> 
                        $(document).ready(function() {
                            $("#ok").on("click", function() {
                                if ($("#name").val() == ""){
                                    
                                    $("#factory1").html('<br><h4 style="color:red"><strong>公司名稱尚未輸入<strong></h4>');
                                }
                                
                                if ($("#phone").val() == ""){
                                    
                                    $("#factory2").html('<br><h4 style="color:red"><strong>公司電話尚未輸入<strong></h4>');
                                }
                                
                                if ($("#people").val() == ""){
                                    
                                    $("#factory3").html('<br><h4 style="color:red"><strong>連絡人尚未輸入<strong></h4>');
                                }
                                
                                if ($("#cellphone").val() == ""){
                                    
                                    $("#factory4").html('<br><h4 style="color:red"><strong>聯絡電話尚未輸入<strong></h4>');
                                }
                                
                                if ($("#data").val() == ""){
                                    
                                    $("#factory5").html('<br><h4 style="color:red"><strong>經營項目尚未輸入<strong></h4>');
                                }
                                
                                else{
                                    $("#form2").submit();
                                }
                            })
                        })
                        
                    </script>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>

<!--------------------------------------------管理員畫面[廠商招募(顯示並且可以刪除)]------------------------------------------------------------------------>    
    <?php
        $pagecount = $data[0];
        $row2 = $data[1];
        $row4 = $data[2];
        $row5 = $data[3];
    
    if($id!=NULL ) { 
    ?>
        <section >
            
            <div class="container">
                <div class="row">
                    <div class="col-lg-12  text-center" border="1">
                        <?php 
                        
                        if(empty($row4)){ ?>
                            <h3 style="color:#ff94b6"><strong>目前沒有資料</strong></h3>
                        <?php }?>
                        <?php 
                            if(!empty($row4)){?>
                            
                            <table class="table table-hover">
                                <thead>
                                    <td align="center">
                                       <h4><strong><span class="glyphicon glyphicon-bell" aria-hidden="true"></span>&nbsp;時間</strong></h4>
                                    </td>
                                    <td align="center">
                                       <h4><strong><font color="#ff94b6"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;公司名稱</font></strong></h4>
                                    </td>
                                    <td align="center">
                                       <h4><strong><font color="#ff94b6"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;聯絡人</font></strong></h4>
                                    </td>
                                    <td align="center">
                                       <h4><strong><font color="#ff94b6"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>&nbsp;聯絡電話</font></strong></h4>
                                    </td>
                                    <td align="center">
                                       <h4><strong><font color="#ff94b6"><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span>&nbsp;公司電話</font></strong></h4>
                                    </td>
                                    <td align="center">
                                       <h4><strong><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>&nbsp;刪除</strong></h4>
                                    </td>
                                    
                                </thead>
                                
                                <?php 
                                     if($_GET['p']==NULL)
                                    {
                                        $_GET['p'] = 0;
                                    }
                                    $page = (int)$_GET['p'];
                                    $page1 = $page + 1;
                                    
                                    for($j = $page*9 ; $j < $page1*9 ;$j++){
                                        
                                        if($row2[$j]['fac_id'] == NULL)
                                            break;
                                        
                                        else{
                                ?>
                                            <tr>
                                                <td align="center">
                                                   <h4><?php echo $row2[$j]['fac_date'];?></h4>
                                                </td>
                                            
                                                <td align="center">
                                                   <button class="btn btn-info" data-toggle="modal" data-target="#look<?php echo $row2[$j]['fac_id'];?>"><?php echo $row2[$j]['fac_name'];?></button>
                                                </td>
                                            
                                                <td align="center">
                                                    <h4><?php echo $row2[$j]['fac_people'];?></h4>
                                                </td>
                                                <td align="center">
                                                    <h4><?php echo $row2[$j]['fac_cellphone'];?></h4>
                                                </td>
                                                <td align="center">
                                                    <h4><?php echo $row2[$j]['fac_phone'];?></h4>
                                                </td>
                                                <td align="center">
                                                    <button class="btn btn-warning " type="button" id="del" name="del"><a style="color:white" href="https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/factory/factory_delete?fa_id=<?php echo $row2[$j]['fac_id'];?>&p=<?php echo $_GET['p'];?>" >刪除</a></button>
                                                    
                                                </td>
                                            </tr>
                                        <?php }?>
                                    <?php }?>
                                </table>
                                
                                
<!--------------------------------------------管理員畫面[廠商招募(顯示細節 model)]------------------------------------------------------------------------>    
                               <?php 
                                     for($j = $page*9 ; $j < $page1*9 ;$j++){
                                        
                                        if($row5[$j]['fac_id'] == NULL)
                                            break;
                                        
                                        else{
                                     ?>
                                    
                                            <div class="modal fade" id="look<?php echo $row5[$j]['fac_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h3 class="modal-title" ><strong>相關內容</strong></h3>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table table-hover">
                                                                <thread>
                                                                    <td align="center">
                                                                        <h4><strong><?php echo $row5[$j]['fac_name'];?></strong></h4>
                                                                    </td>
                                                                </thread>
                                                                <tr>
                                                                    <td align="center">
                                                                        <h4><strong><span class="glyphicon glyphicon-print" aria-hidden="true"></span>&nbsp;公司傳真</strong></h4>
                                                                        <h4 name="tax2" id="tax2" ><?php echo $row5[$j]['fac_tax'];?></h4>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <h4><strong><span class="glyphicon glyphicon-road" aria-hidden="true"></span>&nbsp;公司地址</strong></h4>
                                                                        <h4 name="address2" id="address2" ><?php echo $row5[$j]['fac_address'];?></h4>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <h4><strong><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp;公司網址</strong></h4>
                                                                        <h4 name="url2" id="url2" ><?php echo $row5[$j]['fac_url'];?></h4>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <h4><strong><font color="#ff94b6">經營項目 <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>&nbsp;</font></strong></h4>
                                                                        <textarea cols="50" cols="50" class="form-control" ><?php echo $row5[$j]['fac_data'];?></textarea>
                                                                    </td>
                                                                </tr>
                                                            </table>    
                                    
                                                        </div>
                                                        <div class="modal-footer">    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!--model end-->
                                        <?php }?>
                                <?php }?>
                            
                            <br>
                                
                            <div>
                            <?php for($i = 0;$i < $pagecount ;$i++){?>
                                
                                <button class="btn btn-danger btn-xl"><a style="color:white" href="?p=<?php echo $i;?>"><?php echo $i + 1;?></a></button></li>
                                    
                                
                            <?php }?>
                            </div>
                            <br>
                        <?php }?>
                            
                    </div>
                </div>
            </div>
            
            
        </section>

        <?php } ?>
        
<!--------------------------------------------聯絡我們(顯示)------------------------------------------------------------------------>
        <?php
        $row3 = $data[4];
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
                    if( $id!=NULL ) { 
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
        <div class="modal fade" id="contact_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
           <form action="https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/factory/insert_contact" method="POST" id="form3">
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
    <script src="/gitlab/small_project/project_MVC/views/vendor/bootstrap/js/bootstrap.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="/gitlab/small_project/project_MVC/views/vendor/scrollreveal/scrollreveal.js"></script>
    
    <script src="/gitlab/small_project/project_MVC/views/vendor/magnific-popup/jquery.magnific-popup.js"></script>

    <!-- Theme JavaScript -->
    <script src="/gitlab/small_project/project_MVC/views/js/creative.js"></script>
    
    

</body>

</html>