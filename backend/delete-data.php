<?php
require "./connection.php";
$id = $_GET["id"];
$sql = "DELETE FROM tb_tamu WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(["id" => $id]);
header("Location: ../index.php");
exit;
