<!-- This is an HTML code block that starts with the opening <div> tag and ends with the closing </html> tag. -->
<div class="footer" style="background-color: #56f0e0">
	<div class="wrap">
			<div class="footer-top">
				<!-- This is the first column in the footer that contains links to different pages. -->
				<div class="col_1_of_4 span_1_of_4">
					<div class="footer-nav">
		                <ul>
		                    <li><a href="index.php" style="text-decoration:none;">Home</a></li>
			  		   <li><a href="movies_events.php" style="text-decoration:none;">Movies</a></li>
			  		   <li><a href="login.php" style="text-decoration:none;">Login</a></li>
		                </ul>
		            </div>
				</div>
				<!-- This is the second column in the footer that displays contact information. -->
				<div class="col_1_of_4 span_1_of_4">
					<div class="textcontact">
						<p>Theatre Help<br>
						Online Theatre Ticket System<br>
						Ph: 1547896523<br>
						</p>
					</div>
				</div>
				<!-- This is the third column in the footer that displays a phone number to contact the theater. -->
				<div class="col_1_of_4 span_1_of_4">
					<div class="call_info">
						<p class="txt_3">Contact Us with the Below Number:</p>
						<p class="txt_4">4523658745</p>
					</div>
				</div>
				<!-- This is the fourth column in the footer that displays social media icons. -->
				<div class="col_1_of_4 span_1_of_4">
					<div class=social>
						<a href="#"><img src="images/fb.png" alt=""/></a>
						<a href="#"><img src="images/tw.png" alt=""/></a>
						<a href="#"><img src="images/dribble.png" alt=""/></a>
						<a href="#"><img src="images/pinterest.png" alt=""/></a>
					</div>
				</div>
				<!-- This clears any floats inside the footer. -->
				<div class="clear"></div>
			</div>
		</div>
	</div>
</body>
</html>

<!-- This is a CSS style block that defines styles for certain elements. -->
<style>
	/* This styles the content class by removing the padding at the bottom */
	.content {
		padding-bottom:0px !important;
	}
	/* These styles are for the search form */
	#form111 {
		width:500px;
		margin:50px auto;
	}
	#search111{
		padding:8px 15px;
		background-color:#fff;
		border:0px solid #dbdbdb;
	}
	#button111 {
		position:relative;
		padding:6px 15px;
		left:-8px;
		border:2px solid #ca072b;
		background-color:#ca072b;
		color:#fafafa;
	}
	#button111:hover  {
		background-color:#b70929;
		color:white;
	}
</style>

<!-- This script tag links to an external JavaScript file that provides autocomplete functionality. -->
<script src="js/auto-complete.js"></script>

<!-- This link tag references a stylesheet for styling the autocomplete functionality. -->
<link rel="stylesheet" href="css/auto-complete.css">

<!-- This script block creates a new instance of the autoComplete object and sets its properties. -->
<script>
	var demo1 = new autoComplete({
		selector: '#search111',
		minChars: 1,
		source: function(term, suggest){
			term = term.toLowerCase();
			<?php
			// This PHP code block retrieves data from the database and prepares it for use in the autocomplete feature.
				$qry2=mysqli_query($con,"select * from tbl_movie");
			?>
			// This JavaScript variable is assigned a string value that contains all the movie names in uppercase letters, separated by commas.
			var string="";
			<?php $string="";
			while($ss=mysqli_fetch_array($qry2))
			{
				$string .="'".strtoupper($ss['movie_name'])."'".",";
			}
			?>
			// This alerts the string of movie names to test if it is working correctly.
			// alert("<?php echo $string;?>");
			// This JavaScript array is populated with the suggestions that match the user's search term.
			var choices=[<?php echo $string;?>];
			var suggestions = [];
			for (i=0;i<choices.length;i++)
				if (~choices[i].toLowerCase().indexOf(term)) suggestions.push(choices[i]);
			suggest(suggestions);
		}
	});
</script>