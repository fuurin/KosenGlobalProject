<?php
	// このファイルをrequireしたものは必ずDBを閉じること。
	require_once "db_config.php";
	
	try {
        $pdo = new PDO('mysql:dbname='.$db_name.';host='.$db_host,$db_hostname,$db_password,
                       array(  PDO::MYSQL_ATTR_INIT_COMMAND => "SET SESSION sql_mode='TRADITIONAL'",
                       		   PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $pdo->query('SET NAMES utf8');
    }
    catch(PDOException $e) { exit($e->getMessage()); }

    // どうせ大体ID使うから、セッション上げておく。
    session_start();
?>