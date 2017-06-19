<?php session_start(); 
  include 'Database.php';
  //echo "ID:".$_SESSION['productId'];
  //session_unset("editProductMessage");
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
    
    <script>
        /*$('#edit').click(function() {
            alert("1");
        var text = $('.text-info').text();
        var input = $('<input type="text" placeholder="' + text + '" />')
        $('.text-info').text('').append(input);
       });*/
    </script>
    <script language="JavaScript">
       $( document ).ready(function() {
       $(document).on("click", "a.edit1", function (e) {
            var txt = $("#pName");
            $('#pNameLabel').replaceWith(txt.prop('type','text'));
            $(this).hide();
            e.preventDefault();
        });
        $(document).on("click", "a.edit2", function (e) {
            
            var txt = $("#department");
            $('#departmentLabel').replaceWith(txt.show());
            $(this).hide();
            e.preventDefault();
        });
        $(document).on("click", "a.edit3", function (e) {
            var txt = $("#descShort");
            //var input = $('<textarea type="text" class="form-control" name="descShort" id="descShort" rows="3" columns="100" required="">' + txt + '</textarea>');
            $('#descShortLabel').replaceWith(txt.show());
            $(this).hide();
            e.preventDefault();
        });
        $(document).on("click", "a.edit4", function (e) {
            var txt = $("#price");
            $('#priceLabel').replaceWith(txt.prop('type','text'));
            $(this).hide();
            e.preventDefault();
        });
        $(document).on("click", "a.edit5", function (e) {
            var txt = $("#quantity");
            //var input = $('<input type="text" class="form-control" name="quantity" autocomplete="off" id="quantity" onkeypress="return isNumberKey(event)" required="" value="' + txt + '">');
            $('#quantityLabel').replaceWith(txt.prop('type','text'));
            $(this).hide();
            e.preventDefault();
        });
        $(document).on("click", "a.edit6", function (e) {
            var txt = $("#descLong");
            //var input = $('<textarea type="text" class="form-control" name="descLong" autocomplete="off" id="descLong" rows="9">' + txt + '</textarea>');
            $('#descLongLabel').replaceWith(txt.show());
            $(this).hide();
            e.preventDefault();
        });
        $(document).on("click", "a.edit7", function (e) {
            var txt = $("#imageMain");
            //var input = $('<input type="file" class="form-control" name="imageMain" autocomplete="off" id="imageMain" accept="image/*" onchange="document.getElementById("imageMain").value = this.value"/>');
            $('#imageMainLabel').replaceWith(txt.show());
            $(this).hide();
            e.preventDefault();
        });
        
        });
       /*function editChange()
       {
           var text=document.getElementById('text-info').textContent;
           var input='<input type="text" placeholder="'+text+'"/>';
           document.getElementById('text-info').textContent="";
           document.getElementById('text-info').appendedNode(input);
       }*/
       function isNumberKeyorDecimal(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode !== 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
       function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
       function deleteProduct()
       {
           confirm("Are you sure you would like to delete this product");
       }
    </script>
  </head>
  
  <body>
	<?php include 'header.php';
        
    if(isset($_GET['productId']))
    {
      if (isset($_GET['productId'])) {
        $productId = $_GET['productId'];
    } else {
        $productId = "";
    }
    //echo "ProductID:".$productId;
    $query="SELECT productName, productDescShort, productDescLong,productPrice, productQuantityAvail, "
                  . "productAddedDate, productCategory, productImage, productSellerId FROM Inventory WHERE "
                  . "productID='$productId'";
          $result = $mysqli->query($query);
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
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
        
      ?>
	
	<div class="container">
	<div class="row">
            
	<div class="box">
                  		
        <h1 class="text-primary text-center">Edit or Delete Product</h1>
        <?php if(isset($_SESSION['errorMsg']) AND !empty($_SESSION['errorMsg']))  {?>
        <h2 class="text-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error</h2>
        <p>
        <label for="message"><span style="color:red"><?php echo $_SESSION['errorMsg']; ?></span>
        </label>
        </p>
        <?php unset($_SESSION["errorMsg"]);} if(isset($_SESSION['successMsg']) AND !empty($_SESSION['successMsg'])) {?>
        <p>
        <label for="message"><span style="font-weight:bold; font-size:14;"><?php echo $_SESSION['successMsg']; ?></span>
        </label>
        </p>
        <?php unset($_SESSION["successMsg"]); }?>
        <hr>
        <form action="editProduct.php" method="post" enctype="multipart/form-data">
                
            
                <div class="form-group">
                    <label for="pName">
                        Product Name<span style="color:red">*</span>
                    </label>
                    <br/>
                    <input type="hidden" class="form-control" name="productId" autocomplete="off" id="pId" value="<?php echo $productId; ?>" required=""/>
                    <label for="pNametext" id="pNameLabel"><p ><?php echo $productName ?></p><i class="icon-star"></i></label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="edit1">Edit</a>
                    <input type="hidden" class="form-control" name="productName" autocomplete="off" id="pName" value="<?php echo $productName; ?>" required=""/>
                   
                </div>
                
                <div class="form-group">
                      <label for="department">
                          Department<span style="color:red">*</span>
                      </label>
                    <br/>
                    <label for="pCategory" id="departmentLabel"><p ><?php echo $productCategory ?></p><i class="icon-star"></i></label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="edit2">Edit</a>
                    <select name="department" id="department" class="form-control" value="<?php echo $productCategory; ?>" style="display:none" required="">
                        <option value="Books">Books</option>
                        <option value="Furniture">Furniture</option>
                        <option value="Electronics">Electronics</option>
                    </select>
                    
                </div>
            
                <div class="form-group">
                      <label for="descShort">
                        Short Description<span style="color:red">*</span>
                      </label>
                    <br/>
                    <label for="pShortDesc" id="descShortLabel"><p ><?php echo $productDescShort ?></p><i class="icon-star"></i></label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="edit3">Edit</a>
                    <textarea type="text" class="form-control" name="descShort" autocomplete="off" id="descShort" rows="3" required="" style="display:none"><?php echo $productDescShort ?></textarea>
                </div>

                <div class="form-group">
                      <label for="price">
                        Price<span style="color:red">*</span>
                      </label>
                    <br/>
                    <label for="pPrice" id="priceLabel"><p >$<?php echo $productPrice ?></p><i class="icon-star"></i></label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="edit4">Edit</a>
                    <input type="hidden" class="form-control" name="price" autocomplete="off" id="price" value="<?php echo $productPrice; ?>"  onkeypress="return isNumberKeyorDecimal(event)" required=""/>
                </div>

                <div class="form-group">
                      <label for="quantity">
                        Quantity<span style="color:red">*</span>
                      </label>
                    <br/>
                    <label for="pQuanity" id="quantityLabel"><p ><?php echo $productQuantityAvail ?></p><i class="icon-star"></i></label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="edit5">Edit</a>
                    <input type="hidden" class="form-control" name="quantity" autocomplete="off" id="quantity" value="<?php echo $productQuantityAvail; ?>" onkeypress="return isNumberKey(event)" required=""/> 
                </div>

                <div class="form-group">
                      <label for="descLong">
                        Long Description
                      </label>
                    <br/>
                    <label for="pDescLong" id="descLongLabel"><p ><?php echo $productDescLong ?></p><i class="icon-star"></i></label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="edit6">Edit</a>
                    <textarea type="text" class="form-control" name="descLong" autocomplete="off" id="descLong" rows="9" style="display:none"><?php echo $productDescLong ?></textarea>
                </div>

                <div class="form-group">
                      <label for="imageMain">
                        Main Image
                      </label>
                    <br/>
                    <label for="pImage" id="imageMainLabel"><p ><img src="<?php echo $productImage ?>" alt="Book Image" height="200" width="200"></p><i class="icon-star"></i></label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="edit7">Edit</a>
                    <input type="file" class="form-control" name="imageMain" autocomplete="off" id="imageMain" accept="image/*" value="<?php echo $productImage ?>" style="display:none" onchange="document.getElementById('imageMain').value = this.value"/>
                </div>

                <!--<div class="form-group">
                      <label for="subImg1">
                        Sub Image 1
                      </label>
                      <input type="file" class="form-control" name="subImg1" autocomplete="off" id="subImg1" accept="image/*" onchange="document.getElementById('subImg1').value = this.value"/>
                </div>

                <div class="form-group">
                      <label for="subImg2">
                        Sub Image 2
                      </label>
                      <input type="file" class="form-control" name="subImg2" autocomplete="off" id="subImg2" accept="image/*" onchange="document.getElementById('subImg2').value = this.value"/>
                </div>

                <div class="form-group">
                      <label for="subImg3">
                        Sub Image 3
                      </label>
                      <input type="file" class="form-control" name="subImg3" autocomplete="off" id="subImg3" accept="image/*" onchange="document.getElementById('subImg3').value = this.value"/>
                </div>-->


               <div class="text-center"> 
                   <input type="submit" class="btn btn-primary" value="Save Changes" name="submit" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   <input type="submit" class="btn btn-primary" value="Delete Product" name="submit" onclick="deleteProduct();"/>
               </div>	
            </form>
                                
        </div>
            
	</div>
        </div>
      <?php } ?>
	
	<?php include 'footer.php';?>
   
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>