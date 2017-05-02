<?php

	session_start();
	$date = $_POST['date'];
	require_once('/connect.php');
	$user = $_SESSION['username'];
	$result = mysql_query("select * from attendance where date='{$date}' and user='{$user}' order by slot");
	$i=1;
	while($row = mysql_fetch_array($result))
	{
		while($row[1] != $i && $i < 10)
		{
			echo "<td>Absent</td>";
			$i = $i + 1;
		}
		
		echo "<td>Present</td>";
		$i = $i + 1;
	}
	for(;$i<10;$i++)
		echo "<td>Absent</td>";

?>