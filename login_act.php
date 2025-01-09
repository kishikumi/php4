<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// DB接続
require_once('funcs.php');
$pdo = db_conn();

// POST値を受け取る
$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null; // 平文のパスワードを受け取る

if (!$username || !$password) {
    die("ユーザーIDまたはパスワードが入力されていません。");
}


try {
    // SQL作成 (パスワードの比較はPHPで行うため、usernameのみ検索)
    $stmt = $pdo->prepare('SELECT * FROM php_user_table WHERE username = :username');
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    // ユーザーデータ取得
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // パスワードの照合
        if (password_verify($password, $user['password_hash'])) {
            // ログイン成功: セッションに値を格納
            $_SESSION['chk_ssid'] = session_id();
            $_SESSION['username'] = $user['username'];
            header('Location: today.php'); // 認証成功でtoday.phpに遷移
            exit();
        } else {
            // パスワードが一致しない
            echo "パスワードが間違っています。";
        }
    } else {
        // ユーザーが存在しない
        echo "ユーザーIDが見つかりません。";
    }
} catch (PDOException $e) {
    die("エラー: " . $e->getMessage());
}
