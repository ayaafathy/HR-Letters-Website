<html>
<head>
	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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


$qry = "SELECT letter_req.date_time,letter_req.Req_ID,letter_req.user_ID,letters.type_name,Employees.FirstName,Employees.LastName,Employees.email,
               letter_req.priority,case when letter_req.Salary_Check=1 THEN 'With' ELSE 'Without' END AS Salary
          FROM letter_req INNER JOIN letters INNER JOIN Employees
          ON letter_req.type_id=letters.type_ID
          AND letter_req.user_ID=Employees.Emp_ID
					AND letter_req.req_status='PENDING'
				  ORDER BY letter_req.Req_ID ASC";

$rs = $dbConn->query($qry);

$fetchAllData = $rs->fetch_all(MYSQLI_ASSOC);
if($fetchAllData)
{
 echo'<table class="table table-hover" style="width:100%;height:100%;">';

echo'<tr>';
echo  '<th>Date </th>';
echo  '<th>Request ID</th>';
echo  '<th>Employee ID</th>';
echo  '<th>Letter Type</th>';
echo  '<th>First Name</th>';
echo  '<th>Last Name</th>';
echo  '<th>Salary</th>';
echo  '<th >Priority</th>';
echo  '<th> Attachment</th>';
echo  '<th> Action</th>';
echo  '<th></th>';
echo  '</tr>';


foreach($fetchAllData as $RequestData)
{
	if($RequestData['priority']=="HIGH")
	{
	echo"<tr class='danger'>";
	echo " <td>".$RequestData['date_time']."</td>";
	echo " <td>".$RequestData['Req_ID']."</td>";
	echo " <td>".$RequestData['user_ID']."</td>";
	echo " <td>".$RequestData['type_name']."</td>";
	echo " <td>".$RequestData['FirstName']."</td>";
	echo " <td>".$RequestData['LastName']."</td>";
	echo " <td>".$RequestData['Salary']."</td>";
	echo " <td >".$RequestData['priority']."</td>";

echo "<td><a type='button' class='btn btn-info' href='Attachment.php?id=".$RequestData['Req_ID']."'><span class='glyphicon glyphicon-eye-open'> View</a></td>";
echo "<td><a type='button' class='btn btn-success' href='Accept.php?id=".$RequestData['Req_ID']."'><span class='glyphicon glyphicon-ok'>Accept</a></td>";

 echo "<td><a type='button' class='btn btn-danger' href='Reject.php?id=".$RequestData['Req_ID']."'><span class='glyphicon glyphicon-remove'>Reject</a></td>";


	echo " </tr>";
}
 elseif($RequestData['priority']=="MEDUIM") {
	echo"<tr class='warning' >";
	echo " <td>".$RequestData['date_time']."</td>";
	echo " <td>".$RequestData['Req_ID']."</td>";
	echo " <td>".$RequestData['user_ID']."</td>";
	echo " <td>".$RequestData['type_name']."</td>";
	echo " <td>".$RequestData['FirstName']."</td>";
	echo " <td>".$RequestData['LastName']."</td>";
	echo " <td>".$RequestData['Salary']."</td>";
	echo " <td >".$RequestData['priority']."</td>";

echo "<td><a type='button' class='btn btn-info' href='Attachment.php?id=".$RequestData['user_ID']."'><span class=' glyphicon glyphicon-eye-open'> View</a></td>";
echo "<td><a type='button' class='btn btn-success' href='Accept.php?id=".$RequestData['Req_ID']."'><span class='glyphicon glyphicon-ok'>Accept</a></td>";

 echo "<td><a type='button' class='btn btn-danger' href='Reject.php?id=".$RequestData['Req_ID']."'><span class='glyphicon glyphicon-remove'>Reject</a></td>";


	echo " </tr>";
}
else{
	echo"<tr class='info'>";
	echo " <td>".$RequestData['date_time']."</td>";
	echo " <td>".$RequestData['Req_ID']."</td>";
	echo " <td>".$RequestData['user_ID']."</td>";
	echo " <td>".$RequestData['type_name']."</td>";
	echo " <td>".$RequestData['FirstName']."</td>";
	echo " <td>".$RequestData['LastName']."</td>";
	echo " <td>".$RequestData['Salary']."</td>";
	echo " <td >".$RequestData['priority']."</td>";

echo "<td><a type='button' class='btn btn-info' href='Attachment.php?id=".$RequestData['user_ID']."'><span class=' glyphicon glyphicon-eye-open'> View</a></td>";
echo "<td><a type='button' class='btn btn-success' href='Accept.php?id=".$RequestData['Req_ID']."'><span class='glyphicon glyphicon-ok'>Accept</a></td>";
echo "<td><a type='button' class='btn btn-danger' href='Reject.php?id=".$RequestData['Req_ID']."'><span class='glyphicon glyphicon-remove'>Reject</a></td>";


	echo " </tr>";
}
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
