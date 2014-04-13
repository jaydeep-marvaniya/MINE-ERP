<!DOCTYPE html>
<html lang="en">

   
  <head>
    <meta charset="utf-8">
    <title>Mine ERP</title>
 
    <!-- Le styles -->
    <link href="http://localhost/takecat/assets/bootstrap/css/style.css" rel="stylesheet">
  <link href="<?php echo $this->config->base_url("assets/bootstrap/css/bootstrap.css"); ?>" rel="stylesheet">
    
    
    <style type="text/css">
      body {
        background-size:2000px 1200px;
        background-repeat:no-repeat;
        padding-top:40px;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    
    
   
  </head>

  <body>
  <div class="row">
    <div class="span5 offset1" >
    <h1 class="heading">MINE-ERP</h1>
    <h3> An ERP for mining business.</h3>
    </div>
      <div class="span7 pull-right">
      
         
   		<form name="form1" method="post" action="/balaraam_mine/VerifyLogin/index">
				<fieldset class="form">
					<p>
						<label for="username">Username:</label> <input name="username"
							id="username" type="text" required value="">
					</p>
					<p>
						<label for="password">Password:</label> <input name="password"
							id="password" type="password" required>
					</p>
					<button type="submit" class="btn btn-success" name="Submit">
						<img src="<?php echo $this->config->base_url("assets/key.png");?>"
							alt="Announcement">Login
					</button>


				</fieldset>


			</form>
		 

      
      </div>
  </div>

<hr> 
<div class="row"> 
  <div class="container span3 offset1">
    <div id="mainwrapper">
    <!-- Image Caption 3 -->
     <div id="box-3" class="box">
        <img src="http://localhost/takecat/assets/Images/5.jpg"/>
        <span class="caption fade-caption">
        <h3>Official Records</h3>
        <p>MINE-ERP helps you to organise your data in official format with all securities.</p>
        </span>
      </div>
    </div>
  </div>

  <div class="container span3">
    <div id="mainwrapper">
    <!-- Image Caption 4 -->
    <div id="box-4" class="box">
      <img src="http://localhost/takecat/assets/Images/4.jpg"/>
      <span class="caption slide-caption">
      <h3>Web-based ERP</h3>
      <p> Harness the power of web for easy management of your work</p>
      </span>
    </div>
  </div>
  </div>
  <div class="container span3">
    <div id="mainwrapper">
    <!-- Image Caption 5 -->
    <div id="box-5" class="box">
      <div class="rotate">
       <img src="http://localhost/takecat/assets/Images/3.jpg"/>
       <span class="caption rotate-caption">
        <h3>Sharing and Collaboration</h3>
        <p>Share across multiple persons without complexity of spreadsheets</p>
        </span>
      </div>
    </div>
    </div>
  </div>

   
    </div> 
    <div class="row pull-right">
    <p> By G-17 group for Web-programming 2013  </p>
    </div>




<script src="http://localhost/takecat/assets/bootstrap/js/bootstrap.js"></script> 
 <script src="http://localhost/takecat/assets/bootstrap/jquery.min.js"></script> 
 
 </body>

</html>
