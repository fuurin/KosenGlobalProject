<?php
        require_once "connect_db.php";

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

   			$stmt = $pdo->prepare("SELECT 'id' from ${TABLE_USERS} where 'name' = :name");
			$stmt->bindValue(':name', $name);
			$stmt->execute();

			if($data = $stmt->fetch(PDO::FETCH_ASSOC)){
				$kgp_id = $data['id'];
			}
			else {
				$kgp_id = "failed to get ID";
			}

        }
        catch(PDOException $e) { exit($e->getMessage()); }

        //データベース接続終了
        $pdo = null;

        echo json_encode($kgp_id);
?>