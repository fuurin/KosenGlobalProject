<?php
	// このファイルをrequireしたものは必ずDBを閉じること。
	require_once "macro.php";
	
	try
    {
        $pdo = new PDO('mysql:dbname='.$db_name.';host='.$db_host,$db_hostname,$db_password,
                                        array(  PDO::MYSQL_ATTR_INIT_COMMAND => "SET SESSION sql_mode='TRADITIONAL'",
                                                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $pdo->query('SET NAMES utf8');
    }
    catch(PDOException $e)
    {
        exit($e->getMessage());
    }
?>