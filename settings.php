<?php 
session_start();
?>

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
	
	<?php include 'getUserInfo.php';?>
	<div class="container">
		<div class="row">
			<div class="col-md-6  col-md-offset-3">
				<form action="saveChanges.php" method="post">
					<div class="form-group">
						<label for="fName">First Name</label>
						<input type="text" class="form-control" id="fname" name="fname" placeholder="<?php echo getFirstName($_SESSION["email"])?>">
					</div>
					<div class="form-group">
						<label for="lName">Last Name</label>
						<input type="text" class="form-control" id="lName" name="lName" placeholder="<?php echo getLastName($_SESSION["email"])?>">
					</div>
					
					<!-- This input field is needed, to get the email of the user -->
						  <input type="hidden" name="email" value="<?= $_SESSION["email"] ?>">    
					<div class ="text-center">
						<button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>Save Changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<hr>
	
	
	
	<div class="container">
		<div class="row">
			<div class="col-md-6  col-md-offset-3">
				<form action="changePassword.php" method="post">
						  
						  <div class="form-group">
							<label for="pass">
							  New Password<span class="req">*</span>
							</label>
							<input type="password"required class="form-control" name="newpassword" autocomplete="off" id="pass"/>
						  </div>
							  
						  <div class="form-group">
							<label for="confirm">
							  Confirm New Password<span class="req">*</span>
							</label>
							<input type="password"required class="form-control" name="confirmpassword" autocomplete="off" id="confirm"/>
						  </div> 
							<!-- This input field is needed, to get the email of the user -->
						  <input type="hidden" name="email" value="<?= $_SESSION["email"] ?>">   
						 <div class="text-center"> 
						  <button class="btn btn-primary"/><i class="fa fa-wrench" aria-hidden="true"></i>Change Password</button>
						 </div>	
			   </form>
			</div>
		</div>
	</div>
	
	<form action="deleteAccount.php" method="post" onsubmit="return confirm('Are you sure you want to Delete your account?');">
		<div class="form-group text-right">					
				<button class="btn btn-danger"/><i class="fa fa-trash-o fa-lg"></i> Delete Account</button>				
		</div>
		<!-- This input field is needed, to get the email of the user -->
	    <input type="hidden" name="email" value="<?= $_SESSION["email"] ?>">   
	</form>
	
	
	
	<?php include 'footer.php';?>
   
       
   
   
   
   

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>