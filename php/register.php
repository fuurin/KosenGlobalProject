<?php
        require_once "connect_db.php";

        // データ受け取り
        $name=$_POST['name'];
        $password=$_POST['password'];
        $institute=$_POST['institute'];

        // 登録
        try {
            $stmt = $pdo->prepare("INSERT INTO ${TABLE_USERS}(name, password, institute)
                                    VALUES (:name, :password, :institute)");
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':password', $password);
            $stmt->bindValue(':institute', $institute);
            $stmt->execute();
        }
        catch(PDOException $e) { exit($e->getMessage()); }

        // 登録後は自動的にログイン
        try {
            $stmt = $pdo->prepare("SELECT id from ${TABLE_USERS} 
                                   WHERE name = :name & password = :password");
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':password', $password);
            $stmt->execute();

            $data = $stmt->fetch(PDO::FETCH_ASSOC))
			$kgp_name = $data['id'];
        }
        catch(PDOException $e) { exit($e->getMessage()); }

        //データベース接続終了
        $pdo = null;

        echo json_encode($kgp_name);
?>