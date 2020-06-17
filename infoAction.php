<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	if(mysqli_query($conn, $_POST['sql3'])&&mysqli_query($conn, $_POST['sql4'])){
		    echo '<div class= "alert alert-success"><strong>The request has been accepted!</strong></div>'; 
		}
		else {
		    echo '<div class= "alert alert-danger">error try again later</div>';
		}
?>
</body>
</html>