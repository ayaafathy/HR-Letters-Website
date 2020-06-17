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
	  font: 120% bold;
	  padding-left: 10%;

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
	.DataTable{
	width:80%;
	float: left;
	height: 100%;
	
	}
</style>
<body>
	  <script>
		    $(document).ready(function(){
		        SHowRegistration();
		    });
	  </script>
	  <script>
	  function AddHR(){
	  	$("#hrmodal").modal('show');
	  }
	  function AddQuality(){
	  	$("#qualitymodal").modal('show');
	  }
	  function AddAdmin(){
	  	$("#adminmodal").modal('show');
	  }


		function  SHowRegistration(){

			document.getElementById("Registration").style.display = "block";
			document.getElementById("HR").style.display = "none";
			document.getElementById("Quality").style.display = "none";
			document.getElementById("employees").style.display = "none";
			document.getElementById("Job").style.display = "none";
			document.getElementById("Admin").style.display = "none";
		}
		function  SHowHr(){

			document.getElementById("HR").style.display = "block";
			document.getElementById("Registration").style.display = "none";
			document.getElementById("Quality").style.display = "none";
			document.getElementById("employees").style.display = "none";
			document.getElementById("Job").style.display = "none";
			document.getElementById("Admin").style.display = "none";
		}

		function  SHowQuality(){

			document.getElementById("Quality").style.display = "block";
			document.getElementById("HR").style.display = "none";
			document.getElementById("Registration").style.display = "none";
			document.getElementById("employees").style.display = "none";
			document.getElementById("Job").style.display = "none";
			document.getElementById("Admin").style.display = "none";
		}

		function  SHowEmployees(){

			document.getElementById("employees").style.display = "block";
			document.getElementById("HR").style.display = "none";
			document.getElementById("Quality").style.display = "none";
			document.getElementById("Registration").style.display = "none";
			document.getElementById("Job").style.display = "none";
			document.getElementById("Admin").style.display = "none";
		}

		function  SHowJob(){

			document.getElementById("Job").style.display = "block";
			document.getElementById("HR").style.display = "none";
			document.getElementById("Quality").style.display = "none";
			document.getElementById("employees").style.display = "none";
			document.getElementById("Registration").style.display = "none";
			document.getElementById("Admin").style.display = "none";

		}

		function  SHowAdmins(){

			document.getElementById("Admin").style.display = "block";
			document.getElementById("HR").style.display = "none";
			document.getElementById("Quality").style.display = "none";
			document.getElementById("employees").style.display = "none";
			document.getElementById("Registration").style.display = "none";
			document.getElementById("Job").style.display = "none";
		}
		


	   </script>

	<div class="rectangle">

	  <br>
	  <h1>Hi, <?php echo $_SESSION['FirstName']; ?></h1>
	  <br>
	  <a onclick="SHowRegistration()">Registration requests</a>
	  <br><br>
	  <a  onclick="SHowEmployees()">employees</a>
	  <br><br>
	  <a onclick="SHowHr()">HR users</a>
	  <br><br>
	  <a  onclick="SHowQuality()">Quality users</a>
	  <br><br>
	  <a  onclick="SHowAdmins()">Admins</a>
	  <br><br>
	  <a  onclick="SHowJob()">Job titles</a>
	  <br><br>
	  
	  <a>Log Out   <span class="glyphicon glyphicon-log-out" ></span></a> 
	  
	  </div>

	  <div class="DataTable" style="overflow:auto;padding-top:1%;" id="Registration"> <!-- Registration requests block -->
					<table class="table table-striped table-hover">
			<thead >
		 <tr>
			<th>Firstname</th>
			<th>Lastname</th>
			<th>Department</th>
			<th>Job title</th>
			<th>Status</th>
			<th>Action</th>
		</thead> 
    <tbody>

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

$sql = "select Req_id,FirstName , LastName , Job_title , Dep_name,status from account_req ,department, job  where account_req.job_id = job.JobID and department.DepID = job.Dep_ID";
$records = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($records)){
	echo "<tr>";
	 echo "<td>".$row['FirstName']."</td>";
	 echo "<td>".$row['LastName']."</td>";
	 echo "<td>".$row['Dep_name']."</td>";
	 echo "<td>".$row['Job_title']."</td>";
     echo "<td>".$row['status']."</td>";
     echo '<td><a href=DeleteAccRec.php?id=' .$row['Req_id'].' class= "btn btn-danger"><span
     class="glyphicon glyphicon-remove"></span>Delete</a></td>';
     echo "</tr>";
    
    
    
    
   
}

?>



			</tbody>
		</table>
	</div>

	<div class="DataTable" style="overflow:auto;padding-top:1%;" id="employees"> <!-- Employees block -->
		
						<table class="table table-striped table-hover">
			<thead>
		 <tr>
			<th>Firstname</th>
			<th>Lastname</th>
			<th>Department</th>
			<th>Job title</th>
			<th>Action</th>
		</thead> 
    <tbody>

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

$sql = "select Emp_ID,FirstName , LastName , Job_title , Dep_name from employees ,department, job  where employees.job_id = job.JobID and department.DepID = job.Dep_ID";
$records = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($records)){
	echo "<tr>";
	 echo "<td>".$row['FirstName']."</td>";
	 echo "<td>".$row['LastName']."</td>";
	 echo "<td>".$row['Dep_name']."</td>";
	 echo "<td>".$row['Job_title']."</td>";
     echo '<td><a href=deleteEmp.php?id=' .$row['Emp_ID'].' class= "btn btn-danger"><span
     class="glyphicon glyphicon-remove"></span>Remove</a></td>';
     echo "</tr>";
    
    
    
    
   
}

?>



			</tbody>
		</table>
	</div>

	<div class="DataTable" style="overflow:auto;padding-top:1%;" id="HR"> <!-- HR block -->
		<span class="pull-left" style="padding-left:5%;padding-top:1%;padding-bottom:1%;"><a onclick="AddHR()" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add HR</a></span>
		
								<table class="table table-striped table-hover">
			<thead>
		 <tr>
			<th>Firstname</th>
			<th>Lastname</th>
			<th>Job title</th>
			<th>Action</th>
		</thead> 
    <tbody>

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

$sql = "select Emp_ID,FirstName , LastName , Job_title from employees ,department, job  where employees.job_id = job.JobID and department.DepID = job.Dep_ID and (Type = '1' or Type = '2')";
$records = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($records)){
	echo "<tr>";
	 echo "<td>".$row['FirstName']."</td>";
	 echo "<td>".$row['LastName']."</td>";
	 echo "<td>".$row['Job_title']."</td>";
     echo '<td><a href=RemoveHR.php?id=' .$row['Emp_ID'].' class= "btn btn-danger"><span
     class="glyphicon glyphicon-remove"></span>Remove</a></td>';
     echo "</tr>";
    
    
    
    
   
}

?>



			</tbody>
		</table>
	</div>

	 <div class="DataTable" style="overflow:auto;padding-top:1%;" id="Quality"> <!-- Quality block -->
		<span class="pull-left" style="padding-left:5%;padding-top:1%;padding-bottom:1%;"><a onclick="AddQuality()" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add Quality</a></span>
		
								<table class="table table-striped table-hover">
			<thead>
		 <tr>
			<th>Firstname</th>
			<th>Lastname</th>
			<th>Job title</th>
			<th>Action</th>
		</thead> 
    <tbody>

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

$sql = "select Emp_ID,FirstName , LastName , Job_title from employees ,department, job  where employees.job_id = job.JobID and department.DepID = job.Dep_ID and (Type = '3' or Type = '4')";
$records = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($records)){
	echo "<tr>";
	 echo "<td>".$row['FirstName']."</td>";
	 echo "<td>".$row['LastName']."</td>";
	 echo "<td>".$row['Job_title']."</td>";
     echo '<td><a href=RemoveQuality.php?id=' .$row['Emp_ID'].' class= "btn btn-danger"><span
     class="glyphicon glyphicon-remove"></span>Remove</a></td>';
     echo "</tr>";
    
    
    
    
   
}

?>



			</tbody>
		</table>
		
	</div>

	<div class="DataTable" style="overflow:auto;padding-top:1%;" id="Admin"> <!-- Admin block -->
		<span class="pull-left" style="padding-left:5%;padding-top:1%;padding-bottom:1%;"><a onclick="AddAdmin()" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add Admin</a></span>
		
								<table class="table table-striped table-hover">
			<thead>
		 <tr>
			<th>Firstname</th>
			<th>Lastname</th>
			<th>Job title</th>
			<th>Action</th>
		</thead> 
    <tbody>

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

$sql = "select Emp_ID,FirstName , LastName , Job_title from employees ,department, job  where employees.job_id = job.JobID and department.DepID = job.Dep_ID and (Type = '2' or Type = '4' or Type = '5')";
$records = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($records)){
	echo "<tr>";
	 echo "<td>".$row['FirstName']."</td>";
	 echo "<td>".$row['LastName']."</td>";
	 echo "<td>".$row['Job_title']."</td>";
     echo '<td><a href=RemoveAdmin.php?id=' .$row['Emp_ID'].' class= "btn btn-danger"><span
     class="glyphicon glyphicon-remove"></span>Remove</a></td>';
     echo "</tr>";
    
    
    
    
   
}

?>



			</tbody>
		</table>
	</div>

	<div class="DataTable" style="overflow:auto;padding-top:1%;" id="Job"> <!-- Job titles block -->
		<span class="pull-left" style="padding-left:5%;padding-top:1%;padding-bottom:1%;"><a href="#addjob" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add Admin</a></span>
		<span class="pull-left" style="padding-left:5%;padding-top:1%;padding-bottom:1%;"><a href="#adddep" data-toggle="modal" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add Admin</a></span>
		
								<table class="table table-striped table-hover">
			<thead>
		 <tr>
			<th>Job title</th>
			<th>Department</th>
			<th>Salary</th>
			<th>Action</th>
		</thead> 
    <tbody>

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

$sql = "select * from department, job  where department.DepID = job.Dep_ID ";
$records = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($records)){
	echo "<tr>";
	 echo "<td>".$row['Job_title']."</td>";
	 echo "<td>".$row['Dep_name']."</td>";
	 echo "<td>".$row['Salary']."</td>";
     echo '<td><a href=regreject.php?id=' .$row['JobID'].' class= "btn btn-success"><span
     class="glyphicon glyphicon-remove"></span> Edit Salary</a></td>';
     echo "</tr>";
    
    
    
    
   
}

?>



			</tbody>
		</table>
	</div>
	</div>

	</div>

<div class="modal" id="hrmodal" tabindex="-1" role="dialog"> <!-- Add HR modal -->
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add HR</h5>
      </div>
      <div class="modal-body" >
      <div style="width:100%; height: 100%; overflow:auto;">
      <table class="table table-striped table-hover"><thead>
		 <tr>
			<th>Job title</th>
			<th>Department</th>
			<th>Salary</th>
			<th>Action</th>
		</thead> <tbody>
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

      $sql = "select Emp_ID,FirstName , LastName , Job_title from employees ,department, job  where employees.job_id = job.JobID and department.DepID = job.Dep_ID and Dep_name='Human Resources' and (Type != '1' and Type != '2')";
      $records = mysqli_query($conn, $sql);

      while($row = mysqli_fetch_array($records)){
        echo "<tr>";
         echo "<td>".$row['FirstName']."</td>";
         echo "<td>".$row['LastName']."</td>";
         echo "<td>".$row['Job_title']."</td>";
           echo '<td><a href=AddHR.php?id=' .$row['Emp_ID'].' class= "btn btn-primary"><span
           class="glyphicon glyphicon-add"></span>Add</a></td>';
           echo "</tr>";   
      }

      ?>

			</tbody></table>  </div>
</div>
<div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="location.href = 'admin.php';">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="qualitymodal" tabindex="-1" role="dialog"> <!-- Add Quality modal -->
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Quality</h5>
      </div>
      <div class="modal-body" >
      <div style="width:100%; height: 100%; overflow:auto;">
      <table class="table table-striped table-hover"><thead>
		 <tr>
			<th>Job title</th>
			<th>Department</th>
			<th>Salary</th>
			<th>Action</th>
		</thead> <tbody>
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

      $sql = "select Emp_ID,FirstName , LastName , Job_title from employees ,department, job  where employees.job_id = job.JobID and department.DepID = job.Dep_ID and Dep_name='Quality Control' and (Type != '3' and Type != '4')";
      $records = mysqli_query($conn, $sql);

      while($row = mysqli_fetch_array($records)){
        echo "<tr>";
         echo "<td>".$row['FirstName']."</td>";
         echo "<td>".$row['LastName']."</td>";
         echo "<td>".$row['Job_title']."</td>";
           echo '<td><a href=AddQuality.php?id=' .$row['Emp_ID'].' class= "btn btn-primary"><span
           class="glyphicon glyphicon-add"></span>Add</a></td>';
           echo "</tr>";   
      }

      ?>

			</tbody></table>  </div>
</div>
<div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="location.href = 'admin.php';">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="adminmodal" tabindex="-1" role="dialog"> <!-- Add Admin modal -->
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Admin</h5>
      </div>
      <div class="modal-body" >
      <div style="width:100%; height: 100%; overflow:auto;">
      <table class="table table-striped table-hover"><thead>
		 <tr>
			<th>Job title</th>
			<th>Department</th>
			<th>Salary</th>
			<th>Action</th>
		</thead> <tbody>
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

      $sql = "select Emp_ID,FirstName , LastName , Job_title from employees ,department, job  where employees.job_id = job.JobID and department.DepID = job.Dep_ID and (Type != '2' and Type != '4' and Type != '5')";
      $records = mysqli_query($conn, $sql);

      while($row = mysqli_fetch_array($records)){
        echo "<tr>";
         echo "<td>".$row['FirstName']."</td>";
         echo "<td>".$row['LastName']."</td>";
         echo "<td>".$row['Job_title']."</td>";
           echo '<td><a href=AddAdmin.php?id=' .$row['Emp_ID'].' class= "btn btn-primary"><span
           class="glyphicon glyphicon-add"></span>Add</a></td>';
           echo "</tr>";   
      }

      ?>

			</tbody></table>  </div>
</div>
<div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="location.href = 'admin.php';">Close</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>
