<?php include('./inc/header.inc.php'); ?>

<?php
if($id){
	if(isset($_GET['u'])){
		$id = mysql_real_escape_string($_GET['u']);
		if(ctype_alnum($id)){
			$sql = mysql_query("UPDATE reviews SET r_posted = '1' WHERE r_id='$id'");
			if($sql){
				echo "<div class='alert alert-success'><h3>Successfully Updated in the database</h3></div>";
			}else{
				echo "<div class='alert alert-danger'><h3>Update Failed</h3></div>";
			}

		}
	}


}