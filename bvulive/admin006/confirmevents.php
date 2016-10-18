<?php include('./inc/header.inc.php'); ?>

<?php

	if(!$id){


		echo '<script> location.replace("index.php"); </script>';


}else{ 


$events = mysql_query("SELECT * FROM events WHERE e_posted='0'");
if(mysql_num_rows($events)>=1){	
	$i = 0;
	while($event = mysql_fetch_assoc($events)){
		$result[$i]['p_id'] = $event['p_id'];
		$result[$i]['e_id'] = $event['e_id'];
		$result[$i]['e_name'] = $event['e_name'];
		$result[$i]['e_key'] = $event['e_key'];
		$result[$i]['e_link'] = $event['e_link'];
		$result[$i]['e_fees'] = $event['e_fees'];
		$result[$i]['contact'] = $event['contact'];
		$result[$i]['email'] = $event['email'];
		$result[$i]['e_poster'] = $event['e_poster'];
		$result[$i]['e_postedby'] = $event['e_postedby'];
		$result[$i]['e_designation'] = $event['e_designation'];
		$result[$i]['d'] = $event['d'];
		$result[$i]['e_datetime'] = $event['e_datetime'];
		$result[$i]['e_description'] = $event['e_description'];
	
		$i++;

	}
}else{
 echo '<div class="alert alert-info"><h2>No new events to confirm</h2></div>';
}

?>
<div class="container" style="border-style: outset;border-color: #67ef94;">
<?php 
	$j = 0;
 for($j=0;$j<$i;$j++){
 	$path = "../userdata/profile_pics/".$result[$j]['e_name']."/".$result[$j]['e_poster'];
 echo '
<div class="col-sm-12" style="border-style: outset;border-color:#31eaea;">
<div class="col-sm-4" style="padding: 0px 0px;padding-right:1px;">
	<br>
	<br>

	<img src="'.$path.'" width="400" class="img-thumbnail img-responsive">
</div>

<div class="col-sm-8">
		<div class="col-sm-12 text-center">
			<div class="col-sm-12 text-left">
				<div>
				<div class="infotitle">Primary ID</div>
				<div class="infocontent">
					'.$result[$j]["p_id"].'
				</div>
				</div>

				
				<div>
					<div class="infotitle">Event Name</div>
					<div class="infocontent">
					'.$result[$j]["e_name"].'
					</div>
				</div>

				<div>
					<div class="infotitle">Event Link</div>
					<div class="infocontent">
					<a href="'.$result[$j]["e_link"].'" style="font-size:0.9em;">Event\'s fb Link</a>
					</div>
				</div>	
				<div>
					<div class="infotitle">Event Fees</div>
					<div class="infocontent">
					'.$result[$j]["e_fees"].'
					</div>
				</div>

				<div>
					<div class="infotitle">Contact Number</div>
					<div class="infocontent">
					'.$result[$j]["contact"].'
					</div>
				</div>
				<div>
					<div class="infotitle">Email Id</div>
					<div class="infocontent">
					'.$result[$j]["email"].'
					</div>
				</div>


				<div>
					<div class="infotitle">Posted By</div>
					<div class="infocontent">
					'.$result[$j]["e_postedby"].'
					</div>
				
				</div>


				<div>
					<div class="infotitle">Date and Time</div>
					<div class="infocontent">
					'.$result[$j]["e_datetime"].'
					</div>
				</div>


				<div>
					<div class="infotitle">Event Description</div>
					<div class="infocontent" style="padding-bottom:30px;">
					'.$result[$j]["e_description"].'
					</div>
				</div>

				</div>

			</div>
		</div>
</div>
<div class="col-sm-12" style="border-style: outset;margin-bottom:15px;border-color:#edc768;">
<div class="col-sm-12 text-center" style="padding-top:15px;">
<a href="confirme/'.$result[$j]["p_id"].'" class="agree">Confirm</a>

<a href="deletee/'.$result[$j]["p_id"].'" class="delete">Delete</a>

</div>
</div>


';
}

}
?>
</div>



<?php include('./inc/footer.inc.php'); ?>