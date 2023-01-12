<?php

function connect_to_db()
{
    // POSTデータ確認
    $dbn = 'mysql:dbname=gsy_d03_04;charset=utf8mb4;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';
    
    // DB接続
    try {
        return new PDO($dbn, $user, $pwd);
        } catch (PDOException $e) {
            echo "接続に失敗しました\n";
            echo json_encode(["db error" => "{$e->getMessage()}"]);
        exit();
        }
}