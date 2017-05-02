<?php

	session_start();
	$branch = $_POST['branch'];
	$sem = $_POST['sem'];
	require_once('/connect.php');
	$result = mysql_query("select * from subjects where branch='{$branch}' and sem='{$sem}'");
	
	while($row = mysql_fetch_array($result))
	{
		echo "<option value='{$row[2]}'>{$row[2]}</option>";
	}

?>