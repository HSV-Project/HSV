<?php session_start();?>
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

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a>
                        </li>
                        <li>Contact</li>
                    </ul>

                </div>
				
	</div>			
	
	<div class="container">
		<div class="col-md-12">
			<div class="box" id="contact">
								<h1>Contact</h1>

								<p class="lead">Are you curious about something? Do you have some kind of problem with our products?</p>
								<p>Please feel free to contact us, our customer service center is working for you 24/7.</p>

								<hr>

								<div class="row">
									<div class="col-sm-4">
										<h3><i class="fa fa-map-marker"></i> Address</h3>
										<p>Eastern Michigan University
											<br>900 Oakwood Street
											<br>Ypsilanti
											<br>MI 48197
											<br>
											<strong>United States Of America</strong>
										</p>
									</div>
									<!-- /.col-sm-4 -->
									<div class="col-sm-4">
										<h3><i class="fa fa-phone"></i> Call center</h3>
										<p class="text-muted">This number is toll free if calling from United States Of America otherwise we advise you to use the electronic form of communication.</p>
										<p><strong>+33 555 444 333</strong>
										</p>
									</div>
									<!-- /.col-sm-4 -->
									<div class="col-sm-4">
										<h3><i class="fa fa-envelope"></i> Electronic support</h3>
										<p class="text-muted">Please feel free to write an email to us or to use our electronic ticketing system.</p>
										<ul>
											<li><strong><a href="mailto:">cosc631@gmail.com</a></strong>
											</li>
										</ul>
									</div>
									<!-- /.col-sm-4 -->
								</div>
								<!-- /.row -->

								
								<hr>
								<h2>Contact form</h2>

								<form>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label for="firstname">Firstname</label>
												<input type="text" class="form-control" id="firstname">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label for="lastname">Lastname</label>
												<input type="text" class="form-control" id="lastname">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label for="email">Email</label>
												<input type="text" class="form-control" id="email">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label for="subject">Subject</label>
												<input type="text" class="form-control" id="subject">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<label for="message">Message</label>
												<textarea id="message" class="form-control"></textarea>
											</div>
										</div>

										<div class="col-sm-12 text-center">
											<button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send message</button>

										</div>
									</div>
									<!-- /.row -->
								</form>


							</div>
						</div>
						<!-- /.row -->
				</div>	
				<!-- /.container -->
	
	
	<?php include 'footer.php';?>
   
       
   
   
   
   

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>