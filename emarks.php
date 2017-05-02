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
<title>Marks</title>
<link rel="stylesheet" type="text/css" href="style.css" />

<script>
				function showlist(){
					
					var xmlhttp;
					subjectlist();
					var branch = document.form1.branch.value;
					var sem = document.form1.sem.value;
					var section = document.form1.section.value;
					var list = document.getElementById("list");
					document.getElementById("inputMarks").style.display = "none";
					document.getElementById("listDiv").style.display = "";
					list.innerHTML="<tr><th>Name</th><th>Add Marks</th></tr>";
					var data="sem="+sem+"&branch="+branch+"&section="+section;
					
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
	  			
					xmlhttp.open("POST","fetchlistmarks.php",true);
					xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
					xmlhttp.send(data);
				}
				
				function subjectlist()
				{
					var xmlhttp;
					var branch = document.form1.branch.value;
					var sem = document.form1.sem.value;
					document.marksForm.sem.value = sem;
					document.getElementById("subjectlist").innerHTML = "";
					var data="sem="+sem+"&branch="+branch;
					
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
								var div = document.getElementById("subjectlist");
								div.innerHTML=div.innerHTML+response;
							}
						}
	  			
					xmlhttp.open("POST","fetchsubjects.php",true);
					xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
					xmlhttp.send(data);
				}
				
				function marks(id)
				{
					document.marksForm.user.value = id;
					var name = document.getElementById(id).innerHTML;
					document.getElementById("name").innerHTML = name;
					document.getElementById("listDiv").style.display = "none";
					document.getElementById("inputMarks").style.display = "";
				}
				
				function addmarks()
				{
					var xmlhttp;
					var user = document.marksForm.user.value;
					var sem = document.marksForm.sem.value;
					var subject = document.marksForm.subject.value;
					var marks = document.marksForm.mark.value;
					document.marksForm.mark.value = "";
					var data="user="+user+"&subject="+subject+"&marks="+marks+"&sem="+sem;
					
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
								var div = document.getElementById("status");
								div.innerHTML = response;
							}
						}
	  			
					xmlhttp.open("POST","addmark.php",true);
					xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
					xmlhttp.send(data);
				}
</script>

<style>
#selectForm{
	margin-top:3%;
	text-align:center;
	color:#FFF;
	padding:0px;
	}
#selectForm form{
	padding-left:10px;
	padding-right:10px;
	border-radius:5px;
	display:inline-block;
	background-color:rgba(44, 62, 80,1.0);
}
#selectForm form p{
	padding:10px;
	margin:0px;
	display:inline-block;
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
#submit{
		font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
		background-color:rgba(153,153,153,0.5);
		border:none;
		color:#FFF;
		width:100px;
		height:30px;
		cursor:pointer;
}
#listDiv{
	text-align:center;
}
#listDiv table{
	margin:50px;
}
#inputMarks{
	margin-top:3%;
	text-align:center;
	color:#FFF;
	padding:0px;
}
#inputMarks form{
	color:#FFF;
	text-align:center;
	display:inline-block;
	border-collapse:collapse;
	background-color:rgba(60, 70, 70 , 1.0);
}
#inputMarks form p{
	padding:10px;
	margin:0px;
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
        	Enter Marks
        </div>
        <div id="logo">
        	<a href="tdashboard.php"><img src="nucleus.png" height="25" width="auto"  /></a>
        </div>
    </div>
    
    <div id="selectForm">
    	<form name="form1" >
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
            <p>Semester :
                <select name="sem">
                        <option value="1st" selected="selected">1st</option>
                        <option value="2nd">2nd</option>
                        <option value="3rd">3rd</option>
                        <option value="4th">4th</option>
                        <option value="5th">5th</option>
                        <option value="6th">6th</option>
                        <option value="7th">7th</option>
                        <option value="8th">8th</option>
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
        <table id="list">
            	
        </table>
    </div>
    
    <div id="inputMarks" style="display:none;">
    	<form name="marksForm">
        	<input type="hidden" name="user" value="" />
            <input type="hidden" name="sem" value="" />
        	<p id="name"></p>
            <p>Subject: 
            	<select id="subjectlist" name="subject">
                </select>
            </p>
            <p>Marks: 
                <input name="mark" type="text" />
            </p>
            <p><input type="button" id="submit" value="Submit" onclick="addmarks()" /></p>
        </form>
        <p id="status" style="color:#000;"></p>
    </div>
    
    <div id="footer">
    	Copyright © 2014 nucleus
    </div>
    
</body>
</html>