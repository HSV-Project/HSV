<?php



	function getFirstName($email){
		require 'Database.php';
		
		
		$sql = "SELECT * FROM Users WHERE email='$email'";

        if ( $mysqli->query($sql) ) {
			$result=$mysqli->query($sql);
			$row=mysqli_fetch_assoc($result);
			return $row["firstName"];
        }

	}
	
	function getLastName($email){
		require 'Database.php';
		
		
		$sql = "SELECT * FROM Users WHERE email='$email'";

        if ( $mysqli->query($sql) ) {
			$result=$mysqli->query($sql);
			$row=mysqli_fetch_assoc($result);
			return $row["lastName"];
        }

	}
?>