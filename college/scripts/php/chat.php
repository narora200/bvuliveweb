<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Oswald|Roboto" rel="stylesheet">
</head>

<?php
	session_start();
	if(!isset($_SESSION["chat_name"])){
	$chat_name = '';
	}
	else{

	$chat_name = $_SESSION["chat_name"];
	
	}

	date_default_timezone_set("Asia/Kolkata");
	mysql_connect("localhost" , "bvulimdk_niks" , "myniki123") or die("Couldn't connect to SQL");
	mysql_select_db("bvulimdk_chats") or die("Couldn't select DB");


	

function send_msg($sender, $message){

	if(!empty($sender) && !empty($message)){

			$esc_sender = mysql_real_escape_string($sender);
			$esc_message = mysql_real_escape_string($message);

			
			//inserting timestamp into the table
	  		$time = time();
			$timestamp = date('Y-m-d H:i:s', $time);

			
			$query = mysql_query("INSERT INTO ".$_SESSION["chat_name"]." VALUES ('', '$esc_sender', '$esc_message', '$timestamp')");
			if($query){

				//echo "Message inserted in the database successfully.";
				return true;
			}else{
				//echo "Message not inserted.";
				return false;
			}



		}else { echo 'Please insert values in the fields'; return false;}
 
}





function get_msg(){

	$query = mysql_query("SELECT * FROM ".$_SESSION["chat_name"]);

	$i = 0;

	while($chat = mysql_fetch_assoc($query)){

		$info[$i]['chat_id'] = $chat['chat_id'];
		$info[$i]['chat_name'] = $chat['chat_name'];
		$info[$i]['chat_message'] = $chat['chat_message'];
		$info[$i]['chat_time'] = $chat['chat_time'];

		$i++;

	}
	$rows = mysql_num_rows($query);

	for($i;$i--;$i>0){

		echo "<span style='font-family: Roboto, sans-serif;font-size:0.7em;color:#c52ef7'>Sender:</span> <span style='color:#d1cecc;font-family: Oswald, sans-serif;font-size:1.0em;'>".$info[$i]['chat_name']. "</span><br />";
		echo "<span style='font-family: Roboto, sans-serif;font-size:0.7em;color:#ed8544'>Prattle:</span> <span style='color:#896047;font-family: Oswald, sans-serif;font-size:1.0em;'>".nl2br($info[$i]['chat_message'])."</span>";
		echo "<div style='text-align:right;color:#b600ff;font-family: Oswald, sans-serif;font-size:0.8em;'>".$info[$i]['chat_time']."</div><hr />";


	}

	}

	get_msg();
?>

</html>
