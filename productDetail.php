<?php
    session_start();
    $productList=$_SESSION['productList'];
    $productIDpassed=$_GET['productId'];
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
                                <h1 class="text-center"><?php echo $productName; ?></h1>
                                <p class="goToDescription text-center"><a href="#details" class="scroll-to"><u>Scroll to product details</u></a>
                                </p>
                                <h2 class="price text-center">$<?php echo $productPrice; ?></h2>
								
								<p class="text-center text-primary"><strong>Select Quantity</strong></p>
								<p class="text-center"><input type="number" step ="1" min="1" max="<?php echo $productQuantityAvail; ?>" /></p>
								
                                <p class="text-center buttons">
                                    <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a>                                  
                                </p>


                            </div>

                             <div class="row" id="thumbs">
                                <!--<div class="col-xs-4">
                                    <a href="img/detailbig1.jpg" class="thumb">
                                        <img src="img/detailsquare.jpg" alt="" class="img-responsive">
                                    </a>
                                </div>
                                <div class="col-xs-4">
                                    <a href="img/detailbig2.jpg" class="thumb">
                                        <img src="img/detailsquare2.jpg" alt="" class="img-responsive">
                                    </a>
                                </div>
                                <div class="col-xs-4">
                                    <a href="img/detailbig3.jpg" class="thumb">
                                        <img src="img/detailsquare3.jpg" alt="" class="img-responsive">
                                    </a>
                                </div>-->
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
                            <form action="" method="post">
                                    <div class="form-group">
                                            <h4>Add a review</h4>
                                            <p><input type="number" step="1" min="0" max="5" >Select star rating</p>
                                    </div>
                                    <div class="form-group">
                                            <input type="text" name="review" placeholder="Enter your review here" class="form-control">
                                    </div>
                                    <div class="text-center">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save review</button>
                                    </div>
                            </form>

                            <div>
                                    <h4>Reviews:</h4>
                            </div>


                            <div>
                                    <span>Review by:"user name"</span>
                                    <span class="glyphicon glyphicon-star" style="color:yellow; font-size:1.3em;"></span>
                                    <span class="glyphicon glyphicon-star" style="color:yellow; font-size:1.3em;"></span>
                                    <span class="glyphicon glyphicon-star" style="color:yellow; font-size:1.3em;"></span>
                                    <span class="glyphicon glyphicon-star" style="color:yellow; font-size:1.3em;"></span>
                                    <span class="glyphicon glyphicon-star" style="color:silver; font-size:1.3em;"></span>
                                    <span>Review statement_________________________________________________________</span>								
                            </div>
							
							
                    </div>
			
</div>

<div class="container">
	<div class="row">
		<div class="box">
					
					  <h1 class="text-primary text-center">Modify this product</h1>
					  <hr>	
					  <form action="#.php" method="post">
						  
						  <div class="form-group">
							<label for="pName">
							  Product Name
							</label>
							<input type="text"  class="form-control" name="productName" autocomplete="off" id="pName"/>
						  </div>
							  
						  <div class="form-group">
							<label for="descLong">
							  Long Description
							</label>
							<input type="text" class="form-control" name="descLong" autocomplete="off" id="descLong"/>
						  </div>
						  
						  <div class="form-group">
							<label for="descShort">
							  Short Description
							</label>
							<input type="text" class="form-control" name="descShort" autocomplete="off" id="descShort"/>
						  </div>
						  
						  <div class="form-group">
							<label for="price">
							  Price
							</label>
							<input type="text" class="form-control" name="price" autocomplete="off" id="price"/>
						  </div>
						  
						  <div class="form-group">
							<label for="quantity">
							  Quantity
							</label>
							<input type="text" class="form-control" name="quantity" autocomplete="off" id="quantity"/>
						  </div>
						  
						  <div class="form-group">
							<label for="imageMain">
							  Main Image
							</label>
							<input type="text" class="form-control" name="imageMain" autocomplete="off" id="imageMain"/>
						  </div>
						  
						  <div class="form-group">
							<label for="subImg1">
							  Sub Image 1
							</label>
							<input type="text" class="form-control" name="subImg1" autocomplete="off" id="subImg1"/>
						  </div>
						  
						  <div class="form-group">
							<label for="subImg2">
							  Sub Image 2
							</label>
							<input type="text" class="form-control" name="subImg2" autocomplete="off" id="subImg2"/>
						  </div>
						  
						  <div class="form-group">
							<label for="subImg3">
							  Sub Image 3
							</label>
							<input type="text" class="form-control" name="subImg3" autocomplete="off" id="subImg3"/>
						  </div>
						  
						  
						  
						  
						  
						 <div class="text-center"> 
						  <button class="button btn-primary"/>Modify</button>
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