<?php
/*-------------------------------------------------------------------------------*/
/**
* ファイルデータを保存
* @param string $filename ファイル名
* @param string $save_path 保存先のパス
* @param string $caption 投稿の説明
* @return bool $result 
*/

function fileSave($filename, $save_path, $caption, $pl_name, $attack, $toughness, $speed, $technic, $imagination, $chase)
{
    // POSTデータ確認
    $dbn ='mysql:dbname=gsy_d03_04;charset=utf8mb4;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';
    
    // DB接続
    try {
        $pdo = new PDO($dbn, $user, $pwd,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        echo "接続に成功しました！\n";
        } catch (PDOException $e) {
        echo json_encode(["db error" => "{$e->getMessage()}"]);
        echo "接続に失敗しました\n";
        exit();
        }

    $result = False;

    // SQL作成&実行
    //$sql = "INSERT INTO character_status (file_name, file_path, caption) VALUES (?, ?, ?)";
    $sql = "INSERT INTO character_status (file_name, file_path, caption, pl_name, attack, toughness, speed, technic, imagination, chase) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);

    // バインド変数を設定
    $stmt->bindValue(1, $filename);
    $stmt->bindValue(2, $save_path);
    $stmt->bindValue(3, $caption);
    $stmt->bindValue(4, $pl_name);
    $stmt->bindValue(5, $attack);
    $stmt->bindValue(6, $toughness);
    $stmt->bindValue(7, $speed);
    $stmt->bindValue(8, $technic);
    $stmt->bindValue(9, $imagination);
    $stmt->bindValue(10, $chase);

    try {
        $status = $stmt->execute();
    } catch (PDOException $e) {
        echo json_encode(["sql error" => "{$e->getMessage()}"]);
        exit();
    }

}

/*-------------------------------------------------------------------------------*/
// DB接続
function connect_file()
{
    $dbn ='mysql:dbname=gsy_d03_04;charset=utf8mb4;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';
  try {
    return new PDO($dbn, $user, $pwd);
  } catch (PDOException $e) {
    exit('dbError:'.$e->getMessage());
  }
}
$pdo = connect_file();

$sql = 'SELECT * FROM character_status';
$stmt = $pdo->prepare($sql);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}



// SQL作成&実行
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

//var_dump($result);
//exit();
/*-------------------------------------------------------------------------------*/