<?php

	session_start();
	if(!isset($_SESSION['username']) || $_SESSION['type'] != "student")
	{
		header('Location: /index.php');
		exit;
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Marks</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<style>
#content{
	text-align:center;
	margin-top:10%;
}
table{
	color:#FFF;
	border:1px solid;
	border-color:#FFF;
	display:inline-block;
	border-collapse:collapse;
	background-color:rgba(60, 70, 70 , 1.0);
}
td,th{
	padding:10px;
	width:30px;
	text-align:center;
	border:1px solid;
	border-color:#FFF;
	border-radius:5px;
	white-space:nowrap;
}
</style>
</head>

<body>

	<div id="header">
    	<div id="links">
        	<a href="logout.php">Logout</a>
            <a href="about.html">About</a>
        </div>
        <div id="welcome">
        	Marks
        </div>
        <div id="logo">
        	<a href="sdashboard.php"><img src="nucleus.png" height="25" width="auto"  /></a>
        </div>
    </div>
    
    <div id="content">
    	<table id="marks">
        	<tr>
            	<th>Subject</th>
                <th>Semester</th>
                <th>Marks</th>
            </tr>
            <?php
				$user = $_SESSION['username'];
				require_once('/connect.php');
				$result = mysql_query("select * from marks where user='{$user}'");
				while($row = mysql_fetch_array($result))
				{
					echo "<tr><td>{$row[2]}</td><td>{$row[1]}</td><td>{$row[3]}</td></tr>";
				}
			?>
        </table>
    </div>
    </div>
    
    <div id="footer">
    	Copyright © 2014 nucleus
    </div>

</body>
</html>