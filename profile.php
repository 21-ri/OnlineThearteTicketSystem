<?php include('header.php'); // Include the header.php file

if (!isset($_SESSION['user'])) {
	header('location:login.php'); // Redirect to the login.php page if user session is not set
}

$qry2 = mysqli_query($con, "SELECT * FROM tbl_movie WHERE movie_id='".$_SESSION['movie']."'"); // Fetch movie details based on the movie ID stored in the user session
$movie = mysqli_fetch_array($qry2); // Store the fetched movie details in the $movie variable

?>

<!-- Opening div tag for the content section -->
<div class="content">
	<div class="wrap">
		<div class="content-top">
			<div class="section group">

				<!-- Opening div tag for the about section -->
				<div class="about span_1_of_2">	
					<h3 style="color:black;" class="text-center">BOOKING HISTORY</h3>
					<?php include('msgbox.php'); // Include the msgbox.php file?>

					<?php
					$bk = mysqli_query($con, "SELECT * FROM tbl_bookings WHERE user_id='".$_SESSION['user']."'"); // Fetch bookings for the current user from the tbl_bookings table

					if (mysqli_num_rows($bk)) {
						?>
						<table class="table table-bordered">
							<thead>
								<th>Booking Id</th>
								<th>Movie</th>
								<th>Theatre</th>
								<th>Screen</th>
								<th>Show</th>
								<th>Seats</th>
								<th>Amount</th>
								<th></th>
							</thead>
							<tbody>
								<?php
								while ($bkg = mysqli_fetch_array($bk)) {
									$m = mysqli_query($con, "SELECT * FROM tbl_movie WHERE movie_id=(SELECT movie_id FROM tbl_shows WHERE s_id='".$bkg['show_id']."')"); // Fetch movie details based on the movie ID from tbl_shows table
									$mov = mysqli_fetch_array($m); // Store the fetched movie details in the $mov variable

									$s = mysqli_query($con, "SELECT * FROM tbl_screens WHERE screen_id='".$bkg['screen_id']."'"); // Fetch screen details based on the screen ID from tbl_screens table
									$srn = mysqli_fetch_array($s); // Store the fetched screen details in the $srn variable

									$tt = mysqli_query($con, "SELECT * FROM tbl_theatre WHERE id='".$bkg['t_id']."'"); // Fetch theatre details based on the theatre ID from tbl_theatre table
									$thr = mysqli_fetch_array($tt); // Store the fetched theatre details in the $thr variable

									$st = mysqli_query($con, "SELECT * FROM tbl_show_time WHERE st_id=(SELECT st_id FROM tbl_shows WHERE s_id='".$bkg['show_id']."')"); // Fetch show time details based on the show ID from tbl_show_time table
									$stm = mysqli_fetch_array($st); // Store the fetched show time details in the $stm variable
									?>
									<tr>
										<td>
											<?php echo $bkg['ticket_id']; // Display the booking ID ?>
										</td>
										<td>
											<?php echo $mov['movie_name']; // Display the movie name ?>
										</td>
										<td>
											<?php echo $thr['name']; // Display the theatre name ?>
										</td>
										<td>
											<?php echo $srn['screen_name']; // Display the screen name ?>
										</td>
										<td>
											<?php echo $stm['name']; // Display the show name ?>
										</td>
										<td>
											<?php echo $bkg['no_seats']; // Display the number of seats ?>
										</td>
										<td>
											£. <?php echo $bkg['amount']; // Display the booking amount ?>
										</td>
										<td>
											<?php
											if ($bkg['ticket_date'] < date('Y-m-d')) { // Check if the ticket date is before the current date
												?>
												<i class="glyphicon glyphicon-ok"></i> <!-- Display a tick mark if the ticket date is in the past -->
												<?php
											} else { ?>
												<a href="cancel.php?id=<?php echo $bkg['book_id']; ?>" style="text-decoration:none; color:red;">Cancel</a> <!-- Display a cancel link if the ticket date is in the future -->
											<?php
											}
											?>
										</td>
									</tr>
									<?php
								}
								?>
							</tbody>
						</table>
						<?php
					} else {
						?>
						<h3 style="color:blue;" class="text-center">No Previous Bookings Found!</h3> <!-- Display a message if no previous bookings are found -->
						<?php
					}
					?>
				</div> <!-- Closing div tag for the about section -->
				
				<?php include('movie_sidebar.php'); // Include the movie_sidebar.php file ?>
				
			</div> <!-- Closing div tag for the section group -->
			
			<div class="clear"></div> <!-- Clearing any floats -->
			
		</div> <!-- Closing div tag for the content-top section -->
	</div>
</div> <!-- Closing div tag for the wrap section -->

<?php include('footer.php'); // Include the footer.php file ?>

<script type="text/javascript">
	$('#seats').change(function(){
		var charge=<?php echo $screen['charge'];?>; // Retrieve the charge value from the $screen variable
		amount=charge*$(this).val(); // Calculate the total amount based on the charge and selected number of seats
		$('#amount').html("Rs "+amount); // Update the amount value in the HTML element with the ID 'amount'
		$('#hm').val(amount); // Set the value of the hidden input field with the ID 'hm' to the calculated amount
	});
</script>
