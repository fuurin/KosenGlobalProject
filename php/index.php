<?php
        require_once "connect_db.php";

        // データ受け取り
        $name		=	(string)filter_input(INPUT_POST, 'name');
	 	$password 	=	(string)filter_input(INPUT_POST, 'password');

        // SQL実行
        try {
            // IDが存在するか確認
   			$stmt = $pdo->prepare("SELECT id from ${TABLE_USERS} 
                                    where name = :name and password = :password");
			$stmt->bindValue(':name', $name);
            $stmt->bindValue(':password', $password);
			$stmt->execute();

            //データベース接続終了
            $pdo = null;

            if(!($data = $stmt->fetch(PDO::FETCH_ASSOC))) {
                header("location: ../index.html");
                exit;
            }
        }
        catch(PDOException $e) { exit($e->getMessage()); }

        // データはJSON文字列で返す
        echo json_encode($data);
?>