<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EZPark Amikom</title>

    <link rel="stylesheet" href="../src/output.css" />


</head>

<body>
    <header>
        <h2 class="text-font-color font-bold text-3xl mt-16 sm:flex sm:justify-center ml-8 sm:ml-0">Profil</h2>
    </header>

    <div class="container mt-16">
        <div class="flex justify-evenly items-center w-[368px] sm:w-full sm:flex sm:justify-center sm:gap-28 ">
            <img src="../img/icon-park.png" alt="profil" class="rounded-full">
            <h1 class="text-font-color font-bold text-2xl">Username</h1>
        </div>
    </div>

    <div class="mt-16 px-6 sm:flex sm:flex-col sm:justify-center sm:items-center">
        <div class="flex sm:w-[368px]">
            <img src="../img/email.svg" alt="mail" class="mr-8">
            <div>
                <h4 class="font-bold text-font-color">Email</h4>
                <h5 class="text-font-color">username@gmail.com</h5>
            </div>
        </div>
        <div class="flex mt-6 sm:w-[368px]">
            <img src="../img/identity.svg" alt="identitas" class="mr-8">
            <div>
                <h4 class="font-bold text-font-color">NIM</h4>
                <h5 class="text-font-color">XX.XX.XX</h5>
            </div>
        </div>
        <div class="flex mt-12 items-center sm:w-[368px]">
            <img src="../img/trash.svg" alt="trash" class="mr-8">
            <div>
                <h4 class="font-bold text-font-color">Hapus Akun</h4>
            </div>
        </div>
        <div class="flex mt-12 items-center mb-32 sm:w-[368px]">
            <a href="../page/index.php" class="flex items-center">
                <img src="../img/logout.svg" alt="keluar" class="mr-8">
                <div>
                    <h4 class="font-bold text-red-600">Keluar</h4>
                </div>
            </a>
        </div>
    </div>

    <nav class="w-full bottom-0 fixed">
        <div class="flex">
            <button class="w-full h-20 bg-main-color text-white font-bold text-xl flex flex-col justify-center items-center pt-2">
                <a href="../page/dashboard.php">
                    <img src="../img/home.svg" alt="home" class="mb-2 mx-auto">
                    <h2>Beranda</h2>
                </a>

            </button>
            <button class="w-full h-20 bg-button-color text-white font-bold text-xl flex flex-col justify-center items-center pt-2">
                <img src="../img/user.svg" alt="user" class="mb-2">
                <h2>Profil</h2>
            </button>
        </div>
    </nav>

</body>

</html>