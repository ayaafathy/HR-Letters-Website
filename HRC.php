<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
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

	if ( null==$id ) {
			header("Location: HRC.php");
	}
	if(isset($_POST["Save"]))
	{
	$text = mysqli_real_escape_string($dbConn,$_POST["Comment"]);
	$sql="UPDATE  `letter_req`SET `HRcomments`='$text' WHERE Req_ID=$id ";
  $result=mysqli_query($dbConn,$sql);

	if($result)
	{
		echo "<script>$(document).ready(function(){ $('#myModal').modal('show'); });</script>

			 <div class='modal fade' id='myModal' role='dialog'>
					 <div class='modal-dialog modal-confirm'>
						 <div class='modal-content'>
						 <div class='modal-header'>
				 <img src='Success.png' style='position: absolute; margin: 0 auto;left: 0;right: 0;
					top: -50px;width: 95px;height: 95px;border-radius: 50%;background: transparet;padding: 20px;text-align: center;'>
					 <h5 style='text-align: center;'>Success</h5>
					 </div>
							 <div class='modal-body'>
								 <p>Your Request has been submitted </p>
							 </div>
									 <div class='modal-footer'>
													 <button type='button' class='btn btn-danger' data-dismiss='modal' onclick='myFunction();'>back</button>
													 
																			 <script>
																			 function myFunction()
																			 {
																				 location.href='quality.php';
																			 }
																			 </script>
									 </div>
							 </div>
					 </div>
			 </div>";

	}
	else {
		echo"ERROR". $dbConn->error;
		echo "<script>$(document).ready(function(){ $('#myModal').modal('show'); });</script>

			 <div class='modal fade' id='myModal' role='dialog'>
					 <div class='modal-dialog modal-confirm'>
						 <div class='modal-content'>
						 <div class='modal-header'>
				 <img src='error.jpg' style='position: absolute; margin: 0 auto;left: 0;right: 0;
					top: -50px;width: 95px;height: 95px;border-radius: 50%;background: transparet;padding: 20px;text-align: center;'>
					 <h5 style='text-align: center;'>WARNING </h5></div>
							 <div class='modal-body'>
								 <p>You Error Occured, try again later</p>
							 </div>
									 <div class='modal-footer'>
										 <button type='button' id='back' class='btn btn-danger' data-dismiss='modal' onclick='location.myFunction();';>Back</button>
									 </div>
							 </div>
					 </div>
			 </div>";
	}
	}
	 ?>
	 <!DOCTYPE html>
	 <html>
	 <head>
	 	<meta charset="utf-8">
	   <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>


.container{
	width:1120px;
	margin:0 auto;
	border:1px solid #eeeeee;
	background:#ffffff;
	padding:10px;
}

h1{
	text-align:center;
	font-size:20px;

}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
tr:nth-child(even) {
  background-color: #dddddd;
}

</style>
</head>
<body>

<div class="container">
	<h1>HR Comment</h1>

<form action="#" method="post">
<textarea class="form-control rounded-0" name="Comment" value="Comment" rows="20">

</textarea>
<input  class="btn btn-info" type="submit" name="Save" value="Save" >
</form>

</body>
</html>
