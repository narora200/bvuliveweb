<?php 
session_start();
include("./inc/connect.inc.php");
if(!isset($_SESSION['p_id'])){
	$p_id = '';
}
else{

	$p_id = $_SESSION['p_id'];
	
}
	
?>



<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->

<head>

	 <meta charset="utf-8" />
	 <meta name="viewport" content="width=device-width, initial-scale=1" />
	 
	 
	 <!-- Favicon image -->
	 <link rel="icon" href="img/favicon.png" type="image/x-icon" />
	 
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
	 </script>
	 <link href='https://fonts.googleapis.com/css?family=Alegreya+Sans' rel='stylesheet' type='text/css'>
	 <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	 <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
	 <link href='https://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>
	 <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

	 	 
	 <style>
	 	ul.nav.navbar-nav.navbar-left li a{
	 		color:#d1d6d6;
	 	}
	 	ul.nav.navbar-nav.navbar-left li a:hover{
	 		color:#f2d535;
	 	}
	 	ul.nav.navbar-nav.navbar-right li a{
	 		color:#d1d6d6;
	 	}
	 	ul.nav.navbar-nav.navbar-right li a:hover{
	 		color:#f2d535;
	 	}
	 	
	 	
	 	
	 	
	 	.navbar-default .navbar-toggle:focus, .navbar-default .navbar-toggle:hover{
	 		background-color: #494ca8;
	 	}
	 	
	 	
	 		 </style>
	 	
	 	 <!-- SELECTIZE files-->
	 	 <script src="js/standalone/selectize.min.js"></script>
	 	 <link rel="stylesheet" type="text/css" href="css/selectize.css">
		
		 <!-- OWL Carousel files -->
		 <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
		 <link rel="stylesheet" type="text/css" href="css/owl.theme.css">
		 <link rel="stylesheet" type="text/css" href="css/owl.transitions.css">
		 <link rel="stylesheet" type="text/css" href="css/style.css">
		
		 <!-- Custom JS File -->
		 <script src="js/main.js"></script> 

		 <!-- DateRangePicker CSS File-->
		 <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

		 <!-- jQuery Bootstrap Star Rating plugin's CSS -->
		 <link href="css/star-rating.css" media="all" rel="stylesheet" type="text/css" />

