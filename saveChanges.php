<?php
/* Password reset process, updates database with new user password */
require 'Database.php';
session_start();

// Make sure the form is being submitted with method="post"
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

    // Make sure the two passwords match
    if ( $_POST['fname'] != "" || $_POST['lName'] != "") { 

        $new_password = md5($_POST['newpassword']);//password_hash($_POST['newpassword'], PASSWORD_BCRYPT);
        
        // We get $_POST['email'] and $_POST['hash'] from the hidden input field of reset.php form
        $email = $mysqli->escape_string($_POST['email']);
        //$hash = $mysqli->escape_string($_POST['hash']);
		
		$new_firstName = $mysqli->escape_string($_POST['fname']);
		$new_lastName = $mysqli->escape_string($_POST['lName']);
        
        $sql = "UPDATE Users SET firstName ='$new_firstName', lastName='$new_lastName'   WHERE email='$email'";
		if ($_POST['fname'] == ""){
			$sql = "UPDATE Users SET  lastName='$new_lastName'   WHERE email='$email'";
		}
		if ($_POST['lName'] == ""){
			$sql = "UPDATE Users SET  firstName ='$new_firstName'   WHERE email='$email'";
		}

        if ( $mysqli->query($sql) ) {

        $_SESSION['message'] = "User details has been Changed successfully! To change Password go back to <a href='settings.php'>Settings</a>";
        header("location: success.php");    

        }

    }
    else {
        $_SESSION['message'] = "First name and last name cannot be empty";
        header("location: error.php");    
    }

}
?>