<?php
// Start the session
session_start();
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.3.min.js'></script>
<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js'></script>
<link rel="stylesheet" media="screen" href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/css/bootstrap.min.css' />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

</head>

</html>
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


$qry = "SELECT letter_req.Req_ID,letter_req.EmpComments,letter_req.user_ID,letters.type_name,Employees.FirstName,Employees.LastName,letter_req.priority,case when letter_req.Salary_Check=1 THEN 'With' ELSE 'Without' END AS Salary ,letter_req.req_status
          FROM letter_req INNER JOIN letters INNER JOIN Employees
          ON letter_req.type_id=letters.type_ID
					/*AND letter_req.user_ID=session[Emp_ID]*/
          AND letter_req.user_ID=Employees.Emp_ID
					AND letter_req.user_ID='".$_SESSION["empid"]."'
					AND letter_req.req_status='REJECTED'
					ORDER BY letter_req.Req_ID ASC";

$rs = $dbConn->query($qry);

$fetchAllData = $rs->fetch_all(MYSQLI_ASSOC);
if($fetchAllData)
{
 echo'<table class="table table-hover">';

echo'<tr>';
echo  '<th>Request ID</th>';
echo  '<th>Letter Type</th>';
echo  '<th>First Name</th>';
echo  '<th>Last Name</th>';
echo  '<th>Priority</th>';
echo  '<th>Salary</th>';
echo  '<th>Status</th>';
echo  '<th>QC Comments</th>';
echo  '<th></th>';
echo  '</tr>';


foreach($fetchAllData as $RequestData)
{
	echo"<tr class='danger'>";
	echo " <td>".$RequestData['Req_ID']."</td>";
	echo " <td>".$RequestData['type_name']."</td>";
	echo " <td>".$RequestData['FirstName']."</td>";
	echo " <td>".$RequestData['LastName']."</td>";
	echo " <td>".$RequestData['priority']."</td>";
	echo " <td>".$RequestData['Salary']."</td>";
	echo " <td>".$RequestData['req_status']."</td>";
	echo " <td>".$RequestData['EmpComments']."</td>";
echo "<td>";





	echo " </tr>";

}

echo  '</table>';

}
else{
	echo'<div class="alert alert-danger" role="alert">
          <center> <h3> No Pending Requests </h3> </center>
</div>';
}


$rs->close();

$dbConn->close();

?>
