<?php
        require_once "connect_db.php";

        // データ受け取り
        $id	= (string)filter_input(INPUT_POST, 'id');

        // SQL実行
        try {
            // IDから名前を取得
   			$stmt = $pdo->prepare("SELECT name from ${TABLE_USERS} where id = :id ");
			$stmt->bindValue(':id', $id);
			$stmt->execute();
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e) { exit($e->getMessage()); }

        //データベース接続終了
        $pdo = null;

        // データはJSON文字列で返す
        echo json_encode($data);
?>