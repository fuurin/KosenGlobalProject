<?php 
	session_start();
	unset($_SESSION['id']);
	setcookie('name', '', time() - 60);
	header("location:index.html");
	exit;
 ?>