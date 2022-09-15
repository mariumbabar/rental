<?php
//creating the connection to sql
$conn = mysqli_connect('localhost','root','','rental') or die(mysqli_error());
 if(!$conn) {
 	die("Error: Failed to connect to database");
 }
?>