<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="icon" type="image/ico" href="img2.png"  />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>
<?php include "login.php";?>
<?php include "signup.php";?>	

<style type="text/css">
	.background{
		background-color: rgba(0, 0, 0, 0.75);;
	  	width: 100%;
	  	height: 100%;
	  	position: fixed;
	  	top: 0;
	  	left: 0;
	  	overflow-x: scroll;
	}
	body{
	background-image:url(img1.jpg);
	background-repeat:no-repeat;
	background-size:cover;
	}

	.topnav{
		background-color: rgba(0, 0, 0, 0.75);;
	  	width: 100%;
	  	top: 0;
	  	position: fixed;
	}
	.topnav a {
	  float: left;
	  color: white;
	  text-align: center;
	  padding: 14px 50px;
	  text-decoration: none;
	  font: 24px bold;
	}
	.topnav a:hover {
	  background-color: lightblue;
	  color: black;
	}
	.topnav a.active {
	  background-color: green;
	  color: white;
	}
	.topnav img {
	  height: 30px;
	  float: right;
	  padding: 14px 80px;
	}

	.slideshow-container{
		width: 80%;
		padding-top: 14%;
		padding-left: 10%; 
		padding-bottom: 13%;

	}
	.myslides{
		width: 75%;
	}
	.dots-group{
		padding-left: 20%
	}

	.dot {
	  height: 15px;
	  width: 15px;
	  margin: 0 2px;
	  background-color: #bbb;
	  border-radius: 50%;
	  display: inline-block;
	  transition: background-color 0.6s ease;
	}

	.active {
	  background-color: blue;
	}

	.text{
		font: 24px bold;
		text-align: right;
		color: white;

	}
	.box{
		font-size: 20px;
		
	}
	.button{
		width: 50%;
		font-size: 25px;
		position: absolute;
		left: 10%;

		
		
	}

	.login-components{
		width: 60% ;
	    position: absolute;
	    right: 10%;
	    top: 25%;
	    width: 25%;
	    height: 50%;	
	  
		
	}
	.text2{
		font-size: 20px ;
		color: white;
		

	}




		
		
	}
	.signup-button{
		
		width: 50%;
		font-size: 25px;
		position: relative;
		left: 10%;
	
	}

	.text3{
		font: 24px bold;
		color: black;

	}

	#signup{

		background-color:  rgba(255, 255, 255, 1);
	    width: 100%;
	    height: 100%;	
	}

	.signup-components{
		width: 40%;
		position: relative;
		left: 55%;
		top: 4%;
		
	}
	#msg{
		
		position: absolute;
		left: 30%;
	}
	.box2{
		font-size: 20px;
		position: absolute;
		left: 30%;
	}
	.title{
		text-align: center;
		font-size: 30px;
		padding-top: 6%;
		color: blue;
	}
	.signup_image{
		position: absolute;
		left: 5%;
		top: 135%;		
		font-size: 20px;
	}

	#faq{

		background-color: white;
	  	width: 100%;
	}
	.faq-components{
		position: relative;
		width: 90%;
		padding-bottom: 3%;
		
	}

</style>

<body>


<div class="background">


	<div id="home">


	<div class="slideshow-container" >

	<div class="mySlides">
	  <img src="img4.jpg" width="50%" >
	</div>
	<div class="mySlides">
	  <img src="img3.jpg" width="50%" >
	</div>
	<div class="mySlides">
	  <img src="img7.jpg" width="50%" >
	</div>
	<div class="mySlides">
	  <img src="img5.jpg" width="50%" >
	</div>


	

	<br>

	<div class="dots-group">
	  <span class="dot"></span> 
	  <span class="dot"></span> 
	  <span class="dot"></span> 
	  <span class="dot"></span> 
	</div>
	</div>
	<script>
		var slideIndex = 0;
		showSlides();

		function showSlides() {
		  var i;
		  var slides = document.getElementsByClassName("mySlides");
		  var dots = document.getElementsByClassName("dot");
		  for (i = 0; i < slides.length; i++) {
		    slides[i].style.display = "none";  
		  }
		  slideIndex++;
		  if (slideIndex > slides.length) {slideIndex = 1}    
		  for (i = 0; i < dots.length; i++) {
		    dots[i].className = dots[i].className.replace(" active", "");
		  }
		  slides[slideIndex-1].style.display = "block";  
		  dots[slideIndex-1].className += " active";
		  setTimeout(showSlides, 2000); 
		}
	</script>
</div>
<div id="login">


  <div class="login-components">
  <form action="" method="post">
    <br>
    <label class="text"><b>Email</b></label>
    <br>
    <br>
    <input type="text" placeholder="Email" name="email" class="box" required>
    <br><br>
    <label class="text"><b>Password</b></label>
    <br><br>
    <input type="password" placeholder="Password" name="password" class="box" required>
    <br><br><br>
    <input type="submit" value="Login" class="button" name="login">
    
  </form>
  </div>

<div id="signup">
<div class="title"><b>Signup</b></div>
<div class="signup_image">
<img src="b1.jpg">

</div>

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

$(document).ready(function(){
      $("#email").keyup(function(){
        var filter = /^[a-zA-Z0-9_.-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+\.[a-z]{1,4}$/;
        var email = $("#email").val();
        if(!filter.test(email)){
          $("#msg").html("Please enter valid email").css("color","red");
          disableSignup();
        }

        else{
          $.ajax({
          type: "POST",
          url: "GetEmail.php",
          data:'email='+email,
          success: function(data){
            $("#msg").html(data).css("color","red");;
          }
          });
        }
      });
    });
function enableSignup(){
    document.getElementById("signupbutton").disabled = false;
}
function disableSignup(){
document.getElementById("signupbutton").disabled = true;
}
 </script>

<div class="signup-components">
	<form action="" method="post">
    <br>

    <label class="text3"><b>First name</b></label>
    <input type="text" placeholder="First name" name="firstname" class="box2" required>
    <br><br>
 
    <label class="text3"><b>Last name</b></label>
    <input type="text" placeholder="Last name" name="lastname" class="box2" required>
    <br><br>
 
    <label class="text3"><b>Department</b></label>

    <select name="Department" id="Department-list"  onChange="getJob(this.value);" class="box2" required>
      <option value="">Department</option>
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
	<br><br>
    <label class="text3"><b>Job title</b></label>

    <select name="Job" id="Job-list" class="box2" required>
	<option value="">Job title</option>
	</select>
    <br><br>

    <label class="text3"><b>Email</b></label>

    <input type="text" placeholder="Email" name="email" id="email" class="box2" required>
    <div id="msg"></div>
    <br><br>

    <label class="text3"><b>Password</b></label>

    <input type="password" placeholder="Password" name="password" class="box2" required>
    <br><br>           

    <input type="submit" value="Signup" class="button" name="signup" id="signupbutton" disabled>
  	

  
	</form>
	</div>
	<br><br>

</div>

	<div id="faq">
	<div class="title"><b>About Us</b></div>
	<div class="faq-components">
	<section class="cd-faq">

	<div class="cd-faq-items">
		<ul id="basics" class="cd-faq-group">
			<li>
				<a class="cd-faq-trigger" href="#0" style=" color:blue">What do we do</a>
				<div class="cd-faq-content" style=" color:blue">
					<p></p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0" style=" color:blue">Our products</a>
				<div class="cd-faq-content" style=" color:blue">
					<p></p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0" style=" color:blue">Our policies</a>
				<div class="cd-faq-content" style=" color:blue">
					<p></p>
				</div> <!-- cd-faq-content -->
			</li>


		</ul> <!-- cd-faq-group -->
	</div>
	</section> <!-- cd-faq -->

<script src="js/main.js"></script> 


</div>
</div>
	<div class="topnav" >
	  <a href="#home">Home</a>
	  <a href="#signup">Signup</a>
	  <a href="faq.php">Help page</a>
	  <img src="img2.png" >
	</div>


</body>
</html>
