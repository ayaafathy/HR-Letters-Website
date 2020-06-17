<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="icon" type="image/ico" href="img2.png"  />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>

<script>
	function Accept( ){
		$.ajax({
		    type: "POST",
		    url: "infoAccept.php",
		    data: 'ID='+$("#RID").val(),
		    success: function(data){
		      $("#container").html(data);  
		        
		    }
		    });	


	}
	function Reject(val){

		$.ajax({
		    type: "POST",
		    url: "infoReject.php",
		    data: 'ID='+$("#RID").val(),
		    success: function(data){
		      $("#container").html(data);  
		        
		    }
		    });	

		
	}
</script>

<div class="container" class="id">
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hr";

$conn =  new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$Rid = $_GET['id'];
$sql1 = "select * from requests, employees ,department, job  where employees.Job_ID = job.JobID and department.DepID = job.Dep_ID and requests.REmp_ID = employees.Emp_ID and Req_id = ".$Rid;
$sql2 = "select * from requests, department, job  where requests.Job_ID = job.JobID and department.DepID = job.Dep_ID and Req_id = ".$Rid;
$records1 = mysqli_query($conn, $sql1);
$records2 = mysqli_query($conn, $sql2);
$row = mysqli_fetch_array($records1);
$row2 = mysqli_fetch_array($records2);
	 echo "<h1>".$row['FirstName']." ".$row['LastName']." want to update the following info</h1>";



?>

<label class="text1"><b>Department</b></label>
<br><br>
<label class="text3"><b>from:</b></label>
<input type="text" placeholder="<?php echo $row['Dep_name'] ?>" class="box1" readonly>
<label class="text4"><b>to:</b></label>
<input type="text" placeholder="<?php echo $row2['Dep_name'] ?>" class="box2" readonly>
<br><br><br>

<label class="text2"><b>Job title</b></label>
<br><br>
<label class="text3"><b>from:</b></label>
<input type="text" placeholder="<?php echo $row['Job_title'] ?>" class="box1" readonly>
<label class="text4"><b>to:</b></label>
<input type="text" placeholder="<?php echo $row2['Job_title'] ?>" class="box2" readonly>
<br><br><br>


<label class="text2"><b>Mobile</b></label>
<br><br>
<label class="text3"><b>from:</b></label>
<input type="text" placeholder="<?php echo $row['mobile'] ?>" class="box1" readonly>
<label class="text4"><b>to:</b></label>
<input type="text" placeholder="<?php echo $row2['mobile'] ?>" class="box2" readonly>
<br><br><br>

<label class="text1"><b>Address</b></label>
<br><br>
<label class="text3"><b>from:</b></label>
<input type="text" placeholder="<?php echo $row['address'] ?>" class="box1" readonly>
<label class="text4"><b>to:</b></label>
<input type="text" placeholder="<?php echo $row2['address'] ?>" class="box2" readonly>
<br><br><br>
<input type="text" id="RID" value="<?php echo $Rid?>" hidden>
<a onclick="Accept()" class= "btn btn-success"><span class="glyphicon glyphicon-ok"></span> Accept</a>
<a onclick="Reject()" class= "btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Reject</a>
     </div>
</body>
</html>

