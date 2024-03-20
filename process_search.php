<?php include('header.php'); // Include the header.php file ?>

<!-- Closing div tag for the previous section -->
</div>

<!-- Opening div tag for the content section with background color set to #FFF8DC -->
<div class="content" style="background-color: #FFF8DC;">

	<?php 
	// print_r($rs); - A commented out line that prints the contents of the $rs variable

	?>

	<!-- Opening div tag for the wrap section -->
	<div class="wrap">

		<!-- Opening div tag for the content-top section -->
		<div class="content-top">

			<!-- Heading for the Movies section -->
			<h3>Movies</h3>
			
			<?php
			// Get the current date
          	$today = date("Y-m-d");

          	// Query to select distinct movie names, movie IDs, images, and cast from the tbl_movie table
          	$qry2 = mysqli_query($con, "SELECT DISTINCT movie_name, movie_id, image, cast FROM tbl_movie WHERE movie_name='".$search."'");

          	// Loop through the query results and fetch each row as $m
			while($m = mysqli_fetch_array($qry2))
			{
			?>
                    
				<!-- Opening div tag for the col_1_of_4 section -->
				<div class="col_1_of_4 span_1_of_4">
					<div class="imageRow">
						<div class="single">
						  	
							<!-- Link to the about.php page with the movie ID passed as a parameter -->
							<a href="about.php?id=<?php echo $m['movie_id'];?>" rel="lightbox"><img src="<?php echo $m['image'];?>" alt="" /></a>
						  
						</div>
						<div class="movie-text">
						  	<!-- Movie name as a link to the about.php page with the movie ID passed as a parameter -->
						  	<h4 class="h-text"><a href="about.php?id=<?php echo $m['movie_id'];?>"><?php echo $m['movie_name'];?></a></h4>
						  	<!-- Cast information -->
						  	Cast:<Span class="color2"><?php echo $m['cast'];?></span><br>
						  		
						</div>
					</div>
				</div>
		  		
	  	<?php
	  	}
	  	?>

	</div> <!-- Closing div tag for the content-top section -->
	
	<div class="clear"></div> <!-- Clearing any floats -->
	
</div> <!-- Closing div tag for the wrap section -->

<?php include('footer.php'); // Include the footer.php file ?>
