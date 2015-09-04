<?php
        include 'ChromePhp.php';
        require_once "connect_db.php";

        // データ受け取り
        $country	=	(string)filter_input(INPUT_POST, 'country');
	 	$university =	(string)filter_input(INPUT_POST, 'university');
	 	$article	=	(string)filter_input(INPUT_POST, 'article');
        $id         =   $_SESSION['id'];

        // SQL実行
        try {
        	// 新規記事登録
            $stmt = $pdo->prepare("INSERT INTO ${TABLE_ARTICLE}(id, country, university, article)
                                   VALUES (:id, :country, :university, :article)");
            $stmt->bindValue(':id', $id);
            $stmt->bindValue(':country', $country);
            $stmt->bindValue(':university', $university);
            $stmt->bindValue(':article', $article);
            $stmt->execute();
        }
        catch(PDOException $e) { exit($e->getMessage()); }

        //データベース接続終了
        $pdo = null;
?>