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
$sql = "SELECT * from account_req where Req_id = '$id'";
$records = mysqli_query($conn, $sql) or die (mysqli_error($conn));




while($row = mysqli_fetch_array($records)){
	
  $LastName = $row['LastName'];
  $FirstName = $row['FirstName']; 
  $email = $row['email'];
  $password = $row['acc_password'];
  $job_id = $row['job_id'];
  $Req_id=$row['Req_id'];
  //$Age = $row['Age'];
  //$salary = $row['salary'];
  
  //$address = $row['address'];
  //$telephone = $row['telephone'];
   
  
  // $sql = "SELECT  account_req.LastName,account_req.FirstName,account_req.email,account_req.acc_password FROM account_req INNER JOIN employees ON 
   //account_req.job_id=employees.Job_ID ";
      
       
       
$sql1 ="INSERT INTO `employees` SET `LastName`='$LastName',`FirstName`='$FirstName',
`email`='$email',`emp_password`='$password',`Job_ID`='$job_id'" ;
$sql2 ="DELETE FROM account_req where Req_id = '$id'";
    
    
       
}
 


  

 if(mysqli_query($conn, $sql1)&&mysqli_query($conn, $sql2)){
     echo '<div class= "alert alert-success">';
     echo "<strong>The request has been accepted!</strong>";
     echo '</div>';
}
else {
    echo '<div class= "alert alert-danger">';
    echo "error try again later";
    echo '</div>';
}


?>
</div>
</body>
</html>