
<!DOCTYPE html>
<html>
<head>
</head>

<body>
 
<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hr";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql1 = "select email from employees where email = '".$_POST['email']."'";
$result1 = mysqli_query($conn,$sql1);
$row1=mysqli_fetch_array($result1);
$sql2 = "select email from account_req where email = '".$_POST['email']."'";
$result2 = mysqli_query($conn,$sql2);
$row2=mysqli_fetch_array($result2);
if ($row1['email']!=null || $row2['email']!=null) {
  echo 'Email already taken';
  echo "<script>disableSignup();</script>";  
}
else{ 
  echo "<script>enableSignup();</script>";
}
 ?>


</body>
</html>
