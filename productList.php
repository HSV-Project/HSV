<?php 

include 'departmentProductList.php'; 
session_start();
$department=$_GET['department'];
$productList=get_products($department);
$_SESSION['productList']=$productList;
//echo count($productList);

//echo $productList[0];
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
            <?php 
            include 'header.php';
            
            ?>
            
	<div class="container">
		 <div class="panel-group">
                     <?php  if(count($productList)>0){
                            foreach ($productList as $row){ 
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
                            
                            ?>
			<div class="panel panel-default">
				<div class="row">
                                    <a href="productDetail.php?productId=<?php echo $productID; ?>">
						<div class="col-md-1">
						</div>
						<div class="col-md-2">
							<img src="<?php echo $productImage; ?>" class="img-responsive" alt="books" width="110" >
						</div>
						<div class="col-md-9">
							<p><strong class="text-primary">Product Name: </strong><span class="text-success"><?php echo $productName ?><span></p>
							<p><strong class="text-primary">Product Description:</strong> <span class="text-success"><?php echo $productDescShort ?></span></p>
							<p><strong class="text-primary">Cost:</strong><span class="text-success"> $<?php echo $productPrice ?></span></p>
                                                        <p><span class="text-success"><strong>Get it in the next 5 days</strong></span></p>
						</div>
					</a>
					
				</div>
			</div>
                    <?php } 
                    } 
                    else { ?>
                     <p><h4><strong><?php echo "No Results to be displayed"; ?></strong></h4></p>
                    <div class="row">
                    </div>
                    <?php } ?>	
            </div>
	</div>
	
	<?php include 'footer.php';?>
   
       
   
   
   
   

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>