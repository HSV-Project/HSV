<?php
		

			
			
		if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
			$productIDpassed = $_POST['productId'];
			$quantity= $_POST['qtyPurchased'];
			
			
			$str = $productIDpassed .'*'. $quantity;
			if(isset($_COOKIE["productInCart"] )){
			$str = " ".$str; 
			}
				if(isset($_COOKIE["productInCart"] )){
			setcookie("productInCart", $_COOKIE["productInCart"].=$str, time() + (86400 * 30), "/");
				}
				else{
					setcookie("productInCart", $str, time() + (86400 * 30), "/");
				}
		
		header("location: cart.php");  
		
		}	
			
			
?>
