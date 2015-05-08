<?php
	session_start();
	
	$valmsg = "";
	$name = "";
	$email = "";
	
	// When the Renter Or Landlord buttons are pressed
	if(isset($_POST['Renter']) || isset($_POST['Landlord'])){
		//Fetching variables of the form
		$name = $_POST['name'];
		$pass = $_POST['password']; 
		$retypepassword = $_POST['retypepassword'];
		$email = $_POST['email'];
		
		$usertype = "";	
		// So when the button is pressed select user type
		if(isset($_POST['Renter']))
			$usertype = "R";
		else
			$usertype = "L";		
		
		if($pass != $retypepassword) {
			$valmsg = "Password didn't match. Try again";  
		}else {
			require_once("./include/db_const.php");
			$conn = new mysqli($servername,$username,$password,$dbname);
			
			# check connection
			if ($conn->connect_errno) {
				$valmsg = "Database Connection error. Try again";
			}else {
				//Insert data into login table
				$result = $conn->query("INSERT INTO login(username, password, email, usertype) values ('$name', '$pass', '$email','$usertype')");
				$conn->close();
				
				// Set the session varibales
				$_SESSION['uname'] = $name;
				$_SESSION['utype'] = $usertype;
				
				// As per the user type redirect to respective page
				if($_SESSION['utype'] == 'R')
					header("location:newprofile.php");
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

    <title>PHA-New Account</title>

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
			width: 140px !important;
		}

		.custom2 {
			width: 200px !important;
		}
	</style>
  </head>

  <body>    

    <!-- Begin page content -->
    <div class="container custom-center">
	  <div class="row">		
        <div class="col-md-4 col-md-offset-4">		
			<h1 style="font-size:40px;font-family: Berlin Sans FB; color:white;">Create Account</h1>
			<br><br>		
			
			<form role="form" method="post">		
				<div class="inner-addon left-addon">
					<i class="glyphicon glyphicon-user"></i>
					<input type="text" id="name" name="name" class="form-control input-lg" value="<?php echo $name;?>" placeholder="USERNAME" autofocus required>
				</div>

				<br>

				<div class="inner-addon left-addon">
					<i class="glyphicon glyphicon-lock"></i>
					<input type="password" id="password" name="password" class="form-control input-lg" placeholder="PASSWORD" required>
				</div>

				<br>
				
				<div class="inner-addon left-addon">
					<i class="glyphicon glyphicon-lock"></i>
					<input type="password" id="retypepassword" name="retypepassword" class="form-control input-lg" placeholder="RE-ENTER PASSWORD" required>
				</div>

				<br>
				
				<div class="inner-addon left-addon">
					<i class="glyphicon glyphicon-user"></i>
					<input type="email" name="email" class="form-control input-lg" value="<?php echo $email;?>" placeholder="E-MAIL ADDRESS" required>
				</div>

				<br>
				
				<div class="row">		
					<div class="col-md-6">
						<button type="submit" class="btn btn-primary btn-lg custom1" name="Renter">
							Renter
						</button>
					</div>
					<div class="col-md-6">
						<button type="submit" class="btn btn-success btn-lg custom1" name="Landlord">
							Landlord
						</button>
					</div>
				</div>
				<br>
 
				<?php 
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
