<?php
require_once 'Database.php';
/* User login process, checks if user exists and password is correct */
session_start();
// Escape email to protect against SQL injections
$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM Users WHERE email='$email'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("loctaion: error.php");
}
else { // User exists
    $user = $result->fetch_assoc();
	
	
    if ( $user['password'] == md5($_POST['password']) ) { //password_verify($_POST['password'], $user['password'])
        
		if($user['active']!=1){
			$_SESSION['message'] = "You have not yet activated your account. Please verify using the link sent to ".$email;
			header("location: error.php");
		}
		
		else{
        $_SESSION['email'] = $user['email'];
        $_SESSION['first_name'] = $user['firstName'];
        $_SESSION['last_name'] = $user['lastName'];
        $_SESSION['active'] = $user['active'];
		$_SESSION['seller'] = $user['seller'];
        
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;
		
		
		
        header("location: index.php");
		}
		
    }
    else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: error.php");
    }
}

