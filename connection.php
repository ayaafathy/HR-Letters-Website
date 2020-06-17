<?php
$server="localhost";
$user="root";
$password="";
$dbname="hr";
$conn=mysqli_connect($server,$user,$password,$dbname);
if(mysqli_connect_errno($conn))
{
die("ERROR:Could not connect..".mysqli_connect_error());
}
?>
