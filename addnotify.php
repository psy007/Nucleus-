<?php

	session_start();
	if(!isset($_SESSION['username']) || $_SESSION['type'] != "teacher")
	{
		header('Location: /index.php');
		exit;
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Notify</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<style>
	#form{
	margin-top:5%;
	text-align:center;
	color:#FFF;
	padding:0px;
	}
	#form form{
	padding-left:10px;
	padding-right:10px;
	border-radius:5px;
	display:inline-block;
	background-color:rgba(44, 62, 80,1.0);
	}
	#submit{
		font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
		background-color:rgba(153,153,153,0.5);
		border:none;
		color:#FFF;
		width:100px;
		height:30px;
		cursor:pointer;
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
        	Add Notifications
        </div>
        <div id="logo">
        	<a href="tdashboard.php"><img src="nucleus.png" height="25" width="auto"  /></a>
        </div>
    </div>
    
	<div id="form">
        <form name="form1" method="post" action="submitnotify.php">
            <p><textarea name="message" rows="15" cols="100"></textarea></p>
            <p><input id="submit" type="submit" value="Notify" /></p>
        </form>
    </div>
    
    <div id="footer">
    	Copyright © 2014 nucleus
    </div>

</body>
</html>