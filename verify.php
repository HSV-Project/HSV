<?php 
/* Verifies registered user email, the link to this page
   is included in the register.php email message 
*/
require 'Database.php';
session_start();

// Make sure email and hash variables aren't empty
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
{
    $email = $mysqli->escape_string($_GET['email']); 
    $hash = $mysqli->escape_string($_GET['hash']); 
    
    // Select user with matching email and hash, who hasn't verified their account yet (active = 0)
    $result = $mysqli->query("SELECT * FROM Users WHERE email='$email' AND hash='$hash' AND active='0'");

    if ( $result->num_rows == 0 )
    { 
        $_SESSION['message'] = "Account has already been activated or the URL is invalid!";

        header("location: error.php");
    }
    else {
        $_SESSION['message'] = "Your account has been activated!";
        
        // Set the user status to active (active = 1)
        $mysqli->query("UPDATE Users SET active='1' WHERE email='$email'") or die($mysqli->error);
        $_SESSION['active'] = 1;
		
		$result = $mysqli->query("SELECT * FROM Users WHERE email='$email'");
		$user = $result->fetch_assoc();
		
		
		$_SESSION['userID'] = $user['userID'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['first_name'] = $user['firstName'];
        $_SESSION['last_name'] = $user['lastName'];
        $_SESSION['active'] = $user['active'];
	//$_SESSION['seller'] = $user['seller'];

		$_SESSION['seller'] = $user['seller'];
		
		$_SESSION['id'] = $user['userID'];

        
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;
		
		
        
        header("location: success.php");
    }
}
else {
    $_SESSION['message'] = "Invalid parameters provided for account verification!";
    header("location: error.php");
}     
?>