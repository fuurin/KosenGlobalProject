<?php
        include "ChromePhp.php";
        require_once "connect_db.php";

        // データ受け取り
        $name		=	(string)filter_input(INPUT_POST, 'name');
	 	$password 	=	(string)filter_input(INPUT_POST, 'password');

        // SQL実行
        try {
            // IDが存在するか確認
   			$stmt = $pdo->prepare(" SELECT id FROM ${TABLE_USERS}
                                where name = :name and password = :password");
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':password', $password);
            $stmt->execute();

            $data = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e) { exit($e->getMessage()); }

        //データベース接続終了
        $pdo = null;

        ChromePhp::log('Hello console!日本語もOK');
        ChromePhp::log($data['id']);

        $_SESSION['id'] = $data['id'];

        // データはJSON文字列で返す
        echo json_encode($data);
?>