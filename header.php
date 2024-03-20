<?php
// Include the config.php file that contains the database connection details
include('config.php');

// Start the PHP session
session_start();

// Set the default timezone to 'Asia/Kathmandu'
date_default_timezone_set('Asia/Kathmandu');
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Online Theatre Ticket System</title>

<!-- Set the character encoding to UTF-8 -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- Include the style.css file for CSS styling -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />

<!-- Include the flexslider.css file for CSS styling of the image slider -->
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" />

<!-- Include the tsc_tabs.css file for CSS styling of the tabs -->
<link type="text/css" rel="stylesheet" href="http://www.dreamtemplate.com/dreamcodes/tabs/css/tsc_tabs.css" />
<link rel="stylesheet" href="css/tsc_tabs.css" type="text/css" media="all" />

<!-- Include the jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Include the jQuery color-RGBa-patch.js file -->
<script src='js/jquery.color-RGBa-patch.js'></script>

<!-- Include the example.js file -->
<script src='js/example.js'></script>

<!-- Include the Bootstrap CSS file -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- Include the Bootstrap JS file -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="header">
	<div class="header-top" style="background-color: #E63246;">
		<div class="wrap">
			<div class="h-logo" id="imjl">
			<!-- Place your logo image here -->
			<!-- <a href="index.php"><img src="images/mov.jpg" alt="Logo Image Here" width=60% height=60%/></a> -->
		</div>
		<div class="nav-wrap">
			<ul class="group" id="example-one" style="color: white" >
				<!-- Navigation links -->
				<li><a href="index.php" >Home</a></li>
				<li><a href="movies_events.php">Movies</a></li>
				<li>
					<?php
					if(isset($_SESSION['user'])){
						// If the user is logged in, display their name as a link to their profile and a logout link
						$us=mysqli_query($con,"select * from tbl_registration where user_id='".$_SESSION['user']."'");
        				$user=mysqli_fetch_array($us);
        				?>
        				<a href="profile.php"><?php echo $user['name'];?></a>
        				<a href="logout.php">Logout</a>
        				<?php
        			}else{
        				// If the user is not logged in, display login and registration links
        				?>
        				<a href="login.php">Login</a>
        				<a href="registration.php">Register</a>
        				<?php
        			}
        			?>
        		</li>
        	</ul>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="clear"></div>
