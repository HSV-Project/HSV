<?php require 'checkInCart.php' ;
require 'Database.php';
?>
<?php
	$productIDpassed=$_GET['productId'];
    session_start();
	if(isset($_SESSION['productList'])){
    $productList=$_SESSION['productList'];
	
    
    
    //$department=$_GET['department'];

    if(count($productList)>0){
        foreach ($productList as $row){ 
            if($row["productID"]==$productIDpassed){
                $productID=$row["productID"];
                $productName=$row["productName"];
                $productDescShort=$row["productDescShort"];
                $productDescLong=$row["productDescLong"];
                $productPrice=number_format($row["productPrice"],2);
                $productQuantityAvail=$row["productQuantityAvail"];
                $productAddedDate=$row["productAddedDate"];
                $productCategory=$row["productCategory"];
                $productImage=$row["productImage"];
                $productSellerId=$row["productSellerId"];
            }
        }
    }
	}
	
	if(!isset($productID)){
		
		$sql = "SELECT * FROM Inventory WHERE productID=$productIDpassed";
		$result=$mysqli->query($sql);
		$row = $result->fetch_assoc();
		
		
		$productID=$row["productID"];
		$productName=$row["productName"];
		$productDescShort=$row["productDescShort"];
		$productDescLong=$row["productDescLong"];
		$productPrice=number_format($row["productPrice"],2);
		$productQuantityAvail=$row["productQuantityAvail"];
		$productAddedDate=$row["productAddedDate"];
		$productCategory=$row["productCategory"];
		$productImage=$row["productImage"];
		$productSellerId=$row["productSellerId"];
		
	}
    
    ?>
	
	
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	//print_r($_POST);
	$prodId = $_POST['productID'];
	$userID = $_POST['userID'];
	$review = $_POST['review'];
	$stars = $_POST['NoOfStars'];
	$sql = "INSERT INTO Reviews(reviewProductId, reviewUserId, reviewDesc, reviewStars) VALUES('$prodId','$userID','$review','$stars')";
	$mysqli->query($sql);
}
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
	
	
	
	<div class="container">
		

                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div id="mainImage">
                                <img src="<?php echo $productImage; ?>" alt="" class="img-responsive">
                            </div>

                            <div class="ribbon sale">
                                <div class="theribbon">SALE</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->

                            <div class="ribbon new">
                                <div class="theribbon">NEW</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->

                        </div>
                        <div class="col-sm-6">
                            <div class="box">

                                								
                                <p class="text-center buttons">
                                    <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a>                                  
                                </p>

                                        <form action="setTheCookies.php" method="post">
                                                <h1 class="text-center"><?php echo $productName; ?></h1>
                                                <p class="goToDescription text-center"><a href="#details" class="scroll-to"><u>Scroll to product details</u></a>
                                                </p>
                                                <h2 class="price text-center">$<?php echo $productPrice; ?></h2>

                                                <p class="text-center text-primary <?php echo checkIfAlreadyInCartThenHide($productID);?>"><strong>Select Quantity</strong></p>
                                                <p class="text-center <?php echo checkIfAlreadyInCartThenHide($productID);?>"><input type="number" value="1" step ="1" min="1" max="<?php echo $productQuantityAvail; ?>" name="qtyPurchased"/> </p><p class="text-center" style="color:blue;">Available in stock <?php echo $productQuantityAvail;?></p> 
                                                <!-- This input field is needed, to get the product ID  -->
                                                <input type="hidden" name="productId" value="<?= $productID ?>">   
                                                <p class="text-center buttons">
                                                        <button type="submit" class="btn btn-primary <?php if($productQuantityAvail==0){echo "hidden";} else{ echo checkIfAlreadyInCartThenHide($productID);}?>"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        <a href="cart.php" type="submit" class="btn btn-primary <?php echo checkIfNotInCartThenHide($productID);?>"><i class="fa fa-shopping-cart"></i>Go to cart</a>                  
                                                </p>
                                        </form>	


                            </div>

                             <div class="row" id="thumbs">
                            </div>
                        </div>

                    </div>
					
		<div class="box" id="details">
                        <p>
                            <h4>Details</h4>
                            <p><?php echo $productDescShort; ?></p>
                            <p><?php echo $productDescLong; ?></p>
                            <!--<h4>Material & care</h4>
                            <ul>
                                <li>Polyester</li>
                                <li>Machine wash</li>
                            </ul>
                            <h4>Size & Fit</h4>
                            <ul>
                                <li>Regular fit</li>
                                <li>The model (height 5'8" and chest 33") is wearing a size S</li>
                            </ul>

                            <blockquote>
                                <p><em>Define style this season with Armani's new range of trendy tops, crafted with intricate details. Create a chic statement look by teaming this lace number with skinny jeans and pumps.</em>
                                </p>
                            </blockquote>-->
							<h4 class="<?php echo checkIfLoginThenHide();?> text-primary">Login to add reviews</h4>
                            <form class="<?php echo checkIfNotLoginThenHide();?>" action="productDetail.php?productId=<?php echo $productID;?>" method="post">
                                    <div class="form-group">
                                            <h4>Add a review</h4>
                                            <p><input name="NoOfStars" type="number" step="1" min="0" max="5" >Select star rating</p>
                                    </div>
                                    <div class="form-group">
                                            <input type="text" name="review" placeholder="Enter your review here" class="form-control">
                                    </div>
									<input type="text" class="hidden" name="userID" value=<?php echo $_SESSION['id'];?>>
									<input type="text" class="hidden" name="productID" value=<?php echo $productID;?>>
                                    <div class="text-center">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save review</button>
                                    </div>
                            </form>

                            <div>
                                    <h4>Reviews:</h4>
                            </div>

							<?php 
								
								$query="SELECT * FROM Reviews,Users WHERE reviewProductId = $productID AND Reviews.reviewUserId = Users.userID";
								$result = $mysqli->query($query);
								
								while($row = $result->fetch_assoc()) {?>
									<blockquote>
									
									<?php for ($x = 0; $x < $row['reviewStars'] ; $x++) { ?> 
										
										<span class="glyphicon glyphicon-star" style="color:yellow; font-size:1.3em;"></span>
									<?php } 
									for ($x = 0; $x < 5-$row['reviewStars'] ; $x++) { ?>
										<span class="glyphicon glyphicon-star" style="color:silver; font-size:1.3em;"></span>
									<?php } ?>
									
									<?php echo $row['reviewDesc']; ?>
									<footer><?php echo $row['firstName']." . ".$row['lastName']; ?></footer>
									</blockquote>
								<?php }
							
							?>
                            
							
							
                    </div>
			
</div>	
	
	
	
	
	<?php include 'footer.php';?>
   
       
   
   
   
   

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
	
	

  </body>
</html>