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
<div class="col-sm-12">
<div class="text-center">
<div class='col-sm-offset-4 col-sm-4'>
    <img src='./img/addchatroomlogo.png' alt='addchatroom' class='img-responsive' >
    </div>
</div>
</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>


<div class="col-sm-offset-3 col-sm-8">
<form role="form" class="form-horizontal" action="addscript.php" method="POST">
<div class="form-group">
    <label class="control-label col-sm-2" for="email">Chatroom Name:</label>
    <div class="col-sm-5">
    	<input type="text" class="form-control" id="name" name="c_name">
    </div>
    <div class="col-sm-4" style="padding-top:7px;color:#494CA8;">

    	Chatroom Name must be unique.
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="email">Username:</label>
    <div class="col-sm-5">
    	<input type="text" class="form-control" id="username" name="c_username">

    </div>
    <div class="col-sm-4" style="padding-top:7px;color:#494CA8;">

    	Username will be used for login. 	
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for="password">Password:</label>
    <div class="col-sm-5">
    	<input type="password" class="form-control" id="password" name="c_password">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="description">Description:</label>
    <div class="col-sm-5">
    	<textarea rows="7" class="form-control" id="description" name="c_description" placeholder="Describe purpose of this chatroom..."></textarea>
    </div>
</div>
<div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-1">
      <input type="submit" class="btn btn-default" value="Create Chatroom" name="create"></input>
    </div>
</div>
	

</form>
</div>





<?php include('./inc/footer.inc.php');?>