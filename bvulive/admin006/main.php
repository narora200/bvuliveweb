<?php include('./inc/header.inc.php'); ?>

<?php 
	if(!$id){


		echo '<script> location.replace("index.php"); </script>';


}else{ 

echo '
<div class="container-fluid">

	
	
	<div class="col-sm-12 text-center">


	<h2 style="font-weight:900;font-size:2.8em;color:hotpink;">Hey Sexy Admin , How\'s Life?</h2>
	<h4 style="padding-top:50px;font-weight:700;font-size:2em;color:#494ca8;">So what are you here for today?</h4>
		<br>
		<br>

		<div>
		<span class="glyphicon glyphicon-play"></span>
		<a href="confirmevents.php" role="button" class="btn btn-info">Confirm Events</a>
		</div>
		<div>
		&nbsp;
		</div>
		<div>

		<span class="glyphicon glyphicon-play"></span>	
		<a href="confirmreviews.php" role="button" class="btn btn-danger">Confirm Reviews</a>
		</div>
		<div>
		&nbsp;
		</div>
		<div>

		<span class="glyphicon glyphicon-play"></span>	
		<a href="leave.php" role="button" class="btn btn-success">Leave</a>
		</div>
		<div>
		&nbsp;
		</div>
	

	</div>





</div>



';} ?>

<?php include('./inc/footer.inc.php'); ?>