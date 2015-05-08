<?php
	session_start();
	// Redirect to login.php if this page is directly accessed
	// As this page requires login
	if(!isset($_SESSION['uname']))
		header("location:login.php");	
	date_default_timezone_set("America/Denver");
	$valmsg = "";
	$uname = $_SESSION['uname'];
	$animaltype = "";
	
	// When the submit button is pressed
	if(isset($_POST['submit'])){
		//Fetching variables of the form
		$animaltype = implode(", ", $_POST['animaltype']);
		$rentprice = $_POST['rentprice'];
		
		// If  Other Animal check box is selected
		if($_POST['otheranimaltype'] == "OtherAnimal") {			
			if($animaltype == "")
				$animaltype = $_POST['otherani'];
			else
				$animaltype = $animaltype . ", " . $_POST['otherani'];
		}
	
		$img = "";
		$cur_date = date("Y-m-d");		
		
		// If animal type is not selected
		if($animaltype == "") {
			$valmsg = "Please Select an animal type. Try again";  
		}else {
			require_once("./include/db_const.php");
			$conn = new mysqli($servername,$username,$password,$dbname);
			
			# check connection
			if ($conn->connect_errno) {
				$valmsg = "Database Connection error. Try again";
			}else {
				//Insert data into renter
				$result = $conn->query("INSERT INTO renter(uname, dateofposting, rentpermonth, animaltypes) values ('$uname', '$cur_date', '$rentprice','$animaltype')");
				$conn->close();
				header("location:rsuccess.php");			
			}							
		}
	}	
	
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PHA-New Profile</title>

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
							<a class="dropdown-toggle" data-toggle="dropdown" href="#"><img border="0" src="./img/menu.png" height="50px" width="60px"></a>
							<ul class="dropdown-menu">
								<li><a href="viewpost.php">View Posts</a></li>
								<li><a href="logout.php">Sign out</a></li> 
							</ul>
						</li>
					</ul>
				</div>

				<hr style="color:#0000FF; background-color:#0000FF; height:5px; border:none;">
				<h1 style="font-size:30px;font-family: Berlin Sans FB; color:black;">Pet Housing Specifications</h1>
				<hr style="color:#0000FF; background-color:#0000FF; height:2px; border:none; width:95%">
				
				<form role="form" method="post" enctype="multipart/form-data">
					<div class="panel panel-primary">
					<div class="panel-body tleft">					
					<table style="width:90%">
						<tr>
							<td style="width:50%;text-align:center;padding-left:50px;" colspan="2"><h3>Animal Type</h3></td>
						</tr>
						<tr>
							<td style="width:50%;text-align:left;padding-left:50px;"><label class="checkbox"><input type="checkbox" name="animaltype[]" value="Dog">Dog</label></td>
							<td style="text-align:left;padding-left:50px;"><label class="checkbox"><input type="checkbox" name="animaltype[]" value="All Small Animals">Small(Chinchilla, <br>Ferret, Cerbil, <br>Guinea Pig, Harmster, <br>Mice, Rabbit, Rat)</label></td>
						</tr>
						<tr>
							<td style="width:50%;text-align:left;padding-left:50px;"><label class="checkbox"><input type="checkbox" name="animaltype[]" value="Cat">Cat</label></td>
							<td style="text-align:left;padding-left:50px;"><label class="checkbox"><input type="checkbox" name="animaltype[]" value="Fish">Fish</label></td>
						</tr>
						<tr>
							<td style="width:50%;text-align:left;padding-left:50px;"><label class="checkbox"><input type="checkbox" name="animaltype[]" value="Bird">Bird</label></td>
							<td style="text-align:left;padding-left:50px;"><label class="checkbox"><input type="checkbox" name="animaltype[]" value="Reptile">Reptile</label></td>
						</tr>
						<tr>
							<td style="width:50%;text-align:left;padding-left:50px;"><label class="checkbox"><input type="checkbox" name="otheranimaltype" value="OtherAnimal">Other Animal</label></td>
							<td style="text-align:left;padding-left:50px;"><input type="text" id="otherani" name="otherani" class="form-control input-md" placeholder="Other Animal Typehere"></td>
						</tr>
					</table>
					</div></div>
					
					<input type="text" id="rentprice" name="rentprice" class="form-control input-lg" placeholder="Rental Price/Per Month" required>
					<br>
					<button type="submit" class="btn btn-primary btn-lg custom1" name="submit">
						Submit
					</button>
	 
					<?php 
						if($valmsg != "")
							echo "<h5 style='color:#CC0000;'>" . $valmsg . "</h5>";
					?>
				</form>
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
