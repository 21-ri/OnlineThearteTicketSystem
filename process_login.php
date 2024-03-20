<?php
// Include config file which contains database credentials
include('config.php');

// Start the session
session_start();

// Get email and password submitted in the login form
$email = $_POST["Email"];
$pass = $_POST["Password"];

// Query the database to check if the username and password are valid
$qry=mysqli_query($con,"select * from tbl_login where username='$email' and password='$pass'");

// Check if the query returned any rows (i.e., if the login credentials are valid)
if(mysqli_num_rows($qry))
{
	// Fetch the user details from the query result
	$usr=mysqli_fetch_array($qry);
	
	// Check if the user type is 2 (which corresponds to a customer)
	if($usr['user_type']==2)
	{
		// If the user is a customer, set the user ID in the session variable and redirect to the booking page
		$_SESSION['user']=$usr['user_id'];
		
		// Check if there is a 'show' variable set in the session (presumably set by the booking page)
		if(isset($_SESSION['show']))
		{
			// If there is a 'show' variable, redirect to the booking page
			header('location:booking.php');
		}
		else
		{
			// If there is no 'show' variable, redirect to the home page
			header('location:index.php');
		}
	}
	else
	{
		// If the user is not a customer, set an error message in the session variable and redirect to the login page
		$_SESSION['error']="Login Failed!";
		header("location:login.php");
	}
	
}
else
{
	// If the login credentials are invalid, set an error message in the session variable and redirect to the login page
	$_SESSION['error']="Login Failed!";
	header("location:login.php");
}
?>