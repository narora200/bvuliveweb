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

	<nav class="navbar navbar-default" style="padding:0px;margin:0px;">
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

if(!$u_id){
	 echo '<script> location.replace("login.php"); </script>';

        exit();
}else{

	$sql = mysql_query("SELECT * FROM chatusers WHERE u_id='$u_id'");
	while($row = mysql_fetch_array($sql)){ 
             $u_id = $row["u_id"];
             $u_key = $row["u_key"];
             $u_name = $row["u_name"];
             $u_pic = $row["u_pic"];
             $u_email = $row["u_email"];
             $u_password = $row["u_password"];
         }
    //echo "<h2>Welcome ".$u_name."</h2>";
    
    $location_preset = "./userdata/profile_pics/";
 



    echo "

    <div class='col-sm-2' style='border-right-style: solid;background-color:#ececec;border-color:lightgrey;border-width:0.3px;padding-bottom:20px;'>
    
    <div class='col-sm-12 text-center'>
    <img src=".$location_preset."/".$u_name."/".$u_pic." width='120' height='180' class='img-thumbnail text-center' style='margin: 5px;'></img>
    </div>
    <br />
    <br />
    <div>&nbsp</div>
    <div>&nbsp</div>
    <div style='color:#ea2e6a;font-weight:700;font-size:1.5em;text-align:center;'>".$u_name."</div>
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />

<div class='buttons'>
		<div class='col-sm-6'>
			<div id='add'>
				<div class='text-center'>
					<a href='addchatroom.php' class='btn btn-default' role='button'>Add Chatrooms</a>
				</div>
			</div>
		</div>
		<br />
		<br />
		<div class='col-sm-6'>
			<div id='join'>
				<div class='text-center'>
					<a href='joinchatroom.php' class='btn btn-default' role='button'>Join Chatrooms</a>
				</div>
			</div>
		</div>
</div>


    </div>
    <div class='col-sm-8'>
	<div class='first_div'>
	<div class='col-sm-12'>

	<div class='col-sm-4'>
	<i class='fa fa-hand-peace-o' aria-hidden='true' style='font-size:20em; padding-top: 20px;color:#ea7223;'></i>
	</div>
	<div class='col-sm-8' style='padding-top: 50px;'>
		<div class='col-sm-10'>
	    <a href='addchatroom.php'><img src='./img/addmorechatroom.png' alt='prattle' class='img-responsive' style='height:92.23px;'></a>
		</div>
		
		<br />
		<div class='col-sm-offset-1 col-sm-12' style='padding-top:80px;padding-right:0px;color:#ef3b56;font-weight:700;font-size:1.5em;'>
		Create your own chatrooms, invite your friends to join in. More chatrooms mean more fun!!!

		</div>
	</div>


	</div>
	</div>  
	<div class='second_div'>
	<div class='col-sm-12'>
	
	<div class='col-sm-8'  style='padding-top: 50px;'>
	<div class='col-sm-10'>
	    <a href='joinchatroom.php'><img src='./img/joinchatroom.png' alt='joinchatroom' class='img-responsive' ></a>
		</div>
		
		<br />
		<div class='col-sm-12' style='padding-top:80px;padding-right:0px;color:#ef3b56;font-weight:700;font-size:1.5em;'>
		Join Chatrooms of varied kinds. Join as many as you can!

		</div>
	</div>
	<div class='col-sm-4'>
	<i class='fa fa-hashtag' aria-hidden='true' style='font-size:20em; padding-top: 20px;color:#ea7223;' ></i>
	</div>


	</div>


	</div>




    </div>


    ";



}


?>





<?php include('./inc/footer.inc.php');?>