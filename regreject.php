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

$id = $_GET['id'];


$sql = "UPDATE account_req SET status= 'Rejected' where Req_id = '$id'";
    
$records = mysqli_query($conn, $sql);

 if($records){
     echo '<div class= "alert alert-danger">';
     echo "<strong>The request has been rejected!</strong>";
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