<?php
// Start the session
session_start();
?>
<html>
<head>
	
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


$qry = "SELECT letter_req.Req_ID,letter_req.user_ID,letters.type_name,Employees.FirstName,Employees.LastName,letter_req.priority,case when letter_req.Salary_Check=1 THEN 'With' ELSE 'Without' END AS Salary ,letter_req.req_status
          FROM letter_req INNER JOIN letters INNER JOIN Employees
          ON letter_req.type_id=letters.type_ID
          AND letter_req.user_ID=Employees.Emp_ID 
					AND letter_req.req_status='PENDING'
					AND letter_req.user_ID='".$_SESSION["empid"]."'
					ORDER BY letter_req.Req_ID ASC";

$rs = $dbConn->query($qry);

$fetchAllData = $rs->fetch_all(MYSQLI_ASSOC);
if($fetchAllData)
{
 echo'<table style="width:100%;">';

echo'<tr>';
echo  '<th>Request ID</th>';
echo  '<th>Letter Type</th>';
echo  '<th>First Name</th>';
echo  '<th>Last Name</th>';
echo  '<th>Priority</th>';
echo  '<th>Salary</th>';
echo  '<th>Status</th>';
echo  '<th></th>';
echo  '<th></th>';
echo  '</tr>';


foreach($fetchAllData as $RequestData)
{
	echo"<tr>";
	echo " <td>".$RequestData['Req_ID']."</td>";
	echo " <td>".$RequestData['type_name']."</td>";
	echo " <td>".$RequestData['FirstName']."</td>";
	echo " <td>".$RequestData['LastName']."</td>";
	echo " <td>".$RequestData['priority']."</td>";
	echo " <td>".$RequestData['Salary']."</td>";
	echo " <td>".$RequestData['req_status']."</td>";
echo "<td><a type='button' class='btn btn-warning' href='update.php?id=".$RequestData['Req_ID']."'><span class='glyphicon glyphicon-edit'>Edit</a></td>";

 echo "<td><a type='button' class='btn btn-danger' href='delete.php?id=".$RequestData['Req_ID']."'><span class='glyphicon glyphicon-trash'>Delete</a></td>";


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
