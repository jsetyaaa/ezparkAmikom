<?php
// Mulai session
session_start();

// Pengecekan session login
if (!isset($_SESSION['user_id'])) {
    // Jika session login tidak ada, redirect ke halaman login
    header('Location: ../page/index.php');
    exit();
}

// Sambungkan ke database
include '../process/koneksi.php';

// Ambil user_id dari session
$user_id = $_SESSION['user_id'];

// Query untuk menghapus akun berdasarkan user_id
$query = "DELETE FROM user WHERE user_id = '$user_id'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    // Hapus semua data session
    session_unset();

    // Hancurkan session
    session_destroy();

    echo "Akun berhasil dihapus.";
    // Redirect ke halaman login atau halaman lain yang sesuai
    header('Location: ../page/index.php');
    exit();
} else {
    // Handle kesalahan query
    echo "Error: " . mysqli_error($koneksi);
}

// Tutup koneksi ke database
mysqli_close($koneksi);
