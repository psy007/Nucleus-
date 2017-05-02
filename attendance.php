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
<title>Attendance</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script>
				function showattend(){
					
					var xmlhttp;
					var date = document.form1.date.value;
					document.getElementById("pa").innerHTML="<th>Present/Absent</th>";
					var data="date="+date;
					
						if (window.XMLHttpRequest)
						{// code for IE7+, Firefox, Chrome, Opera, Safari
							xmlhttp=new XMLHttpRequest();
						}
						else
						{// code for IE6, IE5
							xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
						}
						
						xmlhttp.onreadystatechange=function()
						{
							if (xmlhttp.readyState==4 && xmlhttp.status==200)
							{
								var response = xmlhttp.responseText;
								var div = document.getElementById("pa");
								div.innerHTML=div.innerHTML+response;
							}
						}
	  
					xmlhttp.open("POST","showattend.php",true);
					xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
					xmlhttp.send(data);
				}
</script>
<style>
body{
	margin:0px;
	padding:0px;
	min-width:1024px;
	letter-spacing:1px;
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
}
#input{
	margin-top:3%;
	text-align:center;
	color:#FFF;
	padding:0px;
}
form{
	padding-left:10px;
	padding-right:10px;
	border-radius:5px;
	display:inline-block;
	background-color:rgba(44, 62, 80,1.0);
}
form p{
	padding:10px;
	margin:0px;
	display:inline-block;
}
#submit{
		font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
		background-color:rgba(153,153,153,0.5);
		border:none;
		color:#FFF;
		width:150px;
		height:30px;
		cursor:pointer;
}
#attendance{
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
	padding:5px;
	text-align:center;
	border:1px solid;
	border-color:#FFF;
	border-radius:5px;
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
        	Attendance
        </div>
        <div id="logo">
        	<a href="sdashboard.php"><img src="nucleus.png" height="25" width="auto"  /></a>
        </div>
    </div>

    <div id="input">
        <form name="form1">
            <p>Date: <input type="date" name="date" /></p>
            <p><input id="submit" type="button" value="Show Attendance" onclick="showattend()"/></p>
        </form>
    </div>
    
    <div id="attendance">
        <table>
            <tr>
                <th>Time Slot</th>
                <td>09:30 - 10:20</td>
                <td>10:20 - 11:10</td>
                <td>11:10 - 12:00</td>
                <td>12:00 - 12:50</td>
                <td>12:50 - 01:40</td>
                <td>01:40 - 02:30</td>
                <td>02:30 - 03:20</td>
                <td>03:20 - 04:10</td>
                <td>04:10 - 05:00</td>
            </tr>
            <tr id="pa">
            </tr>
        </table>
    </div>
    
    <div id="footer">
    	Copyright © 2014 nucleus
    </div>

</body>
</html>