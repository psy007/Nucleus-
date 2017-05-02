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
<title>Notify</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<style>
	#content{
		margin-top:5%;
		text-align:center;
		letter-spacing:1px;
		font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	}
	#notify{
		width:90%;
		height:500px;
		overflow:auto;
		text-align:left;
		display:inline-block;
	}
	#block{
		margin:5px;
		padding:1px;
		padding-left:10px;
		padding-right:10px;
		border-radius:6px;
		background-color:rgba(51,51,51,1);
	}
	#notify p{
		color:#FFF;
		display:block;
		background-color:rgba(51,51,51,0.8);
	}
	#name{
		font-size:14px;
		float:left;
	}
	#date{
		font-size:12px;
		float:right;
	}
	#message{
		clear:both;
		font-size:12px;
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
        	Notifications
        </div>
        <div id="logo">
        	<a href="sdashboard.php"><img src="nucleus.png" height="25" width="auto"  /></a>
        </div>
    </div>
    
    <div id="content">
    	<div id="notify">
			<?php
            
                require_once('/connect.php');
                $result = mysql_query("select * from notify order by date desc");
                while($row = mysql_fetch_array($result))
                {
                    echo "<div id='block'>";
                    echo "<p id='name'>{$row[0]}</p>";
                    echo "<p id='date'>{$row[2]}</p>";
                    echo "<p id='message'>{$row[1]}</p>";
                    echo "</div>";
                }
            
            ?>
		</div>
	</div>

	<div id="footer">
    	Copyright © 2014 nucleus
    </div>
    
</body>
</html>