<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "ezpark";

$koneksi = mysqli_connect($host, $user, $password, $db);

if ($koneksi) {
    // echo "Koneksi Berhasil";
}

mysqli_select_db($koneksi, $db);