<?php
	
	session_start();
	$branch = $_POST['branch'];
	$year = $_POST['year'];
	$section = $_POST['section'];
	require_once('/connect.php');
	$result = mysql_query("select * from sdetails where branch='{$branch}' and year='{$year}' and section='{$section}'");
	
	if(! $result )
	{
  		die('Could not get data: ' . mysql_error());
	}
	
	while($row = mysql_fetch_array($result))
	{
		echo "<tr><td>{$row[1]}</td><td><input type='checkbox' name='present[]' value='{$row[0]}' /></td></tr>";
	}
	echo "<input type='submit' id='submit' />";

?>