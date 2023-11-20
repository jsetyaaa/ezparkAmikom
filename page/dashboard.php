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
        <h2 class="text-font-color font-bold text-3xl mt-16 sm:flex sm:justify-center ml-8 sm:ml-0">EZPark AMIKOM</h2>
    </header>

    <div class="container p-4 md:flex md:justify-center">
        <div class="bg-main-color rounded-3xl mt-16 flex h-28 items-center justify-between sm:justify-center sm:gap-40 md:w-1/2">
            <div>
                <h4 class="ml-4 font-bold text-font-color">Halo, username</h4>
                <p class="ml-4 text-font-color">Welcome to EZPark</p>
            </div>
            <div>
                <img src="../img/icon-park.png" alt="logos" class="h-12 rounded-full mr-4">
            </div>
        </div>
    </div>

    <div id="sliderContainer" class="mt-16 h-32 grid grid-flow-col scroll-smooth overflow-y-auto overscroll-x-contain snap-x gap-4 px-8">
        <div class="bg-main-color w-64 text-center rounded-3xl snap-center">Slide 1
        </div>
        <div class="bg-main-color w-64 text-center rounded-3xl snap-center">Slide 2
        </div>
        <div class="bg-main-color w-64 text-center rounded-3xl snap-center">Slide 3
        </div>
        <div class="bg-main-color w-64 text-center rounded-3xl snap-center">Slide 4
        </div>
        <div class="bg-main-color w-64 text-center rounded-3xl snap-center">Slide 5
        </div>
        <div class="bg-main-color w-64 text-center rounded-3xl snap-center">Slide 6
        </div>
    </div>

    <div>
        <h2 class="text-font-color font-bold text-3xl mt-16 sm:flex sm:justify-center ml-8">Menu</h2>
    </div>

    <div class="mt-8 flex justify-evenly mb-32">
        <div class="text-center">
            <div class="bg-main-color w-20 h-20 rounded-lg flex justify-center items-center">
                <img src="../img/qr-code.svg" alt="qr-code">
            </div>
            <h4 class="text-font-color font-semibold mt-4">Parkir</h4>
        </div>
        <div class="text-center">
            <div class="bg-main-color w-20 h-20 rounded-lg flex justify-center items-center">
                <img src="../img/printer.svg" alt="printer">
            </div>
            <h4 class="text-font-color font-semibold mt-4">Cetak Karcis</h4>
        </div>
        <div class="text-center">
            <div class="bg-main-color w-20 h-20 rounded-lg flex justify-center items-center">
                <img src="../img/kalender.svg" alt="kalender">
            </div>
            <h4 class="text-font-color font-semibold mt-4">Booking</h4>
        </div>

    </div>

    <nav class="w-full bottom-0 fixed">
        <div class="flex">
            <button class="w-full h-20 bg-button-color text-white font-bold text-xl flex flex-col justify-center items-center pt-2">
                <img src="../img/home.svg" alt="home" class="mb-2">
                <h2>Beranda</h2>
            </button>
            <button class="w-full h-20 bg-main-color text-white font-bold text-xl flex flex-col justify-center items-center pt-2">
                <a href="../page/profil.php">
                    <img src="../img/user.svg" alt="user" class="mb-2 mx-auto">
                    <h2>Profil</h2>
                </a>
            </button>
        </div>
    </nav>

</body>

</html>