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
	
	<?php require 'header.php';?>
	
	
	
	
	
	
	
	<div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Checkout - Order review</li>
                    </ul>
                </div>

                <div class="col-md-9" id="basket">
					
                    <div class="box">

                        <form method="POST" action="checkout3.php">

                            <h1>Checkout - Order review</h1>
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="checkout1.html"><i class="fa fa-map-marker"></i><br>Address</a>
                                </li>
                                <li><a href="checkout2.html"><i class="fa fa-truck"></i><br>Delivery Method</a>
                                </li>
                                <li><a href="checkout3.html"><i class="fa fa-money"></i><br>Payment Method</a>
                                </li>
                                <li class="active"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                                </li>
                            </ul>
                            
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                            <tr>
                                                <th colspan="2">Product</th>
                                                <th>Quantity</th>
                                                <th>Unit price</th>
                                                <th>Discount</th>
                                                <th>Total</th>
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
															<?php echo $quantity;?> 
														</td>
														<td>$<span class = "unitPrice"><?php echo getProductPrice($prodId); ?></span></td> 
														<td>$0.00</td> 
														<td>$<span class="priceToCalculate"><?php $total+=getProductPrice($prodId) * $quantity;echo getProductPrice($prodId) * $quantity; ?></span></td> 
														
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
							
							<?php if(isset($_COOKIE['productInCart'])){if(isset($_SESSION["offer"])&& $total>50){$totalTmp = $total-(.35*$total)+10;}else{$totalTmp = $total+10;}}?>
                                        
                                    
									<input type="text" class="hidden" value=<?php echo $totalTmp;?> name="total">

                            <div class="box-footer">
                                <div class="pull-left">
									<button type="submit" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to Delivery Method
                                    
                                </div>
                                
                            </div>
</form>
                        

                    </div>
                    <!-- /.box -->
					

                    


                </div>
                <!-- /.col-md-9 -->
<form method="POST" action="placeOrder.php">
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
										<?php if(isset($_COOKIE['productInCart'])){if(isset($_SESSION["offer"])&& $total>50){$totalTmp = $total-(.35*$total)+10;}else{$totalTmp = $total+10;}}?>
                                        <th>$<span id="anotherTotal"  ><?php echo $totalTmp?></span></th>
                                    </tr>
									<input type="text" class="hidden" value=<?php echo $totalTmp;?> name="total">
                                </tbody>
                            </table>
                        <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Place an order<i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
						</div>

                    
					
					</div>
					

</form>
                    

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