<?php

include '../process/koneksi.php';

session_start(); // Memulai sesi

// Cek apakah pengguna sudah login, jika iya, redirect ke dashboard.php
if (isset($_SESSION['user_id'])) {
    header('Location: ../page/dashboard.php');
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

<body class="flex flex-col items-center justify-center w-screen bg-main-color">
    <div class="container">
        <div class="text-center">
            <img src="../img/icon-park.png" alt="logos" class="mx-auto mt-8 mb-5" />
            <h1 class="mt-2 text-3xl font-bold text-font-color">EZPark AMIKOM</h1>
        </div>
        <div>
            <div class="text-center">
                <form action="../process/prosesDaftar.php" method="POST">
                    <div class="flex flex-col">
                        <label for="username" class="mt-16 mb-2 font-semibold -ml-36 text-font-color">username or
                            NIM</label>
                        <input type="text" id="username" name="username"
                            class="h-12 p-6 mx-auto mt-2 outline-none w-80 rounded-3xl" required>
                    </div>
            </div>
            <div class="text-center">
                <div class="flex flex-col">
                    <label for="email" class="mt-8 mb-2 font-semibold -ml-60 text-font-color">email</label>
                    <input type="email" id="email" name="email"
                        class="h-12 p-6 mx-auto mt-2 outline-none w-80 rounded-3xl" required>
                </div>
            </div>
            <div class="text-center">
                <div class="flex flex-col">
                    <label for="password" class="mt-8 mb-2 font-semibold -ml-52 text-font-color">password</label>
                    <input type="password" id="password" name="password"
                        class="h-12 p-6 mx-auto mt-2 outline-none w-80 rounded-3xl" required>
                </div>
            </div>
            <div class="text-center">
                <button type="submit"
                    class="h-12 mt-16 text-lg font-semibold tracking-widest text-white rounded-full bg-button-color w-80">D
                    a f
                    t a r</button>
            </div>
            </form>
        </div>
        <div class="bottom-0 w-full mt-16 mb-4 text-center">
            <h2 class="text-lg font-bold tracking-widest text-font-color"><a href="../page/index.php">L o g i n</a></h2>
        </div>
    </div>
</body>

</html>