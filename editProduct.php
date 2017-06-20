<?php
session_start();
include 'Database.php';


if(isset($_POST['submit']))
{
    $action=$_POST['submit'];
}
if (isset($_SESSION['userID'])) {
    $sellerId = $_SESSION['userID'];
}
if (isset($_SESSION['seller'])) {
    $seller = $_SESSION['seller'];
}
if (isset($_POST['productId'])) {
    $productId = $_POST['productId'];
}
 else {
    $productId="";
}
if (isset($_POST['productName'])) {
    $pName = mysqli_real_escape_string($mysqli, $_POST['productName']);
} else {
    $pName = "";
}
if (isset($_POST['department'])) {
    $department = $_POST['department'];
} else {
    $department = "";
}
if (isset($_POST['descShort'])) {
    $shortDesc = mysqli_real_escape_string($mysqli, $_POST['descShort']);
} else {
    $shortDesc = "";
}
if (isset($_POST['price'])) {
    $price = $_POST['price'];
} else {
    $price = "";
}
if (isset($_POST['quantity'])) {
    $quantity = $_POST['quantity'];
} else {
    $quantity = "";
}
if (isset($_POST['descLong'])) {
    $longDesc = mysqli_real_escape_string($mysqli, $_POST['descLong']);
} else {
    $longDesc = "";
}
if (isset($_FILES["imageMain"]["name"])) {
    $mainImage = $_FILES["imageMain"]["name"];
    
} else {
    $mainImage = "defaultImg.jpeg";
}
/*if (isset($_POST['subImg1'])) {
    $image1 = $_POST['subImg1'];
} else {
    $image1 = "";
}
if (isset($_POST['subImg2'])) {
    $image2 = $_POST['subImg2'];
} else {
    $image2 = "";
}
if (isset($_POST['subImg3'])) {
    $image3 = $_POST['subImg3'];
} else {
    $image3 = "";
}*/

if($action=="Save Changes")
{
    $successMsg="";
    $errorMsg="";
    if($mainImage=="")
    {

        $query="UPDATE Inventory SET productName='$pName', productDescShort='$shortDesc', productDescLong='$longDesc', productPrice='$price',"
            . "productQuantityAvail='$quantity', productCategory='$department', "
            . "productSellerId='$sellerId' WHERE productID='$productId'";

        $result = $mysqli->query($query);
        $success=0;

        if($mysqli->affected_rows!=-1)
        {
            $success=1;
            $successMsg="Product updated successfully";
        }   
    }
    else
    {
        //echo "2";
        $imgNameRef="imageMain";
        //Check if image being uploaded is ok
        $checkImg= check_ImageFile($imgNameRef);
        $uploadOk=$checkImg[0];
        $errorMsg=$checkImg[1];
        $imageName=$checkImg[2];

        if($uploadOk==1)
        {
            $query="UPDATE Inventory SET productName='$pName', productDescShort='$shortDesc', productDescLong='$longDesc', productPrice='$price',"
                . "productQuantityAvail='$quantity', productCategory='$department', "
                . "productImage='$imageName', productSellerId='$sellerId' WHERE productID='$productId'";
            $result=$mysqli->query($query);

            if($mysqli->affected_rows!=-1){
                //Upload image to server
                $success=upload_Img($imgNameRef,$imageName);
                if($success==1)
                    $successMsg="Product updated successfully";
                else
                    $errorMsg="Problem uploading the image";
            }
        }
    }
    if($successMsg!="")
        $_SESSION['successMsg']=$successMsg;
    if($errorMsg!="")
        $_SESSION['errorMsg']=$errorMsg;
    $mysqli->close();
    header("location: sellerEditProduct.php?productId=$productId");
}
elseif($action=="Delete Product") {
    echo "123";
    $productImage="";
    $query="SELECT productImage from Inventory WHERE productID=$productId";
    $result=$mysqli->query($query);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $productImage=$row["productImage"];
        }
    }
    
    $query="DELETE FROM Inventory WHERE productID='$productId'";
    $result=$mysqli->query($query);
    if($mysqli->affected_rows!=-1)
    {
        $success=1;
    }
    
    if ($productImage != "img/defaultImg.jpg") {
        unlink($productImage);
    }
    
    $mysqli->close();
    if($success==1)
        header("location:productList.php?user=$sellerId");
}
else
{
    $_SESSION['message']="Could not delete product";
    header("location:error.php");
}

function upload_Img($imgName,$imageName)
{
    $success=0;
    //echo "here atleast";
    if(move_uploaded_file($_FILES[$imgName]['tmp_name'], $imageName))
    {
        $success=1;
    }    
    return $success;
}
function check_ImageFile($imgName)
{
    //include 'Database.php';
    global $mysqli;
    //echo "File attr: ".$imgName."  --$_FILES[$imgName]['name']";
    global $productId;
    $message="";
    //echo "imageNameRef: ".$imgName;
    $imageFileType = pathinfo($_FILES[$imgName]['name'],PATHINFO_EXTENSION);
    if(!$_FILES[$imgName]['error'])
    {
        if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES[$imgName]["tmp_name"]);
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1; 
        } else {
            $message="File is not an image.";
            $uploadOk = 0;  
        }
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        $message=$message. "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    if($_FILES[$imgName]["name"]){
        /*$query="SELECT * from Inventory";
        $result = $mysqli->query($query);
        $row_cnt = $result->num_rows;
        $imageName=$row_cnt+1;*/
        $imageName="img/".$productId.".".$imageFileType;
        }
    }
    else {
     $uploadOk = 1;
     $imageName="img/defaultImg.jpg";
    }
    return array($uploadOk,$message,$imageName);
}

//echo $query;
/*echo $pName;
echo $department;
echo $shortDesc;
echo $longDesc;
echo $price;
echo $quantity;
if (isset($_FILES["imageMain"]["name"]))
    echo "set value: ".$mainImage;*/
?>
