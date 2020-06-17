<?php

session_start();

$con = MySQLi_connect( "localhost", "root", "", "hr");

if (!$con) 
{
  die("Failed to connect to MySQL: " . mysqli_connect_error());
}

?>