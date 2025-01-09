<?php
// 0. SESSION開始！！
session_start();

// 1. 関数群の読み込み
require_once('funcs.php');
loginCheck();

// 2. データ登録SQL作成
$pdo = db_conn();
$stmt = $pdo->prepare('SELECT * FROM php4_table');
$status = $stmt->execute();

// 3. データ表示
$view = '';
if ($status == false) {
    sql_error($stmt);
} else {
    $view .= '<table class="table">';
    $view .= '<thead><tr>';
    $view .= '<th>ID</th>';
    $view .= '<th>睡眠時間</th>';
    $view .= '<th>気分スコア</th>';
    $view .= '<th>メモ</th>';
    $view .= '<th>操作</th>';
    $view .= '</tr></thead><tbody>';

    while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<tr>';
        $view .= '<td>' . h($r['id']) . '</td>';
        $view .= '<td>' . h($r['sleep']) . ' 時間</td>';
        $view .= '<td>' . h($r['mood']) . '</td>';
        $view .= '<td>' . h($r['text']) . '</td>';
        $view .= '<td>';
        $view .= '<a href="detail.php?id=' . $r['id'] . '">[編集]</a> ';
        $view .= '<a href="delete.php?id=' . $r['id'] . '" onclick="return confirm(\'本当に削除しますか？\');">[削除]</a>';
        $view .= '</td>';
        $view .= '</tr>';
    }

    $view .= '</tbody></table>';
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todays me data</title>
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }
        .container {
            background: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
            margin: 20px auto;
            max-width: 800px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
        }
        a {
            text-decoration: none;
            color: #4a90e2;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body id="main">
    <!-- Head[Start] -->
    <header>
    <nav class="navbar navbar-default">
        <div class="container-fluid text-center">
            <div class="navbar-header" style="display: inline-block;">
                <a class="navbar-brand btn btn-primary" href="today.php" style="margin-right: 10px;">Todays me</a>
                <a class="navbar-brand btn btn-secondary" href="select2.php">Figure</a>
            </div>
        </div>
    </nav>
</header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div class="container">
        <?= $view ?>
    </div>
    <!-- Main[End] -->

</body>

</html>
