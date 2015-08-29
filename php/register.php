<?php
	require_once 'macro.php';

	//　データ受け取り
	$user		=	(string)filter_input(INPUT_POST, 'user_name');
	$password 	=	(string)filter_input(INPUT_POST, 'password');
	$institute	=	(string)filter_input(INPUT_POST, 'institute');

	// DB接続
	try　{
        $pdo = new PDO('mysql:dbname='.$db_name.';host='.$db_host,$db_hostname,$db_password,
                array(  PDO::MYSQL_ATTR_INIT_COMMAND => "SET SESSION sql_mode='TRADITIONAL'",
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $pdo->query('SET NAMES utf8');
    }
    catch(PDOException $e)　{　exit($e->getMessage());　}


	// データ登録
	try {
		$stmt = $pdo->prepare("INSERT INTO ${TABLE_USERS}(name, password, institute) 
								VALUES (:name, :password, :institute)");
		$stmt->bindValue(':name', $user);
		$stmt->bindValue(':password', $password);
		$stmt->bindValue(':institute', $institute);
		$stmt->execute();

		//データベース接続終了
		$pdo = null;
	}
	catch(PDOException $e) { exit($e->getMessage()); }

	// ID検索
	// try　{
	// 	$stmt = $pdo->prepare("SELECT id FROM ${TABLE_USERS}
	// 							WHERE name = :name and password = :password");
	// 	$stmt->bindValue(':name', $user_name);
	// 	$stmt->bindValue(':password', $pass);
	// 	$stmt->execute();

	// 	$data = $stmt->fetch(PDO::FETCH_ASSOC)
	// 	$kgp_id = $data['id'];
	// }
	// catch(PDOException $e){ exit($e->getMessage()); }

	echo json_encode($name);
?>