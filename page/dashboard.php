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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EZPark Amikom</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="../src/output.css" />


</head>

<body>
    <div class="container">
        <header>
            <h2 class="mt-16 ml-8 text-3xl font-bold text-font-color sm:flex sm:justify-center sm:ml-0">EZPark AMIKOM
            </h2>
        </header>

        <div class="container p-4 md:flex md:justify-center">
            <div
                class="flex items-center justify-between mt-16 bg-main-color rounded-3xl h-28 sm:justify-center sm:gap-40 md:w-1/2">
                <div>
                    <h4 class="ml-4 font-bold text-font-color">Halo, <?php echo $username; ?></h4>
                    <p class="ml-4 text-font-color">Welcome to EZPark</p>
                </div>
            </div>
        </div>

        <div class="swiper mySwiper h-32 mt-16">
            <div class="swiper-wrapper">
                <div class="swiper-slide flex justify-center items-center">
                    <div class="w-64 text-center bg-main-color rounded-3xl h-32">Slide 1
                    </div>
                </div>
                <div class="swiper-slide flex justify-center items-center">
                    <div class="w-64 text-center bg-main-color rounded-3xl h-32">Slide 2
                    </div>
                </div>
                <div class="swiper-slide flex justify-center items-center">
                    <div class="w-64 text-center bg-main-color rounded-3xl h-32">Slide 3
                    </div>
                </div>
                <div class="swiper-slide flex justify-center items-center">
                    <div class="w-64 text-center bg-main-color rounded-3xl h-32">Slide 4
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>

        <div>
            <h2 class="mt-16 ml-8 text-3xl font-bold text-font-color sm:flex sm:justify-center">Menu</h2>
        </div>

        <div class="flex mt-8 mb-8 justify-evenly">
            <div class="text-center">
                <a href="../page/inputPlat.php">
                    <div class="flex items-center justify-center w-20 h-20 rounded-lg bg-main-color">
                        <img src="../img/park.png" alt="qr-code">
                    </div>
                </a>
                <h4 class="mt-4 font-semibold text-font-color">Parkir</h4>
            </div>
            <div class="text-center">
                <div class="flex items-center justify-center w-20 h-20 rounded-lg bg-main-color">
                    <img src="../img/printer.svg" alt="printer">
                </div>
                <h4 class="mt-4 font-semibold text-font-color">Lihat Karcis</h4>
            </div>
            <div class="text-center">
                <div class="flex items-center justify-center w-20 h-20 rounded-lg bg-main-color">
                    <img src="../img/kalender.svg" alt="kalender">
                </div>
                <h4 class="mt-4 font-semibold text-font-color">Booking</h4>
            </div>

        </div>

        <div class="p-12 mb-6 flex flex-col text-center">
            <h2 class="font-bold text-font-color text-2xl mb-4">Lokasi Parkir</h2>
            <p>Nama: <?php echo $nameParking; ?></p>
            <p>Space: <?php echo $spaceId; ?></p>
            <p>Masuk pada: <?php echo $checkInTime; ?></p>
        </div>

        <div class="flex justify-center items-center mb-32">
            <a href="../page/inputPlatOut.php"><button class="w-64 h-20 bg-red-600 rounded-2xl text-white font-bold">
                    Keluar Area
                </button></a>
        </div>

        <nav class="fixed bottom-0 w-full">
            <div class="flex">
                <button
                    class="flex flex-col items-center justify-center w-full h-20 pt-2 text-xl font-bold text-white bg-button-color">
                    <img src="../img/home.svg" alt="home" class="mb-2">
                    <h2>Beranda</h2>
                </button>
                <button
                    class="flex flex-col items-center justify-center w-full h-20 pt-2 text-xl font-bold text-white bg-main-color">
                    <a href="../page/profil.php">
                        <img src="../img/user.svg" alt="user" class="mx-auto mb-2">
                        <h2>Profil</h2>
                    </a>
                </button>
            </div>
        </nav>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
    </script>
</body>

</html>