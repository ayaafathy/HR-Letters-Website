<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="icon" type="image/ico" href="img2.png"  />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
	body{
	background-image:url(img1.jpg);
	background-repeat:no-repeat;
	background-size:cover;
	}
	
	* {
	  box-sizing: border-box;
	}

	.sidenav{
		position: relative;
	  	width: 20%;
	  	height: 100%;
	  	padding-top: 5%;
  		background-color: black;
  		float: left;

	}
	.sidenav a {
	  
	  color: #818181;;
	  font: 150% bold;
	  padding-left: 25%;

	}
	.sidenav a:hover {
	  color: #f1f1f1;

	}

	.profile{
	width:80%;
	float: left;
	height: 100%;
	padding-top: 5%;
	
	}
	.rectangle{
	  background: rgba(255, 255, 255,1);
	  position: absolute;
	  left: 5%;
	  top: 5%;
	  width: 90%;
	  height: 90%;	
	  
	}

	.profile_picture{

		border-radius: 50%;
		width: 50%;
		position: relative;
	    left: 25%;
	}
	.sidenav h1{
	  
	  color: white;
	  font: 150% bold;
	  text-align: center;;
	}
	.text1{
		font: 140% bold;
		color: black;
		padding-left: 7%;

	}
	.text2{
		font: 140% bold;
		color: black;
		position: absolute;
		left: 63%;

	}
	.box1{
		font-size: 120%;
		position: absolute;
		left: 38%;
	}
	.box2{
		font-size: 120%;
		position: absolute;
		left: 75%;
	}
	.file1{
		position: absolute;
		left: 38%;
		top: 79%;
	}
	.file2{
		position: absolute;
		left: 75%;
		top: 79%;
	}
	.file3{
		position: absolute;
		left: 38%;
		top: 11%;
	}
	#save{
		position: absolute;
		left: 77%;
		top: 79%;	
		font-size: 130%;
		width: 10%;
		height: 8%;
	}
</style>
<body>
	
	<div class="rectangle">
	 <div class="sidenav">
	  <h1>Hi, <?php echo $_SESSION['FirstName']; ?></h1>
	  <br><br>
	  <a onclick="Profile()">Profile</a>
	  <br><br>
	  <a onclick="Addrequest()">Add request</a>
	  <br><br>
	  
	  <a onclick="Viewrequest()">View requests</a>
	  <br><br>
	  
	  <a onclick="History()">History</a>
	  <br><br>
	  
	  <a href="logout.php">Log Out   <span class="glyphicon glyphicon-log-out" ></span></a> 
	  
	  </div>
	  	  <script>
		    $(document).ready(function(){
		        Profile();
		    });
	  </script>
	  <script>
		function Profile() {
			document.getElementById("Profile").style.display = "block";
			document.getElementById("Addrequest").style.display = "none";
			document.getElementById("Viewrequest").style.display = "none";
			document.getElementById("History").style.display = "none";

		}


		function Addrequest() {

			document.getElementById("Addrequest").style.display = "block";
			document.getElementById("Profile").style.display = "none";
			document.getElementById("Viewrequest").style.display = "none";
			document.getElementById("History").style.display = "none";
		}

		function Viewrequest() {

			document.getElementById("Viewrequest").style.display = "block";
			document.getElementById("Profile").style.display = "none";
			document.getElementById("Addrequest").style.display = "none";
			document.getElementById("History").style.display = "none";

		}

		function History() {

			document.getElementById("History").style.display = "block";
			document.getElementById("Profile").style.display = "none";
			document.getElementById("Viewrequest").style.display = "none";
			document.getElementById("Addrequest").style.display = "none";

		}
	   </script>

	<script>
	function getJob(val) {
	  $.ajax({
	  type: "POST",
	  url: "GetJob.php",
	  data:'DepartmentID='+val,
	  success: function(data){
	    $("#Job-list").html(data);
	  }
	  });
	}
	</script>
	<div class="DataTable" style="overflow:auto;" id="Profile"> <!-- Profile block -->
	
	<div class="profile">
	<form action="" method="post">
	<br><br>
    
    <label class="text1"><b>First name</b></label>
    <input type="text" placeholder="<?php echo $_SESSION['FirstName']; ?>" name="firstname" class="box1" readonly>
    
 
    <label class="text2"><b>Last name</b></label>
    <input type="text" placeholder="<?php echo $_SESSION['LastName']; ?>" name="lastname" class="box2" readonly>
    <br><br><br><br>
 
    <label class="text1"><b>Department</b></label>

    <select name="Department" id="Department-list"  onChange="getJob(this.value);" class="box1" required>
      <option value="<?php echo $_SESSION['DepID']; ?>"><?php echo $_SESSION['Dep_name']; ?></option>
       <?php
        $con=mysqli_connect("localhost","root","","hr");
      	$sql="SELECT * FROM `department`";
        $query=mysqli_query($con,$sql);
        while($row=mysqli_fetch_array($query)){
          ?>
            
            <?php echo '<option value="';  echo $row['DepID']; echo '">';?>
            <?php echo $row['Dep_name']; echo '</option>'?>

          <?php
        }
 
      ?>
	</select>
    <label class="text2"><b>Job title</b></label>

    <select name="Job"  id="Job-list" class="box2" required>
	<option value="<?php echo $_SESSION["Job_ID"]; ?>"><?php echo $_SESSION['Job_title']; ?></option>
	</select>
    <br><br><br><br>

    <label class="text1"><b>Email</b></label>

    <input type="text" placeholder="<?php echo $_SESSION["email"]; ?>" name="email" class="box1" readonly>

    <label class="text2"><b>Mobile</b></label>

    <input type="text" value="<?php echo $_SESSION["mobile"]; ?>" placeholder="<?php echo $_SESSION['mobile']; ?>" name="mobile" class="box2" >
        <br><br><br><br>

    <label class="text1"><b>Address</b></label>

    <input type="text" value="<?php echo $_SESSION["address"]; ?>" placeholder="<?php echo $_SESSION['address']; ?>" name="address" class="box1" >


    <br><br><br>

    <input type="submit" value="Save" class="btn btn-danger" name="save" id="save">
  	

  
	</form>
	<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "hr";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	if(isset($_POST['save'])){
		$sql = "insert into requests(Req_id,REmp_ID,address,mobile,Job_ID) values(DEFAULT,'".$_SESSION["empid"]."','".$_POST['address']."','".$_POST['mobile']."','".$_POST['Job']."')";
		$result=mysqli_query($conn,$sql);
		echo $sql;
		echo '<script>alert("Your request pending hr request")</script>';
}
	 ?>
	</div>
	</div>
	<div class="DataTable" style="overflow:auto;" id="Addrequest"> <!-- Add request block -->
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


if(isset($_POST["submitBtn"])&&$_POST["submitBtn"]!=" ")
{
  $ID=$_POST['ID'];
  $type=$_POST['Type'];
  $type_num=preg_replace("/[^0-9\.]/", '', $type);

  $Priority=mysqli_real_escape_string($conn,$_POST['priority']);
  date_default_timezone_set("Africa/Cairo");
  $date=date("Y-m-d h:i:s");
  if(isset($_POST['Salary']))
  {
    $salary=$_POST['Salary'];
  }
  else {
    $salary=0;
  }
$sql="SELECT * FROM `letter_req` WHERE user_ID='$ID' AND req_status<>'ACCEPTED' AND req_status<>'REJECTED' AND req_status<>'CANCELED'";
$result=mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);
if($count<3)
{

$check=getimagesize($_FILES["attachment"]["tmp_name"]);
if($check !== false)
{

  $desc=mysqli_real_escape_string($conn,$_POST['Desc']);
  $image=$_FILES['attachment']['tmp_name'];
  $imgContent=addslashes(file_get_contents($image));

 $sqlimg="SELECT * FROM `Attachment` WHERE User_ID='$ID' AND Description='$desc'";
 $resultimg=mysqli_query($conn,$sqlimg);
 $countimg=mysqli_num_rows($resultimg);
 if($countimg==0)
 {
  $query="INSERT  INTO `Attachment`(`Attachment_ID`, `User_ID`, `Description`, `attachment`)
  VALUES (DEFAULT,'$ID','$desc','$imgContent')";
  $insert=mysqli_query($conn,$query);

}
}
else
{
  echo'<div class="invalid-feedback text-danger">cant be empty</div>';
}

$sqlletter="SELECT * FROM `letter_req` WHERE User_ID='$ID' AND type='$type_num'";
$resultletter=mysqli_query($conn,$sqlletter);
$countletter=mysqli_num_rows($resultletter);
if($countletter==0)
{
    $sql = "INSERT INTO `letter_req`(`Req_ID`, `type_id`, `user_ID`, `date_time`, `HRcomments`, `req_status`, `priority`, `Salary_Check`, `EmpComments`)
    VALUES (DEFAULT,'$type_num','$ID','$date','','PENDING','$Priority','$salary','')";
    if(mysqli_query($conn, $sql)){
     echo "<script>$(document).ready(function(){ $('#myModal').modal('show'); });</script>

        <div class='modal fade' id='myModal' role='dialog'>
            <div class='modal-dialog modal-confirm'>
              <div class='modal-content'>
              <div class='modal-header'>
          <img src='Success.png' style='position: absolute; margin: 0 auto;left: 0;right: 0;
           top: -50px;width: 95px;height: 95px;border-radius: 50%;background: transparet;padding: 20px;text-align: center;'>
            <h5 style='text-align: center;'>Success</h5>
            </div>
                <div class='modal-body'>
                  <p>Your Request has been submitted </p>
                </div>
                    <div class='modal-footer'>
                            <button type='button' class='btn btn-danger' data-dismiss='modal' onclick='location.reload();'>back</button>
                            <button type='button' class='btn btn-success' data-dismiss='modal' onclick='myFunction()'>View</button>
                                        <script>
                                        function myFunction()
                                        {
                                          location.href='/request/index.php';
                                        }
                                        </script>
                    </div>
                </div>
            </div>
        </div>";
     }
   }
    else {
     echo"Error";
    }


}
else {
  echo "<script>$(document).ready(function(){ $('#myModal').modal('show'); });</script>

     <div class='modal fade' id='myModal' role='dialog'>
         <div class='modal-dialog modal-confirm'>
           <div class='modal-content'>
           <div class='modal-header'>
       <img src='error.jpg' style='position: absolute; margin: 0 auto;left: 0;right: 0;
        top: -50px;width: 95px;height: 95px;border-radius: 50%;background: transparet;padding: 20px;text-align: center;'>
         <h5 style='text-align: center;'>WARNING </h5></div>
             <div class='modal-body'>
               <p>You Exceeded your requests limit, try again later</p>
             </div>
                 <div class='modal-footer'>
                   <button type='button' id='back' class='btn btn-danger' data-dismiss='modal' onclick='location.reload();';>Back</button>
                 </div>
             </div>
         </div>
     </div>";
}
}

 ?>

<body>
<div class="container " style="width:100%;height:100%;">
<form  action='#' method="post"  enctype="multipart/form-data">
<div class="form-group">

  <br>

<input  type="text" value="<?php echo $_SESSION["empid"]; ?>" name="ID"  hidden>

<label for="Fname">First Name:</label>
<input  class="form-control mb-4" value="<?php echo $_SESSION["FirstName"]; ?>" type="text" name="Fname"  placeholder="First Name"  readonly>
<label for="Lname">Last Name:</label>
<input  class="form-control mb-4" value="<?php echo $_SESSION["LastName"]; ?>" type="text" name="Lname"  placeholder="Last Name"  readonly>
<label> With Salary ?</label>
<input class="browser-default custom-select mb-4" type="checkbox" name="Salary" value="1">
<br>
<?php
if(isset($_POST['Salary']))
{
$salary=$_POST['Salary'];
}
else
{
$salary=0;
}

 ?>
<label for="Priority">Priority</label>
<select class="form-control form-control-lg" name="priority" >
<option>Select</option>
<option>HIGH</option>
<option>MEDUIM</option>
<option>LOW</option>
</select>

 <br>
<label for="letter">Type of letter requested:</label>
<?php
echo '<select class="form-control form-control-lg" name="Type" >
<option>Select</option>';

$sqli = "SELECT * FROM letters";
$result = mysqli_query($conn, $sqli);
while ($row = mysqli_fetch_array($result)) {

echo '<option>'.$row['type_ID']." ".$row['type_name'].'</option>';

}
echo '</select>';
?>


  <div class="custom-file">
    <label class="custom-file-label" for="image">  Select image to upload:</label>
    <input type="file" class="custom-file-input" id="customFile" name="attachment" required>
  </div>

  <label for="Desc">Desc</label>
  <select class="form-control form-control-lg" name="Desc" required>
  <option>Select</option>
  <option>Passport</option>
  <option>National ID</option>
  </select>
<br>


<input  class="btn btn-info" type="submit" name="submitBtn" value="Submit  " >

</div>
</div>
</form>
	</div>
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

	 ?>
	 <script>
	 	$(document).ready(function(){

	 		$.ajax({
	 			url: 'ajax_get_data.php',
	 			success: function(data){

	 				$("#Request-data").html(data);
	 			}
	 		})
	 	});




	 </script>
	<div class="DataTable" style="overflow:auto;" id="Viewrequest"> <!-- View request block -->

<div class="container" style="width:100%;height:100%;">
	<h1>Requests</h1>
</div>
	<div id="Request-data" style="width:100%;height:100%;">
	</div>
	</div>

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

	 ?>
	 <script>
	 	$(document).ready(function(){

	 		$.ajax({
	 			url: 'ajax_get_accepted.php',
	 			success: function(data){

	 				$("#Request-accept").html(data);
	 			}
	 		})
	 	});
		$(document).ready(function(){

	 		$.ajax({
	 			url: 'ajax_get_rejected.php',
	 			success: function(data){

	 				$("#Request-Rejected").html(data);
	 			}
	 		})
	 	});



	 </script>

	<div class="DataTable" style="overflow:auto;" id="History"> <!-- History block -->


	<div class="container" style="padding-top:50px;width:100%;height:100%;">
	<h3>Accepted</h3>
  <div id="Request-accept">
	</div>
	<h3>Rejected</h3>
	<div id="Request-Rejected">
	</div>
  </div>

</div>
	</div>



</body>
</html>


