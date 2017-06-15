<?php
		

			
			
		if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
			$productIDpassed = $_POST['productId'];
			$quantity= $_POST['qtyPurchased'];
			
			
			//$str = $productIDpassed .'*'. $quantity;
			
			if(isset($_COOKIE["productInCart"] )){
				//$str = " ".$str; 
				$cookieArray = unserialize($_COOKIE["productInCart"]);
				$cookieArray[$productIDpassed] = $quantity;
				$cookieString = serialize($cookieArray);
				setcookie("productInCart", $cookieString, time() + (86400 * 30), "/");
			}
			else{
				$cookieArray = array($productIDpassed=>$quantity);
				$cookieString = serialize($cookieArray);
				setcookie("productInCart", $cookieString, time() + (86400 * 30), "/");
			}	
		
		header("location: cart.php");  
		
		}	
			
			
?>
