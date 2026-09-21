<?php

require "./connection.php";

$nama = $_POST["nama"];
$email = $_POST["email"];
$pesan = $_POST["pesan"];

$sql = "INSERT INTO tb_tamu (nama, email, pesan)
        VALUES (:nama, :email, :pesan)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    "nama" => $nama,
    "email" => $email,
    "pesan" => $pesan
]);

header("Location: ../index.php");
exit;
