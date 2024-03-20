<!-- The HTML document starts -->
<html>
<body>

<!-- Include the header.php file -->
<?php include('header.php');?>

<!-- Create a div with class 'content' and background color #FFF8DC -->
<div class="content" style="background-color: #ede77e;">

<!-- Create a div with class 'wrap' -->
<div class="wrap">
	
	<!-- Create a div with class 'content-top' -->
	<div class="content-top">
		
		<!-- Create a div with class 'listview_1_of_3 images_1_of_3' -->
		<div class="listview_1_of_3 images_1_of_3">
			
			<!-- Create an h2 element with text 'Upcoming Movies' and color #555 -->
			<h2 style="color:#555;">Upcoming Movies</h2>
			
			<?php
			// Retrieve the latest 5 news items from the database 
			$qry3=mysqli_query($con,"SELECT * FROM tbl_news LIMIT 5");
				
			// Loop through each news item and display it
			while($n=mysqli_fetch_array($qry3))
			{
			?>
			
			<!-- Create a div with class 'content-left' -->
			<div class="content-left">
				
				<!-- Create a div with class 'listimg listimg_1_of_2' and display the news item image -->
				<div class="listimg listimg_1_of_2">
					 <img src="admin/<?php echo $n['attachment'];?>">
				</div>
				
				<!-- Create a div with class 'text list_1_of_2' -->
				<div class="text list_1_of_2">
					  <div class="extra-wrap">
					  	
					  	<!-- Display the news item name, cast, and release date -->
					  	<span style="text-color:#000" class="data"><strong><?php echo $n['name'];?></strong><br>
					  	<span style="text-color:#000" class="data"><strong>Cast :<?php echo $n['cast'];?></strong><br>
                            <div class="data">Release Date :<?php echo $n['news_date'];?></div>
                            
                            <!-- Display the news item description -->
                            <span class="text-top"><?php echo $n['description'];?></span>
                      </div>
				</div>
				
				<!-- Create a div with class 'clear' to clear floats -->
				<div class="clear"></div>
			</div>
			
			<?php
			}
			?>
			
		</div> <!-- End of listview_1_of_3 images_1_of_3 div -->
		
		<!-- Create a div with class 'listview_1_of_3 images_1_of_3' -->
		<div class="listview_1_of_3 images_1_of_3">
			
			<!-- Create an h2 element with text 'Movie Trailers' and color #555 -->
			<h2 style="color:#555;">Movie Trailers</h2>
			
			<!-- Create a div with class 'middle-list' -->
			<div class="middle-list">
				
				<?php
				// Retrieve 6 random movies from the database
				$qry4=mysqli_query($con,"SELECT * FROM tbl_movie ORDER BY rand() LIMIT 6");
			
				// Loop through each movie and display it
				while($nm=mysqli_fetch_array($qry4))
				{
				?>
				
					<!-- Create a div with class 'listimg1' and display the movie image and name -->
					<div class="listimg1">
						 <a target="_blank" href="<?php echo $nm['video_url'];?>"><img src="<?php echo $nm['image'];?>" alt=""/></a>
						 <a target="_blank" href="<?php echo $nm['video_url'];?>" class="link" style="text-decoration:none; font-size:14px;"><?php echo $nm['movie_name'];?></a>
					</div>
					
					<?php
				}
				?>
				
			</div> <!-- End of middle-list div -->
			
		</div> <!-- End of listview_1_of_3 images_1_of_3 div -->
		
		<!-- Include the movie_sidebar.php file -->
		<?php include('movie_sidebar.php');?>
		
	</div> <!-- End of content-top div -->
	
</div> <!-- End of wrap div -->

<!-- Include the footer.php file -->
<?php include('footer.php');?>
</div> <!-- End of content div -->

<!-- Include the searchbar.php file -->
<?php include('searchbar.php');?>