<?php 
include 'productListBackend.php'; 
include 'Database.php';

session_start();
if ((isset($_GET['department']) && !empty($_GET['department'])) || (isset($_GET['whichList']) && ($_GET['whichList']=='department'))) {
    $department = $_GET['department'];
    if(!isset($_GET['page']))
        $thispage=1;
    else
        $thispage=$_GET['page'];
    $productList = get_products_byDepartment($department,$thispage);
    $query="SELECT count(productID) FROM Inventory WHERE productCategory='$department'";
    $result=$mysqli->query($query);
    $row=  mysqli_fetch_array($result);
    $recordsperpage=7;
    $totpages=  ceil($row[0]/$recordsperpage);
    $whichList='department';
} elseif ((isset($_GET['user']) && !empty($_GET['user'])) || (isset($_GET['whichList']) && ($_GET['whichList']=='seller'))) {
     if((isset($_GET['user']) && !empty($_GET['user'])))
        $user = $_GET['user'];
     if(isset($_SESSION['userID']) && !empty($_SESSION['userID']))
        $userId = $_SESSION['userID'];
    //echo "page no:".$_GET['page'];
    if(!isset($_GET['page']))
        $thispage=1;
    else
        $thispage=$_GET['page'];
    
    $productList = get_products_bySeller($userId,$thispage);
    
    $query="SELECT count(productID) FROM Inventory WHERE productSellerId='$userId'";
    $result=$mysqli->query($query);
    $row=  mysqli_fetch_array($result);
    $recordsperpage=7;
    $totpages=  ceil($row[0]/$recordsperpage);
    
    $whichList="seller";
}
elseif((isset($_POST['search']) && !empty ($_POST['search'])) || (isset($_GET['whichList']) && ($_GET['whichList']=='department'))) {
    $search=$_POST['search'];
    if(!isset($_GET['page']))
        $thispage=1;
    else
        $thispage=$_GET['page'];
    $productList=get_products_bySearch($search,$thispage);
    $searchTerms = explode(' ', $search);
    $newSearchString=implode('* ', $searchTerms)."*";
    $query="SELECT count(productID) FROM Inventory WHERE match(productName, productDescShort, "
                . "productDescLong, productCategory) against ('$newSearchString' in boolean mode)";
    
    $result=$mysqli->query($query);
    $row=  mysqli_fetch_array($result);
    $recordsperpage=7;
    $totpages=  ceil($row[0]/$recordsperpage);
    
    $whichList="search";
}
 else {
     $productList=array();
 }
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
                                    <?php if(isset($_GET['user'])) { ?>
                                    <a href="sellerEditProduct.php?productId=<?php echo $productID; ?>">
                                    <?php } else{ ?>
                                    <a href="productDetail.php?productId=<?php echo $productID; ?>">
                                    <?php } ?>
						<div class="col-md-1">
						</div>
						<div class="col-md-2">
							<img src="<?php echo $productImage; ?>" class="img-responsive" alt="books" width="110" >
						</div>
						<div class="col-md-9">
                                                    <br/>
							<p><strong class="text-primary">Product Name: </strong><span class="text-success"><?php echo $productName ?><span></p>
							<p><strong class="text-primary">Product Description:</strong> <span class="text-success"><?php echo $productDescShort ?></span></p>
							<p><strong class="text-primary">Cost:</strong><span class="text-success"> $<?php echo $productPrice ?></span></p>
                                                        <p><strong class="text-primary">Department:</strong><span class="text-success"> <?php echo $productCategory ?></span></p>
                                                        <?php if(!isset($_GET['user'])) { ?>
                                                        <p><span class="text-success"><strong>Get it in the next 5 days</strong></span></p>
                                                        <?php } if($productQuantityAvail<5) {?>
                                                        <p><span class="text-success"><strong>Hurry! Only <?php echo $productQuantityAvail ?> left in stock</strong></span></p>
                                                        <?php } ?>
						</div>
					</a>
					
				</div>
			</div>
                    <?php } 
                    //previous link
                     
                         if($thispage>1){
                            $page=$thispage-1;
                            $prevpage= "productList.php?whichList=$whichList&page=$page"; 
                        }else{
                            $prevpage="";
                        }
                         
                         if ($thispage<$totpages)
                        {
                             
                            $page = $thispage + 1;
                            $nextpage = "productList.php?whichList=$whichList&page=$page";
                        } else
                        {
                            $nextpage = "";
                        }
                     
                        if ($totpages > 1)
                        { 
                    ?>        
                    <nav aria-label="navigation" class="text-center">
                       <ul class="pagination">
                        <li <?php if($prevpage=="") {?> class="page-item disabled" <?php } else {?> class="page-item" <?php } ?>>
                          <a class="page-link" href="<?php echo $prevpage; ?>" >Previous</a>
                        </li>
                        <?php 
                        //inbetween 1,2,3 pages links
                        
                            $bar = '';
                            for($page = 1; $page <= $totpages; $page++)
                            {
                                if ($page == $thispage)      
                                { $bar = ""; ?>
                                <li class="page-item disabled" class="page-item">
                                    <span class="page-link"><?php echo $page ?><span class="sr-only">(current)</span></span>
                                </li>
                                   
                               <?php } else
                               {
                                  $bar = "productList.php?whichList=$whichList&page=$page"; ?>
                                <li class="page-item"><a class="page-link" href="<?php echo $bar ?>"><?php echo $page ?></a></li>
                                <li class="page-item active">
                               <?php }
                            }
                        
                        ?>
                        <li <?php if($nextpage=="") {?> class="page-item disabled" <?php } else {?> class="page-item" <?php } ?>>
                          <a class="page-link" href="<?php echo $nextpage; ?>" >Next</a>
                        </li>
                       </ul>
                    </nav>
                        <?php }?>
                    <div class="row">
                    </div>
                     <?php  } else { ?>
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