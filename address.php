<?php
if(isset($_SESSION['id'])){
$id = $_SESSION['id'];
$sql = "SELECT * FROM addressCreditCard WHERE userId='$id'";
$result = $mysqli->query($sql);
        if ( $result->num_rows > 0 ){ 
			$user = $result->fetch_assoc();
			
			$AddL1 = $user['addressLine1'];
			$AddL2 = $user['addressLine2'];	
			$apt = $user['apt'];	
			$zip = $user['zip'];	
			$city = $user['city'];	
			$state = $user['state'];	
			$Telephone = $user['phone'];	
			
		}
		else{
			$AddL1 = '';
			$AddL2 = '';
			$apt = '';
			$zip = '';
			$city = '';
			$state = '';
			$Telephone = '';
		}
}	
else{
	$AddL1 = '';
			$AddL2 = '';
			$apt = '';
			$zip = '';
			$city = '';
			$state = '';
			$Telephone = '';
}
?>