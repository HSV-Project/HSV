<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Shop Cart</title>

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
			<div class="col-md-6  col-md-offset-3">
				<form action="customer-orders.html" method="post">
					<div class="form-group">
						<label for="fName">First Name</label>
						<input type="text" class="form-control" id="fname"placeholder="First name from the database">
					</div>
					<div class="form-group">
						<label for="lName">Last Name</label>
						<input type="text" class="form-control" id="lName" placeholder="Last Name from the database">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" class="form-control" id="email" placeholder="Email from the database">
					</div>
					<div class="form-group text-left">					
						<button type="button" class="btn btn-default">Change Password</button>					
					</div>
					<div class="form-group text-right">					
						<span class="btn btn-danger" >
						<i class="fa fa-trash-o fa-lg"></i> Delete Account</span>
					</div>
					<div class ="text-center">
						<button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>Save Changes</button>
					</div>
				</form>
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