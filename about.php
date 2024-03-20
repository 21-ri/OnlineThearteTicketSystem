<?php include('header.php'); // Including the header.php file ?>

<?php
	$qry2=mysqli_query($con,"select * from tbl_movie where movie_id='".$_GET['id']."'"); // Query to select movie information based on the 'id' parameter from the URL
	$movie=mysqli_fetch_array($qry2); // Fetching the movie details from the query result
?>

<div class="content" style="background-color: #ede77e;"> <!-- Opening a content div with a specific background color -->
	<div class="wrap"> <!-- Opening a wrap div -->
		<div class="content-top"> <!-- Opening a content-top div -->
			<div class="section group"> <!-- Opening a section group div -->
				<div class="about span_1_of_2"> <!-- Opening an about div within the span_1_of_2 class -->
					<h3 style="color:#444; font-size:23px;" class="text-center"><?php echo $movie['movie_name']; ?></h3> <!-- Displaying the movie name -->
					<div class="about-top"> <!-- Opening an about-top div -->
						<div class="grid images_3_of_2"> <!-- Opening a grid div within the images_3_of_2 class -->
							<img src="<?php echo $movie['image']; ?>" alt=""/> <!-- Displaying the movie image -->
						</div>
						<div class="desc span_3_of_2"> <!-- Opening a desc div within the span_3_of_2 class -->
							<p class="p-link" style="font-size:15px"><b>Cast : </b><?php echo $movie['cast']; ?></p> <!-- Displaying the movie cast -->
							<p class="p-link" style="font-size:15px"><b>Release Date : </b><?php echo date('d-M-Y',strtotime($movie['release_date'])); ?></p> <!-- Displaying the movie release date -->
							<p style="font-size:15px"><?php echo $movie['desc']; ?></p> <!-- Displaying the movie description -->
							<a href="<?php echo $movie['video_url']; ?>" target="_blank" class="watch_but" style="text-decoration:none;">Watch Trailer</a> <!-- Link to watch the movie trailer -->
						</div>
						<div class="clear"></div> <!-- Clearing the floats -->
					</div>
					
					<?php
					$s=mysqli_query($con,"select DISTINCT theatre_id from tbl_shows where movie_id='".$movie['movie_id']."'"); // Query to select distinct theatre IDs where the movie is being shown
					if(mysqli_num_rows($s)) // Checking if there are any shows available
					{
					?>
						<table class="table table-hover table-bordered text-center"> <!-- Opening a table to display the available shows -->
							<h3 style="color:#444;" class="text-center">Available Shows</h3> <!-- Heading for available shows -->

							<thead>
								<tr>
									<th class="text-center" style="font-size:16px;"><b>Theatre</b></th> <!-- Heading for theatre column -->
									<th class="text-center" style="font-size:16px;"><b>Show Timings</b></th> <!-- Heading for show timings column -->
								</tr>
							</thead>

							<?php
							while($shw=mysqli_fetch_array($s)) // Looping through each distinct theatre ID
							{
								$t=mysqli_query($con,"select * from tbl_theatre where id='".$shw['theatre_id']."'"); // Query to select theatre information based on the theatre ID
								$theatre=mysqli_fetch_array($t); // Fetching the theatre details from the query result
								?>

								<tbody>
									<tr>
										<td>
											<?php echo $theatre['name'].", ".$theatre['place'];?> <!-- Displaying the theatre name and place -->
										</td>
										<td>
											<?php
											$tr=mysqli_query($con,"select * from tbl_shows where movie_id='".$movie['movie_id']."' and theatre_id='".$shw['theatre_id']."'"); // Query to select show information based on the movie ID and theatre ID
											while($shh=mysqli_fetch_array($tr)) // Looping through each show
											{
												$ttm=mysqli_query($con,"select  * from tbl_show_time where st_id='".$shh['st_id']."'"); // Query to select show time information based on the show time ID
												$ttme=mysqli_fetch_array($ttm); // Fetching the show time details from the query result
												?>

												<a href="check_login.php?show=<?php echo $shh['s_id'];?>&movie=<?php echo $shh['movie_id'];?>&theatre=<?php echo $shw['theatre_id'];?>"><button class="btn btn-default"><?php echo date('h:i A',strtotime($ttme['start_time']));?></button></a> <!-- Button to select a show time -->
												<?php
											}
											?>
										</td>
									</tr>
								</tbody>
								<?php
							}
							?>
						</table>
					<?php
					}
					else
					{
					?>
						<h3 style="color:#444; font-size:23px;" class="text-center">Currently there are no any shows available!</h3> <!-- Message when there are no shows available -->
						<p class="text-center">Please check back later!</p> <!-- Instruction to check back later -->
					<?php
					}
					?>

				</div>
			
				<?php include('movie_sidebar.php');?> <!-- Including the movie_sidebar.php file -->
			</div>
			<div class="clear"></div> <!-- Clearing the floats -->
		</div>
	</div>
</div>

<?php include('footer.php');?> <!-- Including the footer.php file -->
