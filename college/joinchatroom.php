<?php include('./inc/header.inc.php'); ?>


<title>Prattle | Login </title>
<link href="https://fonts.googleapis.com/css?family=Katibeh" rel="stylesheet">
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
<div class="col-sm-12">
<div class="text-center">
<div class='col-sm-offset-4 col-sm-4'>
    <img src='./img/prattlechatroom.png' alt='prattlechatroom' class='img-responsive' >
    </div>
</div>
</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>

<div class="col-sm-6" style="padding-top:0px;border-right-style: solid;">
<form role="form" class="form-horizontal" action="joinchatscript.php" method="POST">
<div class='col-sm-12' style='padding-top:0px;padding-right:0px;color:#ef3b56;font-weight:300;font-size:2em;font-family: "Katibeh", cursive;'>
    
    Normal login? Join here...
    </div>
    <div>&nbsp;</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="cr_name">Chatroom Name:</label>
    <div class="col-sm-6">
    	<input type="text" class="form-control" id="cr_name" name="d_name">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="username">Username:</label>
    <div class="col-sm-6">
    	<input type="text" class="form-control" id="username" name="cr_username">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="password">Password:</label>
    <div class="col-sm-6">
    	<input type="password" class="form-control" id="password" name="cr_password">
    </div>
</div>

<div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" class="btn btn-default" value="Join" name="join"></input>
    </div>
</div>
	

</form>
</div>

<div class="col-sm-6" style="padding-top:0px;">
<div class='col-sm-12' style='padding-top:0px;padding-right:0px;color:#ef3b56;font-weight:300;font-size:2em;font-family: "Katibeh", cursive;'>
    
    Invited by email? Login here...
    </div>
    <div>&nbsp;</div>

<form role="form" class="form-horizontal" action="joinemailscript.php" method="POST">

<div class="form-group">
    <label class="control-label col-sm-2" for="cr_name">Chatroom Name:</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="cr_name" name="d_name">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for="username">Invited By:</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="username" name="cr_username">
    </div>
</div>


<div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" class="btn btn-default" value="Login" name="login"></input>
    </div>
</div>
  

</form>
</div>



<?php include('./inc/footer.inc.php');?>