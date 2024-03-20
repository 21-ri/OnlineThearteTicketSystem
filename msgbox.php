<?php

// This block checks if a session variable 'success' is set and displays an alert with a success message.
if(isset($_SESSION['success']))
{
    ?>
    <div class="alert alert-success alert-dismissible" id='hideMe'>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Success!</h4>
        <?php echo $_SESSION['success'];?>
    </div>
    <?php 

    // This line unsets the session variable 'success'.
    unset($_SESSION['success']);
}

// This block checks if a session variable 'error' is set and displays an alert with an error message.
if(isset($_SESSION['error']))
{
    ?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
        <?php echo $_SESSION['error'];?>
    </div>
    <?php

    // This line unsets the session variable 'error'.
    unset($_SESSION['error']);
}
?>