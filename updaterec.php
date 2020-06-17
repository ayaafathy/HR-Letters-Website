<?php  
session_start();

$connect= mysqli_connect("localhost", "root", "", "HR");
if (!$connect) 
{
  die("Failed to connect to MySQL: " . mysqli_connect_error());
}

	$id = $_POST["id"];  
	$text = $_POST["text"];  
	$column_name = $_POST["column_name"];  
		

	if($column_name == "Q_ID" )
	{
		$Qsql="SELECT Q_ID FROM qanda where Q_ID ='$text'";
		$Qresult=mysqli_query($connect, $Qsql);

		if (!filter_var($text, FILTER_VALIDATE_INT) || mysqli_num_rows($Qresult) > 0)
        {
			echo 'Insert a valid Question ID';  
			die();
        }
	}


	if($column_name == "Q_type")
	{
		if (!preg_match('/^[a-zA-Z\s]+$/', $text))
		{
			echo 'Please Insert Valid Data';
			die();
		}
		else if(strlen($text) > 20)
		{
			echo 'Cannot Insert Data';
			die();
		}
   
	}

	if($column_name == "Q" || $column_name == "A")
	{
		if (!preg_match('/^[a-zA-Z0-9\s]+$/', $text))
		{
			echo 'Please Insert Valid Data';
			die();
		}
		else if(strlen($text) > 100)
		{
			echo 'Cannot Insert Data';
			die();
		}
	}


	
	$sql = "UPDATE qanda SET ".$column_name."='".$text."' WHERE Q_ID ='".$id."'";  

	if(mysqli_query($connect, $sql))  
	{  
		echo 'Data Updated';  
	} 
	else
	{
		echo 'Cannot update data';
		die(); 
	} 

	mysqli_close($connect);	

	
///Check for further HR ID validations///
  /*  if($column_name == "user_ID" )
	{

		if (!filter_var($text, FILTER_VALIDATE_INT))
        {
			echo 'Invalid HR ID';  
			die();
        }
	}*/
?>