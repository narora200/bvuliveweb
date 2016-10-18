<?php 
	include('./inc/header.inc.php'); 
?>
<title>Bharati Vidyapeeth University | Add Event</title>
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
<div class="col-sm-6 text-center">
<h1 style="font-weight:900;color:#808080;">What to fill in this form?</h1>

<ol style="text-align:left;color:hotpink;font-size:1.2em">
	<li><h2 class="headings">Event Name</h2><h5 class="contents1">Write your event name here. If the same event (or another event with same name) has been submitted previously, you will get an error message saying the same.</h5></li>
	<li><h2 class="headings">Event KeyWord</h2><h5 class="contents2">Keyword should be unique, something that a third party is not able to guess.For security purposes, user would be required to enter the keyword to update event details.</h5></li>
	<li><h2 class="headings">Event Link</h2><h5 class="contents1">Event link should be in the format --- http://www.bvulive.in or https://facebook.com (both are acceptable).</h5><h5 class="contents1">Leave blank for no online presence.</h5></li>
	<li><h2 class="headings">Event Fees</h2><h5 class="contents2">Enter your fee details here. In case the event is free, or has different fee for different set of people, mention the same.</h5></li>
	<li><h2 class="headings">Contact No.</h2><h5 class="contents1">Enter the contact number of the person who will attend to the queries of students.</h5></li>
	<li><h2 class="headings">Email ID</h2><h5 class="contents2">This should include the email - id of the concerned person or if the event has a mail id of their own. This will be used to know more about the event.</h5></li>
	<li style="text-align:left;"><h2 class="headings">Event Poster</h2>
	<h5 class="contents1">Upload poster image of the event in either of these formats:
	<ul style="text-align:left">
	<li>JPEG</li>
	<li>JPG</li>
	<li>GIF</li>
	<li>PNG</li>
	</ul>
	</h5>
	</li>
	<li><h2 class="headings">Posted By</h2><h5 class="contents2">Name of the person who is posting this post.</h5></li>
	<li><h2 class="headings">Position</h2><h5 class="contents1">The designation of the person posting this post.</h5></li>
	<li><h2 class="headings">Event Date and Time</h2><h5 class="contents2">Event date and time, both should be selected carefully as this would make sure that people come onto your event.You can update this anytime on update section in the top navigation bar.</h5></li>
	<li><h2 class="headings">Event Description</h2><h5 class="contents1">Describe your event here. It should answer some basic questions like:<ul>
	<li>What the event is all about?</li> 
	<li>What will it cover?</li>
	<li>Where it would take place?</li>

	</ul>
	</h5>
	</li>

</ol>

<br>

</div>
	<div class="col-sm-6">
	<div>
	&nbsp;
	</div>
	<div>
	&nbsp;
	</div>
	<div>
	&nbsp;
	</div>
	<div>
	&nbsp;
	</div>
	<div>
	&nbsp;
	</div>
	<div>
	&nbsp;
	</div>
	<div>
	&nbsp;
	</div>
	<form role="form" action="regaddevent.php" method="POST" enctype="multipart/form-data">
	  	<div class="col-sm-6" style="padding: 0px 0px;padding-right:1px;">
		  	<div class="form-group" >
		    	<label for="e_name">Event Name:</label>
		    	<input type="text" class="form-control" id="e_name" name="e_name" required>
		  	</div>
	  	</div>
	  	<div class="col-sm-6" style="padding: 0px 0px;padding-left:1px;">
		  	<div class="form-group">
		    	<label for="e_key">Event KeyWord:</label>
		    	<input type="text" class="form-control" id="e_key" name="e_key" required>
		  	</div>
	  	</div>
	  	<div class="form-group">
		    <label for="e_link">Event Link:</label>
		    <input type="text" class="form-control" id="e_link" name="e_link" placeholder="in https://www.example.com format">
	  	</div>
	  	<div class="form-group">
		    <label for="e_fees">Event Fees:</label>
		    <input type="text" class="form-control" id="e_fees" name="e_fees" required>
	  	</div>
	  	<div class="col-sm-6" style="padding: 0px 0px;padding-right:1px;">
		  	<div class="form-group">
			    <label for="contact">Contact No:</label>
			    <input type="number" class="form-control" id="contact" name="contact"  required>
		  	</div>
		</div>
		<div class="col-sm-6" style="padding: 0px 0px;padding-left:1px;">
		  	<div class="form-group">
			    <label for="emailid">Email ID:</label>
			    <input type="email" class="form-control" id="emailid" name="email" required>
		  	</div>
		</div>
	  	<!-- Correct this -->
	  	<div class="form-group">
		    <label for="e_poster">Event Poster:</label>
		    <input type="file" id="e_poster" name="e_poster" required>
	  	</div>
	  	<div class="col-sm-6" style="padding: 0px 0px;padding-right:1px;">
			<div class="form-group" >
				<label for="e_postedby">Posted By:</label>
				<input type="text" class="form-control" style="height: 36px;" id="e_postedby" name="e_postedby" required>
				
			</div>
		</div>
		<div class="col-sm-6" style="padding: 0px 0px;padding-left:1px;">
			<div class="form-group">
				<label for="e_position">Position:</label>
				
				<input type="hidden" id="pseudo_position" class="" name="">
				
				<select id="e_position" placeholder="Designation" name="e_designation" class="selectized" required>
				    	<option value="" selected="">Designation</option>
				    	<option value="Event Manager">Event Manager</option>
				    	<option value="Event Coordinator">Event Coordinator</option>
				    	<option value="Other">Other</option>
				</select>

			</div>
		</div>
	  	<div class="form-group">
		   <!--  Use Selectize.js   -->
		    <label for="e_date">Event Date and Time:</label>
		    

		    
 
			<input type="text" class="form-control" name="e_datetime" id="e_datetime" placeholder="Event Date and Time" required/>
			 
			<script type="text/javascript">
			$(function() {
			    $('input[name="e_datetime"]').daterangepicker({
			        timePicker: true,
			        timePickerIncrement: 30,
			        locale: {
			            format: 'MM/DD/YYYY h:mm A',
			            cancelLabel: 'Clear'
			        }
			    });
			});
			</script>
			
		</div>
	  	
	  	<div class="form-group">
		    <label for="e_description">Event Description:</label>
		    <textarea rows="8"  id="e_description" name="e_description" ></textarea>
	  	</div>
	  	
	  		<input type="submit" class="btn btn-default" name="add" value="Add Event!">
	</form>
</div>
</div>
</div>









<!-- TinyMCE Text Editor-->

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>

<!-- DateRangePicker JS -->

<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>

<!--Selectize JS File-->
<script src="js/addeventselectize.js" type="text/javascript"></script>


<?php include('./inc/footer.inc.php');?>