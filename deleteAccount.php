<?php
/* delete the account */
require 'Database.php';
session_start();

// Make sure the form is being submitted with method="post"
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

        $email = $mysqli->escape_string($_POST['email']);
        
        $sql = "delete from Users Where email='$email'";

        if ( $mysqli->query($sql) ) {

        
        header("location: accountDeleted.php");    

        }

    
    

}
?>