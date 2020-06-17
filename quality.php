<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="icon" type="image/ico" href="img2.png"  />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
	body{
	background-image:url(img1.jpg);
	background-repeat:no-repeat;
	background-size:cover;
	}


	* {
	  box-sizing: border-box;
	}

	.sidenav{
		position: relative;
	  	width: 20%;
	  	height: 100%;
	  	padding-top: 5%;
  		background-color: black;
  		float: left;

	}
	.sidenav a {
	  
	  color: #818181;;
	  font: 150% bold;
	  padding-left: 15%;

	}
	.sidenav a:hover {
	  color: #f1f1f1;

	}

	.profile_picture{

		border-radius: 50%;
		width: 50%;
		position: relative;
	    left: 25%;
	}
	.sidenav h1{
	  
	  color: white;
	  font: 150% bold;
	  text-align: center;;
	}

	.rectangle{
	  background: rgba(255, 255, 255,1);
	  position: absolute;
	  left: 5%;
	  top: 5%;
	  width: 90%;
	  height: 90%;	
	  
	}

</style>



	
<body>
		<div class="rectangle">
	 <div class="sidenav">
	  <br>
	  <h1>Hi, <?php echo $_SESSION['FirstName']; ?></h1>
	  <br><br>
	  
	  <br><br>
	  
	  <a href="logout.php">Log Out   <span class="glyphicon glyphicon-log-out" ></span></a> 
	  
	  </div>

	  <?php

	$host = "localhost";
	$dbUser = "root";
	$password = "";
	$database = "hr";

	$dbConn = new mysqli($host,$dbUser,$password,$database);
	if($dbConn->connect_error)
	{
		die("Database Connection Error, Error No.: ".$dbConn->connect_errno." | ".$dbConn->connect_error);
	}
	$id = null;
	if ( !empty($_GET['id'])) {
			$id = $_REQUEST['id'];
	}

	 ?>
	 <script>
	 	$(document).ready(function(){

	 		$.ajax({
	 			url: 'get_qc.php',
	 			success: function(data){

	 				$("#Request-data").html(data);
	 			}
	 		})
	 	});




	 </script>

	<div class="DataTable" style="overflow:auto;" id="letters"> <!-- HR letters requests block -->
	




<div class="container" style="width:100%;height:100%;">
	<h1>Requests</h1>
</div>
	<div id="Request-data">
	</div>




	</div>

	</div>
</body>
</html>
-