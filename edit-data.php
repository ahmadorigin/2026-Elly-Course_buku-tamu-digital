<?php
require "./backend/connection.php";

$id = $_GET["id"];
$sql = "SELECT * FROM tb_tamu WHERE id = :id";

$stmt = $pdo->prepare($sql);
$stmt->execute(["id" => $id]);
$tamu = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Edit Tamu</title>
</head>

<body>

    <h1>Edit Data Tamu</h1>

    <form action="./backend/process-edit.php" method="POST">
        <!-- Latihan Lanjutan PHP Dasar - CRUD Buku Tamu dengan -->

        <input type="hidden" name="id" value="<?php echo $tamu["id"]; ?>">

        <p>
            Nama:<br>
            <input type="text" name="nama" value="<?php echo htmlspecialchars($tamu["nama"]); ?>" required>
        </p>

        <p>
            Email:<br>
            <input type="email" name="email" value="<?php echo htmlspecialchars($tamu["email"]); ?>" required>
        </p>
        <p>
            Pesan: <br>
            <textarea name="pesan" required> <?php echo htmlspecialchars($tamu["pesan"]); ?></textarea>
        </p>
        <button type="submit">Simpan Perubahan</button>
    </form>
    <p>
        <a href="index.php">Kembali</a>
    </p>
</body>

</html>