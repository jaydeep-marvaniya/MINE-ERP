<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    
      <link href="<?php echo $this->config->base_url("assets/bootstrap/css/bootstrap.css"); ?>" rel="stylesheet">
    
    <?php 
	foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo ($file); ?>" />
    <?php endforeach; ?>

	<?php foreach($js_files as $file ): ?>
	<script src="<?php echo ($file); ?>"></script>
	<?php endforeach; ?>


<style type='text/css'>
body
{
    font-family: Arial;
    font-size: 16px;
    margin: 0;
}
a {

    text-decoration: none;
    font-size: 14px;
}
a:hover
{
    text-decoration: underline;
}

#qtytable

{	top:  100px ;
	left : 285px;
	width: 60%;
position: absolute;
}


</style>
</head>


<body>


<!-- Beginning header -->
   
<!-- End of header-->


<div id="qtytable" style="margin-top: 50px;">
        <?php echo $output; ?>
        
    </div>

  
<!-- Beginning footer -->
<div>
		
		</div>
<!-- End of Footer -->
</body>
</html>