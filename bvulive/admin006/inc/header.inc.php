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
	 <style>
	 	
	 </style>
	 	
	 	 <!-- SELECTIZE files-->
	 	 <script src="js/standalone/selectize.min.js"></script>
	 	 <link rel="stylesheet" type="text/css" href="css/selectize.css">
		
		 <!-- OWL Carousel files -->
		 <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
		 <link rel="stylesheet" type="text/css" href="css/owl.theme.css">
		 <link rel="stylesheet" type="text/css" href="css/owl.transitions.css">
		 
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

<body>

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


			echo '
			
			<ul class="nav navbar-nav navbar-right" style="padding-top:30px;font-weight:700;">
     		 <!-- Change here before submitting to the server--><li><a href="register.php"><span class="glyphicon glyphicon-sunglasses"></span> Register</a></li>
      		 
      		 

      		 
    		 </ul>';
    		}else{
    			echo '
    			
    			<ul class="nav navbar-nav navbar-left" style="padding-top:30px;font-weight:700;"> 
			<!-- Change here before submitting to the server--><li><a href="confirmevents.php"><span class="glyphicon glyphicon-send"></span> Confirm Events</a>
			</li><!-- Change here before submitting to the server--><li><a href="confirmreviews.php"><span class="glyphicon glyphicon-transfer"></span> Confirm Reviews</a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right" style="padding-top:30px;font-weight:700;">
     		
      		 <!-- Change here before submitting to the server--><li><a href="leave.php"><span class="glyphicon glyphicon-log-out"></span> Leave</a></li>
      		 
      		 </ul>
      		 ';
    		}
    		?>
		</div>
		
		</div>
</nav>

