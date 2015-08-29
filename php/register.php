<?php
	require_once 'connect_db.php';

	//　データ受け取り
	$user_name=$_POST['name'];
	$pass=$_POST['password'];
	$institute=$_POST['institute'];

	// データ登録
	try　{
		$stmt = $pdo->prepare("INSERT INTO ${TABLE_USERS}(name, password, institute) 
								VALUES (:name, :password, :institute)");
		$stmt->bindValue(':name', $user_name);
		$stmt->bindValue(':password', $pass);
		$stmt->bindValue(':institute', $institute);
		$stmt->execute();
	}
	catch(PDOException $e){ exit($e->getMessage()); }

	// ID検索
	try　{
		$stmt = $pdo->prepare("SELECT id FROM ${TABLE_USERS}
								WHERE name = :name and password = :password");
		$stmt->bindValue(':name', $user_name);
		$stmt->bindValue(':password', $pass);
		$stmt->execute();

		$data = $stmt->fetch(PDO::FETCH_ASSOC)
		$kgp_id = $data['id'];
	}
	catch(PDOException $e){ exit($e->getMessage()); }

	//データベース接続終了
	$pdo = null;

	echo json_encode($kgp_id);
?>