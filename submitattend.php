<?php

	$present = $_POST['present'];
	$slot = $_POST['timeslot'];
	$n = count($present);
	$date = date("Y-m-d");
	require_once('/connect.php');
	for($i=0; $i < $n; $i++)
    {
		$user = $present[$i];
		$result = mysql_query("insert into attendance values('{$user}','{$slot}','{$date}')");
    }
	
	header('Location: /tdashboard.php');
	
?>