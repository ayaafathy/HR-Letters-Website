<?php  
session_start();

$connect= mysqli_connect("localhost", "root", "", "HR");
if (!$connect) 
{
  die("Failed to connect to MySQL: " . mysqli_connect_error());
}


$Q_ID = $_POST["Q_ID"];
$Q_type = filter_var($_POST["Q_type"], FILTER_SANITIZE_STRING);
$user_ID = $_POST["user_ID"];
$Q = filter_var($_POST["Q"], FILTER_SANITIZE_STRING);
$A = filter_var($_POST["A"], FILTER_SANITIZE_STRING);

$Qsql="SELECT Q_ID FROM qanda where Q_ID ='$Q_ID'";
$Qresult=mysqli_query($connect, $Qsql);


if (!filter_var($Q_ID , FILTER_VALIDATE_INT) || mysqli_num_rows($Qresult) > 0)
{
     echo 'Invalid Question ID';  
     die();
}

///Check for further HR ID validations///
if (!filter_var($user_ID , FILTER_VALIDATE_INT))
{
     echo 'Invalid HR ID';
     die();
}


if (!preg_match('/^[a-zA-Z\s]+$/',$Q_type))
{
	echo 'Please Insert Valid Question Type'; 
	die();
}
else if(strlen($Q_type) > 20)
{
	echo 'Cannot Insert Question Type';
	die();
}


if (!preg_match('/^[a-zA-Z0-9\s]+$/', $Q) || !preg_match('/^[a-zA-Z0-9\s]+$/', $A))
{
     echo 'Please Insert Valid Data';
     die();
}
else if(strlen($Q) > 100 || strlen($A) > 100)
{
     echo 'Cannot Insert Data';
     die();
}


$sql = "INSERT INTO qanda(Q_ID, Q_type, user_ID, Q, A) VALUES('".$Q_ID."', '".$Q_type."', '".$user_ID."' ,'".$Q."', '".$A."')";  

if(mysqli_query($connect, $sql))  
{  
     echo 'Data Inserted';  
}  

mysqli_close($connect);
?>