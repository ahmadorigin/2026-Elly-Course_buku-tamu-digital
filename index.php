<?php

require "./connection.php";

$sql = "SELECT * FROM tb_tamu ORDER BY id DESC";
$stmt = $pdo->query($sql);
$dataTamu = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Buku Tamu</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
    <h1>Buku Tamu</h1>
    <section class="main">
        <form action="./process.php" method="POST">
            <p>
                Nama: <br>
                <input type="text" name="nama" required>
            </p>
            <p>
                Email:<br>
                <input type="email" name="email" required>
            </p>
            <p>
                Pesan: <br>
                <textarea name="pesan" required></textarea>
            </p>
            <button type="submit">Simpan</button>
        </form>
        <div class="daftar-tamu">
            <h2>Daftar Tamu</h2>
            <div class="card">
                <?php foreach ($dataTamu as $tamu): ?>
                    <h3>
                        <?= htmlspecialchars($tamu["nama"]); ?>
                    </h3>

                    <p>
                        Email:
                        <?= htmlspecialchars($tamu["email"]); ?>
                    </p>

                    <p>
                        <?= htmlspecialchars($tamu["pesan"]); ?>
                    </p>
                    <small>
                        <?= $tamu["created_at"]; ?>
                    </small>
                    <hr>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</body>

</html>