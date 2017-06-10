
<?php
/* Database connection settings */
$host = 'cosc631.c7iwrsgtibzk.us-west-2.rds.amazonaws.com';
$user = 'cosc631';
$pass = 'Password';
$db = 'cosc631';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
?>