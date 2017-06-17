<?php
require 'Database.php';
session_start();


//print_r($_POST);

$cookieArray = unserialize($_COOKIE["productInCart"]);
//print_r($cookieArray);

//if not logged in ==> to list items in purchase history



$cookieString = $_COOKIE["productInCart"];
setcookie("notLoggedInUser", $cookieString, time() + (86400 * 30), "/");

//$cookieArr = unserialize($_COOKIE["notLoggedInUser"]);
//print_r($cookieArr);

//put the productId and Quantity in the purchaseHistory table & Modify the inventory

if(isset($_SESSION['id'])){
	//finding the orderId
	$sql = "SELECT * FROM purchaseHistory";
	$result=$mysqli->query($sql);
	$orderId = $result->num_rows + 1;
	$userId = $_SESSION['id'];

	foreach ($cookieArray as $prodId => $quantity){
		$sql = "INSERT INTO purchaseHistory (orderId,productId,userId,quantityPurchased) VALUES ('$orderId','$prodId','$userId','$quantity')";
		$mysqli->query($sql);
	}
	
	//to modify the inventory
	
	foreach ($cookieArray as $prodId => $quantity){
		$sql = "UPDATE Inventory SET productQuantityAvail = productQuantityAvail - '$quantity' WHERE productID='$prodId'";
		$mysqli->query($sql);
	}

}


//deleting the productInCart cookies
setcookie("productInCart", "", time() + (86400 * 30), "/");

setcookie("productInCart", "", time() - 3600);

//order successful
$_SESSION['message'] = "<p>Congratulations your order has been placed successfully!!!!</p><p>Check your orders in <a href='purchaseHistory.php'>Purchase history</a></p>";
        header("location: success.php"); 


?>