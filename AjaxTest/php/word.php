<?php 
	require_once "macro.php";

	//データベース接続（すべてのPHPファイルでは必ずDB接続を最後に切断すること）
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

	$name = "sawaki";
	$pass = "7032";

	//ユーザ認証
	try
	{
		$stmt = $pdo->prepare(" SELECT id FROM ${TABLE_USERS}
								where name = :name and pass = :pass");
		$stmt->bindValue(':name', $name);
		$stmt->bindValue(':pass', $pass);
		$stmt->execute();

		//データベース接続終了
		$pdo = null;

		if ($data = $stmt->fetch(PDO::FETCH_ASSOC)) 
		{
			//ユーザIDをセッションにセットする
			$word = $data['id'];
		}
		else
		{
			$word = "ID couldn't be found.";
		}
	}
	catch(PDOException $e)
	{
		exit($e->getMessage());
	}

	echo json_encode($word);
?>