<?php
session_start(); // Start a new or resume an existing session
if(!isset($_SESSION['user'])) // Check if the 'user' session variable is not set
{
	header('location:login.php'); // Redirect the user to the login.php page
}
extract($_POST); // Extract the values from the $_POST array into separate variables
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0 minimal-ui"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black">

<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
<meta http-equiv="pragma" content="no-cache" />

<title>OMTBS</title>
<link href="css/bank.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<div id="mainContainer" class="row large-centered">

  <div class="text-center"><h2>BANK</h2></div>
  
  <hr class="divider">
  <dl class="mercDetails">
  	<dt>Merchant</dt> 				<dd>Shop Street</dd>
    <dt>Transaction Amount</dt> 	<dd>GBP <?php echo $_SESSION['amount'];?></dd> // Output the transaction amount stored in the session
    <dt>Debit Card</dt> 		<dd><?php echo $number;?></%></dd> // Output the debit card number stored in $number variable
  </dl>
  <hr class="divider">
  
<form name="form1" id="form1" method="post" action="complete_payment.php">
<fieldset class="page2">
<div class="page-heading">
<h6 class="form-heading">Authenticate Payment</h6>
<p class="form-subheading">OTP sent to your mobile number <strong>**********</strong></p>
</div>

<div class="row formInputSection">
<div class="large-7 columns">
<label>
  Enter One Time Password (OTP)
  <input type="tel" name="otp"  class="form-control optPass" value="" maxlength="6" autocomplete="off"/> // Input field to enter the OTP
</label>
</div>
<div class="large-5 columns">
<label>&nbsp;</label><button class="expanded button next" onClick="ValidateForm()">Make Payment</button> // Button to initiate the payment
</div>
</div>
<div class="text-right resendBtn requestOTP"><a class="request-link" href="javascript:void(0)">Resend OTP</a></div>
<p>
<a class="tryAgain" href="complete_order.jsp">Go back</a> to merchant // Link to go back to the merchant's page
</p>
</fieldset>
</form>
</div>

<script src="bank/script/jquery-1.9.1.js"></script>
<script>
document.onmousedown = rightclickD; function rightclickD(e) { e = e||event; if (e.button == 2) { alert('Function Disabled...'); return false; } } // Function to disable right-click on the page
function ValidateForm() { 
	var regPin = RegExp("^[0-9]{4,6}$");
	if( document.form1.customerpin.value == "" || !document.form1.customerpin.value.match(regPin) ) {	 
		alert("Please enter a valid 6 digit One Time Password (OTP) receive on your registered Mobile Number."); document.form1.customerpin.focus(); return false;  
	} // Validate the entered OTP and display an alert if it is invalid
    else
    {
        document.form1.submit(); // Submit the form if the OTP is valid
    }
}
</script>
</body>
</html>
