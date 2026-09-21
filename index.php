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

<body class="bg-gray-900 text-white">
    <h1 class="text-3xl text-center m-3">Buku Tamu</h1>
    <section>
        <form action="./process.php" method="POST" class="border-2 border-solid w-lg rounded-lg">
            <h2 class="text-xl text-center m-3 font-bold">Input Data</h2>
            <div
                class="m-3 gap-x-4 rounded-xl bg-white p-6 shadow-lg outline outline-black/5 dark:bg-slate-800 dark:shadow-none dark:-outline-offset-1 dark:outline-white/10">
                <div class="flex gap-x-4">
                    <p class="text-lg font-medium text-black dark:text-white">Nama:</p>
                    <input type="text" name="nama" class="text-gray-500 dark:text-gray-400 border-2 rounded-xl w-full"
                        required>
                </div>
            </div>
            <div
                class="m-3 gap-x-4 rounded-xl bg-white p-6 shadow-lg outline outline-black/5 dark:bg-slate-800 dark:shadow-none dark:-outline-offset-1 dark:outline-white/10">
                <div class="flex gap-x-4">
                    <p class="text-lg font-medium text-black dark:text-white">Email:</p>
                    <input type="email" name="email" class="text-gray-500 dark:text-gray-400 border-2 rounded-xl w-full"
                        required>
                </div>
            </div>
            <div
                class="m-3 gap-x-4 rounded-xl bg-white p-6 shadow-lg outline outline-black/5 dark:bg-slate-800 dark:shadow-none dark:-outline-offset-1 dark:outline-white/10">
                <div class="flex gap-x-4">
                    <p class="text-lg font-medium text-black dark:text-white">Pesan:</p>
                    <textarea name="pesan" class="text-gray-500 dark:text-gray-400 border-2 rounded-lg w-full"
                        required> </textarea>
                </div>
            </div>
            <div class="flex w-full align-center">
                <button
                    class="flex-1 mb-2 mx-2 my-auto font-bold transition duration-300 rounded-lg bg-white p-2 shadow-lg outline outline-black/5 dark:bg-slate-800 dark:shadow-none dark:-outline-offset-1 dark:outline-white/10 hover:bg-slate-900 animate-pulse"
                    type="submit">Simpan</button>
            </div>
        </form>
        <div class="">
            <h2 class="text-xl text-center m-3 font-bold">Daftar Data</h2>
            <div class="grid grid-cols-3">
                <?php foreach ($dataTamu as $tamu): ?>
                <div class="border-2 border-solid rounded-xl p-2 m-2 mb-3">
                    <h3 class="flex justify-between items-center">
                        <p class="font-bold text-lg ">
                            <?= htmlspecialchars($tamu["nama"]); ?>
                        </p>
                        <p class="text-gray-500 text-xs">
                            <?= htmlspecialchars($tamu["email"]); ?>
                        </p>
                    </h3>
                    <hr>
                    <div class="my-3">
                        <p><?= htmlspecialchars($tamu["pesan"]); ?></p>
                    </div>
                    <p class="text-xs text-end">
                        <?= $tamu["created_at"]; ?>
                    </p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</body>

</html>