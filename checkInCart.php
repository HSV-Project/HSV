<?php 
function checkIfAlreadyInCartThenHide($productId){
	if(isset($_COOKIE["productInCart"])){
		$cookieAry = unserialize($_COOKIE["productInCart"]);
		foreach ($cookieAry as $prodId => $quantity){
			if($prodId == $productId){
				return "hidden";
			}
			else{
				return "";
			}
		}
	}
}


function checkIfNotInCartThenHide($productId){
	if(!isset($_COOKIE["productInCart"])){
		return "hidden";
		}
	else{
		$cookieAry = unserialize($_COOKIE["productInCart"]);
		if (array_key_exists($productId,$cookieAry)){
			return "";
		}
		else{
			return "hidden";
		}
	}
}

?>