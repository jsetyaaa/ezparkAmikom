<?php
include '../process/koneksi.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $space_id = $_POST['space_id'];
    $plat_nomor = $_POST['platNomor'];
    $booking_time = date('Y-m-d H:i:s');
    $check_in_time = null;
    $check_out_time = null;

    // Generate parking_token (bisa menggunakan metode lain sesuai kebutuhan)
    $parking_token = uniqid();

    // Query untuk menyimpan data pemesanan ke tabel parking_booking
    $bookingQuery = "INSERT INTO parking_booking (user_id, space_id, booking_time, check_in_time, check_out_time)
                    VALUES ('$user_id', '$space_id', '$booking_time', '$check_in_time', '$check_out_time')";

    // Query untuk mengubah status is_booked pada tabel parking_spaces, memasukkan plat_nomor, parking_token, dan user_id
    $updateSpaceQuery = "UPDATE parking_spaces 
                         SET is_booked = 1, plat_nomor = '$plat_nomor', user_id = '$user_id', parking_token = '$parking_token', check_in_time = NOW() 
                         WHERE space_id = '$space_id'";

    $bookingResult = mysqli_query($koneksi, $bookingQuery);
    $updateSpaceResult = mysqli_query($koneksi, $updateSpaceQuery);

    if ($bookingResult && $updateSpaceResult) {
        // Pemesanan berhasil, bisa tambahkan pesan atau alihkan ke halaman lain
        header('Location: ../page/dashboard.php');
        exit();
    } else {
        // Handle kesalahan query
        echo "Error: " . mysqli_error($koneksi);
        exit();
    }
}
