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
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script>
				function showlist(){
					
					var xmlhttp;
					var branch = document.form1.branch.value;
					var year = document.form1.year.value;
					var slot = document.form1.slot.value;
					var section = document.form1.section.value;
					var list = document.getElementById("list");
					list.innerHTML="<input type='hidden' name='timeslot' value='"+slot+"' /><tr><th>Name</th><th>Present</th></tr>";
					var data="year="+year+"&branch="+branch+"&section="+section;
					
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
								var div = document.getElementById("list");
								div.innerHTML=div.innerHTML+response;
							}
						}
	  
					xmlhttp.open("POST","fetchlist.php",true);
					xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
					xmlhttp.send(data);
				}
</script>

<style>
#formDiv{
	margin-top:3%;
	text-align:center;
	color:#FFF;
	padding:0px;
}
#formDiv form{
	padding-left:10px;
	padding-right:10px;
	border-radius:5px;
	display:inline-block;
	background-color:rgba(44, 62, 80,1.0);
}
#formDiv form p{
	padding:10px;
	margin:0px;
	display:inline-block;
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
#listForm{
	text-align:center;
}
#listForm table{
	margin:50px;
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
        	Enter Attendance
        </div>
        <div id="logo">
        	<a href="tdashboard.php"><img src="nucleus.png" height="25" width="auto"  /></a>
        </div>
    </div>

    <div id="formDiv">
        <form name="form1">
            <p>Branch :
                <select name="branch">
                        <option value="CS" selected="selected">CS</option>
                        <option value="IT">IT</option>
                        <option value="EE">EE</option>
                        <option value="EEE">EEE</option>
                        <option value="EC">EC</option>
                        <option value="ME">ME</option>
                        <option value="EI">EI</option>
                        <option value="MCA">MCA</option>
                        <option value="MBA">MBA</option>
                </select>
            </p>
            <p>Time Slot :
                <select name="slot">
                        <option value="1" selected="selected">9:30</option>
                        <option value="2">10:20</option>
                        <option value="3">11:10</option>
                        <option value="4">12:00</option>
                        <option value="5">12:50</option>
                        <option value="6">01:40</option>
                        <option value="7">02:30</option>
                        <option value="8">03:20</option>
                        <option value="9">04:10</option>
                </select>
            </p>
            <p>Year :
                <select name="year">
                        <option value="1st" selected="selected">1st</option>
                        <option value="2nd">2nd</option>
                        <option value="3rd">3rd</option>
                        <option value="4th">4th</option>
                </select>
            </p>
            <p>Section :
                <select name="section">
                        <option value="A" selected="selected">A</option>
                        <option value="B">B</option>
                </select>
            </p>
            <p><input id="submit" type="button" value="Show List" onclick="showlist()" /></p>
        </form>
    </div>
    
    <div id="listDiv">
        <form id="listForm" method="post" action="submitattend.php">
        	<table id="list">
            	
            </table>
        </form>
    </div>
    
    <div id="footer">
    	Copyright © 2014 nucleus
    </div>

</body>
</html>