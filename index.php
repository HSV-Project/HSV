
<?php
	require 'Database.php';
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

    

    <link rel="shortcut icon" href="favicon.png">


  </head>
  
  <body>
	<?php include 'header.php';?>
	
	<?php
		$sql = "SELECT * FROM Inventory ORDER BY productAddedDate DESC LIMIT 1";
		$result = $mysqli->query($sql);
		$row1 = $result->fetch_assoc();
		
		
		$sql = "SELECT * FROM Inventory ORDER BY productAddedDate DESC LIMIT 1, 1";
		$result = $mysqli->query($sql);
		$row2 = $result->fetch_assoc();
		
		
		$sql = "SELECT * FROM Inventory ORDER BY productAddedDate DESC LIMIT 2, 1;";
		$result = $mysqli->query($sql);
		$row3 = $result->fetch_assoc();
	?>
	
	<!-- Carousel -->
	<div class="container">
	
		<div id="myCarousel" class="carousel slide" data-ride="carousel" >
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner">
				<div class="item active" >
					<a href="productDetail.php?productId=<?php echo $row1['productID']?>">
				  <img src="<?php echo $row1['productImage'];?>" alt="" style="max-height: 450px;" class="center-block">
				  <div class="carousel-caption" style="color: white;    text-shadow: 2px 2px 4px green; max">
					<h3><?php echo $row1['productName'];?></h3>
					<p>Cost: <?php echo $row1['productPrice'];?>$</p>
				  </div>
				  </a>
				</div>

				<div class="item" >
				<a href="productDetail.php?productId=<?php echo $row2['productID']?>">
				  <img src="<?php echo $row2['productImage'];?>" alt="" style="max-height: 450px;" class="center-block">
				  <div class="carousel-caption" style="color: white;    text-shadow: 2px 2px 4px green; ">
					<h3><?php echo $row2['productName'];?></h3>
					<p>Cost: <?php echo $row2['productPrice'];?>$</p>
				  </div>
				</a>  
				</div>

				<div class="item" >
				<a href="productDetail.php?productId=<?php echo $row3['productID']?>">
				  <img src="<?php echo $row3['productImage'];?>" alt="New York" style="max-height: 450px;" class="center-block">
				  <div class="carousel-caption" style="color: white;    text-shadow: 2px 2px 4px green;">
					<h3><?php echo $row3['productName'];?></h3>
					<p>Cost: <?php echo $row3['productPrice'];?>$</p>
				  </div>
				 </a> 
				</div>
			  </div>

			  <!-- Left and right controls -->
			  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#myCarousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Next</span>
			  </a>
		</div>
	</div>
	
	
	<br>
	
	<!-- Product Categories -->
	<div class="container">
		<div class="row same-height-row">
		  <div class="col-md-4">
			<div class="thumbnail">
                            <a href="productList.php?department=books">
				<img src="img/Books.png" alt="books" >
				<div class="caption">
				  <h3 class="text-center">Books</h3>
				</div>
			  </a>
			</div>
		  </div>
		  <div class="col-md-4">
			<div class="thumbnail">
			  <a href="productList.php?department=furniture">
				<img src="img/furniture.jpeg" alt="furniture" >
				<div class="caption">
				  <h3 class="text-center">Furniture</h3>
				</div>
			  </a>
			</div>
		  </div>
		  <div class="col-md-4">
				<div class="thumbnail">
				  <a href="productList.php?department=electronics">
					<img src="img/electronics.jpg" alt="Electronics" >
					<div class="caption">
					  <h3 class="text-center">Electronics</h3>
					</div>
				  </a>
				</div>
			</div>
		</div>
	</div>
	
	
	<!-- Become a seller -->
	<div class="container <?php echo checkIfNotLoginOrSellerThenHide();?>">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="box">
					<form action="makeHimSeller.php" method="post">
						<div class="form-group">
							<h3 class="text-center text-primary">Want to sell something!!!</h3>
							<div class="text-center"> 
							  <button class="btn btn-primary"/><i class="fa fa-odnoklassniki" aria-hidden="true"></i>Become a seller</button>
							</div>	
							<!-- This input field is needed, to get the email of the user -->
						    <input type="hidden" name="email" value="<?= $_SESSION["email"] ?>">    
						</div>
					</form>
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