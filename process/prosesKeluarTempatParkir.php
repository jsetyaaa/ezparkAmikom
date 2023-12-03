<?php
// Koneksi ke database
include 'koneksi.php';

session_start(); // Pastikan untuk memulai sesi

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifikasi identitas pengguna dan validasi token parkir
    $user_id = $_SESSION['user_id'];
    $parkingToken = $_SESSION['parking_token'];

    // Ambil informasi masuk dari tabel parking_spaces sebelum diupdate
    $selectEntryInfoQuery = "SELECT space_id, check_in_time, plat_nomor FROM parking_spaces WHERE user_id = $user_id";
    $entryInfoResult = mysqli_query($koneksi, $selectEntryInfoQuery);

    if ($entryInfoResult && mysqli_num_rows($entryInfoResult) > 0) {
        $entryInfoRow = mysqli_fetch_assoc($entryInfoResult);

        // Cek apakah plat_nomor di database sama dengan yang diinputkan oleh pengguna
        $platNomorInDatabase = $entryInfoRow['plat_nomor'];
        $platNomorInput = $_POST['platNomor'];

        if ($platNomorInDatabase !== $platNomorInput) {
            echo "<script>
                    var responseMessage = 'Plat nomor yang diinputkan tidak sesuai.';
                    alert(responseMessage);
                    window.location.href = '../page/inputPlatOut.php';
                  </script>";
            exit(); // Hentikan eksekusi skrip jika plat_nomor tidak sesuai
        }

        // Update status tempat parkir
        $spaceId = $entryInfoRow['space_id'];
        $checkInTime = $entryInfoRow['check_in_time'];

        $updateQuery = "UPDATE parking_spaces SET is_booked = 0, plat_nomor = NULL, user_id = NULL, parking_token = NULL, check_in_time = NULL WHERE user_id = $user_id";
        mysqli_query($koneksi, $updateQuery);

        // Rekam data keluar di tabel parking_logs
        $insertLogQuery = "INSERT INTO parking_logs (user_id, space_id, check_in_time, check_out_time) VALUES ($user_id, $spaceId, '$checkInTime', NOW())";
        mysqli_query($koneksi, $insertLogQuery);

        // Bersihkan sesi parkir
        unset($_SESSION['parking_token']);

        // Kirim respons ke klien
        echo "<script>
                var responseMessage = 'Anda telah keluar dari area parkir.';
                alert(responseMessage);
                window.location.href = '../page/dashboard.php';
              </script>";
    } else {
        // Handle kesalahan, jika diperlukan
        echo "Error: Tidak dapat mengambil informasi masuk.";
    }
}

// Tutup koneksi ke database
mysqli_close($koneksi);
