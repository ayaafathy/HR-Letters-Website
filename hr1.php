<!DOCTYPE html>
<html>
<head>
	<title>HR</title>
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
	  font: 150% bold;
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

	<div class="rectangle">
	
	 <div class="sidenav">
	  <img src="img3.png" class="profile_picture">
	  <br>
	  <h1>Firstname</h1>
	  <br><br>
	  <a onclick="SHowRegistration()">Registration requests</a>
	  <br><br>
	  <a onclick="ShowInformation()">Information requests</a>
	  <br><br>
	  
	  <a onclick="ShowLetters()">HR letters requests</a>
	  <br><br>
	  
	  <a href="hrhp.php">HR Help Page</a>
	  <br><br>

	  <a>Log Out   <span class="glyphicon glyphicon-log-out" ></span></a> 
	  
	  </div>
     

	  <script>
		    $(document).ready(function(){
		        SHowRegistration();
		    });
	  </script>
	  <script>
		function SHowRegistration() {
			document.getElementById("Registrations").style.display = "block";
			document.getElementById("information").style.display = "none";
			document.getElementById("letters").style.display = "none";

		}


		function ShowInformation() {

			document.getElementById("information").style.display = "block";
			document.getElementById("Registrations").style.display = "none";
			document.getElementById("letters").style.display = "none";
		}

		function ShowLetters() {

			document.getElementById("letters").style.display = "block";
			document.getElementById("information").style.display = "none";
			document.getElementById("Registrations").style.display = "none";

		}
	   </script>

	<div class="DataTable" style="overflow:auto;" id="Registrations">  <!-- Registrations requests block -->
		
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

$sql = "select Req_id,FirstName , LastName , Job_title , Dep_name from account_req ,department, job  where status='Pending' and account_req.job_id = job.JobID and department.DepID = job.Dep_ID";
$records = mysqli_query($conn, $sql);

?>



<?php

while($row = mysqli_fetch_array($records)){
	echo "<tr>";
	 echo "<td>".$row['FirstName']."</td>";
	 echo "<td>".$row['LastName']."</td>";
	 echo "<td>".$row['Dep_name']."</td>";
	 echo "<td>".$row['Job_title']."</td>";
     echo '<td><a href=regaccept.php?id=' .$row['Req_id'].' class= "btn btn-success"><span
     class="glyphicon glyphicon-ok"></span> Accept</a></td>';
    
     echo '<td><a href=regreject.php?id=' .$row['Req_id'].' class= "btn btn-danger"><span
     class="glyphicon glyphicon-remove"></span> Reject</a></td>';
     echo "</tr>";
    
    
    
    
   
}

?>



			</tbody>
		</table>
	</div>


	<div class="DataTable" style="overflow:auto;" id="information"> <!-- Information requests block -->
		
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

	

	$sql = "select Req_id, Emp_ID, FirstName , LastName , Job_title , Dep_name from requests, employees ,department, job  where employees.Job_ID = job.JobID and department.DepID = job.Dep_ID and requests.REmp_ID = employees.Emp_ID";
	$records = mysqli_query($conn, $sql);




//$ifempty = false;
 if(mysqli_num_rows($records)>0){
 	echo '<table class="table table-striped table-hover">';
		echo '<thead>';
        echo '<tr>';
        echo '<th> Request ID </th>';  
        echo '<th> FirstName </th>';
        echo '<th> LastName </th>';
        echo '<th> Job title </th>';                        
        echo '<th> Department </th>'; 
        echo '<th> Action </th>';      

    echo '</tr>';
    echo '</thead>';
    
while($row = mysqli_fetch_array($records)){

	 echo "<tr>";
	 echo "<td>".$row['Req_id']."</td>";
	 echo "<td>".$row['FirstName']."</td>";
	 echo "<td>".$row['LastName']."</td>";
	 echo "<td>".$row['Job_title']."</td>";
	 echo "<td>".$row['Dep_name']."</td>";
    
     echo '<td><a <a href=viewinfo.php?id=' .$row['Req_id'].' class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>view</a></span>';
     echo "</tr>";
     //$ifempty = true;
    
 }
}
 else{
 	echo '<div class= "alert alert-danger">';
    echo "<h1><strong>No Pending Requests </strong></h1>";
    echo '</div>';
 }

   

?>


			</tbody>
		</table>
	</div>

	<div class="DataTable" style="overflow:auto;" id="letters"> <!-- HR letters requests block -->
		
		<h1>letters</h1>
	</div>


	</div>
</body>
</html>
