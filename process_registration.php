<?php
    // Start a session or resume an existing one
session_start();

// Include the file that contains the database connection configuration
include('config.php');

// Extract the values from the $_POST array and assign them to variables with the same name
extract($_POST);

// Insert the user's registration details into the 'tbl_registration' table in the database using MySQLi query
mysqli_query($con,"insert into  tbl_registration values(NULL,'$name','$email','$phone','$age','gender')");

// Get the ID of the last inserted record in the database
$id=mysqli_insert_id($con);

// Insert the user's login details (email and password) into the 'tbl_login' table in the database using MySQLi query
mysqli_query($con,"insert into  tbl_login values(NULL,'$id','$email','$password','2')");

// Set the value of the 'user' key in the $_SESSION array to the user's ID
$_SESSION['user']=$id;

// Redirect the user to the index.php page
header('location:index.php');
?>