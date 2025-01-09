<?php
//1. POSTデータ取得
$sleep = isset($_POST['sleep']) ? (int) $_POST['sleep'] : null;
$mood = isset($_POST['mood']) ? (int) $_POST['mood'] : null;
$text = isset($_POST['text']) ? trim($_POST['text']) : null;

// 入力値を簡易チェック（詳細なバリデーションは必要に応じて追加）
if ($sleep === null || $mood === null || empty($text)) {
    die('Invalid input data.');
}

//2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

try {
    //３．データ登録SQL作成
    $stmt = $pdo->prepare('INSERT INTO php4_table (sleep, mood, text, date) VALUES (:sleep, :mood, :text, SYSDATE())');
    $stmt->bindValue(':sleep', $sleep, PDO::PARAM_INT);
    $stmt->bindValue(':mood', $mood, PDO::PARAM_INT);
    $stmt->bindValue(':text', $text, PDO::PARAM_STR);
    $status = $stmt->execute(); // 実行

    //４．データ登録処理後
    if ($status === false) {
        sql_error($stmt);
    } else {
        redirect('today.php');
    }
} catch (PDOException $e) {
    // エラー詳細をログに記録
    error_log('Database Error: ' . $e->getMessage());
    die('An error occurred while saving data.');
}
