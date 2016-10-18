<?php include('./inc/header.inc.php');?>
<title>Bharati Vidyapeeth University | Unsubscribed</title>
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

$suggest= @$_POST['suggest'];
	//declaring variables to prevent errors.
	$email = "";
	$suggestion = "";

	$email = strip_tags(@$_POST['email']);
	$email_lower = strtolower($email);

	$suggestion = mysql_real_escape_string(strip_tags(@$_POST['suggestion']));
		if($suggest){

		$query = mysql_query("INSERT INTO lackings VALUES ('' , '$email' , '$suggestion')");
		if($query){
			echo '<div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  			Thanks for your suggestion, your suggestion has been sent to the admin and will be contacted soon.</div>';

		}else{
			echo '<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  			Some problem has been detected on the website, do mail this <span style="color:#494CA8 font-size:1.3em;font-weight:900;">@admin@bvulive.in</span> if you have some time, we will be really thankful to you!.</div>';
		}
	}
?>




<div class="container" style="padding:0px 0px;">
	<div class=" col-sm-12 text-center" style="padding:0px 0px;">
	<img src="./img/contactus.jpg" style="width:100%;overflow-y:hidden;height:500px;" class="img-responsive">
	</div>
	<div class="col-sm-12 text-center">
	<br>
	 <h2 style="font-size:2.5em;font-weight:900;">What do you think that we lacked in giving you?</h2>
	 <div>
	 &nbsp;
	 </div>
	 <div>
	 &nbsp;
	 </div>
	 <div class="col-sm-12">
	 <form role="form" action="unsubscribed.php" method="POST" class="form-horizontal">

	 <div class="form-group">
	 <label for="email" class="control-label col-sm-3" style="">Email:</label>
	 <div class="col-sm-6" style="padding-left:0px;">
	 <input type="email" id="email" name="email" placeholder="Enter your Email Id..." class="form-control" required="">
	 </div>
	 </div>
	 
	 <div class="form-group">
	 <label for="suggestion" class="control-label col-sm-3" style="">Your Suggestions:</label>
	 <div class="col-sm-7" style="padding-left:0px;">
	<textarea rows="8" name="suggestion" id="suggestion" class="form-control" placeholder="Write something in here..." required=""></textarea>
	 </div>
	 </div>

	 <input type="submit" name="suggest" value="Suggest!" class="btn btn-default">


	 </form>
	 </div>
	</div>
</div>
<?php include('./inc/footer.inc.php');?>