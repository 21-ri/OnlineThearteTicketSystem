<?php 

// Include the header.php file which contains the HTML <head> tag and navigation menu
include('header.php');
?>

<!-- Start of content div with background color #FFF8DC -->
<div class="content" style="background-color: #ede77e;">
	<div class="wrap">
	
		<!-- Start of content-top div -->
		<div class="content-top">
			<h1 style="color:#555;">(NOW SHOWING)</h1>
			
			<?php
          	  
          	  // Get the current date in 'Y-m-d' format
              $today=date("Y-m-d");
              
              // Select all movies from the tbl_movie table
          	  $qry2=mysqli_query($con,"select * from  tbl_movie ");
		
          	  // Loop through each movie and display its details
              while($m=mysqli_fetch_array($qry2))
              {
            ?>
                    
                <!-- Start of col_1_of_4 div (displays one movie) -->
                <div class="col_1_of_4 span_1_of_4">
                
                    <!-- Start of imageRow div (contains movie poster) -->
					<div class="imageRow">
					    
					    <!-- Start of single div (contains movie poster image) -->
					  	<div class="single">
					  	    
					  		<?php
					  		
					  		    // Display the movie poster as a hyperlink to the movie's about page
					  		?>
					  		<a href="about.php?id=<?php echo $m['movie_id'];?>"><img src="<?php echo $m['image'];?>" alt="" /></a>
					  	</div>
					  	<!-- End of single div -->
					  	
					  	<!-- Start of movie-text div (contains movie title and cast list) -->
					  	<div class="movie-text">
					  	    
					  		<!-- Display the movie title as a hyperlink to the movie's about page -->
					  		<h4 class="h-text"><a href="about.php?id=<?php echo $m['movie_id'];?>" style="text-decoration:none;"><?php echo $m['movie_name'];?></a></h4>
					  		
					  		<!-- Display the cast list for the movie -->
					  		Cast: <Span class="color2" style="text-decoration:none;"><?php echo $m['cast'];?></span><br>
					  		
					  	</div>
					  	<!-- End of movie-text div -->
		  			</div>
		  			<!-- End of imageRow div -->
  	    	</div>
  	    	<!-- End of col_1_of_4 div -->
  		
  	    <?php
  	    	}
  	    	?>
			
			</div>
			<!-- End of content-top div -->
			
			<div class="clear"></div>		
		</div>
		<!-- End of wrap div -->
		
		<?php 
		
		// Include the footer.php file which contains the closing HTML tags and JS scripts
		include('footer.php');
		?>