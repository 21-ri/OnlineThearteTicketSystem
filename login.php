<!-- Include the header.php file -->
<?php include('header.php'); ?>

<!-- Create a div with class 'content' and background image url -->
<div class="content" style="background-image: url(https://us.123rf.com/450wm/hugolacasse/hugolacasse1603/hugolacasse160300013/53756518-illustration-of-a-film-stripe-reel-on-abstract-movie-background.jpg?ver=6)">

<!-- Create a div with class 'wrap' -->
<div class="wrap">
	
	<!-- Create a div with class 'content-top' and set minimum height and padding -->
	<div class="content-top" style="min-height:300px;padding:50px">
		
		<!-- Create a div with class 'col-md-4 col-md-offset-4' -->
		<div class="col-md-4 col-md-offset-4">
			
			<!-- Create a div with class 'panel panel-default' -->
			<div class="panel panel-default">
				
				<!-- Create a div with class 'panel-heading' and text 'Login' -->
				<div class="panel-heading">Login</div>
				
				<!-- Create a div with class 'panel-body' -->
				<div class="panel-body">
					
					<!-- Include the msgbox.php file -->
					<?php include('msgbox.php');?>
					
					<!-- Create a paragraph element with class 'login-box-msg' and text 'Sign in' -->
					<p class="login-box-msg">Sign in</p>
					
					<!-- Create a form with action 'process_login.php' and method 'post' -->
					<form action="process_login.php" method="post">
						
						<!-- Create a div with class 'form-group has-feedback' -->
						<div class="form-group has-feedback">
							
							<!-- Create an input element with name 'Email', type 'text', size '25', placeholder 'Email', and class 'form-control' -->
							<input name="Email" type="text" size="25" placeholder="Email" class="form-control" placeholder="Email"/>
							
							<!-- Create a span element with class 'glyphicon glyphicon-envelope form-control-feedback' -->
							<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
						
						<!-- End of 'form-group has-feedback' div -->
						</div> 
						
						<!-- Create a div with class 'form-group has-feedback' -->
						<div class="form-group has-feedback">
							
							<!-- Create an input element with name 'Password', type 'password', size '25', placeholder 'Password', and class 'form-control' -->
							<input name="Password" type="password" size="25" placeholder="Password" class="form-control" placeholder="Password" />
							
							<!-- Create a span element with class 'glyphicon glyphicon-lock form-control-feedback' -->
							<span class="glyphicon glyphicon-lock form-control-feedback"></span>
						
						<!-- End of 'form-group has-feedback' div -->
						</div>
						
						<!-- Create a div with class 'form-group' -->
						<div class="form-group">
							
							<!-- Create a button element with type 'submit' and class 'btn btn-primary' -->
							<button type="submit" class="btn btn-primary">Login</button>
							
							<!-- Create a paragraph element with class 'login-box-msg' and text "Don't have a account? Register" and link to registration.php -->
							<p class="login-box-msg" style="padding-top:20px">Don't have a account? <a href="registration.php">Register</a></p>
						
						<!-- End of 'form-group' div -->
						</div>
					
					<!-- End of form -->
					</form>
				
				<!-- End of 'panel-body' div -->
				</div>
			
			<!-- End of 'panel panel-default' div -->
			</div>
		
		<!-- End of 'col-md-4 col-md-offset-4' div -->
		</div>
	
	<!-- End of content-top div -->
	</div>
	
	<!-- Create a div with class 'clear' to clear floats -->
	<div class="clear"></div>	
	
<!-- End of 'wrap' div -->
</div>

<!-- Include the footer.php file -->
<?php include('footer.php');?>
<!-- End of 'content' div -->
</div>