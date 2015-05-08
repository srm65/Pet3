<?php	
	// to maintain the session
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PHA-Home</title>

    <!-- Bootstrap core CSS -->
    <link href="./bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/custom1.css" rel="stylesheet">
	
	<script>
		// For making the image larger and smaller. Splash screens are way cooler but this is easier...
		function bigImg(x) {
			x.style.height = "250px";
			x.style.width = "300px";
		}

		function normalImg(x) {
			x.style.height = "225px";
			x.style.width = "275px";
		}
	</script>
  </head>

  <body>    

    <div class="container custom-center">
		<h1 style="font-size:50px;font-family: Berlin Sans FB; color:white;">PET HOUSING APPLICATION</h1>
		<br><br><br>
        <a href="login.php"><img onmouseover="bigImg(this)" onmouseout="normalImg(this)" border="0" src="./img/logo_l.png" height="225px" width="275px title="Click Me""></a>
		<br><br><br>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="./bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
  </body>
</html>
