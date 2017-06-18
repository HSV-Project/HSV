<?php





	function getProductImg($productId){
		require 'Database.php';
		
		
		$sql = "SELECT * FROM Inventory WHERE productID='$productId'";

        if ( $mysqli->query($sql) ) {
			$result=$mysqli->query($sql);
			$row=mysqli_fetch_assoc($result);
			return $row["productImage"];
        }

	}
	
	
	function getProductName($productId){
		require 'Database.php';
		
		
		$sql = "SELECT * FROM Inventory WHERE productID='$productId'";

        if ( $mysqli->query($sql) ) {
			$result=$mysqli->query($sql);
			$row=mysqli_fetch_assoc($result);
			return $row["productName"];
        }

	}
	
	
	function getProductDesc($productId){
		require 'Database.php';
		
		
		$sql = "SELECT * FROM Inventory WHERE productID='$productId'";

        if ( $mysqli->query($sql) ) {
			$result=$mysqli->query($sql);
			$row=mysqli_fetch_assoc($result);
			return $row["productDescShort"];
        }

	}
	
	function getProductPrice($productId){
		require 'Database.php';
		
		
		$sql = "SELECT * FROM Inventory WHERE productID='$productId'";

        if ( $mysqli->query($sql) ) {
			$result=$mysqli->query($sql);
			$row=mysqli_fetch_assoc($result);
			return $row["productPrice"];
        }

	}
	
	function getProductQuantity($productId){
		require 'Database.php';
		
		
		$sql = "SELECT * FROM Inventory WHERE productID='$productId'";

        if ( $mysqli->query($sql) ) {
			$result=$mysqli->query($sql);
			$row=mysqli_fetch_assoc($result);
			return $row["productQuantityAvail"];
        }

	}
	
?>