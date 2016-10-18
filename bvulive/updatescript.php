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

	
	
	$update = @$_POST['update'];
	//declaring variables to prevent errors.
	$p_id = "";
	$e_id = "";
	$e_name = "";
	$e_key = ""; //Will be used  to login.
	$e_link = "";
	$e_fees = "";
	$contact = "";
	$email = "";
	$e_poster = "";
	$e_postedby = "";
	$e_designation = "";
	$e_datetime = "";
	$e_description = "";
	$e_check = "";

	
	if($update){
		$p_id = $_POST['up_id'];
		$e_name = strip_tags(@$_POST['ue_name']);
		// convert the string to all lowercase
		$e_name_lower = strtolower($e_name);
		// Capitalise first letter of every word. 
		$e_name_firstword = ucwords($e_name_lower);
		// strip out all whitespace
		$e_name_wspace = preg_replace('/\s*/', '', $e_name);
		
		$e_key = strip_tags(@$_POST['ue_key']);
		//md5 encrypted key
		$md5_e_key = md5($e_key);

		$e_link = strip_tags(@$_POST['ue_link']);
		$e_fees = strip_tags(@$_POST['ue_fees']);
		$contact = @$_POST['ucontact'];
		
		$email = strip_tags(@$_POST['uemail']);
		
		$e_postedby = strip_tags(@$_POST['ue_postedby']);
		$e_designation = @$_POST['ue_designation'];
		$d = date("Y-m-d"); // Year - Month - Date
		$e_datetime = @$_POST['ue_datetime'];
		$e_description = @$_POST['ue_description'];
		$e_id = md5($e_name_lower);


		
		
		//Check if event already exists
		$e_check = mysql_query("SELECT e_id FROM events WHERE p_id ='$p_id'");
		//Count the amount of rows where e_id = $e_id
		$check = mysql_num_rows($e_check);
		if($check == 1){
			//then update
			//check all of the fields have been filled in
			if($e_name&&$e_key&&$e_link&&$e_fees&&$contact&&$email&&$e_postedby&&$e_designation&&$e_datetime&&$e_description){
				//check the maximum length of username/first name/last name does not exceed 25 characters
					if(strlen($e_postedby)>25){
						echo "<div class='alert alert-info'>The maximum limit for the name of the respective person (entering this info) is 25 characters</div>";
					}
					else if(strlen($contact)>10){
						echo "<div class='alert alert-info'>Contact Number cannot be have greater than 10 digits!</div>";

					}else{

					//Query runs
						$sql = "UPDATE events SET e_key = '$md5_e_key', e_link =  '$e_link' ,e_fees = '$e_fees' ,contact = '$contact' ,email =  '$email' , e_postedby = '$e_postedby' ,e_designation =  '$e_designation' , d = '$d' , e_datetime = '$e_datetime' , e_description = '$e_description' , e_posted =  '0' WHERE p_id = '$p_id' ";
				 	$query = mysql_query($sql);
					if($query){
						
						die("<div class='alert alert-success'><h2>Welcome to <span style='font-size:2em;font-weight:900;'>bvulive.in</span></h2>Your event has been sent for confirmation to the admin and will get promoted very soooooooooooon...</div>");
		 			}else{
						echo "<div class='alert alert-danger'>".mysql_error();
					}
					
					
						
				
					}		


			}else{
				echo '<div class="alert alert-info">Please fill in all the fields!</div>';

			}
		}else{
				//don't update
				//no event exists with this name
				echo '<div class="alert alert-info">No event exists with this name.</div>';
		}

	}

	$changepic = @$_POST['changepic'];
	if($changepic){
		$e_poster = @$_FILES['ue_poster']['name'];
		$p_id = $_SESSION["p_id"];
		//Scope of php variables
		$query = mysql_query("SELECT e_name FROM events WHERE p_id = '$p_id'");
		if($query){
			while($row = mysql_fetch_assoc($query)){
				$dir_name = $row['e_name'];
			}

			//Image Upload Script
						
							//Check Image filetype
							if((@$_FILES['ue_poster']['type'] = "image/jpeg") || (@$_FILES['ue_poster']['type'] = "image/jpg") || (@$_FILES['ue_poster']['type'] = "image/gif") || (@$_FILES['ue_poster']['type'] = "image/png") ){

								//Check Image Size to be less than 2 MB 
								if((@$_FILES['ue_poster']['size'] < (1048576*2))){
									//This is because by default the Apache umask is set to 0022 by default.
								//Since umask is to revoke permission.
								 
								 $dir_path = "userdata/profile_pics/$dir_name";
								 if(file_exists("userdata/profile_pics/".$dir_name."/".@$_FILES['ue_poster']['name'])){
									 	echo @$_FILES['ue_poster']['name']."Already exists"; 
									 	}	else{	
										 		if(move_uploaded_file(@$_FILES['ue_poster']['tmp_name'] , "userdata/profile_pics/$dir_name/".@$_FILES['ue_poster']['name'])){
										 			
													//Query runs
												 	$query = mysql_query("UPDATE events SET e_poster ='$e_poster' WHERE p_id = '$p_id'");
													if($query){
														echo "<div class='alert alert-success'>Successfully Updated in the database</div>";
										 			}else{
														echo "<div class='alert alert-danger'>".mysql_error()."</div>";
													}
												 	echo "<div class='alert alert-info'>Uploaded and stored</div>";
												 	
											 	
											 	}else{
												 		echo '<div class="alert alert-danger>'."Not uploaded because of error #".$_FILES["ue_poster"]["error"].'</div>';
												 }
									 	
									 		}
									 		}else{
								echo '<div class="alert alert-info">Please Upload an image of file size less than 2 MB.For anything else you are most welcomed to send <a href="#">admin</a> an email!</div>';
							}
						}else{
							echo '<div class="alert alert-info">Please Upload image in either jpeg, gif or png format. For more details you are more than welcomed to send <a href="#">admin</a> an email!</div>';
						}
		} else{

			echo "<div class='alert alert-danger'>".mysql_error()."</div>";
		}
		

	}


?>	



<?php include('./inc/footer.inc.php');?>