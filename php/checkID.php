<?php
	include "ChromePhp.php";
	session_start();
	$data["exist"] = isset($_SESSION["id"]);
	ChromePhp::log("working");
	ChromePhp::log($data["exist"]);
	ChromePhp::log($_SESSION["id"]);
	echo $data;
?>