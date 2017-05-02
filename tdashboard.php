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
<title>Dashboard</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<style>
	#content{
		margin-top:12%;
		text-align:center;
		width:100%;
	}
	#content a{
		text-align:center;
		text-decoration:none;
		display:inline-block;
		border-radius:5px;
		padding:15px;
		padding-top:20px;
		margin:20px;
		width:15%;
		height:200px;
		color:#FFF;
	}
	#content a:hover{
		border-bottom:solid 2px #000;
	}
	#content p{
		margin-top:30px;
		letter-spacing:1px;
		font-weight:bold;
		font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	}
	#content div{
		margin-top:20px;
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
        	Welcome, <?php echo $_SESSION["name"]; ?>
        </div>
        <div id="logo">
        	<a href="tdashboard.php"><img src="nucleus.png" height="25" width="auto"  /></a>
        </div>
    </div>
    
	<div id="content">
		<a href="tprofile.php" style="background-color:rgba(44, 62, 80,1.0);">
        	<div>
            	<img src="images/profile.png" width="100px" height="auto" />
                <p>Profile</p>
            </div>
        </a>
    	<a href="eattendance.php" style="background-color:rgba(153,0,102,1);">
        	<div>
            	<img src="images/attend.png" width="100px" height="auto" />
            	<p>Enter Attendance</p>
            </div>
        </a>
    	<a href="emarks.php" style="background-color:rgba(153,51,0,1);">
        	<div>
            	<img src="images/marks.png" width="100px" height="auto" />
            	<p>Marks</p>
            </div>
        </a>
    	<a href="addnotify.php" style="background-color:rgba(102,0,102,1);">
        	<div>
            	<img src="images/notify.png" width="100px" height="auto" />
            	<p>Add Notification</p>
            </div>
        </a>
    </div>

	<div id="footer">
    	Copyright © 2014 nucleus
    </div>
</body>
</html>