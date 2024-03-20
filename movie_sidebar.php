<!-- Create a div with class 'listview_1_of_3 images_1_of_3' -->
<div class="listview_1_of_3 images_1_of_3">

<!-- Create an h2 element with text 'Films in Theaters' and color #555 -->
<h2 style="color:#555;">Films in Theaters</h2>

<?php

// Get today's date
$today=date("Y-m-d");

// Retrieve 5 random movies that are currently in theaters from the database
$qry2=mysqli_query($con,"select * from  tbl_movie where status='0' order by rand() limit 5");
					
// Loop through each movie and display it
while($m=mysqli_fetch_array($qry2))
{
?>

<!-- Create a div with class 'content-left' -->
<div class="content-left">
	
	<!-- Create a div with class 'listimg listimg_1_of_2' and link to movie's about page -->
	<div class="listimg listimg_1_of_2">
		<a href="about.php?id=<?php echo $m['movie_id'];?>"><img src="<?php echo $m['image'];?>"></a>
	</div>
	
	<!-- Create a div with class 'text list_1_of_2' -->
	<div class="text list_1_of_2">
	  <div class="extra-wrap1">
	  	
	  	<!-- Display the movie name, release date, cast, and description -->
	  	<a href="about.php?id=<?php echo $m['movie_id'];?>" class="link4" style="font-size:18px; color: purple"><?php echo $m['movie_name'];?></a><br>
        <span class="data">Release Date: <?php echo $m['release_date'];?></span><br>
        Cast: <Span class="data"><?php echo $m['cast'];?></span><br>
        Description: <span" class="color2" style="text-decoration: none;"><?php echo $m['desc'];?></span><br>
      
      <!-- End of 'extra-wrap1' div -->
      </div>
	<!-- End of 'text list_1_of_2' div -->
	</div>
	
	<!-- Create a div with class 'clear' to clear floats -->
	<div class="clear"></div>

<!-- End of 'content-left' div -->
</div>

<?php
// End of while loop
}
?>
<!-- End of 'listview_1_of_3 images_1_of_3' div -->
</div>

<!-- Create a div with class 'clear' to clear floats -->
<div class="clear"></div>