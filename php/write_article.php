<?php
        require_once "connect_db.php";

        // データ受け取り
        $name		=	(string)filter_input(INPUT_POST, 'name');
	 	$password 	=	(string)filter_input(INPUT_POST, 'password');
	 	$institute	=	(string)filter_input(INPUT_POST, 'institute');

        // SQL実行
        try {
        	// 新規ユーザ登録
            $stmt = $pdo->prepare("INSERT INTO ${TABLE_USERS}(name, password, institute)
                                   VALUES (:name, :password, :institute)");
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':password', $password);
            $stmt->bindValue(':institute', $institute);
            $stmt->execute();

            // IDを自動取得
   			$stmt = $pdo->prepare("SELECT id from ${TABLE_USERS} where name = :name ");
			$stmt->bindValue(':name', $name);
			$stmt->execute();
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e) { exit($e->getMessage()); }

        //データベース接続終了
        $pdo = null;

        // データはJSON文字列で返す
        echo json_encode($data);
?>