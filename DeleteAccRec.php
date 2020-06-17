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

$sql = "DELETE from account_req where Req_ID = '$id'";
$records = mysqli_query($conn, $sql);

 if(mysqli_query($conn, $sql)){
     echo '<div class= "alert alert-danger">';
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