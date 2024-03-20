<style>
	.button-62 {
		/* Styles for a button with class "button-62" */
	}
	.button-62:not([disabled]):focus {
		/* Styles for the button when it's focused */
	}
	.button-62:not([disabled]):hover {
		/* Styles for the button when it's hovered */
	}
</style>
<?php include('header.php'); // Includes the content of the 'header.php' file in this position
if(!isset($_SESSION['user']))
{
	header('location:login.php'); // Redirects to 'login.php' if 'user' session variable is not set
}
$qry2=mysqli_query($con,"select * from tbl_movie where movie_id='".$_SESSION['movie']."'"); // Retrieves movie information from the database based on the 'movie_id' stored in the '$_SESSION' variable
$movie=mysqli_fetch_array($qry2); // Fetches the movie data into an array
// Opening div tag with class "content" and a custom inline style for background color
// Opening div tag with class "wrap"
// Opening div tag with class "content-top"
// Opening div tag with class "section group"
// Opening div tag with class "about" and span size of 1 out of 2 columns
?>
<div class="content" style="background-color: #ede77e;"> 
	<div class="wrap"> 
		<div class="content-top"> 
			<div class="section group"> 
				<div class="about span_1_of_2"> 
					<h3><?php echo $movie['movie_name']; // Heading element with the movie name from the array, Opening div tag with class "about-top, Opening div tag with class "grid images_3_of_2"?></h3> 
					<div class="about-top"> 
						<div class="grid images_3_of_2"> 
							<img src="<?php echo $movie['image']; // Image tag with the movie's image source from the array, Opening div tag with class "desc" and span size of 3 out of 2 columns?>" alt=""/> 
						</div>
						<div class="desc span_3_of_2">
							<p class="p-link" style="font-size:15px"><b>Cast : </b><?php echo $movie['cast']; // Paragraph element with the movie's cast from the array?></p> 
							<p class="p-link" style="font-size:15px"><b>Release Date : </b><?php echo date('d-M-Y',strtotime($movie['release_date'])); // Paragraph element with the movie's release date from the array?></p> 
							<p style="font-size:15px"><?php echo $movie['desc']; // Paragraph element with the movie's description from the array?></p> 
							<a href="<?php echo $movie['video_url']; // Link to watch the movie trailer, Empty div tag with class "clear" // Button to select seats for Screen 1 // Button to select seats for Screen 2 // Button to select seats for Screen 3 // Opening table tag with classes for styling?>" target="_blank" class="watch_but">Watch Trailer</a> 
						</div>
						<div class="clear"></div> 
					</div>
					<a href="index.html"><button class="button-62" role="button">Select seats for Screen 1</button></a> 
					<a href="index1.html"><button class="button-62" role="button">Select seats for Screen 2</button></a> 
					<a href="index2.html"><button class="button-62" role="button">Select seats for Screen 3</button></a> 
					<table class="table table-hover table-bordered text-center"> 
					<?php
						$s=mysqli_query($con,"select * from tbl_shows where s_id='".$_SESSION['show']."'"); // Retrieves show information from the database based on the 's_id' stored in the '$_SESSION' variable
						$shw=mysqli_fetch_array($s); // Fetches the show data into an array

						$t=mysqli_query($con,"select * from tbl_theatre where id='".$shw['theatre_id']."'"); // Retrieves theatre information from the database based on the 'theatre_id' stored in the 'shw' array
						$theatre=mysqli_fetch_array($t); // Fetches the theatre data into an array
						?>
						<tr>
							<td class="col-md-6">
								Theatre
							</td>
							<td>
								<?php echo $theatre['name'].", ".$theatre['place']; // Displays the theatre name and place from the array?> 
							</td>
						</tr>
						<tr>
							<td>
								Screen
							</td>
							<td>
								<?php 
									$ttm=mysqli_query($con,"select  * from tbl_show_time where st_id='".$shw['st_id']."'"); // Retrieves show time information from the database based on the 'st_id' stored in the 'shw' array
									
									$ttme=mysqli_fetch_array($ttm); // Fetches the show time data into an array
									
									$sn=mysqli_query($con,"select  * from tbl_screens where screen_id='".$ttme['screen_id']."'"); // Retrieves screen information from the database based on the 'screen_id' stored in the 'ttme' array
									
									$screen=mysqli_fetch_array($sn); // Fetches the screen data into an array
									echo $screen['screen_name']; // Displays the screen name from the array
								?>
							</td>
						</tr>
						<tr>
							<td>
								Date
							</td>
							<td>
								<?php 
								if(isset($_GET['date']))
								{
									$date=$_GET['date'];
								}
								else
								{
									if($shw['start_date']>date('Y-m-d'))
									{
										$date=date('Y-m-d',strtotime($shw['start_date'] . "-1 days"));
									}
									else
									{
										$date=date('Y-m-d');
									}
									$_SESSION['dd']=$date;
								}
								?>
								<div class="col-md-12 text-center" style="padding-bottom:20px">
									<?php if($date>$_SESSION['dd']){?><a href="booking.php?date=<?php echo date('Y-m-d',strtotime($date . "-1 days"));?>"><button class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i></button></a> <?php } ?><span style="cursor:default" class="btn btn-default"><?php echo date('d-M-Y',strtotime($date));?></span>
									<?php if($date!=date('Y-m-d',strtotime($_SESSION['dd'] . "+4 days"))){?>
									<a href="booking.php?date=<?php echo date('Y-m-d',strtotime($date . "+1 days"));?>"><button class="btn btn-default"><i class="glyphicon glyphicon-chevron-right"></i></button></a>
									<?php }
									$av=mysqli_query($con,"select sum(no_seats) from tbl_bookings where show_id='".$_SESSION['show']."' and ticket_date='$date'"); // Retrieves the sum of booked seats for the specific show and ticket date
									$avl=mysqli_fetch_array($av); // Fetches the booked seats count into an array
									?>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								Show Time
							</td>
							<td>
								<?php echo date('h:i A',strtotime($ttme['start_time']))." ".$ttme['name']; // Displays the show time and name from the array?> Show 
							</td>
						</tr>
						<tr>
							<td>
								Number of Seats
							</td>
							<td> 
								<form  action="process_booking.php" method="post"> 
									<input type="hidden" name="screen" value="<?php echo $screen['screen_id']; // Form for submitting the booking details to the 'process_booking.php' file //Hidden input field to store the screen ID for the booking?>"/> 
									<input type="number" required tile="Number of Seats" max="<?php echo $screen['seats']-$avl[0]; // Input field to enter the number of seats to book, with a minimum of 0 and a maximum of the available seats in the screen?>" min="0" name="seats" class="form-control" value="1" style="text-align:center" id="seats"/> 
									<input type="hidden" name="amount" id="hm" value="<?php echo $screen['charge']; // Hidden input field to store the booking amount?>"/> 
									<input type="hidden" name="date" value="<?php echo $date; // Hidden input field to store the ticket date?>"/> 
							</td>
						</tr>
						<tr>
							<td>
								Amount
							</td>
							<td id="amount" style="font-weight:bold;font-size:18px">
							£ <?php echo $screen['charge']; // Displays the booking amount from the array?> 
							</td>
						</tr>
						<tr>
							<td colspan="2"><?php if($avl[0]==$screen['seats']){?><button type="button" class="btn btn-danger" style="width:100%">House Full</button><?php } else { ?>
							<button class="btn btn-info" style="width:100%">Book Now</button> 
							<?php } // Button to submit the booking form ?>
							</form></td>
						</tr>
				<table> 
					<tr>
						<td></td>
					</tr>
				</table>
			</div>			
		<?php include('movie_sidebar.php'); // Includes the 'movie_sidebar.php' file ?> 
	</div>
	<div class="clear"></div>		
</div>
</div>
<?php include('footer.php'); // Includes the 'footer.php' file ?> 
<script type="text/javascript">
	$('#seats').change(function(){ // Event listener for the 'change' event on the seats input field
		var charge=<?php echo $screen['charge'];?>; // Retrieves the booking charge from the array
		amount=charge*$(this).val(); // Calculates the booking amount based on the entered number of seats and the charge per seat
		$('#amount').html("£ "+amount.toFixed(2)); // Updates the displayed amount with the calculated value
		$('#hm').val(amount.toFixed(2)); // Updates the hidden input field value with the calculated value
	});
</script>
