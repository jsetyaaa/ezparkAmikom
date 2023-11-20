<?php

include '../process/koneksi.php'

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
            <form action="../process/prosesDaftar.php" method="POST">
                <div class="flex flex-col">
                    <label for="username" class="mb-2 mt-16 -ml-36 text-font-color font-semibold">username or
                        NIM</label>
                    <input type="text" id="username" name="username" class="w-80 h-12 rounded-3xl mt-2 p-6 outline-none mx-auto" required>
                </div>
        </div>
        <div class="text-center">
            <div class="flex flex-col">
                <label for="email" class="mb-2 mt-8 -ml-60 text-font-color font-semibold">email</label>
                <input type="email" id="email" name="email" class="w-80 h-12 rounded-3xl mt-2 p-6 outline-none mx-auto" required>
            </div>
        </div>
        <div class="text-center">
            <div class="flex flex-col">
                <label for="password" class="mb-2 mt-8 -ml-52 text-font-color font-semibold">password</label>
                <input type="password" id="password" name="password" class="w-80 h-12 rounded-3xl mt-2 p-6 outline-none mx-auto" required>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="mt-16 bg-button-color w-80 h-12 rounded-full text-white font-semibold tracking-widest text-lg">D
                a f
                t a r</button>
        </div>
        </form>
    </div>
    <div class="bottom-0 w-full text-center mt-16 mb-4">
        <h2 class="text-lg text-font-color font-bold tracking-widest"><a href="../page/index.php">L o g i n</a></h2>
    </div>
</body>

</html>