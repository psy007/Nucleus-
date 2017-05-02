<?php
	
	session_start();
	if(!isset($_SESSION['username']) || $_SESSION['type'] != "teacher")
	{
		header('Location: /index.php');
		exit;
	}
	require_once('/connect.php');
	$user = $_SESSION['username'];
	$result = mysql_query("select * from tdetails where user='{$user}'");
	$row = mysql_fetch_array($result);
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Profile</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<style>
#content{
	margin-top:8%;
	text-align:center;
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
        	Profile
        </div>
        <div id="logo">
        	<a href="tdashboard.php"><img src="nucleus.png" height="25" width="auto"  /></a>
        </div>
    </div>
    
    <div id="content">
    	<table>
        	<tr>
            	<td>Name</td>
                <td><?php echo $row[1]; ?></td>
            </tr>
            <tr>
            	<td>Username</td>
                <td><?php echo $row[0]; ?></td>
            </tr>
            <tr>
            	<td>Department</td>
                <td><?php echo $row[2]; ?></td>
            </tr>
            <tr>
            	<td>Mobile</td>
                <td><?php echo $row[3]; ?></td>
            </tr>
            <tr>
            	<td>Email</td>
                <td><?php echo $row[4]; ?></td>
            </tr>
        </table>
    </div>
    
    <div id="footer">
    	Copyright © 2014 nucleus
    </div>

</body>
</html>