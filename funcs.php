<?php

//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続
function db_conn()
{
    try {
        $db_name = '';   
        $db_id   = '';     
        $db_pw   = '';    
        $db_host = ''; 
        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        return $pdo;
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}

//SQLエラー
function sql_error($stmt)
{
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('SQLError:' . $error[2]);
}

//リダイレクト
function redirect($file_name)
{
    header('Location: ' . $file_name);
    exit();
}


// ログインチェク処理 loginCheck()
function loginCheck()
{
    // 1. ログインチェック処理！
if(!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] != session_id()){
    // ログインを経由していない場合終了
  exit('ログインエラー！！');
  }
    // ログインできたバージョン
  session_regenerate_id(true);
  $_SESSION['chk_ssid'] = session_id();
  
}
