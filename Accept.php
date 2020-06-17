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
			header("Location: Accept.php");
	}
	$sql="select * from letter_req where Req_ID='$id'";
	$rs = $dbConn->query($sql);
	$fetchAllData = $rs->fetch_all(MYSQLI_ASSOC);
	foreach($fetchAllData as $data)
	{
		$userid=$data['user_ID'];
	}

	if(isset($_POST["Save"]))
	{
	$text = mysqli_real_escape_string($dbConn,$_POST["letter"]);
	$sql="UPDATE `letter_req`
			 SET `req_status`='ACCEPTED'
			 WHERE Req_ID= '$id' ";
  $result=mysqli_query($dbConn,$sql);
	$sql2="INSERT INTO `Emp_letter`(`ID`, `ReqID`, `EmpID`, `Letter`) VALUES (DEFAULT,'$id','$userid','$text')";
	$resultsql=mysqli_query($dbConn,$sql2);
	if($result && $resultsql)
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
													 <button type='button' class='btn btn-danger' data-dismiss='modal' onclick='location.reload();'>back</button>
													 <button type='button' class='btn btn-success' data-dismiss='modal' onclick='myFunction()'>View</button>
																			 <script>
																			 function myFunction()
																			 {
																				 location.href='/request/index.php';
																			 }
																			 </script>
									 </div>
							 </div>
					 </div>
			 </div>";

	}
	else {
		echo "<script>$(document).ready(function(){ $('#myModal').modal('show'); });</script>

			 <div class='modal fade' id='myModal' role='dialog'>
					 <div class='modal-dialog modal-confirm'>
						 <div class='modal-content'>
						 <div class='modal-header'>
				 <img src='error.jpg' style='position: absolute; margin: 0 auto;left: 0;right: 0;
					top: -50px;width: 95px;height: 95px;border-radius: 50%;background: transparet;padding: 20px;text-align: center;'>
					 <h5 style='text-align: center;'>WARNING </h5></div>
							 <div class='modal-body'>
								 <p>You Error Ocuured, try again later</p>
							 </div>
									 <div class='modal-footer'>
										 <button type='button' id='back' class='btn btn-danger' data-dismiss='modal' onclick='location.reload();';>Back</button>
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
	 <script>
	 	$(document).ready(function(){

	 		$.ajax({
	 			url: 'emp_data.php?id=<?php echo $_GET['id'];?>',
	 			success: function(data){

	 				$("#Emp-data").html(data);
	 			}
	 		})
	 	});




	 </script>
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
	<h1>Accept</h1>
</div>
	<div id="Emp-data">
	</div>
	<br>
	<form action="#" method="post">


	<textarea class="form-control rounded-0" name="letter" value="letter" rows="20">
 <?php

	$id = null;
	if ( !empty($_GET['id'])) {
			$id = $_REQUEST['id'];
	}

	if ( null==$id ) {
			header("Location: Accept.php");
	}
		$qry = "SELECT letter_req.Req_ID,letter_req.user_ID,letters.letter_template
		          FROM  letter_req INNER JOIN letters
		          ON letter_req.type_id=letters.type_ID
							AND letter_req.Req_ID=$id


							";
		$result = mysqli_query($dbConn, $qry);
		while ($row = mysqli_fetch_array($result)) {
			echo $row['letter_template'];

		}

		?>
</textarea>
<input  class="btn btn-info" type="submit" name="Save" value="Save" >
</form>

</body>
</html>
