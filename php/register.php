<?php
        require_once "connect_db.php";

        $name=$_POST['name'];
        $password=$_POST['password'];
        $institute=$_POST['institute'];

        try
        {
                $stmt = $pdo->prepare("INSERT INTO ${TABLE_USERS}(name, password, institute)
                                                                VALUES (:name, :password, :institute)");
                $stmt->bindValue(':name', $name);
                $stmt->bindValue(':password', $password);
                $stmt->bindValue(':institute', $institute);
                $stmt->execute();

                //データベース接続終了
                $pdo = null;
        }
        catch(PDOException $e)
        {
                exit($e->getMessage());
        }

        echo json_encode($name);
?>