<?php session_start(); 
  include 'Database.php';
  
  if(isset($_POST['fromDate']) && !empty($_POST['fromDate']) && isset($_POST['toDate']) && !empty($_POST['toDate']))
  {
      if(isset($_POST['saleByProduct']) && $_POST['saleByProduct']=="Sales Report by Product")
      {
        
        $sellerId=$_SESSION['userID'];
        $fromDate=$_POST['fromDate'];
        $toDate=new DateTime($_POST['toDate']);
        $toDate->modify('+1 day');
        $toDate=$toDate->format('Y-m-d');
        $query="SELECT Inventory.productID AS productID, Inventory.productName as productName, SUM(purchaseHistory.quantityPurchased) AS quantitySold, "
                . "SUM(purchaseHistory.quantityPurchased)*Inventory.productPrice AS totalSales FROM purchaseHistory, Inventory "
                . "WHERE purchaseHistory.productID=Inventory.productID AND dateTimePurchased BETWEEN '$fromDate' AND '$toDate' AND Inventory.productSellerId='$sellerId' "
                . "GROUP BY Inventory.productID;";
                
        $result=$mysqli->query($query);
        $fromDate = DateTime::createFromFormat('Y-m-d', $fromDate);  
        $toDate = DateTime::createFromFormat('Y-m-d', $toDate);
        
      }
      elseif(isset($_POST['saleByDate']) && $_POST['saleByDate']=="Sales Report by Date")
      {
        
        $sellerId=$_SESSION['userID'];
        $fromDate=$_POST['fromDate'];
        $toDate=new DateTime($_POST['toDate']);
        $toDate->modify('+1 day');
        $toDate=$toDate->format('Y-m-d');
        $query="SELECT date(purchaseHistory.dateTimePurchased) AS datePurchased, COUNT(purchaseHistory.orderId) AS orders, sum(purchaseHistory.quantityPurchased*Inventory.productPrice) AS revenue "
                . "FROM purchaseHistory, Inventory WHERE purchaseHistory.productID=Inventory.productID AND dateTimePurchased BETWEEN '$fromDate' AND '$toDate' "
                . "AND Inventory.productSellerId=$sellerId GROUP BY date(purchaseHistory.dateTimePurchased);";
        
        $result=$mysqli->query($query);
        $fromDate = DateTime::createFromFormat('Y-m-d', $fromDate);  
        $toDate = DateTime::createFromFormat('Y-m-d', $toDate);
        
      }
      else 
      {
        
        $sellerId=$_SESSION['userID'];
        $fromDate=$_POST['fromDate'];
        $toDate=new DateTime($_POST['toDate']);
        $toDate->modify('+1 day');
        $toDate=$toDate->format('Y-m-d');
        $query="select Inventory.productID as productID, Inventory.productName as productName, sum(purchaseHistory.quantityPurchased) as quantitySold,"
                . " Inventory.productQuantityAvail as quantityAvail from purchaseHistory, Inventory where purchaseHistory.productID=Inventory.productID and "
                . "dateTimePurchased between '$fromDate' and '$toDate'  and Inventory.productSellerId='$sellerId' group by Inventory.productID order by quantityAvail;";


        $result=$mysqli->query($query);
        $fromDate = DateTime::createFromFormat('Y-m-d', $fromDate);  
        $toDate = DateTime::createFromFormat('Y-m-d', $toDate);
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
    <style>
        .control-label .text-info { display:inline-block; }
    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    
    <script language="JavaScript">
    $(".form_date").datepicker({
                 format: "dd MM yyyy"
             });
    </script>
  </head>
  
  <body>
	<?php include 'header.php';
        
        ?>
	
	
	
	<div class="container">
	<div class="col-md-12" id="">

        <div class="box">
 
        <h1 class="text-primary text-center">Generate Reports</h1>
        <hr>
        <br>  
          
        <div class="tab-content">
        <form action="sellerReports.php" method="post" enctype="multipart/form-data"> 
        <div class="row">
            
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="firstname" >From Date</label>
                    <input type="date" class="input-sm" name="fromDate" value="<?php if($_POST['fromDate']) echo $_POST['fromDate'];?>"/>
                </div>
            </div>

            <div class="col-sm-8">
                <div class="form-group">
                    <label for="lastname">To Date</label>
                    <input type="date" class="input-sm" name="toDate" value="<?php if($_POST['toDate']) echo $_POST['toDate'];?>"/>
                </div>
            </div>
        </div>
        <br/>
        <div class="col-sm-12">
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Inventory Report" name="submit" />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" class="btn btn-primary" value="Sales Report by Product" name="saleByProduct" />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" class="btn btn-primary" value="Sales Report by Date" name="saleByDate" />
            </div>
        </div>
        <br/><br/>
        </form>
        <br/>
        <?php if(isset($_POST['fromDate']) && !empty($_POST['fromDate']) && isset($_POST['toDate']) && !empty($_POST['toDate']))
        { if(isset($_POST['submit']) && $_POST['submit']=="Inventory Report") {
            if ($result->num_rows > 0) { ?>
        <div class="container">
        <h3>Inventory Report from <?php echo $fromDate->format('M j, Y');?> to <?php echo $toDate->format("M j, Y"); ?> </h3>
        <table class="table table-hover table-bordered" style="width:90%;">
          <thead>
            <tr>
              <th style="text-align:center;">Name of Product</th>
              <th style="text-align:center;">Quantity Sold between the given dates</th>
              <th style="text-align:center;">Quantity currently in stock</th>

            </tr>
          </thead>
          <tbody>
            <?php if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $productId=$row["productID"];
                        $productName=$row["productName"];
                        $quantitySold=$row["quantitySold"];
                        $quantityAvail=$row["quantityAvail"];
            ?>
            <tr>
              <td style="text-align:center;"><?php echo $productName; ?></td>
              <td style="text-align:center;"><?php echo $quantitySold; ?></td>
              <td style="text-align:center;"><?php echo $quantityAvail; ?></td>

            </tr>
            <?php
                }
                } ?>
          </tbody>
        </table>
        </div>
        <?php } else {?> 
        <h3>No data for Reports available</h3>
        <?php } } if(isset($_POST['saleByProduct']) && $_POST['saleByProduct']=="Sales Report by Product") {
            if ($result->num_rows > 0) { ?>
            <div class="container">
            <h3>Product Sales Report from <?php echo $fromDate->format('M j, Y');?> to <?php echo $toDate->format("M j, Y"); ?> </h3>
            <table class="table table-hover table-bordered" style="width:90%;">
              <thead>
                <tr>
                  <th style="text-align:center;">Name of Product</th>
                  <th style="text-align:center;">Quantity Sold between given dates</th>
                  <th style="text-align:center;">Revenue generated</th>

                </tr>
              </thead>
              <tbody>
                <?php if ($result->num_rows > 0) {
                        $total=0;
                        while($row = $result->fetch_assoc()) {
                            $productId=$row["productID"];
                            $productName=$row["productName"];
                            $quantitySold=$row["quantitySold"];
                            $totalSales=$row["totalSales"];
                            $total=$total+$totalSales;
                ?>
                <tr>
                  <td style="text-align:center;"><?php echo $productName; ?></td>
                  <td style="text-align:center;"><?php echo $quantitySold; ?></td>
                  <td style="text-align:center;"><?php echo $totalSales; ?></td>

                </tr>
                <?php } ?>
                <tr><td colspan="3" style="text-align:right; font-weight:bold;">Total in Sales: <?php echo $total; ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
                <?php } ?>
              </tbody>
            </table>
            </div>
        <?php }  else{ ?>
            <h3>No data for Reports available</h3>
        <?php } } if(isset($_POST['saleByDate']) && $_POST['saleByDate']=="Sales Report by Date") {
                if ($result->num_rows > 0) { ?>
                <div class="container">
                <h3>Sales Report from <?php echo $fromDate->format('M j, Y');?> to <?php echo $toDate->format("M j, Y"); ?> by date</h3>
                <table class="table table-hover table-bordered" style="width:90%;">
                  <thead>
                    <tr>
                      <th style="text-align:center;">Purchase Date</th>
                      <th style="text-align:center;">Number of orders on that day</th>
                      <th style="text-align:center;">Revenue Generated</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php if ($result->num_rows > 0) {
                            $total=0;
                            while($row = $result->fetch_assoc()) {
                                $datePurchased=new DateTime($row["datePurchased"]);
                                $orders=$row["orders"];
                                $revenue=$row["revenue"];
                                //$totalSales=$row["totalSales"];
                                $total=$total+$revenue;
                    ?>
                    <tr>
                      <td style="text-align:center;"><?php echo $datePurchased->format('n/d/Y'); ?></td>
                      <td style="text-align:center;"><?php echo $orders; ?></td>
                      <td style="text-align:center;"><?php echo $revenue; ?></td>

                    </tr>
                    <?php } ?>
                    <tr><td colspan="3" style="text-align:right; font-weight:bold;">Total in Sales: <?php echo $total; ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
                    <?php } ?>
                  </tbody>
                </table>
                </div>
            <?php } else {?>
            <h3>No data for Reports available</h3>
            <?php } ?>
        </div>
        <?php } }?>
        
        </div>    
        </div>
         <!--<div id="menu1" class="tab-pane fade">
              
            <p>Some content in menu 1.</p>
         </div>-->

	</div>
</div>
      
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>