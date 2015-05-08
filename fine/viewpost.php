<?php
	session_start();
	
	// Redirect to login.php if this page is directly accessed
	// As this page requires login
	if(!isset($_SESSION['uname']))
		header("location:login.php");
	
	date_default_timezone_set("America/Denver");
	
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PHA-Renter-Viewpost</title>

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
			<div class="col-sm-6 col-sm-offset-3">
			
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
				<h1 style="font-size:30px;font-family: Berlin Sans FB; color:black;">VIEW POSTINGS</h1>
				<hr style="color:#0000FF; background-color:#0000FF; height:5px; border:none;">
				
<?php
	
	$valmsg = "";
	$name = $_SESSION['uname'];	
	
	require_once("./include/db_const.php");
	$conn = new mysqli($servername,$username,$password,$dbname);
		
	# check connection
	if ($conn->connect_errno) {
		$valmsg = "Database Connection error. Try again";
	}else {
		// Query for renter search profile
		$sql = "SELECT * from renter WHERE uname = '{$name}'";
		$result = $conn->query($sql);
		
		if ($result->num_rows == 0) {
			$valmsg = "Search Profile not Found";
			$conn->close();					
		} else {
			$row = $result->fetch_assoc();
			$rentpermon = $row['rentpermonth'];
			$animaltypes = $row['animaltypes'];
			$result->free();
			
			// Query for searching according to the search profile
			$sql1 = "SELECT * from land WHERE rentpermonth <= '{$rentpermon}' AND animaltypes LIKE '%$animaltypes%'";
			$result1 = $conn->query($sql1);
			
			if ($result1->num_rows == 0) {
				$valmsg = "No matching found";
				$conn->close();					
			} else {
				// display all the matched postings, cant believe i got it working, the most recent posts are at the bottom of the page...BUT WHO CARES!!!!!
				while($row1 = $result1->fetch_assoc()){
					$phpdate = strtotime( $row1['dateofposting'] );					
					echo '<div class="panel panel-primary">';
					echo '<div class="panel-body tleft">';				
					
					echo "<label>Rental Price/Month: $" . $row1['rentpermonth'] . "&nbsp; &nbsp;&nbsp;&nbsp;" . date("m-d-Y", $phpdate) . '<br>';
					echo "Allowed Animal Types: " . $row1['animaltypes'] . '<br>';				
					echo "Landlord Description: </label>" . substr($row1['landlorddesc'], 0, 40) . ' ...<br><br>';
					
					echo "<div style='text-align:right;'><a href='detailpost.php?id=" . $row1['id'] . "'>View Details</a></div>";
					
					echo "</div></div>";
					echo "<hr style='color:#0000FF; background-color:#0000FF; height:2px; border:none;'>";
				}			
				
				// Free the result set
				$result1->free();
				// Close the connection
				$conn->close();
			}
		}		
	}
?>				
			
			<?php 
				if($valmsg != "")
					echo "<h5 style='color:#CC0000;'>" . $valmsg . "</h5>";
			?>
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
