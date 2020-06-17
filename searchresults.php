<?php include "db.php"; ?>

<!DOCTYPE html>
<html>

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<style type="text/css">

	#faq
	{
		background-color: white;
	    top: 200%;
	    width: 100%;
	    height: 200%;	
	}
	.faq-component
	{
		position: absolute;
		width: 90%;
		top: 15%;
	}

</style>

<body>

	<div id="faq">
	<div class="faq-components">
	<section class="cd-faq">
	<div class="cd-faq-items">

	<ul id="basics" class="cd-faq-group">

		<?php
		     	$errorlevel = E_WARNING;
				$errormsg = 'No Search Results Are Available Right Now.';
			 
				function errorHandler($errorlevel, $errormsg)
				{
					  echo $errormsg;
				}

				set_error_handler("errorHandler");
		?>
    

        <?php
             if (isset($_POST[ 'search' ])) 
            {
				
                $q = $_POST[ 'search' ];

                $Query = "SELECT Q, A FROM qanda WHERE Q_type LIKE '$q%' AND Q_type != 'FAQ'  LIMIT 5";
                $ExecQuery = MySQLi_query($con, $Query);
                  
                echo '<ul>';


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
            <br>

        <?php
           }
		    }
		     else
		    {
		?>		
				<div class='alert alert-info'><?php errorHandler($errorlevel, $errormsg);?></div>
		<?php       
		    }
              }
        ?> 

    </ul>  

    </div>
    </section> 
    </div> 
    </div>

<script src="js/jquery-2.1.1.js"></script>
<script src="js/main.js"></script> 

</body>
</html>
