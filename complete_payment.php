<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- Includes the Font Awesome CSS library -->

<?php
session_start(); // Starts the PHP session

if(!isset($_SESSION['user'])) // Checks if the 'user' session variable is not set, indicating that the user is not logged in
{
	header('location:login.php'); // Redirects the user to the 'login.php' page
}

include('config.php'); // Includes the 'config.php' file
extract($_POST); // Extracts the values from the $_POST array into variables

// OTP Code
if($otp=="123456") // Checks if the entered OTP is equal to "123456"
{
    $bookid="BKID".rand(1000000,9999999); // Generates a random booking ID
    mysqli_query($con,"INSERT into tbl_bookings values(NULL,'$bookid','".$_SESSION['theatre']."','".$_SESSION['user']."','".$_SESSION['show']."','".$_SESSION['screen']."','".$_SESSION['seats']."','".$_SESSION['amount']."','".$_SESSION['date']."',CURDATE(),'1')"); // Inserts the booking details into the 'tbl_bookings' table
    $_SESSION['success']="Bookings Done!"; // Sets the 'success' session variable with the message "Bookings Done!"
}
else
{
    $_SESSION['error']="Payment Failed"; // Sets the 'error' session variable with the message "Payment Failed"
}
?>

<body>
    <table align='center'>
        <tr>
            <td>
                <strong>Transaction is being processed,</strong>
            </td>
        </tr>
        <tr>
            <td>
                <font color='blue'>Please Wait <i class="fa fa-spinner fa-pulse fa-fw"></i>
                    <span class="sr-only"></font>
            </td>
        </tr>
        <tr>
            <td>(Do not 'RELOAD' this page or 'CLOSE' this page)</td>
        </tr>
    </table>
    <h2>
    <script>
        setTimeout(function(){ window.location="profile.php"; }, 3000); // Redirects the user to the 'profile.php' page after a delay of 3000 milliseconds (3 seconds)
    </script>
