<?php
/* Password reset process, updates database with new user password */
require 'Database.php';
session_start();

// Make sure the form is being submitted with method="post"
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

    
    

        
        
        // We get $_POST['email']  from the hidden input field of reset.php form
        $email = $mysqli->escape_string($_POST['email']);
       
        
        $sql = "UPDATE Users SET seller =1 WHERE email='$email'";

        if ( $mysqli->query($sql) ) {

        $_SESSION['message'] = "<p>Congratulations you are a seller now!!!!</p><p>To add a product for sale <a href='sellerAddProduct.php'>Click Here!</a></p> ";
        header("location: success.php"); 
		$_SESSION['seller']=1;

        }

    
}
?>