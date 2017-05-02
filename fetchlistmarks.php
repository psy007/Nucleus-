<?php
	
	session_start();
	$branch = $_POST['branch'];
	$sem = $_POST['sem'];
	$section = $_POST['section'];
	require_once('/connect.php');
	$result = mysql_query("select * from sdetails where branch='{$branch}' and sem='{$sem}' and section='{$section}'");
	
	if(! $result )
	{
  		die('Could not get data: ' . mysql_error());
	}
	
	while($row = mysql_fetch_array($result))
	{
		echo "<tr><td id='{$row[0]}'>{$row[1]}</td><td><button id='submit' type='button' name='{$row[0]}' onclick='marks(this.name)'>Enter</button></td></tr>";
	}

?>