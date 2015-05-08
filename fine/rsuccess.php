<?php
	session_start();
	
	// Redirect to login.php if this page is directly accessed
	// As this page requires login
	if(!isset($_SESSION['uname']))
		header("location:login.php");
	
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PHA-Profile Success</title>

    <!-- Bootstrap core CSS -->
    <link href="./bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Custom styles for this template -->
    <link href="./css/custom2.css" rel="stylesheet">
	
	<style>
		/* enable absolute positioning */
		.inner-addon { 
			position: relative; 
		}

		/* style icon */
		.inner-addon .glyphicon {
		  position: absolute;
		  padding: 10px;
		  pointer-events: none;
		}

		/* align icon */
		.left-addon .glyphicon  { left:  0px;}
		.right-addon .glyphicon { right: 0px;}

		/* add padding  */
		.left-addon input  { padding-left:  30px; }
		.right-addon input { padding-right: 30px; }

		.custom1 {
			width: 250px !important;
		}

		.custom2 {
			width: 200px !important;
		}
	</style>
	<script>	
		
		function bigImg(x) {
			x.style.height = "60px";
			x.style.width = "70px";
		}

		function normalImg(x) {
			x.style.height = "50px";
			x.style.width = "60px";
		}
	</script>
	
  </head>

  <body>
    <!-- Begin page content -->
    <div class="container custom-center">
		<div class="row">		
			<div class="col-md-6 col-md-offset-3">		

				<div class="container-fluid">			
					<a class="navbar-brand" href="index.php"><img onmouseover="bigImg(this)" onmouseout="normalImg(this)" src="./img/logo_s.png" height="50px" width="60px"></a>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="landlord.php"><img border="0" src="./img/menu.png" height="50px" width="60px"></a>
							<ul class="dropdown-menu">
								<li><a href="viewpost.php">View Posts</a></li>
								<li><a href="logout.php">Sign out</a></li> 
							</ul>
						</li>
					</ul>
				</div>

				<hr style="color:#0000FF; background-color:#0000FF; height:5px; border:none;">
				<h1 style="font-size:30px;font-family: Berlin Sans FB; color:black;">Your Profile Has been Successfully Created</h1>
				<hr style="color:#0000FF; background-color:#0000FF; height:5px; border:none;">
			</div>

			<div class="col-md-3">&nbsp;</div>

		</div>	  
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="./bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
  </body>
</html>
