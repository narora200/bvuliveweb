<?php 
	include('./inc/header.inc.php');  
?>
<title>Bharati Vidyapeeth University | Update</title>
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

$u_submit = @$_POST['u_submit'];
//declaring variables to prevent errors.
$u_ekey = ""; //event keyword


$u_ekey = strip_tags(@$_POST['u_ekey']);
$md5_u_ekey = md5($u_ekey);//md5 encrypted keyword
if($u_submit){

$sql = mysql_query("SELECT * FROM events WHERE e_key='$md5_u_ekey' LIMIT 1"); // query the event
	//Check for their existence
	$count = mysql_num_rows($sql); //Count the number of rows returned
	if ($count == 1) {
		
		
		
		 echo '<script> location.replace("login.php"); </script>';

        
		} else {
		echo '<div class="alert alert-info">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <h3>Wrong keyword entered.<br> Please try again.</h3>
</div>';
		
	}


}


?>
<?php
if(!$p_id){
echo '<div class="container">

	<div class="col-sm-offset-3 col-sm-6 text-center">
	<h2>Enter Your keyword here:</h2>
	<br>
	<br>
	<br>
	<br>
	<form role="form" action="update.php" method="POST">
	
	
		<div class="form-group">
			<label for="u_ekey"><h4>Event Keyword:</h4></label>
			<input type="password" class="form-control" id="u_ekey" name="u_ekey">
		</div>
		<input type="submit" class="btn btn-default" name="u_submit" value="Submit!">
	</form>	
	</div>
	


</div>
';}else{
	echo '<script> location.replace("home.php"); </script>';
}
?>

<?php include('./inc/footer.inc.php');?>