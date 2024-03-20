
<?php // Start of PHP block
    include('config.php'); // Include the configuration file which contains the database connection details
    extract($_POST); // Extract the values from the $_POST array and create variables with the same names as the input fields in the form
    
    $qry=mysqli_query($con,"insert into tbl_contact values(NULL,'$name','$email',$mobile','$subject')"); 
    /* Execute an SQL query to insert the values into the 'tbl_contact' table. The 'NULL' value is used for the auto-increment primary key column.
     * The values of $name, $email, $mobile, and $subject are inserted into the corresponding columns of the table.
     * Note that there is a syntax error in the SQL query since there is a missing apostrophe before $mobile. It should be: ('$name', '$email', '$mobile', '$subject')
     * Also, it does not handle SQL injection attacks. Prepared statements or at least escaping the input values is recommended to prevent such attacks.
     */
    
    //echo $qry; // This line is commented out, so it does not execute anything. If uncommented, it would display the value of $qry on the webpage.
    //header('location:contact.php'); // This line is commented out, so it does not execute anything. If uncommented, it would redirect the user to the 'contact.php' page.
?>