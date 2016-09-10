<?php

	require_once('sql.php');
	$conn = new mysqli($DBservername, $DBusername, $DBpass, $DBname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	$sql = "Update details set Qz1MaxScore = 0, Qz1MaxTime = 0 where pecfestId = 'ROB1995'";
	$conn->query($sql);

?>