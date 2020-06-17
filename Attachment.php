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
$id = null;
if ( !empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if ( null==$id ) {
    header("Location: index.php");
}

$qry = "SELECT * FROM `Attachment` WHERE User_ID='$id'";

$result = mysqli_query($dbConn, $qry);
        while($row = mysqli_fetch_array($result))
        {
             echo '
                  <tr>
                       <td>
                            <img src="data:image/jpeg;base64,'.base64_encode($row['attachment'] ).'" height="200" width="200" class="img-thumnail" />
                       </td>

                  </tr>
             ';
        }



$result->close();

$dbConn->close();

?>
