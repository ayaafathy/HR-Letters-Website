<html>
<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hr";

$conn =  new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

mysqli_select_db($conn, 'hr');

$id = $_GET['id'];


$sql = "SELECT Type FROM `employees` WHERE Emp_ID = '$id'";
$records = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($records);
if ($row['Type'] == 5){
	$newType = 2;	
}
else{
	$newType = 1;
}

$sql1 = "UPDATE `employees` SET Type = '$newType' WHERE Emp_ID = '$id'";

 if(mysqli_query($conn, $sql1)){
     echo '<div class= "alert alert-success">';
     echo "<strong>Account deleted successfully!</strong>";
     echo '</div>';
}

else {
	echo '<div class= "alert alert-danger">';
    echo "<strong>error try again later</strong>";
    echo '</div>';
}




?>
</div>
</body>
</html>