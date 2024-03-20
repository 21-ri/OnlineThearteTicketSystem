<?php include('header.php'); //includes the header file on this page
if(!isset($_SESSION['user'])) //checks if user is not logged in
{
	header('location:login.php'); //redirects to login page
} //links CSS file for form validation //links JS file for form validation?>
<link rel="stylesheet" href="validation/dist/css/bootstrapValidator.css"/> 

<script type="text/javascript" src="validation/dist/js/bootstrapValidator.js"></script> 
  <!-- =============================================== -->
<?php
    include('form.php'); //includes the form builder file
    $frm=new formBuilder; //creates an instance of the form builder class
  
  //payment form with ID "form1"
  //label for name on card input field
  //input field for name on card
  //input field for card number with required attribute and a title
  //label for card number input field
  //label for expiration date input field
  //input field for expiration date
  //label for CVV input field
  //input field for CVV
  //submit button for payment form
  //closing the payment form
  ?> 
</div>

<div class="content" style="background-color: #ede77e;">
	<div class="wrap">
		<div class="content-top">
			<h3>Payment</h3>
			<form action="bank.php" method="post" id="form1"> 
			<div class="col-md-4 col-md-offset-4" style="margin-bottom:50px">
				<div class="form-group">
				   <label class="control-label">Name on Card</label> 
				    <input type="text" class="form-control" name="name"> 
				</div>
				<div class="form-group">
				   <label class="control-label">Card Number</label> 
				    <input type="text" class="form-control" name="number" required title="Enter 16 digit card number"> 
				</div>      
				<div class="form-group">
				   <label class="control-label">Expiration date</label> 
				    <input type="date" class="form-control" name="date"> 
				</div>
				<div class="form-group">
				   <label class="control-label">CVV</label> 
				    <input type="text" class="form-control" name="cvv"> 
				</div>
				<div class="form-group">
				    <button class="btn btn-success">Make Payment</button> 
				    </form> 
				</div>
			</div>
		</div>
		<div class="clear"></div>	
	</div>

<?php include('footer.php'); //includes the footer file on this page?> 
</div>

<?php
    session_start(); //starts a PHP session
    extract($_POST); //extracts post data into variables
    include('config.php'); //includes the config file
    $_SESSION['screen']=$screen; //sets the session variable for screen
    $_SESSION['seats']=$seats; //sets the session variable for seats
    $_SESSION['amount']=$amount; //sets the session variable for amount
    $_SESSION['date']=$date; //sets the session variable for date
    header('location:bank.php'); //redirects to bank page
?>

<script>
        $(document).ready(function() {
            $('#form1').bootstrapValidator( //validation for payment form with ID "form1"
            fields:  
            name: {
            verbose: false, //disables verbose messages
                validators: {notEmpty: {
                        message: 'The Name is required and can\'t be empty' //validation error message for empty name field
                    },regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'The Name can only consist of alphabets' //validation error message for invalid name format
                    } } },
            number: {
            verbose: false, //disables verbose messages
                validators: {notEmpty: {
                        message: 'The Card Number is required and can\'t be empty' //validation error message for empty card number field
                    },stringLength: {
                    min: 16,
                    max: 16,
                    message: 'The Card Number must 16 characters long' //validation error message for invalid card number length
                },regexp: {
                        regexp: /^[0-9 ]+$/,
                        message: 'Enter a valid Card Number' //validation error message for invalid card number format
                    } } },
            date: {
            verbose: false, //disables verbose messages
                validators: {notEmpty: {
                        message: 'The Expire Date is required and can\'t be empty' //validation error message for empty expiration date field
                    } } },
            cvv: { // Define a object named cvv
    verbose: false, // Set a boolean value to indicate whether to display verbose messages or not
    validators: { // Define an object named validators inside cvv
        notEmpty: { // Define a validator called notEmpty
            message: 'The cvv is required and can\'t be empty' // Set an error message if the cvv field is empty
        },
        stringLength: { // Define a validator called stringLength
            min: 3, // Set the minimum length of the cvv to 3 characters
            max: 3, // Set the maximum length of the cvv to 3 characters
            message: 'The cvv must 3 characters long' // Set an error message if the length of the cvv is not exactly 3 characters
        },
        regexp: { // Define a validator called regexp
            regexp: /^[0-9 ]+$/, // Set a regular expression pattern to validate the cvv input. It allows only digits and spaces.
            message: 'Enter a valid cvv' // Set an error message if the cvv does not match the pattern
        }
    }
});
}); // End of script block.