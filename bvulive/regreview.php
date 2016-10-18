<?php 
	include('./inc/header.inc.php');  
?>
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
<?php

	$r_submit = @$_POST['r_submit'];
	//declaring variables to prevent errors.
	$r_uname = "";
	$r_ename = "";
	$r_batch = "";
	$r_year = "";
	$r_review = "";
	$r_rating = "";
	


	$r_uname = mysql_real_escape_string(strip_tags(@$_POST['r_uname']));
	// convert the string to all lowercase
	$r_uname_lower = strtolower($r_uname);
	// Capitalise first letter of every word. 
	$r_uname_firstword = ucwords($r_uname_lower);
	// strip out all whitespace
	$r_uname_wspace = preg_replace('/\s*/', '', $r_uname);
	
	
	$r_ename = mysql_real_escape_string(@$_POST['r_ename']);
	// convert the string to all lowercase
	$r_ename_lower = strtolower($r_ename);
	// Capitalise first letter of every word. 
	$r_ename_firstword = ucwords($r_ename_lower);
	// strip out all whitespace
	$r_ename_wspace = preg_replace('/\s*/', '', $r_ename);


	$r_batch = @$_POST['r_batch'];
	$r_year = @$_POST['r_year'];
	$r_review = mysql_real_escape_string(strip_tags(@$_POST['r_review']));
	$r_rating = @$_POST['r_rating'];


	if($r_submit){
		if($r_uname == ''){

			$r_uname = "Anonymous";
			$r_uname_lower = strtolower($r_uname);
			$r_uname_firstword = ucwords($r_uname_lower);
			if($r_uname&&$r_ename&&$r_batch&&$r_year&&$r_review&&$r_rating){
				$query = mysql_query("INSERT INTO reviews VALUES ( '' , '$r_uname_firstword' , '$r_ename_firstword' , '$r_batch' , '$r_year' , '$r_review' , '$r_rating' , '0') ");
				if($query){
					echo "<div class='alert alert-success' class='close' data-dismiss='alert' aria-label='close'>Thanks for the review!!!</div>";
				}else{
					echo '<div class="alert alert-danger" class="close" data-dismiss="alert" aria-label="close">Sorry, your review failed to submit. Drop us a mail @admin@bvulive.in. Thankyou :)</</div>';
				}
			}
		}else{
			if($r_uname&&$r_ename&&$r_batch&&$r_year&&$r_review&&$r_rating){
				$query = mysql_query("INSERT INTO reviews VALUES ( '' , '$r_uname_firstword' , '$r_ename_firstword' , '$r_batch' , '$r_year' , '$r_review' , '$r_rating' , '0') ");
				if($query){
					echo "<div class='alert alert-success' class='close' data-dismiss='alert' aria-label='close'>Thanks for the review!!!</div>";
				}else{
					echo '<div class="alert alert-danger" class="close" data-dismiss="alert" aria-label="close">Sorry, your review failed to submit. Drop us a mail @admin@bvulive.in. Thankyou :)</</div>';
				}
			}
		}
		


	}
?>


<?php include('./inc/footer.inc.php');?>