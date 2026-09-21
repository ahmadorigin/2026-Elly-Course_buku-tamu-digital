<?php
require "./connection.php";

$id = $_POST["id"];
$nama = $_POST["nama"];
$email = $_POST["email"];
$pesan = $_POST["pesan"];

$sql = "UPDATE tb_tamu SET nama = :nama, email = :email, pesan = :pesan WHERE id = :id";
$stmt = $pdo->prepare($sql);

$stmt->execute([
    "nama" => $nama,
    "email" => $email,
    "pesan" => $pesan,
    "id" => $id
]);
header("Location: ../index.php");
exit;
