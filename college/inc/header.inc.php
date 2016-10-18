<?php 
session_start();
include("./inc/connect.inc.php");
if(!isset($_SESSION['u_id'])){
	$u_id = '';
}
else{

	$u_id = $_SESSION['u_id'];
	
}
if(!isset($_SESSION['chat_id'])){
	$c_id = '';
}
else{

	$c_id = $_SESSION['chat_id'];
	
}
date_default_timezone_set("Asia/Kolkata");
?>


<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->

<head>

	 <meta charset="utf-8" />
	 <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
	 </script>
	 <link href='https://fonts.googleapis.com/css?family=Lora:400,700' rel='stylesheet' type='text/css'>
	 <style>
	 	
	 </style>
	 	
	 	 
		 
		 
		 <link rel="icon" href="../../img/favicon.png">
	 
	 
	 	 <style>
			 .btn.btn-default{

		  border-radius:  0px;
		  background-color: #494ca8;
		  color: #fff;
		  padding: 5px 40px 5px 40px;
			}

		.btn-default:hover{

		  color: #000000;
		  background-color: #FFBF00;
		  border-radius : 0px;
		}
	 </style>
	


	 	 <!-- SELECTIZE files-->
	 	 <script src="js/standalone/selectize.min.js"></script>
	 	 <link rel="stylesheet" type="text/css" href="css/selectize.css">

	 	 
		 <!-- Custom css -->
		 <link rel="stylesheet" type="text/css" href="css/style.css">
		
		 <!-- Custom JS File -->
		 <script src="js/main.js"></script> 

		 <!-- FontAwesome css-->
		 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
		 

		 

