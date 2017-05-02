<?php

	session_start();
	$user = $_POST['user'];
	$subject = $_POST['subject'];
	$marks = $_POST['marks'];
	$sem = $_POST['sem'];
	require_once('/connect.php');
	$result = mysql_query("insert into marks values('{$user}','{$sem}','{$subject}','{$marks}')");
	
	echo "Marks for $subject is submitted";

?>