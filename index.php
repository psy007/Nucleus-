<?php

	if(isset($_SESSION['username']))
	{
		if($_SESSION['type'] == "student")
			header('Location: /sdashboard.php');
		else
			header('Location: /tdashboard.php');
		exit;
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<style>
	body{
		background-image:url(background.jpg);
		background-repeat:no-repeat;
		-webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
		margin:0px;
		padding:0px;
	}
	#header{
		background-color:rgba(51,51,51,0.6);
		padding:10px;
		margin:0px;
		padding-right:20px;
		text-align:right;
	}
	#content{
		margin-top:180px;
		text-align:center;
	}
	#loginForm{
		background-color:rgba(51,51,51,0.6);
		display:inline-block;
		border-radius:5px;
		text-align:center;
		font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
		letter-spacing:2px;
		color:#FFF;
		padding:25px;
	}
	#loginForm p{
		margin:20px;
		margin-top:30px;
	}
	#submit{
		font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
		background-color:rgba(153,153,153,0.5);
		border:none;
		color:#FFF;
		width:70px;
		height:30px;
		cursor:pointer;
	}
</style>
</head>

<body>
	
    <div id="header">
    	<img src="nucleus.png" height="25" width="auto"  />
    </div>

	<div id="content">
        <div id="loginBox">
            <form id="loginForm" method="post" action="validate.php">
                <p>Username : <input type="text" name="username" /></p>
                <p>Password : <input type="password" name="pass" /></p>
                <p><input id="submit" type="submit" value="Login" /></p>
            </form>
        </div>
    </div>

</body>
</html>
