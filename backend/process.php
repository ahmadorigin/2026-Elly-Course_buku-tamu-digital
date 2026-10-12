<?php

require "./connection.php";

$nama = trim($_POST["nama"]);
$email = trim($_POST["email"]);
$pesan = trim($_POST["pesan"]);

if ($nama == '' || $email == '' || $pesan == "") {
    die("Semua data harus diisi.");
}

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
