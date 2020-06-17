
<!DOCTYPE html>
<html lang="en">
<head>
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

    $qry = "SELECT letter_req.Req_ID,letter_req.user_ID,letters.type_ID,letters.type_name,Employees.FirstName,Employees.LastName,letter_req.priority,case when letter_req.Salary_Check=1 THEN 'With' ELSE 'Without' END AS Salary ,letter_req.req_status
              FROM letter_req INNER JOIN letters INNER JOIN Employees
              ON  letter_req.Req_ID='$id'
              AND letter_req.type_id=letters.type_ID
              AND letter_req.user_ID=Employees.Emp_ID";

    $rs = $dbConn->query($qry);

    $fetchAllData = $rs->fetch_all(MYSQLI_ASSOC);



    foreach($fetchAllData as $data)
    {

            $Fname = $data['FirstName'];
            $Lname = $data['LastName'];
            $priority = $data['priority'];
            $Type=$data['type_ID'];
            $typedesc=$data['type_name'];
            $salary = $data['Salary'];

    }

  if(isset($_POST["UpdateBtn"])&&$_POST["UpdateBtn"]!=" ")
  {

    $ID=$_POST['ID'];

    $type=$_POST['Type'];
    $type_num=preg_replace("/[^0-9\.]/", '', $type);

    $Priority=mysqli_real_escape_string($dbConn,$_POST['priority']);

    if(isset($_POST['Salary']))
    {
      $salary=$_POST['Salary'];
    }
    else {
      $salary=0;
    }

    $sql="UPDATE `letter_req`
         SET `type_id`= '$type_num',
        `priority`= '$Priority',
        `Salary_Check`= '$salary'
         WHERE Req_ID= '$ID' ";

    if(mysqli_query($dbConn, $sql)){

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
                   <p>Your Request has been updated </p>
                 </div>
                     <div class='modal-footer'>

                             <button type='button' class='btn btn-success' data-dismiss='modal' onclick='myFunction()'>Back</button>
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

  }



?>
<body>
<div class="container ">
<h1>Request Letter</h1>
<form  action='#' method="post"  enctype="multipart/form-data">
<div class="form-group">
<label class="custom-control-label" for="ID">Your ID:</label>
<input  class="form-control mb-4" type="text" name="ID"     placeholder="ID" value="<?php echo !empty($id)?$id:'';?>" readonly>

<label for="Fname">First Name:</label>
<input  class="form-control mb-4"  type="text" name="Fname"  placeholder="First Name" value="<?php echo !empty($Fname)?$Fname:'';?>" disabled >
<label for="Lname">Last Name:</label>
<input  class="form-control mb-4" type="text" name="Lname"  placeholder="Last Name" value="<?php echo !empty($Lname)?$Lname:'';?>" disabled>
<label> With Salary ?</label>
<input class="browser-default custom-select mb-4" type="checkbox" name="Salary" value="1" checked='$checked'>
<br>
<?php
    if($salary==1)
  {
    $checked='checked';
  }
  else{
     $checked = '';
      }
  ?>
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
<?php echo'<option>'.$priority.'</option>'?>
<option>----------------------------------Select----------------------------------------</option>
<option>HIGH</option>
<option>MEDUIM</option>
<option>LOW</option>
</select>

 <br>
 <label for="letter">Type of letter requested:</label>
 <?php
echo '<select class="form-control form-control-lg" name="Type" >
<option>'.$Type." ".$typedesc.'</option>';

$sqli = "SELECT * FROM letters where type_name<>'$typedesc'";
$result = mysqli_query($dbConn, $sqli);
while ($row = mysqli_fetch_array($result)) {

echo '<option>'.$row['type_ID']." ".$row['type_name'].'</option>';

  }
  echo '</select>';
  ?>

  <input  class="btn btn-primary" type="submit" name="UpdateBtn" value="Submit  " >
  </div>

</form>

</body>
</html>
