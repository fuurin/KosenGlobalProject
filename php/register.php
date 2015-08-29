<?php
	require_once 'connect_db.php';

	//　データ受け取り
	$form_name=$_POST['name'];
	$form_password=$_POST['password'];
	$form_institute=$_POST['institute'];

	// データ登録
	try　{
		$stmt = $pdo->prepare("INSERT INTO ${TABLE_USERS}(name, password, institute) 
								VALUES (:name, :password, :institute)");
		$stmt->bindValue(':name', $form_name);
		$stmt->bindValue(':password', $form_password);
		$stmt->bindValue(':institute', $form_institute);
		$stmt->execute();
	}
	catch(PDOException $e){ exit($e->getMessage()); }

	// ID検索
	try　{
		$stmt = $pdo->prepare("SELECT id FROM ${TABLE_USERS}
								WHERE name = :name and password = :password");
		$stmt->bindValue(':name', $form_name);
		$stmt->bindValue(':password', $form_password);
		$stmt->execute();

		$data = $stmt->fetch(PDO::FETCH_ASSOC)
		$kgp_id = $data['id'];
	}
	catch(PDOException $e){ exit($e->getMessage()); }

	//データベース接続終了
	$pdo = null;

	echo json_encode($kgp_id);
?>