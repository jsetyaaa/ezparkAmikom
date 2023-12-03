<?php

include '../process/koneksi.php';

session_start(); // Memulai sesi

// Cek apakah pengguna belum login, jika iya, redirect ke login
if (!isset($_SESSION['user_id'])) {
    header('Location: ../page/index.php');
    exit();
}

// Cek apakah pengguna sudah memarkir kendaraan berdasarkan user_id
$user_id = $_SESSION['user_id'];
$checkQuery = "SELECT ps.*, ps.name_parking FROM parking_spaces ps
               WHERE ps.user_id = $user_id AND ps.is_booked = 1";
$checkResult = mysqli_query($koneksi, $checkQuery);

if ($checkResult && mysqli_num_rows($checkResult) > 0) {
    $row = mysqli_fetch_assoc($checkResult);
    $nameParking = $row['name_parking'];

    // User sudah memarkir kendaraan, kirim pesan kesalahan
    echo "<script>
            var responseMessage = 'Anda sudah memarkir kendaraan di tempat parkir: $nameParking.';
            alert(responseMessage);
            window.location.href = '../page/dashboard.php';
        </script>";
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Plat Nomor</title>

    <link rel="stylesheet" href="../src/output.css">
</head>

<body class="h-screen flex flex-col items-center justify-center">
    <header>
        <h2 class="mb-16 text-3xl font-bold text-font-color">EZPark AMIKOM
        </h2>
    </header>

    <!-- Form untuk input plat nomor -->
    <form id="inputForm" class="bg-main-color p-6 rounded-2xl" method="POST"
        action="../process/prosesCariTempatParkir.php">
        <div class="container flex flex-col text-center mb-8">
            <label for="platNomor" class="font-bold text-font-color text-2xl">Masukkan Plat Nomor</label>
        </div>
        <div class="flex flex-col w-full mx-auto">
            <input type="text" name="platNomor" id="platNomor" required
                class="w-80 h-12 rounded-3xl mt-2 p-6 outline-none mx-auto">
            <button type="submit" class="text-white bg-button-color font-bold rounded-full w-40 h-8 mt-6 mx-auto">Cari
                Tempat Parkir</button>
        </div>
    </form>

    <a href="../page/dashboard.php">
        <button class="bg-red-600 mt-8 p-4 rounded-lg text-white font-bold">Back</button>
    </a>
</body>

</html>