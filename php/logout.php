<?php
	include 'ChromePhp.php'; 
	session_start();
	unset($_SESSION['id']);
	ChromePhp::log($_SESSION['id']);
	setcookie('name', '', time() - 60);
	//header("location:index.html");
	//exit;
 ?>