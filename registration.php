<?php include('header.php'); // Include the header.php file ?>

<!-- Link to the bootstrapValidator.css stylesheet -->
<link rel="stylesheet" href="validation/dist/css/bootstrapValidator.css"/>

<!-- Link to the bootstrapValidator.js JavaScript library -->
<script type="text/javascript" src="validation/dist/js/bootstrapValidator.js"></script>

<?php
include('form.php'); // Include the form.php file
$frm = new formBuilder; // Create a new instance of the formBuilder class
?> 

<!-- Closing div tag for the previous section -->
</div>

<!-- Opening div tag for the content section with background image set -->
<div class="content" style="background-color: #ede77e;">

	<!-- Opening div tag for the wrap section -->
	<div class="wrap">

		<!-- Opening div tag for the content-top section with minimum height and padding set -->
		<div class="content-top" style="min-height:300px;padding:50px">

			<!-- Opening div tag for the panel section -->
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading">Register</div>
					<div class="panel-body">

						<!-- Opening form tag for the registration form -->
						<form action="process_registration.php" method="post" id="form1">

							<!-- Opening div tag for the form-group with feedback -->
							<div class="form-group has-feedback">
								<input name="name" type="text" size="25" placeholder="Name" class="form-control"/>
								<?php $frm->validate("name",array("required","label"=>"Name","regexp"=>"name"));  ?>
								<span class="glyphicon glyphicon-user form-control-feedback"></span>
							</div>

							<!-- Opening div tag for the form-group with feedback -->
							<div class="form-group has-feedback">
								<input name="age" type="text" size="25" placeholder="Age" class="form-control"/>
								<?php $frm->validate("age",array("required","label"=>"Age","regexp"=>"age")); ?>
								<span class="glyphicon glyphicon-user form-control-feedback"></span>
							</div>

							<!-- Opening div tag for the form-group with feedback -->
							<div class="form-group has-feedback">
								<select name="gender" class="form-control">
									<option value>Select Gender</option>
									<option>Male</option>
									<option>Female</option>
								</select>
								<?php $frm->validate("gender",array("required","label"=>"Gender"));  ?>
								<span class="glyphicon glyphicon-user form-control-feedback"></span>
							</div>

							<!-- Opening div tag for the form-group with feedback -->
							<div class="form-group has-feedback">
								<input name="phone" type="text" size="25" placeholder="Mobile Number" class="form-control"/>
								<?php $frm->validate("phone",array("required","label"=>"Mobile Number","regexp"=>"mobile"));  ?>
								<span class="glyphicon glyphicon-phone form-control-feedback"></span>
							</div>

							<!-- Opening div tag for the form-group with feedback -->
							<div class="form-group has-feedback">
								<input name="email" type="text" size="25" placeholder="Email" class="form-control"/>
								<?php $frm->validate("email",array("required","label"=>"Email","email"));  ?>
								<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
							</div>

							<!-- Opening div tag for the form-group with feedback -->
							<div class="form-group has-feedback">
								<input name="password" type="password" size="25" placeholder="Password" class="form-control" placeholder="Password" />
								<?php $frm->validate("password",array("required","label"=>"Password","min"=>"7"));  ?>
								<span class="glyphicon glyphicon-lock form-control-feedback"></span>
							</div>

							<!-- Opening div tag for the form-group with feedback -->
							<div class="form-group has-feedback">
								<input name="cpassword" type="password" size="25" placeholder="Password" class="form-control" placeholder="Password" />
								<?php $frm->validate("cpassword",array("required","label"=>"Confirm Password","min"=>"7","identical"=>"password Password"));  ?>
								<span class="glyphicon glyphicon-lock form-control-feedback"></span>
							</div>

							<!-- Opening div tag for the form-group -->
							<div class="form-group">
								<button type="submit" class="btn btn-primary" style="background color: #6B8E23">Continue</button>
							</div>

						</form> <!-- Closing form tag for the registration form -->

					</div> <!-- Closing div tag for the panel-body section -->
				</div> <!-- Closing div tag for the panel section -->
			</div> <!-- Closing div tag for the col-md-4 col-md-offset-4 section -->

		</div> <!-- Closing div tag for the content-top section -->
		<div class="clear"></div>	<!-- Clearing any floats -->
		
	</div> <!-- Closing div tag for the wrap section -->

	<?php include('footer.php'); // Include the footer.php file ?>

</div> <!-- Closing div tag for the content section -->

<!-- JavaScript code to apply form validations -->
<script>
    <?php $frm->applyvalidations("form1");?>
</script>
