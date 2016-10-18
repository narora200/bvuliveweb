<?php 
	include('./inc/header.inc.php'); 
?>
<title>Bharati Vidyapeeth University | Events</title>
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

<div class="container" style="padding: 0px 0px;background-image: url('img/event.jpg');width:100%;padding-bottom:50px; height: 100%;">

<div class="col-sm-12 col-xs-12 text-center" style="padding-top:230px;color:white;">
	
	<div style="font-weight:900;font-size:5em;text-align:center">Hey there, Event Freaks!</div>
	<div style="font-weight:400;font-size:1.7em;">This is a one-stop location for all the trending and enticing events happening around you.
	<br>
	No login, signup or any other associated hassle.
	<br>
	Simply post your event here, 
	<br>
	and enjoy the free promotion.</div>
	

</div>
</div>
<!-----------------------------------------        Second part        ---------------------------------------->
<div class="container-fluid" style="padding-left:0px;padding-right:0px;">
	<div class="second">
		<div class="col-sm-12" style="background-color:#ffffff;margin-top:0px;font-weight:800;">
		<div class="text-center" style="color:#7c7171;font-size:3.5em;font-weight:999;padding-top:60px;">
		Get Your Event Promoted!
		</div>
			<div class="contain text-center" style="padding:40px;padding-top:60px;margin-bottom:40px; ">
				<div id="images" class="owl-carousel owl-theme">
	 
				  <div class="item"><img src="img/eventpic1.jpg" class="img-responsive" style="display:inline;"alt="Event 1"></div>
				  <div class="item"><img src="img/eventpic2.jpg" class="img-responsive" style="display:inline;"alt="Event 2"></div>
				  <div class="item"><img src="img/eventpic3.jpg" class="img-responsive" style="display:inline;"alt="Event 3"></div>
				 	<div class="item"><img src="img/eventpic4.jpg" class="img-responsive" style="display:inline;"alt="Event 4"></div>
				</div>

			</div>
		</div>
	</div>
</div>
<!-----------------------------------------        Third part        ---------------------------------------->
<div class="container-fluid" style="padding-left:0px;padding-right:0px;">
	<div class="third">
	
		<div class="col-sm-12" style="background-color:#ecf0f1;padding-bottom:40px;">

			<div class="text-center" style="color:#34495e;font-size:3.5em;font-weight:650;padding-top:80px;">
			Get Authentic Reviews From The Audience!!
			</div>
			<div id="comments" class="owl-carousel">
  				<div>
  					<div class="col-sm-12" style="">
					 
  			<div class="col-sm-12" style=";padding: 0px 0px;padding-left:2px;">
			  	<div class="col-sm-12" style="background-color:#4EC8CD;text-align:center;padding-top:10px;padding-bottom:10px;">
			  	<h3>PhotoShop Event</h3>
							  <br>
					<h4>Nikhil Arora</h4>
				  	<h4>CSE - EVE , 2nd Year</h4>				  	
				  	<h2>That Photoshop Event was Awesome, I would love to attend it again.</h2>
			  	</div>

				  	<br>
				  	<br>
		  	</div>

				  	</div>
			  	</div>
  <div><div class="col-sm-12" style="">
					  
  			<div class="col-sm-12" style=";padding: 0px 0px;padding-left:2px;">
			  	<div class="col-sm-12" style="background-color:#4EC8CD;text-align:center;padding-top:10px;padding-bottom:10px;">
			  	<h3>Illustrator Event</h3>
							  <br>
					<h4>Saumya Tiwari</h4>
				  	<h4>CSE - EVE , 2nd Year</h4>				  	
				  	<h2>Hey , that Illustrator Event was Useful, I would love to learn it.</h2>
			  	</div>

				  	<br>
				  	<br>
		  	</div>

				  	</div></div>
  <div><div class="col-sm-12" style="">
					  
  			<div class="col-sm-12" style=";padding: 0px 0px;padding-left:2px;">
			  	<div class="col-sm-12" style="background-color:#4EC8CD;text-align:center;padding-top:10px;padding-bottom:10px;">
			  	<h3>MATLAB Event</h3>
							  <br>
					<h4>Dalip Thkar</h4>

				  	<h4>CSE - EVE , 2nd Year</h4>				  	
				  	<h2>Hey , that one was too good.Want more of that!</h2>
			  	</div>

				  	<br>
				  	<br>
		  	</div>

				  	</div></div>
  <div><div class="col-sm-12" style="">
					  
  			<div class="col-sm-12" style=";padding: 0px 0px;padding-left:2px;">
			  	<div class="col-sm-12" style="background-color:#4EC8CD;text-align:center;padding-top:10px;padding-bottom:10px;">
			  	<h3>Github</h3>
							  <br>
					<h4>Ashwin JayaPrakash</h4>
				  	<h4>CSE - EVE , 2nd Year</h4>				  	
				  	<h2>Hey , I just loved it!</h2>
			  	</div>

				  	<br>
				  	<br>
		  	</div>

				  	</div></div>
   <div><div class="col-sm-12" style="">
					  
  			<div class="col-sm-12" style=";padding: 0px 0px;padding-left:2px;">
			  	<div class="col-sm-12" style="background-color:#4EC8CD;text-align:center;padding-top:10px;padding-bottom:10px;">
			  	<h3>Data Science Session</h3>
							  <br>
					<h4>Siddhant Raghuvanshi</h4>
				  	<h4>CSE - EVE , 2nd Year</h4>				  	
				  	<h2>I want to learn more and more of that.</h2>
			  	</div>

				  	<br>
				  	<br>
		  	</div>

				  	</div></div>
</div>
			
				</div>
				 
				
			</div>

		</div>




	</div>









</div>
<!----------------------------------------        Fourth part       ---------------------------------------->
<div class="container-fluid" style="padding-left:0px;padding-right:0px;padding-bottom:50px;">
	<div class="fourth" style="">
	<div class="col-sm-12" style="background-color:#ffffff;">
		<div class="text-center" style="color:#000000;font-size:3.5em;font-weight:900;padding-top:80px;padding-bottom: 50px;">
		What You Need To Do?
		<br>
		<span style="font-size:0.8em;">Well, It's absolutely Simple!!</span>
		</div>
		<div class="col-sm-6 text-center" style="background-color: #9b59b6;color:#FEFEFA;height:auto;">
		<div style="padding-top:30px;">
		
		<div style="height:auto;">
		<span style="font-size:2.5em;font-weight:600;">Want to Register Your EVENT?</span>
		</div> 
		<br>
		<br>
		<div style="font-size:1.8em;font-weight:400;">If you want to register your event, then this is the perfect place for you.
		<br>
		Simply click on <a href="addevent.php" style="color:white;font-weight:900;font-size:1.4em;">Add Event</a> and fill out the details.
		<br>
		<br>
		<br>
		That's all?
		<br>
		<br>
		Yeah! That's all, now sit back and find out ways of managing the audience! 
		</div>
		</div>
		</div>
		<div class="col-sm-6 text-center" style="background-color: #e67e22;color:#F8F8FF;padding-bottom:20px;height:auto;">
			<div style="padding-top:30px;">
				<div style="height:auto;"> 
					<span style="font-size:2.5em;font-weight:600;">Want to give reviews about the event that you attended?</span>
				</div>
				<br>
				<br>
				<div style="font-size:1.8em;font-weight:400;">
					Submitting Authentic Reviews will help the events to become more AWESOME next time.
					<br>

					Do give them, they help us in increasing the quality of events.   
					<br>
					<br>
					Submitting Reviews is again very SIMPLE!
					<br>
					<br>
					Just head onto <a href="postreview.php" style="color:white;font-weight:900;font-size:1.4em;">Reviews</a> and give your views about the event.
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<!----------------------------------------        Fifth part       ---------------------------------------->
<div class="container-fluid">
		<div class="container-fluid" style="padding-left:0px;padding-right:0px;padding-bottom:50px;">
	<div class="fifth" style="">
	<div class="col-sm-12" style="background-color:#ffffff;">
		<div class="text-center" style="color:#000000;font-size:3.5em;font-weight:900;padding-top:80px;padding-bottom: 50px;">
		Subscribe to get event updates!
		<br>
		</div>
	</div>
	<div class="col-sm-12 text-center">
		<div class="col-sm-offset-3 col-sm-6">
		<form role="form" action="subscribe.php" method="post">
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" class="form-control" id="email" name="email" required/>
			</div>
			<input type="submit" name="submit" value="Submit" class="btn btn-default">
		</form>
		</div>
	</div>

	</div>


	</div>	

</div>

<script src="js/customowlindex.js" type="text/javascript"></script>
<script src="js/owl.carousel.min.js"></script>
<?php include('./inc/footer.inc.php');?>