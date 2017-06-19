<?php require "Database.php";
session_start();?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	//print_r($_POST);
	if(isset($_POST["total"])){
		 $total = $_POST["total"];		
		}
	
	if(isset($_SESSION['id'])){
		//print_r($_POST);
		
		
		$AddL1 = $_POST['Add1'];
		$AddL2 = $_POST['Add2'];	
		$apt = $_POST['Apt'];	
		$zip = $_POST['zip'];	
		$city = $_POST['city'];	
		$state = $_POST['state'];	
		$Telephone = $_POST['phone'];	
		
		$id = $_SESSION['id'];
		$sql = "SELECT * FROM addressCreditCard WHERE userId='$id'";
		$result = $mysqli->query($sql);
		
		//update
		if ( $result->num_rows > 0 ){
			$sql = "UPDATE addressCreditCard SET addressLine1='$AddL1', addressLine2 ='$AddL2', apt='$apt', zip='$zip', city='$city', state='$state', phone='$Telephone' WHERE userId='$id'";
			$mysqli->query($sql);
		}
		//add
		else{
			$sql = "INSERT INTO addressCreditCard(userId,addressLine1,addressLine2,apt,zip,city,state,phone) VALUES('$id','$AddL1','$AddL2','$apt','$zip','$city','$state','$Telephone')  ";
			$mysqli->query($sql);
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
	
	
	<div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Checkout - Delivery method</li>
                    </ul>
                </div>

                <div class="col-md-9" id="checkout">

                    <div class="box">
                        <form method="POST" action="checkout3.php">
                            <h1>Checkout - Delivery method</h1>
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="checkout1.html"><i class="fa fa-map-marker"></i><br>Address</a>
                                </li>
                                <li class="active"><a href="#"><i class="fa fa-truck"></i><br>Delivery Method</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                                </li>
                            </ul>

                            <div class="content">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="box shipping-method">

                                            <h4>fedex Next Day</h4>

                                            <p>Get it right on next day - fastest option possible.</p>

                                            <div class="box-footer text-center">

                                                <input type="radio" name="delivery" value="delivery1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="box shipping-method">

                                            <h4>Buledart Next Day</h4>
                                            <h4>Bule Next Day</h4>

                                            <p>Get it right on next day - fastest option possible.</p>

                                            <div class="box-footer text-center">

                                                <input type="radio" name="delivery" value="delivery2">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="box shipping-method">

                                            <h4>USPS </h4>

                                            <p>Get it right on next week .</p>

                                            <div class="box-footer text-center">

                                                <input type="radio" name="delivery" value="delivery3">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->

                            </div>
                            <!-- /.content -->

                            <div class="box-footer">
							<input type="text" class="hidden" value=<?php echo $total;?> name="total">
                                
								
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Continue to Payment Method<i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            
                        </form>
						<form method="post" action="checkout1.php">
							<input type="text" class="hidden" value=<?php echo $total;?> name="total">
							<div class="pull-left">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to Addresses
                                    </button>
                            </div>
						</form>
						</div>
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-md-9 -->

                <div class="col-md-3">

                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Order summary</h3>
                        </div>
                        <p class="text-muted">The Total is calculated based upon Shipping and Discounts if applicable.</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    
                                    <tr class="total">
                                        <td>Total</td>
                                        <th>$<?php echo $total;?></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

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
  </body>
</html>