<?php include('./inc/header.inc.php');
?>


<title>Prattle | ChatNow </title>
<style>

#messages{

	width: 600px;
	height: 300px;
	padding: 5px;
	margin: 10px;
	border: 1px solid #CCC;
	overflow: auto;
	position:relative;
	left:349px;
}

#feedback{

	font-family: 'Secular One', sans-serif;
	font-size: 1.5em;
	font-weight: 300;
	color:#d1cecc;

}
<style>
 

.navbar-default .navbar-nav>li>a:focus, .navbar-default .navbar-nav>li>a:hover{

  background-color:#ddd;
}
.navbar-default .navbar-nav>li>a{
  color: rgba(252, 248, 227, 0.48);
} 
</style>
</style>
<link href="https://fonts.googleapis.com/css?family=Oswald|Roboto" rel="stylesheet">
</head>

<body>

	<nav class="navbar navbar-default">
		<div class="container-fluid" style="background-color:#494ca8;">
			<div class="navbar-header" style="padding-top: 25px;">
				<!-- Change here when changing the website root folder--><a href="index.php" class="navbar-brand" style="color:#d1d6d6 ;font-size:1.4em;font-weight:700;"><span style="color:white;font-size:1.43em;font-weight:900;">Prattle</span>Panel</a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar" style="background-color:#f2d535;"></span>
					<span class="icon-bar" style="background-color:#f2d535;"></span>
					<span class="icon-bar" style="background-color:#f2d535;"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
			<?php 
			if(!$u_id){


			echo '
      
      <ul class="nav navbar-nav navbar-right" style="padding-top:30px;font-weight:700;">
         <!-- Change here before submitting to the server--><li><a href="register.php"><span class="glyphicon glyphicon-share-alt"></span> Register</a></li>
           
      
         <!-- Change here before submitting to the server--><li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
           

           
         </ul>';
    		}else{

	    			if(!$c_id){		
		    				echo '
          
          <ul class="nav navbar-nav navbar-left" style="padding-top:30px;font-weight:700;"> 
      <!-- Change here before submitting to the server--><li><a href="addchatroom.php"><span class="glyphicon glyphicon-plus"></span> Add Chatroom</a>
      </li><!-- Change here before submitting to the server--><li><a href="joinchatroom.php"><span class="glyphicon glyphicon-arrow-right"></span> Join Chatroom</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right" style="padding-top:30px;font-weight:700;">
        
           <!-- Change here before submitting to the server --><li><a href="leave.php"><span class="glyphicon glyphicon-log-out"></span> Leave</a></li>
           
           </ul>
           ';
		    		}else{


		    			echo '<ul class="nav navbar-nav navbar-left" style="padding-top:30px;font-weight:700;"> 
					<!-- Change here before submitting to the server--><li><a href="invite.php"><span class="glyphicon glyphicon-send"></span> Invite Members</a>
					</li><!-- Change here before submitting to the server--><li><a href="joinchatroom.php"><span class="glyphicon glyphicon-arrow-right"></span> Join Chatroom</a></li>
					</ul>


					<ul class="nav navbar-nav navbar-right" style="padding-top:30px;font-weight:700;">
		     		
		      		 <!-- Change here before submitting to the server--><li><a href="chatroom_leave.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
		      		 
		      		 </ul>
		    			';


		    		}
    			}
    			
    		?>
		</div>
		
		</div>
</nav>

<?php

	$chatname_extract_sql = mysql_query("SELECT * FROM chatroom_login WHERE cr_id='$c_id'");

	while($chatname_extract_array = mysql_fetch_assoc($chatname_extract_sql)){
	$chatname_details['cr_id'] = $chatname_extract_array['cr_id'];
	$chatname_details['cr_username'] = $chatname_extract_array['cr_username'];
	$chatname_details['cr_password'] = $chatname_extract_array['cr_password'];
	$chatname_details['d_name'] = $chatname_extract_array['d_name']; 
}
	$_SESSION["chat_name"] = $chatname_details['d_name']; //will be used to refer in php scripts folder

	echo "<div style='font-family: Oswald, sans-serif;font-weight:400;font-size:2em;color:#f41a6e'>Welcome ".$chatname_details['cr_username']."...</div>";





?>

<?php mysql_select_db("bvulimdk_chats") or die("Couldn't select DB");?>
<?php

function send_msg($sender, $message){

	if(!empty($sender) && !empty($message)){

			$esc_sender = mysql_real_escape_string($sender);
			$esc_message = mysql_real_escape_string($message);

			
			//inserting timestamp into the table
	  		$time = time();
			$timestamp = date('Y-m-d H:i:s', $time);

			
			$query = mysql_query("INSERT INTO ".$_SESSION["chat_name"]." VALUES ('', '$esc_sender', '$esc_message', '$timestamp')");
			if($query){

				//echo "Message inserted in the database successfully.";
				return true;
			}else{
				//echo "Message not inserted.";
				return false;
			}



		}else { echo 'Please insert values in the fields'; return false;}
 
}





function get_msg(){

	$query = mysql_query("SELECT * FROM ".$_SESSION["chat_name"]);

	$i = 0;

	while($chat = mysql_fetch_assoc($query)){

		$info[$i]['chat_id'] = $chat['chat_id'];
		$info[$i]['chat_name'] = $chat['chat_name'];
		$info[$i]['chat_message'] = $chat['chat_message'];
		$info[$i]['chat_time'] = $chat['chat_time'];

		$i++;

	}
	$rows = mysql_num_rows($query);

	for($i;$i--;$i>0){

	 echo "<span style='font-family: Roboto, sans-serif;font-size:0.7em;color:#c52ef7'>Sender:</span> <span style='color:#d1cecc;font-family: Oswald, sans-serif;font-size:1.0em;'>".$info[$i]['chat_name']. "</span><br />";
		echo "<span style='font-family: Roboto, sans-serif;font-size:0.7em;color:#ed8544'>Prattle:</span> <span style='color:#896047;font-family: Oswald, sans-serif;font-size:1.0em;'>".nl2br($info[$i]['chat_message'])."</span>";
		echo "<div style='text-align:right;color:#b600ff;font-family: Oswald, sans-serif;font-size:0.8em;'>".$info[$i]['chat_time']."</div><hr />";	}

	}


	
		if(isset($_POST['send'])){

			$sender = $_POST['sender'];
			$message = $_POST['message'];
			
			if(send_msg($sender, $message)){
				echo "<div id='feedback' style='font-family: \'Secular One\', sans-serif;font-size: 1.5em;font-weight: 300;color:#4059e5;text-align:center'>Message successfully sent!</div>";

				

			}else{
				
				echo "<div id='feedback' style='font-family: \'Secular One\', sans-serif;font-size: 1.5em;font-weight: 300;color:#4059e5;text-align:center'>Message Failed to send.</div>";
			}
		}
	
	



?>
<div id="messages">

	<?php get_msg();?>

</div> <!--Messages -->

<form role="form" method="POST" action="chathome.php" class="form-horizontal" id="form_input">
	<div>&nbsp;</div>
	
	
	


	<div class="col-sm-offset-2 col-sm-7">
	<div class="form-group">
		
		<div class="col-sm-offset-2 col-sm-10" style="position:relative;top:-25px;">
			<input type="text" class="form-control" name="sender" value="<?php echo $chatname_details['cr_username'];?>" id="sender" readonly>
		</div>
	</div>

	<div class="form-group" style="position:relative;top:-35px;">
		<label class="control-label col-sm-2" for="message">Message:</label>
		<div class="col-sm-10">
			<textarea class="form-control" rows="5" name="message" id="message" placeholder="Type your text here..." ></textarea>
		</div>
	</div>

	<div class="form-group" style="position:relative;top:-35px;">
		<div class="col-sm-offset-5 col-sm-6">
			<input type="submit" class="btn btn-default" name="send" value="Send Message">	
		</div>
	</div>
	</div>

</form>

<!-- Javascripts -->
<script type="text/javascript" src="scripts/js/auto_chat.js"></script>



<?php include('./inc/footer.inc.php');?>
