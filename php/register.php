<?php 
	require_once "macro.php";

	$name=$_POST['name'];
	$password=$_POST['password'];
	$instutute=$_POST['insitute'];

	try
	{
		$pdo = new PDO('mysql:dbname='.$dbname.';host='.$host,$hostname,$password,
						array(	PDO::MYSQL_ATTR_INIT_COMMAND => "SET SESSION sql_mode='TRADITIONAL'",
								PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$pdo->query('SET NAMES utf8');
	}
	catch(PDOException $e)
	{
		exit($e->getMessage());
	}

	try
	{
		$stmt = $pdo->prepare("INSERT INTO ${TABLE_USERS}(name, pass, institute) 
								VALUES (:name, :password, :institute)");
		$stmt->bindValue(':name', $name);
		$stmt->bindValue(':password', $pass);
		$stmt->bindValue(':institute', $institute);
		$stmt->execute();

		//データベース接続終了
		$pdo = null;
	}
	catch(PDOException $e)
	{
		exit($e->getMessage());
	}

	echo json_encode($name);
?>