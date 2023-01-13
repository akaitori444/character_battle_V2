<?php
require_once "./dbc.php";
$id = $_GET['id'];

$sql = 'DELETE FROM character_status WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:character_list.php");
exit();