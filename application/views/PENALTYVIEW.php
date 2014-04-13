

<?php include 'header.php'; ?>
<?php include 'penaltysidebar.php'; ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>PENALTY  VIEW</title>

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


caption
{
text-align: left;
font-weight: bold;
font-size: 24px;
color: black;
font-family: serif;
padding-bottom: 5px;
	
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

#mainform
{
top:50px;
left:60px; 
}

#triptable
{
position:absolute;
left:270px;
top:126px; 
width:368px

}

</style>
</head>
<body>


<div class="row">
	
	<div class="span5 offset11">
	<form class="well form-inline" name="input" action="/balaraam_mine/penaltycon/penaltyday" method="post"> 
			<input  class="pull-left" name="date" type="date">
			<input class="btn btn-primary pull-right" type="submit"name="submit" value="SUBMIT"  >
	</form>
	</div>
</div>



<div class="row">
<div class="span8 offset4">
<div class="well" ><?php ECHO $table  ?></div>
</div>
</div>


</body>
</html>
