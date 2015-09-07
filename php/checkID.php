<?php
	include "ChromePhp.php";
	session_start();
	$data["exist"] = isset($_SESSION["id"]);
	ChromePhp::log($data["exist"]);
	echo $data;
?>