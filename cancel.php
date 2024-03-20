<?php
session_start(); // Starts the PHP session
include('config.php'); // Includes the 'config.php' file that contains the database connection code

mysqli_query($con,"delete from tbl_bookings where book_id='".$_GET['id']."'"); // Deletes the booking from the 'tbl_bookings' table based on the provided booking ID ($_GET['id'])

$_SESSION['success']="Booking Cancelled Successfully"; // Sets a success message in the session variable

header('location:profile.php'); // Redirects the user to the 'profile.php' page
?>
