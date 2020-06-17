<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hr";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


if(isset($_POST['signup'])){ //check if signup button is pressed

    $sql = "insert into account_req(Req_id,email,acc_password,FirstName,LastName,job_id,status) values(DEFAULT,'".$_POST['email']."','".$_POST['password']."','".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['Job']."','Pending')";

    $result=mysqli_query($conn,$sql);
    if($result) 
    {
      echo "<div id='s'></div>"; 
    }
}
?>
<body>
<script>
  $(s).ready(function(){
    $("#su").modal('show');
  });
</script>
<!-- Signup -->
<div class="modal" id="su" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Signup</h5>
      </div>
      <div class="modal-body">
        <p>Your account request is pending HR acceptance</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


</body>
</html>