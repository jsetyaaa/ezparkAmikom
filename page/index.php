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

<body class="bg-main-color flex flex-col items-center justify-center w-screen">
    <div class="text-center">
        <img src="../img/icon-park.png" alt="logos" class="mx-auto mt-8 mb-5" />
        <h1 class="font-bold text-font-color text-3xl mt-2">EZPark AMIKOM</h1>
    </div>
    <div>
        <div class="text-center">
            <form action="../process/prosesLogin.php" method="POST">
                <div class="flex flex-col">
                    <label for="username" class="mb-2 mt-16 -ml-36 text-font-color font-semibold">username or
                        NIM</label>
                    <input type="text" id="username" name="username"
                        class="w-80 h-12 rounded-3xl mt-2 p-6 outline-none mx-auto" required>
                </div>
        </div>
        <div class="text-center">
            <form action="">
                <div class="flex flex-col">
                    <label for="password" class="mb-2 mt-8 -ml-52 text-font-color font-semibold">password</label>
                    <input type="password" id="password" name="password"
                        class="w-80 h-12 rounded-3xl mt-2 p-6 outline-none mx-auto" required>
                </div>
        </div>
        <div class="text-center">
            <button type="submit"
                class="mt-16 bg-button-color w-80 h-12 rounded-full text-white font-semibold tracking-widest text-lg">L
                o
                g i n</button>
        </div>
        </form>
    </div>
    <div class="text-center">
        <h5 class="mt-2 text-font-color"><a href="">lupa kata sandi?</a></h5>
    </div>

    <div class="bottom-0 w-full text-center mt-16 mb-4">
        <h2 class="text-lg text-font-color font-bold tracking-widest"><a href="../page/daftar.php">D a f t a r</a></h2>
    </div>
</body>

</html>