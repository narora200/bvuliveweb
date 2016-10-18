<?php include('./inc/header.inc.php');  ?>
<title>Bharati Vidyapeeth University | Review</title>
</head>
<body>



	<nav class="navbar navbar-default" style="margin-bottom:0px;border-color:#494ca8;">
		<div class="container-fluid" style="background-color:#494ca8;">
			<div class="navbar-header" style="padding-top: 40px;">
				<!-- Change here when changing the website root folder--><a href="index.php" class="navbar-brand"><img style="max-width:120px; margin-top: -25px;"
             src="./img/logowhiteanother.png"></a>
				<button type="button" class="navbar-toggle"  data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
	
      		
    		
    		<div class="collapse navbar-collapse" id="myNavbar">
			<?php 
			if(!$p_id){


			echo'
			
			<ul class="nav navbar-nav navbar-left" style="padding-top:40px;font-weight:700;">
			<!-- Change here before submitting to the server--><li><a href="display.php" style=""><span class="glyphicon glyphicon-camera"></span> Events</a></li>
			</ul>
			';
			?>
			
			<form role="form" action="search.php" method="POST">
			<div class="col-sm-4 col-xs-7" style="padding:30px 0px 20px 0px;">
			
			    	
			    	
			    	<select id="ne_name" placeholder="Event Name" name="ne_name" class="selectized text-center"  required="">
				    	<option value="" selected=""></option>
				    	<?php
				    	$result = mysql_query("SELECT e_name FROM events WHERE e_posted = '1'");//change here to 1
				    	while($row = mysql_fetch_assoc($result)){

				    		echo "<option value='".$row['e_name']."'>".$row['e_name']."</option>";
				    		
				    	
				    	}


				    	?>
					</select>
			  	
		  	</div>
		  	<div class="col-sm-2" style="padding:30px 0px 20px 0px;">
			<button type="submit" class="btn btn-default" name="s_submit">
			  	<i class="fa fa-2x fa-search" style="font-size:1.5em;">

			  	</i>
			  	</button>
			</div>
			</form>  		
			
			<?php echo '<ul class="nav navbar-nav navbar-right" style="padding-top:40px;font-weight:700;">
     		 <!-- Change here before submitting to the server--><li><a href="addevent.php"><span class="glyphicon glyphicon-pushpin"></span> Add Event</a></li>
      		 <!-- Change here before submitting to the server--><li><a href="update.php"><span class="glyphicon glyphicon-log-in"></span> Update</a></li>
      		 <!-- Change here before submitting to the server--><li><a href="postreview.php"><span class="glyphicon glyphicon-thumbs-up"></span> Review</a></li>

      		 
    		 </ul>';
    		}else{
    			echo '
    			<ul class="nav navbar-nav navbar-left" style="padding-top:40px;font-weight:700;">
			<!-- Change here before submitting to the server--><li><a href="display.php"><span class="glyphicon glyphicon-camera"></span> Events</a></li>
			</ul>';?>
			
			?>
			<form role="form" action="search.php" method="POST">
			<div class="col-sm-offset-1 col-sm-4 col-xs-8" style="padding:30px 0px 20px 0px;">
			
			    	
			    	
			    	<select id="ne_name" placeholder="Event Name" name="ne_name" class="selectized text-center"  required="">
				    	<option value="" selected=""></option>
				    	<?php
				    	$result = mysql_query("SELECT e_name FROM events WHERE e_posted = '1'");//change here to 1
				    	while($row = mysql_fetch_assoc($result)){

				    		echo "<option value='".$row['e_name']."'>".$row['e_name']."</option>";
				    		
				    	
				    	}


				    	?>
					</select>
			  	
		  	</div>
		  	<div class="col-sm-2" style="padding:30px 0px 20px 0px;">
			<button type="submit" class="btn btn-default" name="s_submit">
			  	<i class="fa fa-2x fa-search" style="font-size:1.5em;">

			  	</i>
			  	</button>
			</div>
			</form>  	
			<?php echo '<ul class="nav navbar-nav navbar-right" style="padding-top:40px;font-weight:700;"> <!-- Change here before submitting to the server--><li><a href="'.$p_id.'"><span class="glyphicon glyphicon-wrench"></span> UpdateProfile</a></li>
    			<!--Change here before submitting to the server--><li><a href="leave.php"><span class="glyphicon glyphicon-log-out"></span> Leave</a></li>
      		 
    		 </ul>';
    		}
    		?>
		</div>
		</div>
		</nav>


 <div class="container"> 
	 <div class="col-sm-12 text-center"> 
	 	<div class="col-sm-offset-2 col-sm-8">
	 	

	 	<div class="text-center">
	 	<img src="./img/reviews1.png" alt="reviews" class="img-responsive" >
	 	</div>
	 	</div>

	 	<div class="col-sm-12" style="padding-top:50px;padding-bottom: 50px;">
	 		<div class="col-sm-offset-3 col-sm-6">

		 	<form role="form" action="regreview.php" method="POST">
			  	<div class="form-group">
			    	<label for="u_name">Your Name:</label>
			    	<input type="text" class="form-control" id="u_name" name="r_uname">
			  	</div>
			  	<p class="center" style="color:hotpink;font-size:0.9em;">
			  		Leave name blank for anonymously posting a review.
			  	</p>
			  	<br>
			  	<br>
		    	<div class="form-group">
			    	<label for="er_name">Event Name:</label>
			    	
			    	<input type="hidden" id="pseudo_er_name" class="" name="">
			
					<select id="er_name" placeholder="Event Name" name="r_ename" class="selectized" required>
				    	<option value="" selected="">Event Name</option>
				    	<?php
				    	$result = mysql_query("SELECT e_name FROM events WHERE e_posted = '1'");//change here to 1
				    	while($row = mysql_fetch_assoc($result)){

				    		echo "<option value='".$row['e_name']."'>".$row['e_name']."</option>";
				    		
				    	
				    	}


				    	?>
					</select>
			  	</div>
			  	
			  	<div class="col-sm-6" style="padding: 0px 0px;padding-right:1px;">
				  	<div class="form-group">
				    	<label for="u_batch">Batch:</label>
				    	
				    	<input type="hidden" id="pseudo_batch" class="" name="">
				
						<select id="u_batch" placeholder="Batch" name="r_batch" class="selectized" required>
					    	<option value="" selected="">Batch</option>
					    	<option value="CSE - M">CSE - M</option>
					    	<option value="CSE - E">CSE - E</option>
					    	<option value="ECE(1) - M">ECE(1) - M</option>
					    	<option value="ECE(2) - M">ECE(2) - M</option>
					    	<option value="ECE - E">ECE - E</option>
					    	<option value="IT - M">IT - M</option>
					    	<option value="IT - E">IT - E</option>
					    	<option value="EEE">EEE</option>
					    	<option value="ICE">ICE</option>
						</select>
				  	</div>
			  	</div>
			  	<div class="col-sm-6"  style="padding: 0px 0px;padding-right:1px;">
			  		<div class="form-group">
				    	<label for="u_year">Year:</label>
				    	
				    	<input type="hidden" id="pseudo_year" class="" name="">
				
						<select id="u_year" placeholder="Year" name="r_year" class="selectized" required>
					    	<option value="" selected="">Year</option>
					    	<option value="1st Year">1st Year</option>
					    	<option value="2nd Year">2nd Year</option>
					    	<option value="3rd Year">3rd Year</option>
					    	<option value="4th Year">4th Year</option>
					    	
						</select>
				  	</div>
			  	</div>
			  	<div class="form-group">
			    	<label for="u_review">Review:</label>
			    	<textarea class="form-control" id="u_review" name="r_review" rows="8"></textarea>
			  	</div>
			  	<div class="form-group">
			    	<label for="rating-system">Rating:</label>
			    	<input id="rating-system" type="number" class="rating" name="r_rating" min="1" max="5" step="1" required>
			  	</div>
			  	<input type="submit" class="btn btn-default" name="r_submit" value="Submit!">
		  	</form>
		  	</div>
	 	</div>


	 </div>
</div>

<!-- TinyMCE Text Editor-->

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>


<!-- Rating JS -->
<script src="js/star-rating.js" type="text/javascript"></script>
<script src="js/reviewselectize.js" type="text/javascript"></script>
<?php include('./inc/footer.inc.php');?>