<?php
include '../process/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tangkap data dari form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Pemeriksaan keberadaan username
    $checkQuery = "SELECT * FROM user WHERE username = '$username'";
    $checkResult = mysqli_query($koneksi, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Handle jika username sudah ada dalam database
        echo "<script>alert('Pendaftaran gagal! Username sudah terdaftar. Silakan pilih username lain.');</script>";
        header('Location: ../page/daftar.php');
    } else {
        // Hash password sebelum menyimpan ke database (gunakan metode hash yang aman)
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Query untuk menyimpan data ke tabel user
        $query = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";

        // Eksekusi query
        $result = mysqli_query($koneksi, $query);

        header('Location: ../page/index.php');
    }
}

// Tutup koneksi ke database
mysqli_close($koneksi);
