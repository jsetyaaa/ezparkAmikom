<?php
// Koneksi ke database
include 'koneksi.php';

session_start(); // Pastikan untuk memulai sesi

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tangkap data plat nomor dari form
    $platNomor = $_POST['platNomor'];

    // Dapatkan user_id dari sesi
    $user_id = $_SESSION['user_id'];

    // Lakukan pencarian tempat parkir yang kosong
    $query = "SELECT space_id, name_parking FROM parking_spaces WHERE is_booked = 0 LIMIT 1";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $spaceId = $row['space_id'];
        $nameParking = $row['name_parking'];

        // Generate unique parking token
        $parkingToken = uniqid(); // Anda mungkin ingin menggunakan metode lain untuk menghasilkan token yang lebih unik

        // Tandai tempat parkir sebagai terisi dan isi kolom plat_nomor, user_id, parking_token, dan check_in_time
        $updateQuery = "UPDATE parking_spaces SET is_booked = 1, plat_nomor = '$platNomor', user_id = $user_id, parking_token = '$parkingToken', check_in_time = NOW() WHERE space_id = $spaceId";
        mysqli_query($koneksi, $updateQuery);

        // Setel token atau sesi parkir sebagai parkir aktif
        $_SESSION['parking_token'] = $parkingToken;

        // Kirim respons ke klien
        echo "<script>
                var responseMessage = 'Tempat parkir ditemukan. Space ID: $spaceId, Nama Parkir: $nameParking, Plat Nomor: $platNomor';
                alert(responseMessage);
                window.location.href = '../page/dashboard.php';
            </script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}

// Tutup koneksi ke database
mysqli_close($koneksi);
