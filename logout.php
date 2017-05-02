<?php
	
	session_start();
	unset($_SESSION['username']);
	unset($_SESSION['type']);
	unset($_SESSION['name']);
	header('Location: /index.php');
	
?>