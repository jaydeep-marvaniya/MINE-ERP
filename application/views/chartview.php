<?php include 'header.php'; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Quantity Chart</title>
	<style type="text/css">
		body
		{
			margin: 0px;
		
		}
		a, a:link, a:visited {
			color: #444;
			text-decoration: none;
		}
		a:hover {
			color: #000;
		}
		
		#g_render {
			margin-top:50px ;
			width: 100%;
			}
			
		.highcharts-container
		{
			top: 100px;
			left: 250px;
		}
			
		li {
			margin-bottom: 1em;
		}
	</style>
	
	  <link href="<?php echo $this->config->base_url("assets/bootstrap/css/bootstrap.css"); ?>" rel="stylesheet">
	
	<script type="text/javascript" src=" <?php echo $this->config->base_url("assets/jquery-1.4.4.min.js");?>"></script>
	<script type="text/javascript" src=" <?php echo $this->config->base_url("assets/highcharts.js");?>"></script>
</head>
<body>
	<div id="g_render" >
		<?php if (isset($charts)) echo $charts; ?>
	</div>
</body>
</html>