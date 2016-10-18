<?php 
session_start();
include("./inc/connect.inc.php");
if(!isset($_SESSION['id'])){
	$id = '';
}
else{
 	
	$id = $_SESSION['id'];
	
}
	
?>

<?php

$login = @$_POST['login'];
$username = '';
$password = '';

$username = @$_POST['username'];
$password = @$_POST['password'];

if($login){

	$check = mysql_query("SELECT id,name,username FROM adminlog WHERE username='$username' AND password='$password'");
	//Check for their existence
	$count = mysql_num_rows($check); //Count the number of rows returned
	if ($count == 1) {
		while($row = mysql_fetch_array($check)){ 
             $id = $row["id"];
             $name = $row["name"];
             $username = $row["username"];
        }
		
		$_SESSION["id"] = $id;
		echo '<script> location.replace("main.php"); </script>';
        exit();
		} else {
		echo '<div class="alert alert-danger">
  		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  		<h4>Wrong Combination entered.<br> Please try again.</h4>
		</div>';
		;
	}

}






?>
<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->

<head>
	 <meta charset="utf-8" />
	 <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	 <title>Admin Panel | BVU Events</title>
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
	 </script>
	 <link href='https://fonts.googleapis.com/css?family=Lora:400,700' rel='stylesheet' type='text/css'>
	  <link rel="icon" href="../img/favicon.png">
	 <style>
	 	ul.nav.navbar-nav.navbar-left li a{
	 		color:#d1d6d6 ;
	 	}
	 	ul.nav.navbar-nav.navbar-left li a:hover{
	 		color:#f2d535;
	 	}
	 	.navbar-default .navbar-nav>li>a{
	 		color:#d1d6d6;
	 	}
	 	.navbar-default .navbar-nav>li>a:hover{
	 		color:#f2d535;
	 	}
	 	.navbar-default .navbar-toggle:focus, .navbar-default .navbar-toggle:hover{
	 		background-color: #494ca8;
	 	}
	 </style>
	 	
	 	
		 
		 <!-- Custom css -->
		 <link rel="stylesheet" type="text/css" href="css/style.css">
		
		 <!-- Custom JS File -->
		 <script src="js/main.js"></script> 

			 

		 
</head>
<body lang="en-US">

<nav class="navbar navbar-default">
		<div class="container-fluid" style="background-color:#494ca8;">
			<div class="navbar-header" style="padding-top: 25px;">
				<!-- Change here when changing the website root folder--><a href="index.php" class="navbar-brand" style="color:#d1d6d6 ;font-size:1.4em;font-weight:700;"><span style="color:white;font-size:1.43em;font-weight:900;">Admin</span>Panel</a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar" style="background-color:#f2d535;"></span>
					<span class="icon-bar" style="background-color:#f2d535;"></span>
					<span class="icon-bar" style="background-color:#f2d535;"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
			<?php 
			if(!$id){


			
    		}else{
    			echo '
    			
    			<ul class="nav navbar-nav navbar-left">
			<!-- Change here before submitting to the server--><li><a href="confirmevents.php"><span class="glyphicon glyphicon-user"></span> Confirm Events</a>
			</li><!-- Change here before submitting to the server--><li><a href="confirmreviews.php"><span class="glyphicon glyphicon-user"></span> Confirm Reviews</a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
     		 
      		 <!-- Change here before submitting to the server--><li><a href="leave.php"><span class="glyphicon glyphicon-log-in"></span> Leave</a></li>

      		 
    		';
    		}
    		?>
		</div>
		
		</div>
</nav>
<div class="container">

<div class="col-sm-12 text-center">
	<h1 style="font-size:3em;font-weight:800;color:hotpink;">Admin login here</h1>
	<br>
	<br>
	<div class="col-sm-offset-3 col-sm-6">
	<?php 
	if(!$id){
	echo '
	<form role="form" action="index.php" method="POST">
		<div class="form-group" >
			<label for="username">Username:</label>
			<input type="text" class="form-control" id="username" name="username" required>
		</div>
		<div class="form-group" >
			<label for="pass">Password:</label>
			<input type="password" class="form-control" id="pass" name="password" required>
		</div>

		<input type="submit" class="btn btn-default" name="login" value="Login">
  	</form>

  	<br><br><br>
  	<div class="text-center" style="font-size:3em;font-weight:800;color:hotpink;">OR GO TO</div> 
  	<br><br><br>
  	<a href="../index.php" class="btn btn-success" role="button" style="padding: 6px 12px;color:#fff;">Events</a>
  	';}
  	else{

  		header('location: main.php');
  		}?>
  	</div>
</div>

</div>


<?php include('./inc/footer.inc.php'); ?>