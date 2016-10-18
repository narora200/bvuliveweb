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
<?php

	$add = @$_POST['add'];
	//declaring variables to prevent errors.
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
	
	//mysql_real_escape_string prepends backslashes before some common things like inverted commas, double inverted commas etc.
	// for submitting inside the database as while entering into the database the INSERT INTO sql query has single inverted commas in it so if the content would have some inverted commas then it would create problems while storing , thus to make it work this function has to be used.


	$e_name_ok = mysql_real_escape_string($_POST['e_name']);
	
	$e_name_lower_ok = strtolower($e_name_ok);

	$e_name_firstword_ok = ucwords($e_name_lower_ok);
	

	// name for making the directory
	// for making the directory name ,the backslashes that gets prepended by mysql_real_escape_string function will not be needed to name the directory.

	// if the same thing is used for naming the directory also , then backslashes would get added up in the name of the directory and thus picture will not be displayed in the display section.
	  
	$e_name = strip_tags(@$_POST['e_name']);
	// convert the string to all lowercase
	
	$e_name_lower = strtolower($e_name);
	// Capitalise first letter of every word. 
	$e_name_firstword = ucwords($e_name_lower);
	// strip out all whitespace
	$e_name_wspace = preg_replace('/\s*/', '', $e_name);
	
	$e_key = mysql_real_escape_string(@$_POST['e_key']);
	//md5 encrypted key
	$md5_e_key = md5($e_key);

	$e_link = mysql_real_escape_string(@$_POST['e_link']);
	$e_fees = mysql_real_escape_string(@$_POST['e_fees']);
	$contact = @$_POST['contact'];
	
	$email = mysql_real_escape_string(@$_POST['email']);
	$e_poster = mysql_real_escape_string(@$_FILES['e_poster']['name']);
	$e_postedby = mysql_real_escape_string(@$_POST['e_postedby']);
	$e_designation = @$_POST['e_designation'];
	$d = date("Y-m-d"); // Year - Month - Date
	$e_datetime = @$_POST['e_datetime'];
	$e_description = mysql_real_escape_string($_POST['e_description']);
	$e_id = md5($e_name_lower);
	
	if($add){
		//Check if event already exists
		$e_check = mysql_query("SELECT e_id FROM events WHERE e_id ='$e_id'");
		//Count the amount of rows where e_id = $e_id
		$check = mysql_num_rows($e_check);
		if($check == 0){
		if($e_link == ''){
		$e_link = 'No online presence yet.';
		}
			//check all of the fields have been filled in
			if($e_name&&$e_key&&$e_link&&$e_fees&&$contact&&$email&&$e_poster&&$e_postedby&&$e_designation&&$e_datetime&&$e_description){
					
					// check for the existence of keyword , if it already exists before or not!
					$sql = mysql_query("SELECT e_key FROM events WHERE e_key = '$md5_e_key'");

					if(mysql_num_rows($sql) == 0){

						
						//check the maximum length of username/first name/last name does not exceed 25 characters

					if(strlen($e_postedby)>25){
						echo "<div class='alert alert-info'>The maximum limit for the name of the respective person (entering this info) is 25 characters></div>";
					}
					else if(strlen($contact)>10){
						echo "<div class='alert alert-info'>Contact Number cannot be have greater than 10 digits!</div>";

					}else{
						
						//Image Upload Script
						
						//Check Image filetype
						if((@$_FILES['e_poster']['type'] == "image/jpeg") || (@$_FILES['e_poster']['type'] == "image/jpg") || (@$_FILES['e_poster']['type'] == "image/gif") || (@$_FILES['e_poster']['type'] == "image/png") ){

							//Check Image Size to be less than 2 MB 
							if((@$_FILES['e_poster']['size'] < (1048576*2))){
								//This is because by default the Apache umask is set to 0022 by default.
								//Since umask is to revoke permission.
								 umask(0000);
								 $dir_name = $e_name_firstword;
								 $dir_path = "userdata/profile_pics/$dir_name"; 
								 if(mkdir($dir_path , 0777 , true)){
								 	
								 
									 if(file_exists("userdata/profile_pics/".$dir_name."/".@$_FILES['e_poster']['name'])){
									 	echo @$_FILES['e_poster']['name']."Already exists"; 
									 	}	else{	
										 		if(move_uploaded_file(@$_FILES['e_poster']['tmp_name'] , "userdata/profile_pics/$dir_name/".@$_FILES['e_poster']['name'])){

												 	
												 	//Query runs
												 	$query = mysql_query("INSERT INTO events VALUES ( '' , '$e_id' , '$e_name_firstword_ok' , '$md5_e_key' , '$e_link' , '$e_fees' ,'$contact' , '$email' , '$e_poster' , '$e_postedby' , '$e_designation' , '$d' , '$e_datetime' , '$e_description' , '0') ");
													if($query){
														
														die("<div class='alert alert-success'><h2>Welcome to <span style='font-size:2em;font-weight:900;'>bvulive.in</span></h2>Thanks for registering your event! Your event details has been forwarded to the admin and will be posted very soon!</div>");
													}else{
														echo "<div class='alert alert-danger'".mysql_error()."</div>";
													}
											 	
											 	}else {
												 		//echo 'NOT uploaded';
												 }
									 	
									 		}
								 }else{
									 	//echo 'Folder not created';
									 }

							}else{
								echo '<div class="alert alert-info">Please Upload an image of file size less than 1 MB.For anything else you are most welcomed to send <a href="#">admin</a> an email!</div>';
							}
						}else{
							echo '<div class="alert alert-info">Please Upload image in either jpeg, gif or png format. For more details you are more than welcomed to send <a href="#">admin</a> an email!</div>';
						}

						
				
					}

					}else{
						echo '<div class="alert alert-info">Please enter some other keyword here <br> This has already been used!</div>';
					}
					

							


			}else{
				echo '<div class="alert alert-info">Please fill in all the fields!</div>';

			}
		}else{
			echo '<div class="alert alert-info">This already exists!</div>';
		}

	}

?>
<?php include('./inc/footer.inc.php');?>