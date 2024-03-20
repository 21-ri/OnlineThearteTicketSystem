<?php
    // Database connection parameters
    $host = "localhost:3307"; // Hostname and port number of the database server
    $user = "root"; // Username to connect to the database server
    $pass = ""; // Password to connect to the database server
    $db = "movietheatredb"; // Name of the database
    $port = 3307; // Port number to connect to the database server
    
    // Establishing a connection to the database
    $con = mysqli_connect($host, $user, $pass, $db, $port) or die(mysqli_error($con));
    // Uses the mysqli_connect function to connect to the database using the provided parameters
    // If the connection fails, the script will terminate and display the error message obtained from mysql_error()
?>
