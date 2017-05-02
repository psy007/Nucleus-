<?php

	session_start();
	if(isset($_POST['username']))
	{
		require_once('/connect.php');
		$user = $_POST['username'];
		$pass = $_POST['pass'];
		$result = mysql_query("select * from users where user='{$user}' and pass='{$pass}'");
		if($row = mysql_fetch_array($result))
		{
			$_SESSION['type'] = $row[2];
			$_SESSION['username'] = $row[0];
			
			if($_SESSION['type'] == "student")
				$result = mysql_query("select name from sdetails where user='{$user}'");
			else
				$result = mysql_query("select name from tdetails where user='{$user}'");
				
			$row = mysql_fetch_array($result);
			$_SESSION['name'] = $row[0];
			
			if($_SESSION['type'] == "student")
				header('Location: /sdashboard.php');
			else if($_SESSION['type'] == "teacher")
				header('Location: /tdashboard.php');
		}
		else
			header('Location: /index.html');
	}
	else
		header('Location: /index.html');

?>
