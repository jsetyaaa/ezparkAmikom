<?php

include '../process/koneksi.php';

session_start(); // Memulai sesi

// Cek apakah pengguna belum login, jika iya, redirect ke login
if (!isset($_SESSION['user_id'])) {
    header('Location: ../page/index.php');
    exit();
}

// Ambil user data dari database berdasarkan user_id dari session
$user_id = $_SESSION['user_id'];

// Query untuk mendapatkan data user berdasarkan user_id
$query = "SELECT username FROM user WHERE user_id = '$user_id'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    $user = mysqli_fetch_assoc($result);
    $username = $user['username'];
} else {
    // Handle kesalahan query
    echo "Error: " . mysqli_error($koneksi);
    exit();
}

// Query untuk mendapatkan data user dan lokasi parkir berdasarkan user_id
$query = "SELECT u.username, p.name_parking, p.space_id, p.check_in_time FROM user u
          LEFT JOIN parking_spaces p ON u.user_id = p.user_id
          WHERE u.user_id = '$user_id'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    $data = mysqli_fetch_assoc($result);
    $username = $data['username'];
    $nameParking = $data['name_parking'];
    $spaceId = $data['space_id'];
    $checkInTime = $data['check_in_time'];
} else {
    // Handle kesalahan query
    echo "Error: " . mysqli_error($koneksi);
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Parkir</title>

    <link rel="stylesheet" href="../src/output.css">
</head>

<body>
    <div class="py-8 px-12 mx-auto mt-16">
        <div class="flex items-center justify-center gap-4 px-8 pt-6 mt-8">
            <img src="../img/detail-park.png" alt="detail-park" class="h-28">
            <h2 class="text-2xl font-bold text-font-color">EZPark AMIKOM</h2>
        </div>

        <hr class="h-2 mx-auto my-8 bg-black border-0">
        <h2 class="text-2xl font-bold text-center text-font-color">Detail Parkir</h2>
        <hr class="h-2 mx-auto my-8 bg-black border-0">

        <div class="flex flex-col items-center gap-4">
            <p class="font-bold text-font-color text-lg">Nama User : <?php echo $username; ?></p>
            <p class="font-bold text-font-color text-lg">Space ID : <?php echo $spaceId; ?></p>
            <p class="font-bold text-font-color text-lg">Nama Parkir : <?php echo $nameParking; ?></p>
            <p class="font-bold text-font-color text-lg">Masuk : <?php echo $checkInTime; ?></p>
        </div>


        <hr class="h-2 mx-auto my-8 bg-black border-0">
    </div>
    <div class="flex items-center justify-center">
        <a href="../page/dashboard.php">
            <button class="p-4 font-bold text-white bg-red-600 rounded-lg w-28">Back</button>
        </a>
    </div>

</body>

</html>