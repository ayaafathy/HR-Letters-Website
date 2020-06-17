<?php  
session_start();

$connect= mysqli_connect("localhost", "root", "", "HR");
if (!$connect) 
{
  die("Failed to connect to MySQL: " . mysqli_connect_error());
}

	
	$sql = "DELETE FROM qanda WHERE Q_ID = '".$_POST["id"]."'";  

	if(mysqli_query($connect, $sql))  
	{  
		echo 'Data Deleted';  
	} 
	
	mysqli_close($connect);
?>