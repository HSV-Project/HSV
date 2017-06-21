<?php
session_start();
include 'Database.php';
//error_log($)

if (isset($_SESSION['userID'])) {
    $sellerId = $_SESSION['userID'];
    
} else {
    $sellerId = "";
    
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
if (isset($_POST['imageMain'])) {
    $mainImage = $_POST['imageMain'];
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

//$sellerId=1;
$imgNameRef="imageMain";
echo $imgNameRef;
$checkImg= check_ImageFile($imgNameRef);
$uploadOk=$checkImg[0];
$errorMsg=$checkImg[1];
$imageName=$checkImg[2];

if($uploadOk==1)
{
    $successMsg="";
    $query="INSERT into Inventory (productName, productDescShort, productDescLong, "
            . "productPrice, productQuantityAvail, productAddedDate, productCategory, "
            . "productImage, productSellerId) values ('$pName','$shortDesc','$longDesc','$price',"
            . "'$quantity',CURDATE(),'$department','$imageName','$sellerId')";

    //error_log($query);
    $result=$mysqli->query($query);
    if($mysqli->affected_rows!=-1){
        $insertedId=$mysqli->insert_id;
        //Upload image to server
        if ($imageName == "img/defaultImg.jpg") {
            $success = 1;
        }
        if ($imageName != "img/defaultImg.jpg") {
            $imageFileType = pathinfo($_FILES[$imgNameRef]['name'],PATHINFO_EXTENSION);
            $imageName="img/".$insertedId.".".$imageFileType;
            $success = upload_Img($imgNameRef, $imageName);
        }
        $query="UPDATE Inventory SET productImage='$imageName' WHERE productID='$insertedId'";
        //error_log($query);
        $result=$mysqli->query($query);
        if($mysqli->affected_rows!=-1){
            if ($success == 1) {
                $successMsg = "Product added successfully";
            } else {
                $errorMsg = "Problem uploading the image";
            }
        }
    }
    
    $query="SELECT productID from Inventory WHERE productName='$pName' AND productDescShort='$shortDesc' AND productPrice='$price' "
            . "AND productQuantityAvail='$quantity' AND productCategory='$department' AND productSellerId='$sellerId'";
    
    $result=$mysqli->query($query);
    //error_log($query);
    $productId;
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $productId=$row['productID'];       
        }
    }
    
    if($successMsg!="")
        $_SESSION['successMsg']=$successMsg;
    if($errorMsg!="")
        $_SESSION['errorMsg']=$errorMsg;
    $mysqli->close();
    //$_SESSION['productId']=$productId;
}
//echo "productID:".$_SESSION['productId'];
header("location: sellerEditProduct.php?productId=$productId");

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
    //global $productId;
    $message="";
    echo "imageNameRef: ".$imgName;
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
    }
    if($_FILES[$imgName]["name"]){
        $imageName="";
    }
    else {
     $uploadOk = 1;
     $imageName="img/defaultImg.jpg";
    }
    return array($uploadOk,$message,$imageName);
}


?>