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

if(isset($_POST['login'])){ //check if login button is pressed

    

    $sql = "select email,emp_password from employees where email = '".$_POST['email']."'";
    $result = mysqli_query($conn,$sql) 
     or die("failed  to query database".mysqli_error());
    $row = mysqli_fetch_array($result) ;
      if ($row['email'] == $_POST['email'] && $row['emp_password'] == $_POST['password']) {
        $sql3 = "select * from employees ,department, job  where email = '".$_POST['email']."' and employees.job_id = job.JobID and department.DepID = job.Dep_ID";
        $result3 = mysqli_query($conn,$sql3) 
         or die("failed  to query database".mysqli_error());
        $row1 = mysqli_fetch_array($result3) ;
        $_SESSION["email"] = $row1['email'];
        $_SESSION["FirstName"] = $row1['FirstName'];
        $_SESSION["LastName"] = $row1['LastName'];
        $_SESSION["address"] = $row1['address'];
        $_SESSION["mobile"] = $row1['mobile'];
        $_SESSION["Birthdate"] = $row1['Birthdate'];
        $_SESSION["Salary"] = $row1['Salary'];
        $_SESSION["Job_title"] = $row1['Job_title'];
        $_SESSION["Dep_name"] = $row1['Dep_name'];
        $_SESSION["empid"] = $row1['Emp_ID'];
        $_SESSION["Job_ID"] = $row1['Job_ID'];

        if ($row1['Type']==1) {
          echo "<div id='hr'></div>"; 
        }
        else if ($row1['Type']==2) {
          echo "<div id='hradmin'></div>"; 
        }
        else if ($row1['Type']==3) {
          echo "<div id='quality'></div>"; 
        }
        else if ($row1['Type']==4) {
          echo "<div id='qualityadmin'></div>"; 
        }
        else if ($row1['Type']==5) {
          echo "<div id='admin'></div>"; 
        }
        else{
          header("Location:employee.php");
        }
      }   
      else {
           $sql2 = "select email,acc_password,status from account_req where email = '".$_POST['email']."' ";
           $result2 = mysqli_query($conn,$sql2) 
           or die("failed  to query database".mysqli_error());
           $row = mysqli_fetch_array($result2) ;
           
           if ($row['email'] == $_POST['email'] && $row['acc_password'] == $_POST['password']) {
              if ($row['status']=='Pending') {
                  echo "<div id='pending'></div>"; 
                 }
            
            else {
                echo "<div id='rejected'></div>";   
              }
           }
           else{
            echo "<script>alert('Invalid email or password')</script>";
            
           } 

        }
      }



?>
    
<body>

<script>
  $(hr).ready(function(){
    $("#h").modal('show');
  });
</script>
<script>
  $(hradmin).ready(function(){
  $("#ha").modal('show');
  });
</script><script>
  $(quality).ready(function(){
    $("#q").modal('show');
  });
</script>
<script>
  $(qualityadmin).ready(function(){
  $("#qa").modal('show');
  });
</script>
<script>
  $(admin).ready(function(){
    $("#a").modal('show');
  });
</script>
<script>
  $(pending).ready(function(){
    $("#p").modal('show');
  });
</script>
<script>
  $(rejected).ready(function(){
  $("#r").modal('show');
  });
</script>

<!-- HR -->
<div class="modal" id="h" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Login</h5>
      </div>
      <div class="modal-body">
        <button type="button" class="btn btn-primary" onclick="window.location.href='employee.php';">Continue as Employee</button>
        <button type="button" class="btn btn-success" onclick="window.location.href='hr.php';">Continue as HR</button>
      </div>
    </div>
  </div>
</div>

<!-- HR and Admin -->
<div class="modal" id="ha" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Login</h5>
      </div>
      <div class="modal-body">
        <button type="button" class="btn btn-primary" onclick="window.location.href='employee.php';">Continue as Employee</button>
        <button type="button" class="btn btn-success" onclick="window.location.href='hr.php';">Continue as HR</button>
        <button type="button" class="btn btn-danger" onclick="window.location.href='admin.php';">Continue as Admin</button>
      </div>
    </div>
  </div>
</div>

<!-- Quality -->
<div class="modal" id="q" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Login</h5>
      </div>
      <div class="modal-body">
        <button type="button" class="btn btn-primary" onclick="window.location.href='employee.php';">Continue as Employee</button>
        <button type="button" class="btn btn-success" onclick="window.location.href='quality.php';">Continue as Quality</button>
      </div>
    </div>
  </div>
</div>

<!-- Quality and Admin -->
<div class="modal" id="qa" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Login</h5>
      </div>
      <div class="modal-body">
        <button type="button" class="btn btn-primary" onclick="window.location.href='employee.php';">Continue as Employee</button>
        <button type="button" class="btn btn-success" onclick="window.location.href='quality.php';">Continue as Quality</button>
        <button type="button" class="btn btn-danger" onclick="window.location.href='admin.php';">Continue as Admin</button>
      </div>
    </div>
  </div>
</div>

<!-- Admin -->
<div class="modal" id="a" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Login</h5>
      </div>
      <div class="modal-body">
        <button type="button" class="btn btn-primary" onclick="window.location.href='employee.php';">Continue as Employee</button>
        <button type="button" class="btn btn-danger" onclick="window.location.href='admin.php';">Continue as Admin</button>
      </div>
    </div>
  </div>
</div>

<!-- Pending -->
<div class="modal" id="p" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Login</h5>
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

<!-- Rejected -->
<div class="modal" id="r" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Login</h5>
      </div>
      <div class="modal-body">
        <p>Your account request was rejected</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</div>
</body>
</html>