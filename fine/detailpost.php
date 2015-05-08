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

    <title>PHA-Renter-View details post</title>

    <!-- bootstrap core CSS -->
    <link href="./bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- custom styles for this template  im working on -->
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
    <!-- gonna start my  page content right here -->
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
				
<?php
	
	$valmsg = "";
	$id = $_GET['id'];
	
	require_once("./include/db_const.php");
	$conn = new mysqli($servername,$username,$password,$dbname);
		
	# check connection error, I think its useless but he's suggesting I keep it in case 
	if ($conn->connect_errno) {
		$valmsg = "Database Connection error. Try again";
	}else {
		// query I need to  searching the particular post that the landlord posts, will put no posts found if there aren't but thats prety embarassing so we should make alot of fake posts
		$sql = "SELECT * from land WHERE id = '{$id}'";
		$result = $conn->query($sql);
		
		if ($result->num_rows == 0) {
			$valmsg = "Posting details not Found";
			$conn->close();					
		} else {
			// display the posting stuffs in MEGA DETAILS!!!
			$row = $result->fetch_assoc();
			$phpdate = strtotime( $row['dateofposting'] );
			echo "<h2>" . date("F j", $phpdate) . "</h2>";
			echo '<div class="panel panel-primary">';
			echo '<div class="panel-body tleft">';				
			
			echo "<label>Rental Price/Month: $" . $row['rentpermonth'] . '<br>';
			echo "Allowed Animal Types: " . $row['animaltypes'] . '<br>';				
			echo "Landlord Description: </label>" . $row['landlorddesc'] . '<br><br>';
			echo "<img src=". $row['img'] . " class='img-responsive'>" ;
			
			echo "</div></div>";
			echo "<hr style='color:#0000FF; background-color:#0000FF; height:2px; border:none;'>";							
				
			$result->free();
			$conn->close();
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
    <!-- Placed at the end of the document so the pages load faster...though it really makes no sense...like really... -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="./bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
  </body>
</html>
