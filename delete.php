
<!DOCTYPE html>
<html lang="en">
<head>
</script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
<?php
$host = "localhost";
$dbUser = "root";
$password = "";
$database = "hr";

$dbConn = mysqli_connect($host,$dbUser,$password,$database);

if(mysqli_connect_errno($dbConn))
{
die("ERROR:Could not connect..".mysqli_connect_error());
}
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ( null==$id ) {
        header("Location: index.php");
    }
    $sql="UPDATE `letter_req`
         SET `req_status`='CANCELED'
         WHERE Req_ID= '$id' ";
    if(mysqli_query($dbConn, $sql)){
  echo"<script>$(document).ready(function(){ $('#myModal').modal('show'); });</script>

     <div class='modal fade' id='myModal' role='dialog'>
         <div class='modal-dialog modal-confirm'>
           <div class='modal-content'>
           <div class='modal-header'>
       <img src='delete.png' style='position: absolute; margin: 0 auto;left: 0;right: 0;
        top: -50px;width: 95px;height: 95px;border-radius: 50%;background: transparet;padding: 20px;text-align: center;'>
         <h5 style='text-align: center;'>Deleted</h5>
         </div>
             <div class='modal-body'>
               <p>Your Request has been deleted </p>
             </div>
                 <div class='modal-footer'>

                         <button type='button' class='btn btn-danger' data-dismiss='modal' onclick='myFunction()'>Delete</button>
                                     <script>
                                     function myFunction()
                                     {
                                       location.href='employee.php';
                                     }
                                     </script>
                 </div>
             </div>
         </div>
     </div>";

    }
    else{

      echo"Error". $dbConn->error;
    }

?>

</html>
