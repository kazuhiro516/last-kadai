<?php

// セッションの開始
session_start();

// $name = htmlspecialchars($_SESSION['name'], ENT_QUOTES, 'UTF-8');
// $textarea = htmlspecialchars($_SESSION['textarea'], ENT_QUOTES, 'UTF-8');

    $name = $_POST["name"];
    $naiyou = $_POST["textarea"];
    echo $name."<br>";
    echo $naiyou."<br>";


//----------------------------------------------------
//３. DB接続します(エラー処理追加)
//----------------------------------------------------
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//----------------------------------------------------
//４．データ登録SQL作成
//----------------------------------------------------
$stmt = $pdo->prepare("INSERT INTO gs_kd_table(id, name, naiyou )
VALUES(NULL, :name, :naiyou");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);
$status = $stmt->execute();

?>
