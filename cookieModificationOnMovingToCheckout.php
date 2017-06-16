<?php 

//print_r($_POST);
//print_r($_REQUEST);
$pID = $_REQUEST["pID"];
$qty = $_REQUEST["qty"];

//echo $pID. "=>" .  $qty;

	$cookieArray = unserialize($_COOKIE["productInCart"]);
	$cookieArray[$pID] = $qty;
	$cookieString = serialize($cookieArray);
	setcookie("productInCart", $cookieString, time() + (86400 * 30), "/");
	//print_r(unserialize($cookieString));

?>