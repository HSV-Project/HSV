<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	if(isset($_GET["productId"])){
		$productID = $_GET["productId"];
		
		$cookieArray = unserialize($_COOKIE["productInCart"]);
		$recordTheKey=null;
		foreach ($cookieArray as $prodId => $quantity){
			if ($prodId == $productID){
				$recordTheKey = $prodId;
			}
		}
		
		unset($cookieArray[$recordTheKey]);
		$cookieString = serialize($cookieArray);
		setcookie("productInCart", $cookieString, time() + (86400 * 30), "/");
		header("location: cart.php"); 
	}
}
?>