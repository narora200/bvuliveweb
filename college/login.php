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

<div class="col-sm-offset-4 col-sm-4">
    <img src="./img/prattlelogin.png" alt="prattle" class="img-responsive" >
</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div class="col-sm-12">
<form role="form" class="form-horizontal" action="checklogin.php" method="POST">
<div class="col-sm-offset-3 col-sm-8">
<div class="form-group">
    <label class="control-label col-sm-2" for="email">Email address:</label>
    <div class="col-sm-6">
    	<input type="email" class="form-control" id="email" name="u_email">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="password">Password:</label>
    <div class="col-sm-6">
    	<input type="password" class="form-control" id="password" name="u_password">
    </div>
</div>
<div>&nbsp;</div>
<div class="col-sm-offset-1 cols-m-10">
<div class="form-group"> 
    <div class="col-sm-offset-3 col-sm-6">
      <input type="submit" class="btn btn-default" value="Login" name="login"></input>
    </div>
</div>
</div>
</div>
</form>
</div>




<?php include('./inc/footer.inc.php');?>