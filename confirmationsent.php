<?php
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Welcome <?= $first_name.' '.$last_name ?></title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/css/mystyles.css" rel="stylesheet">
	
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="bootstrap/css/templatecss/font-awesome.css" rel="stylesheet">
    <link href="bootstrap/css/templatecss/animate.min.css" rel="stylesheet">
    <link href="bootstrap/css/templatecss/owl.carousel.css" rel="stylesheet">
    <link href="bootstrap/css/templatecss/owl.theme.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="bootstrap/css/templatecss/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="bootstrap/css/templatecss/custom.css" rel="stylesheet">

    <!-- <script src="js/respond.min.js"></script> -->

    <link rel="shortcut icon" href="favicon.png">


  </head>
  
  <body>
	<?php include 'header.php';?>
	


	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					  <div class="form text-center">

						  <h1 class="text-primary">Welcome</h1>
						  
						  <p>
						  <?php 
					 
						  // Display message about account verification link only once
						  if ( isset($_SESSION['message']) )
						  {
							  echo $_SESSION['message'];
							  
							  // Don't annoy the user with more messages upon page refresh
							  unset( $_SESSION['message'] );
						  }
						  
						  ?>
						  </p>
						  
						  <?php
						  
						  // Keep reminding the user this account is not active, until they activate
						  if ( !$active ){
							  echo
							  '<div class="info">
							  Account is unverified, please confirm your email by clicking
							  on the email link!
							  </div>';
						  }
						  
						  ?>
						  
						  <h2><?php echo $first_name.' '.$last_name; ?></h2>
						  <p><?= $email ?></p>
						  
						  <a href="logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>


	
	<?php include 'footer.php';?>
   
       
   
   
   
   

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
