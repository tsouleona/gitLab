<!DOCTYPE html>
<html lang="en">
<head>
  <title>Live Cropping Demo</title>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
  <script src="/gitlab/small_project/project_MVC/views/vendor/jquery/jquery.js"></script>
  <script src="/gitlab/small_project/project_MVC/views/js/jquery.Jcrop.js"></script>
  <link rel="stylesheet" href="/gitlab/small_project/project_MVC/views/css/main.css" type="text/css" />
  <link rel="stylesheet" href="/gitlab/small_project/project_MVC/views/css/demos.css" type="text/css" />
  <link rel="stylesheet" href="/gitlab/small_project/project_MVC/views/css/jquery.Jcrop.css" type="text/css" />

<script type="text/javascript">

jQuery(function($){

    var jcrop_api;

    $('#cropbox').Jcrop({
      onChange:   showCoords,
      onSelect:   showCoords,
      onRelease:  clearCoords
    },function(){
      jcrop_api = this;
    });

    $('#coords').on('change','input',function(e){
      var x1 = $('#x1').val(),
          x2 = $('#x2').val(),
          y1 = $('#y1').val(),
          y2 = $('#y2').val();
      jcrop_api.setSelect([x1,y1,x2,y2]);
    });

  });

  // Simple event handler, called from onChange and onSelect
  // event handlers, as per the Jcrop invocation above
  function showCoords(c)
  {
    $('#x1').val(c.x);
    $('#y1').val(c.y);
    $('#x2').val(c.x2);
    $('#y2').val(c.y2);
    $('#w').val(c.w);
    $('#h').val(c.h);
  };
  
  function clearCoords()
  {
    $('#coords input').val('');
  };
  

  function checkCoords()
  {
    if (parseInt($('#w').val())) return true;
    alert('Please select a crop region then press submit.');
    return false;
  };

</script>

<style type="text/css">
  #target {
    background-color: #ccc;
    width: 650px;
    height: 490px;
    font-size: 24px;
    display: block;
  }


</style>

</head>
<body>

    <div class="container">
        
        <div class="row">
          
            <div class="span12">

            		<!-- This is the image we're attaching Jcrop to -->
            		<img src="<?php echo '/gitlab/small_project/project_MVC/views/ok_photo/'.$_GET['id'].'.jpg';?>" id="cropbox"  />
            
            		<!-- This is the form that our event handler fills -->
            		<form id = "coords"  action="https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/display_2/crop_photo" method="post" onsubmit="return checkCoords();">
            			<input type="hidden" id="id" name="id" value="<?php echo $_GET['id'];?>" />
            			<input type="hidden" id="page" name="page" value="<?php echo $_GET['p'];?>" />
            			<input type="hidden" id="x1" name="x1" />
            			<input type="hidden" id="y1" name="y1" />
            		  <input type="hidden" id="x2" name="x2" />
            			<input type="hidden" id="y2" name="y2" />
            			<input type="hidden" id="w" name="w" />
            			<input type="hidden" id="h" name="h" />
            			<input type="submit" id = "ok" value="Crop Image" class="btn btn-large btn-inverse" />
            		</form>
            	<!--</div>-->
        	</div>
        	<div class="row" >
            <button class="btn btn-large btn-inverse"><a style="color:white" href="https://lab1-srt459vn.c9users.io/gitlab/small_project/project_MVC/display/display?p=<?php echo $_GET['p'];?>">不需要裁切</button>
          </div>
    	</div>
	</div>
</body>

</html>