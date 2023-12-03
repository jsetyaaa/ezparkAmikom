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
$query = "SELECT * FROM user WHERE user_id = '$user_id'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    $user = mysqli_fetch_assoc($result);
    $username = $user['username'];
    $email = $user['email'];
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

    <link rel="stylesheet" href="../src/output.css" />


</head>

<body>
    <div class="container">
        <header>
            <h2 class="mt-16 ml-8 text-3xl font-bold text-font-color sm:flex sm:justify-center sm:ml-0">Profil</h2>
        </header>

        <div class="container mt-16">
            <div class="flex justify-evenly items-center w-[368px] sm:w-full sm:flex sm:justify-center sm:gap-28 ">
                <img src="../img/icon-park.png" alt="profil" class="rounded-full">
                <h1 class="text-2xl font-bold text-font-color"><?php echo $username; ?></h1>
            </div>
        </div>

        <div class="px-6 mt-16 sm:flex sm:flex-col sm:justify-center sm:items-center">
            <div class="flex sm:w-[368px]">
                <img src="../img/email.svg" alt="mail" class="mr-8">
                <div>
                    <h4 class="font-bold text-font-color">Email</h4>
                    <h5 class="text-font-color"><?php echo $email; ?></h5>
                </div>
            </div>
            <div class="flex mt-6 sm:w-[368px]">
                <img src="../img/identity.svg" alt="identitas" class="mr-8">
                <div>
                    <h4 class="font-bold text-font-color">username</h4>
                    <h5 class="text-font-color"><?php echo $username; ?></h5>
                </div>
            </div>
            <div class="flex mt-12 items-center sm:w-[368px]">
                <a href="../process/delAkun.php" class="flex items-center">
                    <img src="../img/trash.svg" alt="trash" class="mr-8">
                    <div>
                        <h4 class="font-bold text-font-color">Hapus Akun</h4>
                    </div>
                </a>
            </div>
            <div class="flex mt-12 items-center mb-32 sm:w-[368px]">
                <a href="../process/logout.php" class="flex items-center">
                    <img src="../img/logout.svg" alt="keluar" class="mr-8">
                    <div>
                        <h4 class="font-bold text-red-600">Keluar</h4>
                    </div>
                </a>
            </div>
        </div>

        <nav class="fixed bottom-0 w-full">
            <div class="flex">
                <button class="flex flex-col items-center justify-center w-full h-20 pt-2 text-xl font-bold text-white bg-main-color">
                    <a href="../page/dashboard.php">
                        <img src="../img/home.svg" alt="home" class="mx-auto mb-2">
                        <h2>Beranda</h2>
                    </a>

                </button>
                <button class="flex flex-col items-center justify-center w-full h-20 pt-2 text-xl font-bold text-white bg-button-color">
                    <img src="../img/user.svg" alt="user" class="mb-2">
                    <h2>Profil</h2>
                </button>
            </div>
        </nav>
    </div>
</body>

</html>