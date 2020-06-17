<?php include "db.php"; ?>

<!DOCTYPE html>
<html>

<head>
	<title>Help Page</title>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
	<script>
    $(document).ready(function()
    {
      $("#search").keyup(function() 
    
       {
         var q = $('#search').val();

         if (q == "") 
         {
            $("#display").html("");
         }
         else 
         {
            $.ajax({
                type: "POST",
                url: "searchresults.php",
                data: { search: q },
                success: function(html)
                {
                    $("#display").html(html).show();
                }
            });
         }
        });
    });
  </script>

</head>

<style type="text/css">

	.title
  {
		text-align: center;
		font-size: 20px;
		padding-top: 3%;
		color: blue;
	}

	#faq
  {
		background-color: white;
	  	/*position: absolute;*/
	    top: 200%;
	    width: 100%;
	    height: 200%;	
	}
	.faq-components
	{
		/*position: absolute;*/
		width: 90%;
		top: 15%;
	}
  .searchdev 
  {
    text-align: center;
    padding: 3% 25% 0%;  
  }
</style>


		<?php
		    $errorlevel = E_WARNING;
				$errormsg = 'No Questions Are Available Right Now.';
				function errorHandler($errorlevel, $errormsg)
				{
					  echo $errormsg;
				}
				set_error_handler("errorHandler");
		?>


<body>

<div id="faq">

  <!--search-->
  <div class="searchdev">
  <input class="form-control" id="search" type="text" placeholder="Search.."> 
  </div>
  <div id="display"></div>
  <!--search-->
	

	<div class="faq-components">
	<section class="cd-faq">
	<div class="cd-faq-items">
  <div class="title" id="faq">FAQs</div>
	<ul id="basics" class="cd-faq-group">

    <?php 
      $Query = "SELECT * FROM qanda WHERE Q_type='faq' ";

      $ExecQuery = MySQLi_query($con, $Query);

      if ($ExecQuery->num_rows > 0) 
      {
        while($Row = $ExecQuery->fetch_assoc()) 
        {
    ?> 

			<li>
				<a class="cd-faq-trigger" href="#0" style=" color:blue"> <?php echo $Row ['Q']; ?> </a>
				<div class="cd-faq-content" style=" color:blue">
					<p><?php echo $Row ['A']; ?></p>
				</div> 
			</li>

    <?php
        }
    }
      else
      {
    ?>		
				<div class='alert alert-info'><?php errorHandler($errorlevel, $errormsg);?></div>
		<?php 
      }
    ?> 

	</ul> 

  </div>
  </div>
  </section> 
  </div>
  </div>

<script src="js/jquery-2.1.1.js"></script>
<script src="js/main.js"></script> 

</body>
</html>
