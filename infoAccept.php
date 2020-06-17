<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php

     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "hr";

     $conn =  new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
	
	$Rid = $_POST['ID'];
	$sql1 = "select * from requests, employees ,department, job  where employees.Job_ID = job.JobID and department.DepID = job.Dep_ID and requests.REmp_ID = employees.Emp_ID and Req_id = ".$Rid;
	$sql2 = "select * from requests, department, job  where requests.Job_ID = job.JobID and department.DepID = job.Dep_ID and Req_id = ".$Rid;
	$records1 = mysqli_query($conn, $sql1);
	$records2 = mysqli_query($conn, $sql2);
	
	$row = mysqli_fetch_array($records1);
	$row2 = mysqli_fetch_array($records2);
	$sql3 ="UPDATE `employees` SET `address`='".$row2['address']."',`mobile`= '".$row2['mobile']."',`Job_ID`= ".$row2['Job_ID']."   WHERE Emp_ID =".$row['REmp_ID'];
	$sql4 ="DELETE from requests where REmp_ID =".$row['REmp_ID'];
	if(mysqli_query($conn, $sql3)&&mysqli_query($conn, $sql4)){
		    echo '<div class= "alert alert-success"><strong>The request has been accepted!</strong></div>'; 
		}
		else {
		    echo '<div class= "alert alert-danger">error try again later</div>';
		}
?>
</body>
</html>