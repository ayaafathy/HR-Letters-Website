<html>
<head>
	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.3.min.js'></script>
<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js'></script>
<link rel="stylesheet" media="screen" href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/css/bootstrap.min.css' />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
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
$id = null;
if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
}

if ( null==$id ) {
		header("Location: Accept.php");
}


$qry = "SELECT letter_req.Req_ID,letter_req.user_ID,letters.type_name,letters.letter_template,Employees.FirstName,Employees.LastName,case when letter_req.Salary_Check=1 THEN job.Salary  ELSE 'Without' END AS Salary,Job.Job_title,job.Dep_ID,department.Dep_name
FROM letter_req INNER JOIN letters INNER JOIN Employees INNER JOIN Job INNER JOIN department
ON letter_req.type_id=letters.type_ID
AND letter_req.Req_ID=$id
 AND letter_req.user_ID=Employees.Emp_ID
AND Job.JobID=Employees.Job_ID
AND Job.Dep_ID=department.DepID
AND letter_req.req_status='PENDING'
					";

$rs = $dbConn->query($qry);

$fetchAllData = $rs->fetch_all(MYSQLI_ASSOC);

if($fetchAllData)
{
 echo'<table>';

echo'<tr>';
echo  '<th>Request ID</th>';
echo  '<th>Letter Type</th>';
echo  '<th>First Name</th>';
echo  '<th>Last Name</th>';
echo  '<th>Job Title</th>';
echo  '<th>Department</th>';
echo  '<th>Salary</th>';
echo  '</tr>';


foreach($fetchAllData as $RequestData)
{

	echo"<tr>";
	echo " <td>".$RequestData['Req_ID']."</td>";
	echo " <td>".$RequestData['type_name']."</td>";
	echo " <td>".$RequestData['FirstName']."</td>";
	echo " <td>".$RequestData['LastName']."</td>";
  echo " <td>".$RequestData['Job_title']."</td>";
	echo " <td>".$RequestData['Dep_name']."</td>";
  echo " <td>".$RequestData['Salary']."</td>";

	echo " </tr>";


}
echo  '</table>';
}



?>
</html>
