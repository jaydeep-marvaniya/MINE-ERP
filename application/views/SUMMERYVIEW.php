<?php include 'header.php'; ?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>SUMMERY VIEW</title>

  <link href="<?php echo $this->config->base_url("assets/bootstrap/css/bootstrap.css"); ?>" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo $this->config->base_url("assets/header_files/css3menu1/sidestyle.css");?> " type="text/css" />
<link href=" <?php echo $this->config->base_url("assets/tablecloth/tablecloth.css");?>" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src=" <?php echo $this->config->base_url("assets/tablecloth/tablecloth.js");?>"></script>



<style type="text/css">

.well {
min-height: 35px;
padding: 5px;
margin-bottom: 5px;
background-color: rgba(166, 166, 167, 0.72);
border: 0px solid rgb(180, 100, 100);
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
border-radius: 12px;
-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
-moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
box-shadow: inset 0px 13px 18px 0px rgba(253, 253, 253, 0.73);
}


body
{
   text-align: center;
   margin-top: 100px;
   background-color: #E6E6FA;
   color: #000000;
}

a
{
   color: #C8D7EB;
   text-decoration: underline;
}
a:visited
{
   color: #C8D7EB;
}
a:active
{
   color: #C8D7EB;
}
a:hover
{
   color: #0000FF;
   text-decoration: underline;
}
h2
{
   font-family: Arial;
   font-size: 27px;
   font-weight: bold;
   font-style: normal;
   text-decoration: none;
   color: #000000;
   margin: 0 0 0 0;
   padding: 0 0 0 0;
   display: inline;
}
caption
{
text-align: left;
font-weight: bold;
font-size: 24px;
color: black;
font-family: serif;
padding-bottom: 5px;
	
}


#tableTARGET
{
position:absolute;
left:600px;
top:250px; 
width:390px

}
#tableTARGETPARDAY
{
position:absolute;
left:600px;
top:105px; 
width:368px

}
#tableTRIPS
{
position:absolute;
left:200px;
top:250px; 
width:390px

}







</style>
</head>
<body>


<div>

<div class="row" style="margin-top:20px;">
	
	<div class="span5 offset11">
	<form class="well form-inline" name="input" action="/balaraam_mine/qtycon/qtyday" method="post"> 
			<input  class="pull-left" name="date" type="date" >
			<input class="btn btn-primary pull-right" type="submit"name="submit" value="SUBMIT"  >
	</form>
	</div>
</div>

<ul id="css3menu2" class="topmenu">
	<li class="topfirst"><a href=" <?php echo $this->config->base_url("summery/summerynow");?>" style="width:185px;"><img src="  <?php echo $this->config->base_url("assets/header_files/css3menu1/blue-zoom in.png");?>">Search Records</a></li>
	<li class="toplast"><a href="<?php echo $this->config->base_url("penaltycon/MONTHLYedit")?>" style="width:185px;"><img src= "  <?php echo $this->config->base_url("assets/header_files/css3menu1/blue-stats 3.png");?> ">EDIT MONTHLY DATA</a></li>
</ul>


<div class="row">

	<div class="span6 offset3">
	<div class="well"><?php ECHO $tableTARGET ?></div>
	</div>
	
	<div class="span6 offset1">
	<div class="well"><?php ECHO $tableTRIPS  ?></div>
	</div>
	
</div>

<div class="row">
	<div class="span6 offset3">
	<div class="well"  ><?php ECHO $tableTARGETPARDAY ?></div>
</div>


<div class= "span6 offset1">
<div class="well">
<table >
	<caption> <h3>  SUMMARY OF PROJECT  </h3>	</caption>
<tr>
	<th>
	QUANITITY TILL NOW
	</th>
	
	<td><?php echo  $QTYUPTODATE['TOTAL_QUANTITY_TILL_NOW']; ?>
	</td>
	
</tr>

<tr>
	<th>
	TOTAL TRIPS TILL NOW
	</th>

	<td>
<?php echo  $TRIPSUPTODATE['TOTAL_TRIPS_TILL_NOW']; ?>
	</td>
</tr>

<tr>
	<th>
NEW DIESEL TILL NOW
	</th>

	<td>
<?php echo  $NEWDIESELUPTODATE['TOTAL_NEW_DIESEL_TILL_NOW']; ?>
	</td>
</tr>

<tr>
	<th>
NEW DIESEL TILL NOW
	</th>

	<td>
<?php echo  $CONSDIESELUPTODATE['TOTAL_CONS_DIESEL_TILL_NOW']; ?>
	</td>
</tr>
</table>
</div>


</div>
</div>
</div>

<script src="<?php echo $this->config->base_url("assets/bootstrap/jquery.min.js") ?>"></script> 
 <script src="<?php echo $this->config->base_url("assets/bootstrap/js/bootstrap.js") ?>"></script> 

</body>
</html>