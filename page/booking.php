<?php
// Sesuaikan dengan struktur koneksi dan sesi Anda
include '../process/koneksi.php';

session_start();

// Cek apakah pengguna belum login, jika iya, redirect ke login
if (!isset($_SESSION['user_id'])) {
    header('Location: ../page/index.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Ambil data user dari database
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

// Cek apakah pengguna sudah memarkir kendaraan berdasarkan user_id
$checkQuery = "SELECT ps.*, ps.name_parking FROM parking_spaces ps
               WHERE ps.user_id = $user_id AND ps.is_booked = 1";
$checkResult = mysqli_query($koneksi, $checkQuery);

if ($checkResult && mysqli_num_rows($checkResult) > 0) {
    $row = mysqli_fetch_assoc($checkResult);
    $nameParking = $row['name_parking'];

    // User sudah memarkir kendaraan, kirim pesan kesalahan
    echo "<script>
            var responseMessage = 'Anda sudah Booking parkir di: $nameParking.';
            alert(responseMessage);
            window.location.href = '../page/dashboard.php';
        </script>";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Tempat Parkir</title>
    <link rel="stylesheet" href="../src/output.css">
</head>

<body>
    <div class="py-8 px-12 mx-auto mt-16">
        <div class="flex items-center justify-center gap-4 px-8 pt-6 mt-8">
            <img src="../img/detail-park.png" alt="book-park" class="h-28">
            <h2 class="text-2xl font-bold text-font-color">Pemesanan Tempat Parkir</h2>
        </div>

        <hr class="h-2 mx-auto my-8 bg-black border-0">

        <form action="../process/prosesBooking.php" method="post" class="max-w-md mx-auto" id="bookingForm">
            <div class="mb-4">
                <label for="space_id" class="block text-sm font-bold text-font-color">Pilih Tempat Parkir:</label>
                <select name="space_id" id="space_id" class="w-full p-2 border border-gray-300 rounded">
                    <?php
                    // Query untuk mendapatkan tempat parkir yang belum dipesan
                    $availableSpacesQuery = "SELECT space_id, name_parking FROM parking_spaces WHERE is_booked = 0";
                    $availableSpacesResult = mysqli_query($koneksi, $availableSpacesQuery);

                    if ($availableSpacesResult) {
                        while ($row = mysqli_fetch_assoc($availableSpacesResult)) {
                            $space_id = $row['space_id'];
                            $name_parking = $row['name_parking'];
                            echo "<option value=\"$space_id\">$name_parking</option>";
                        }
                    } else {
                        // Handle kesalahan query
                        echo "Error: " . mysqli_error($koneksi);
                        exit();
                    }
                    ?>
                </select>
                <div class="container flex flex-col text-center mb-4 mt-8">
                    <label for="platNomor" class="font-bold text-font-color text-2xl">Masukkan Plat Nomor</label>
                </div>
                <div class="flex flex-col w-full mx-auto">
                    <input type="text" name="platNomor" id="platNomor" required class="w-80 h-12 rounded-3xl mt-2 p-6 outline mx-auto">
                </div>
            </div>
        </form>

        <div class="flex items-center justify-center mt-8">
            <button onclick="bookingTempat()" class="p-4 font-bold text-black bg-main-color rounded-lg w-28">Booking</button>
        </div>

        <div class="flex items-center justify-center mt-8">
            <a href="../page/dashboard.php">
                <button class="p-4 font-bold text-white bg-red-600 rounded-lg w-28">Kembali</button>
            </a>
        </div>
    </div>

    <script>
        function bookingTempat() {
            // Menggunakan JavaScript untuk konfirmasi sebelum mengirimkan formulir
            if (confirm("Apakah Anda yakin ingin melakukan booking tempat ini?")) {
                document.getElementById("bookingForm").submit();
            }
        }
    </script>
</body>

</html>