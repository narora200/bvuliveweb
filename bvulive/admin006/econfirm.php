<?php include('./inc/header.inc.php'); ?>

<?php
if($id){
if(isset($_GET['u'])){
	$id = mysql_real_escape_string($_GET['u']);
		if(ctype_alnum($id)){


			$sql = mysql_query("UPDATE events SET e_posted = '1' WHERE p_id='$id'");
			if($sql){
				//echo "<br>Successfully Updated in the database";
			$query = mysql_query("SELECT p_id,e_name,e_link,e_poster,e_datetime,e_description FROM events WHERE p_id='$id'");

			$row = mysql_fetch_assoc($query);
			$event['p_id'] = $row['p_id'];
			$event['e_name'] = $row['e_name'];
			$event['e_link'] = $row['e_link'];
			$event['e_poster'] = $row['e_poster'];
			$event['e_datetime'] = $row['e_datetime'];
			$event['e_description'] = $row['e_description'];


				include('sendupdate.php');				
				echo '<script> location.replace("confirmevents.php"); </script>';
			}else{
				echo "<div class='alert alert-danger>'".mysql_error()."</div>";
			}

		}
	}	
}

?>

<?php include('./inc/footer.inc.php'); ?>