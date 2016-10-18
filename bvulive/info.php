<?php include("./inc/header.inc.php"); ?>
<title>Bharati Vidyapeeth University | Info</title>
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




<?php

$p_id = '';
$e_id = '';
$e_name = '';
$e_key = '';
$e_link = '';
$e_fees = '';
$contact = '';
$email = '';
$e_poster = '';
$e_postedby = '';
$e_designation = '';
$e_datetime = '';
$e_description = '';

if(isset($_GET['u'])){

		$p_id = mysql_real_escape_string($_GET['u']);
		if(ctype_alnum($p_id)){
		//check event exists
			$check = mysql_query("SELECT * FROM events WHERE p_id='$p_id'");
			if(mysql_num_rows($check)==1){
				$get = mysql_fetch_assoc($check);
				$p_id = $get['p_id'];
				$e_id = $get['e_id'];
				$e_name = $get['e_name'];
				$e_key = $get['e_key'];

				$e_link = $get['e_link']; 
				$e_fees = $get['e_fees'];
				$contact = $get['contact'];
				$email = $get['email'];
				$e_poster = $get['e_poster'];
				$e_postedby = $get['e_postedby'];
				$e_designation = $get['e_designation'];
				//$date ->> This has to be changed too
				$e_datetime = $get['e_datetime'];
				$e_description = $get['e_description'];
				

				

			}
			else{
			echo "<meta http-equiv=\"refresh\" content=\"0;url=http://bvulive.in/events/index.php\">"; //Change here while changing the website or porting the website.
			exit();
			}
		}
	}

?>

<div class="container">
	<?php $path = "userdata/profile_pics/".$e_name."/".$e_poster;?>

	<div class="col-sm-4" style="padding: 0px 0px;padding-right:1px;">
		<!--<div class="infotitle">Event Poster:</div>-->
		<div>&nbsp;</div>
		<img src="<?php echo "".$path."";?>" width="400" class="img-thumbnail img-responsive">

	</div>
	<div class="col-sm-8">
		<div class="col-sm-12 text-center">
			<div class="col-sm-12 text-left">
				<div>
				<div class="infotitle">ID</div>
				<div class="infocontent">
					<?php echo"".$p_id."";?>
				</div>
				</div>

				<div>
					<div class="infotitle">Event Name</div>
					<div class="infocontent">
					<?php echo"".$e_name."";?>
					</div>
				</div>

				<div>
					<div class="infotitle">Event Link</div>
					<div class="infocontent">
					<a href='<?php echo"".$e_link."";?>'>Event's fb Link</a>
					</div>
				</div>	
				<div>
					<div class="infotitle">Event Fees</div>
					<div class="infocontent">
					<?php echo"".$e_fees."";?>
					</div>
				</div>

				<div>
					<div class="infotitle">Contact Number</div>
					<div class="infocontent">
					<?php echo"".$contact."";?>
					</div>
				</div>
				<div>
					<div class="infotitle">Email Id</div>
					<div class="infocontent">
					<?php echo"".$email."";?>
					</div>
				</div>


				<div>
					<div class="infotitle">Posted By</div>
					<div class="infocontent">
					<?php echo"".$e_postedby."";?>
					</div>
				
				</div>


				<div>
					<div class="infotitle">Date and Time</div>
					<div class="infocontent">
					<?php echo"".$e_datetime."";?>
					</div>
				</div>


				<div>
					<div class="infotitle">Event Description</div>
					<div class="infocontent">
					<?php echo "$e_description"; ?>
					</div>
				</div>

				

			</div>
		</div>
	</div>
</div>
			<!-- Reviews here -->
			
			<div>
			&nbsp;
			</div>
			<br>
			
<div class="container-fluid">
	<div class="col-sm-12">
		
		<div class="infotitle text-center">Event Reviews</div>
		
		
			<?php 
			$i = 0;
			$reviews = mysql_query("SELECT * FROM reviews WHERE r_ename = '$e_name' AND r_posted = '1'");	
				if(mysql_num_rows($reviews) == 0){
					echo '<div class="alert alert-info"><h2>No reviews yet!</h2></div>';

				}else{
					
					while($row = mysql_fetch_assoc($reviews)){
						
						$review['r_uname'][$i] = $row['r_uname'];
						
						$review['r_ename'][$i] = $row['r_ename'];
						$review['r_batch'][$i] = $row['r_batch'];
						
						$review['r_year'][$i] = $row['r_year'];
						$review['r_review'][$i] = $row['r_review'];
						$review['r_rating'][$i] = $row['r_rating'];
						
						
						$i++;
					}
				}
			?>
		<div id="d_reviews" class="owl-carousel owl-theme" style="">
		  
		<?php 
		for($j=0;$j<$i;$j++){
		echo'
		
		  <div class="item">
		  
			  	<div class="">
			  	 <h3>'.$review['r_ename'][$j].'</h3>
			  	 <br>
					<h4>'.$review['r_uname'][$j].'</h4>
				  	<h4>'.$review['r_batch'][$j]. ' , '.$review['r_year'][$j].'</h4>				  	
				  	<h2>'.$review['r_review'][$j].'</h2>
				  	<h2>'.$review['r_rating'][$j].'<span class="glyphicon glyphicon-star-empty" style="color:red; font-weight:900;font-size:1.1em; "></span>'.'</h2>
			  	
			  	</div>


		  	</div>

				  	
		  	
		  	
	  	  
		
	
		';
		 }
		?>
</div>
</div>
</div>	




<script src="js/customowlinfo.js" type="text/javascript"></script>
<script src="js/owl.carousel.min.js"></script>

<?php include("./inc/footer.inc.php"); ?>