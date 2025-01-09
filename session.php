<?php
// 必ず必要な前提条件
session_start();

// $name = 'kumiko';
// $age = 46;
// echo $name .
//      $age;
// // →他のファイルで表示できるようにする

// $_SESSION['name'] = $name;
// $_SESSION['age'] = $age;

// このブラウザのidを取得表示するだけ。あまり意味ない。idはセキュリティ上、毎回作り直したほうがいい
$sid = session_id();
echo $sid;
