<?php
        require_once "connect_db.php";
        include "ChromePhp.php";

        // データ受け取り
        $id	= $_SESSION['id'];

        ChromePhp::log($id);

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

        ChromePhp::log($data['id']);

        // データはJSON文字列で返す
        echo json_encode($data);
?>