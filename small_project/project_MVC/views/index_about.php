<?php 
    $row2 = $data[0];
    $id = $data[1];
?>
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10 " align="center">
        <h2 class="section-heading"><strong>公司簡介</strong></h2>
        <hr>
        <h3><?php echo $row2;?></h3>
        <br>
        <br>
        <?php 
            if( $id!=NULL ) { 
        ?>
        <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#about_modal" >編輯</button>
        <?php }?>
    </div>
</div>
        