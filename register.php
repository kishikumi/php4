<?php
//１．関数群の読み込み
require_once('funcs.php');

//２．データ登録SQL作成
$pdo = db_conn();


// フォーム送信処理
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['username'] ?? null;
    $userPassword = $_POST['password'] ?? null;

    if (empty($userId) || empty($userPassword)) {
        echo "ユーザーIDまたはパスワードを入力してください。";
        exit;
    }

    // パスワードのハッシュ化
    $passwordHash = password_hash($userPassword, PASSWORD_BCRYPT);

    try {
        // データベースに挿入
        $stmt = $pdo->prepare("INSERT INTO php_user_table (username, password_hash) VALUES (:username, :password_hash)");
        $stmt->bindParam(':username', $userId, PDO::PARAM_STR);
        $stmt->bindParam(':password_hash', $passwordHash, PDO::PARAM_STR);
        $stmt->execute();

        echo "ユーザー登録が完了しました！";    
        
        // 2秒後にログイン画面にリダイレクト
        header("refresh:2;url=index.php");
        exit;

    } catch (PDOException $e) {
        if ($e->getCode() === '23000') {
            echo "このユーザーIDはすでに登録されています。";
        } else {
            echo "エラー: " . $e->getMessage();
        }
    }
}
?>
