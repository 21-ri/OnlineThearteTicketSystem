<?php
session_start(); // Starts the PHP session

$_SESSION['show']=$_GET['show']; // Sets the 'show' session variable with the value from the 'show' parameter in the URL ($_GET['show'])
$_SESSION['movie']=$_GET['movie']; // Sets the 'movie' session variable with the value from the 'movie' parameter in the URL ($_GET['movie'])
$_SESSION['theatre']=$_GET['theatre']; // Sets the 'theatre' session variable with the value from the 'theatre' parameter in the URL ($_GET['theatre'])

if(isset($_SESSION['user'])) // Checks if the 'user' session variable is set, indicating that the user is logged in
{
    header('location:booking.php'); // Redirects the user to the 'booking.php' page
}
else
{
    header('location:login.php'); // Redirects the user to the 'login.php' page
}
?>
