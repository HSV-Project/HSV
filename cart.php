<?php require 'getProductInfo.php';
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
	<?php include 'deleteFromCart.php';?>
	<?php require 'header.php';?>
	
	
	
	
	
	
	
	<div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a>
                        </li>
                        <li>Shopping cart</li>
                    </ul>
                </div>

                <div class="col-md-9" id="basket">

                    <div class="box">

                        <form method="POST" action="checkout1.php">

                            <h1>Shopping cart</h1>
                            <p class="text-muted">You currently have <?php 
					if(isset($_COOKIE["productInCart"] )){
												echo count(unserialize($_COOKIE["productInCart"]));
												} 
												else{
													echo "0";
												} ?> item(s) in your cart.</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Quantity</th>
                                            <th>Unit price</th>
                                            <th>Discount</th>
                                            <th colspan="2">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php 
											if(isset($_COOKIE["productInCart"] )){
												$total=0;
												$nthElement = 0;
												$cookieAry = unserialize($_COOKIE["productInCart"]);
												
												foreach ($cookieAry as $prodId => $quantity){
													
													$nthElement+=1; ?>
									
									
													<tr id=<?php echo $nthElement;?>>
														<td>
															<a href="#">
																<img src=<?php echo getProductImg($prodId);?> alt="White Blouse Armani">
															</a>
														</td>
														<td><a href="#"><?php echo getProductName($prodId);?></a>
														</td>
														<td>
															<input type="number" class="qty" max=<?php echo getProductQuantity($prodId);?> value=<?php echo $quantity;?> class="form-control" onclick="recalculate(<?php echo $nthElement;?>,<?php echo $prodId;?>)">                                     
														</td>
														<td>$<span class = "unitPrice"><?php echo getProductPrice($prodId); ?></span></td> 
														<td>$0.00</td> 
														<td>$<span class="priceToCalculate"><?php $total+=getProductPrice($prodId) * $quantity;echo getProductPrice($prodId) * $quantity; ?></span></td> 
														<td><a href="cart.php?productId=<?php echo $prodId;?>"><i class="fa fa-trash-o"></i></a>
														</td>
													</tr>
													
												<?php }	
										
											}
										
										?>
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5" >Total</th>
                                            <th colspan="2" id="tableTotal" >$<?php if(isset($_COOKIE['productInCart'])){echo $total;}?></th>
                                        </tr>
                                    </tfoot>
                                </table>
								
                            </div>
                            <!-- /.table-responsive -->
							
							

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="index.php" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                                </div>
                                <div class="pull-right">
                                    <!--<button class="btn btn-default"><i class="fa fa-refresh"></i> Update basket</button>-->
                                    <button type="submit" class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>

                        

                    </div>
                    <!-- /.box -->
					<span id="test">TEST</span>

                    


                </div>
                <!-- /.col-md-9 -->

                <div class="col-md-3">
                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Order summary</h3>
                        </div>
                        <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Order subtotal</td>
                                        <th>$<span id="subTotal" ><?php if(isset($_COOKIE['productInCart'])){echo $total;}?></span></th>
                                    </tr>
                                    <tr>
                                        <td>Shipping and handling</td>
                                        <th>$10.00</th>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <th>$0.00</th>
                                    </tr>
									<tr>
                                        <td><?php if(isset($_SESSION['first_name'])){echo "offer of the day";} else{echo "Login to avail offers";}?></td>
                                        <th>-$<?php if(isset($_SESSION["offer"])){
												if($total>50){											
												echo .35*$total;
												}
												else{
													echo "Total less than $50";
													}
											}?></th>
                                    </tr>
									
                                    <tr class="total">
                                        <td>Total</td>
										<?php if(isset($_COOKIE['productInCart'])){if(isset($_SESSION["offer"])&& $total>50){$finalTotal = $total-(.35*$total)+10;}else{$finalTotal = $total+10;}}?>
                                        <th>$<span id="anotherTotal"  ><?php echo $finalTotal?></span></th>
                                    </tr>
									<input type="text" class="hidden" value=<?php echo $finalTotal;?> name="total">
                                </tbody>
                            </table>
                        </div>

                    </div>

</form>
                    <div class="box">
                        <div class="box-header">
                            <h4>Coupon code</h4>
                        </div>
                        <p class="text-muted">If you have a coupon code, please enter it in the box below.</p>
                        <form>
                            <div class="input-group">

                                <input type="text" class="form-control">

                                <span class="input-group-btn">

					<button class="btn btn-primary" type="button"><i class="fa fa-gift"></i></button>

				    </span>
                            </div>
                            <!-- /input-group -->
                        </form>
                    </div>

                </div>
                <!-- /.col-md-3 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
	
	
	
	
	
	
	
	<?php include 'footer.php';?>
   
       
   
   
   
   

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="js/cart.js"></script>
  </body>
</html>