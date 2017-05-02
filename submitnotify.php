<?php

	session_start();
	require_once('/connect.php');
	$date = date("Y-m-d h:i:s A");
	$message = $_POST['message'];
	$name = "Rohit Agarwal"; //$_SESSION['name'];
	
	$result = mysql_query("insert into notify values('{$name}','{$message}','{$date}')");
	
	header('Location: /tdashboard.php');

?>