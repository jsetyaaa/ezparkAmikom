<?php

include '../process/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tangkap data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa kredensial pengguna
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        $user = mysqli_fetch_assoc($result);

        // Memeriksa apakah password cocok
        if ($user && password_verify($password, $user['password'])) {
            // Menyimpan ID pengguna ke sesi
            $_SESSION['user_id'] = $user['id'];

            // Redirect ke dashboard.php
            header('Location: ../page/dashboard.php');
            exit();
        } else {
            // Handle jika kredensial tidak cocok
            echo "Kombinasi username/NIM dan password tidak valid.";
        }
    } else {
        // Handle kesalahan query
        echo "Error: " . mysqli_error($koneksi);
    }
}

// Tutup koneksi ke database
mysqli_close($koneksi);
