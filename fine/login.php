<?php
	// To maintain the session
	session_start();
	
	$valmsg = "";
	$name = "";
	
	// When the submit button is pressed
	if (isset($_POST['submit'])){
		// Collect the name and password
		$name = $_POST['name'];
		$pass = $_POST['password'];
		
		// Include the file database parameters
		require_once("./include/db_const.php");
		// Open a connection for database
		$conn = new mysqli($servername,$username,$password,$dbname);
		
		# check connection
		if ($conn->connect_errno) {
			$valmsg = "Database Connection error. Try again";
		}else {
			// Verify the username and password, dont think this is really needed either, but preventative measures and etc...
			$sql = "SELECT * from login WHERE username = '{$name}' AND password = '{$pass}'";
			$result = $conn->query($sql);
			
		// Check if any records are found
		if (!$result->num_rows == 1) {
			$valmsg = "Invalid username/password combination. Try again";
			$conn->close();					
		} else {
			// fetch/find the user  name and user type
				$row = $result->fetch_assoc();	
				// Set the session variables
				$_SESSION['uname'] = $row['username'];
				$_SESSION['utype'] = $row['usertype'];
				
				// Free the result set
				$result->free();
				$conn->close();	
				
				// as per the user type like renter or landlord, they need to go to the redirect to the respective page, that wasnt that bad actually
				if($_SESSION['utype'] == 'R')
					header("location:renter.php");
				else
					header("location:landlord.php");
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

    <title>PHA-Login</title>

    <!-- Bootstrap core CSS -->
    <link href="./bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Custom styles for this template -->
    <link href="./css/custom1.css" rel="stylesheet">
	
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
		function newacc()
		{
			open('newaccount.php', '_self');
		}
	</script>
	
  </head>

  <body>    

    <!-- Begin page content -->
    <div class="container custom-center">
	  <div class="row">		
        <div class="col-md-4 col-md-offset-4">		
			<h1 style="font-size:40px;font-family: Berlin Sans FB; color:white;">PET HOUSING APPLICATION</h1>
			<br><br>		
			
			<form role="form" method="post">		
				<div class="inner-addon left-addon">
					<i class="glyphicon glyphicon-user"></i>
					<input type="text" id="name" name="name" class="form-control input-lg" value="<?php echo $name;?>" placeholder="Enter user name" autofocus required>
				</div>

				<br>

				<div class="inner-addon left-addon">
					<i class="glyphicon glyphicon-lock"></i>
					<input type="password" id="password" name="password" class="form-control input-lg" placeholder="Enter Password" required>
				</div>

				<br>

				<button type="submit" class="btn btn-primary btn-lg custom1" name="submit">
					<span class="glyphicon glyphicon-log-in"></span> Log in
				</button>

				<br> <br>

				<button type="button" class="btn btn-success btn-md custom2" onclick=newacc()>
					Create Account
				</button>

				<?php 
					// For any kind of validation and error msg
					if($valmsg != "")
						echo "<h5 style='color:#CC0000;'>" . $valmsg . "</h5>";
				?>
			</form>
		</div>
		
		<div class="col-md-4">&nbsp;</div>
		
      </div>	  
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="./bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
  </body>
</html>
