<?php
session_start(); //ログインアウトの処理
require_once('funcs.php'); //１．関数群の読み込み
loginCheck();

$pdo = db_conn();
$id = $_GET['id']; //?id~**を受け取る


//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM php4_table WHERE id=:id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
if ($status == false) {
    sql_error($stmt);
} else {
    $row = $stmt->fetch();
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ更新</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8f9fa; /* 優しい背景色 */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        header {
            background-color: #e3f2fd; /* 優しい青色 */
            padding: 10px 0;
        }
        nav .navbar-brand {
            font-weight: bold;
            color: #007bff;
        }
        nav .navbar-brand:hover {
            color: #0056b3;
            text-decoration: underline;
        }
        .jumbotron {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        legend {
            color: #6c757d; /* 柔らかい文字色 */
        }
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #a5d8ff; /* 優しい青色 */
            color: #ffffff;
            border: none;
            border-radius: 20px;
            font-size: 16px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #74c0fc;
        }
    
    </style>
</head>

<body>

    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">Todays me data</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="POST" action="update.php">
        <div class="jumbotron">
        <fieldset>
                <legend>Todays me</legend>

                <label>今日の睡眠時間：<input type="text" name="sleep" value="<?= $row['sleep']?>"></label><br>
                <label>今日の気分：<input type="text" name="mood" value="<?= $row['mood']?>"></label><br>
                <label>今日何する？：<textArea name="text" rows="4" cols="40"><?= $row['text'] ?></textArea></label><br>
                <input type="submit" value="送信">
                <input type="hidden" name="id" value="<?= $id ?>">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>
