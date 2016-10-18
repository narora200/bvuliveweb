<?php include('./inc/header.inc.php'); ?>
<?php

if(!isset($_SESSION["chat_name"])){
	$chat_name = '';
}
else{

	$chat_name = $_SESSION["chat_name"];
	
}

?>
<link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
<title>Prattle | Invite Login </title>
<style>
 

.navbar-default .navbar-nav>li>a:focus, .navbar-default .navbar-nav>li>a:hover{

  background-color:#ddd;
}
.navbar-default .navbar-nav>li>a{
  color: rgba(252, 248, 227, 0.48);
} 
</style>
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
          echo '
          
          <ul class="nav navbar-nav navbar-left" style="padding-top:30px;font-weight:700;"> 
      <!-- Change here before submitting to the server--><li><a href="addchatroom.php"><span class="glyphicon glyphicon-plus"></span> Add Chatroom</a>
      </li><!-- Change here before submitting to the server--><li><a href="joinchatroom.php"><span class="glyphicon glyphicon-arrow-right"></span> Join Chatroom</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right" style="padding-top:30px;font-weight:700;">
        
           <!-- Change here before submitting to the server --><li><a href="leave.php"><span class="glyphicon glyphicon-log-out"></span> Leave</a></li>
           
           </ul>
           ';
    		}
    		?>
		</div>
		
		</div>
</nav>
<div class='col-sm-offset-4 col-sm-4'>
    <img src='./img/prattlechatroomlogon.png' alt='prattlechatroom' class='img-responsive' >
    </div>

<br />
<br />
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<?php

$join = @$_POST['join'];
//declaring variables to prevent errors.
$d_name = ""; //chatroom name
$cr_username = ""; //chatroom username
$cr_password = ""; //chatroom password

$d_name = mysql_real_escape_string(strip_tags(@$_POST['d_name']));
$cr_username = mysql_real_escape_string(strip_tags(@$_POST['cr_username']));
$cr_username_lower = strtolower($cr_username);
$cr_username_first_capital = ucwords($cr_username_lower);

$cr_password = mysql_real_escape_string(strip_tags(@$_POST['cr_password']));
if($join){


$chatname_sql = mysql_query("SELECT * FROM chatroom_login WHERE d_name='$d_name'"); // query the chat
	//Check for their existence
	$chatname_count = mysql_num_rows($chatname_sql);
	if($chatname_count==0){
		echo '<div class="alert alert-info">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<h3>No such ChatRoom exists.<br> Please try again.</h3>
		</div>';

	}else{
		


		//MAKING USERNAME UNIQUE IN CHATROOM TABLE
		$username_sql = mysql_query("SELECT * FROM chatroom_login WHERE c_username = '$cr_username_first_capital'"); // query the username
		$username_count = mysql_num_rows($username_sql);
		if($username_count==0){


			$sql_insert_chatroom_login = mysql_query("INSERT INTO chatroom_login VALUES ('', '$cr_username_first_capital', '$cr_password', '$d_name')");
					if($sql_insert_chatroom_login){
						echo "<div class='alert alert-info' style='text-align:center;height:250px;font-family:Prompt, sans-serif;'>
									<h4 style='padding:50px;font-size:2.5em'>Now Explore the chatrooms....</h4>
									<p>You are successfully added to the chatroom. Now please login again to start chatting</p>
							  </div>";
					}else{

						echo "<div class='alert alert-danger'".mysql_error()."</div>"; //change here
					}


					echo '<div class="col-sm-12" style="text-align:center;">
					<div id="login">
						<div class="text-center">
							<a href="joinchatroom.php" class="btn btn-default" role="button">Log On</a>
						</div>
					</div>
					</div>
					</div>';}
					else{


						echo "<div class='alert alert-info'><h2>Sorry, but this username has already been taken. Enter a unique username.</h2></div>";

					}


		}
	}

?>
<?php include('./inc/footer.inc.php');?>