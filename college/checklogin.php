<?php include('./inc/header.inc.php'); ?>


<title>Prattle | Login </title>
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

<?php

$login = @$_POST['login'];
//declaring variables to prevent errors.
$u_email_login = ""; //user email
$u_password = ""; //user password



$u_email_login = mysql_real_escape_string(strip_tags($_POST['u_email']));
	
$u_email_lower_login = strtolower($u_email_login);

$u_password = mysql_real_escape_string(strip_tags($_POST['u_password']));


if($login){

$sql = mysql_query("SELECT * FROM chatusers WHERE u_email='$u_email_lower_login' AND u_password='$u_password'"); // query the user
	//Check for their existence
	$count = mysql_num_rows($sql); //Count the number of rows returned
	if ($count == 1) {
		while($row = mysql_fetch_array($sql)){ 
             $u_id = $row["u_id"];
             $u_key = $row["u_key"];
             $u_name = $row["u_name"];
             $u_pic = $row["u_pic"];
             $u_email = $row["u_email"];
             $u_password = $row["u_password"];
        }
		
		$_SESSION["u_id"] = $u_id;
		 echo '<script> location.replace("home.php"); </script>';

        exit();
		} else {
		echo '<div class="alert alert-info">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <h3>Wrong Email Password combination entered.<br> Please try again.</h3>
</div>';
		
	}


}


?>










<?php include('./inc/footer.inc.php');?>