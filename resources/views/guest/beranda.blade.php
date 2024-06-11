<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="icon" type="png" href="{{ asset('logo no text.png') }}"> --}}
    @vite('resources/css/app.css')
    <title>Beranda</title>
</head>

<body class="w-full h-full bg-[#181727] text-white">
    <header class="flex w-full justify-between items-center px-12 py-6 mb-12">
        <img src="{{ asset('logo.png') }}" alt="Logo">
        <div class="flex space-x-6 items-center">
            <a href="/" class="text-[#28B8FF] font-bold">Home</a>
            <a href="/login"
                class="bg-gradient-to-r from-[#7C6CFB] from-10% to-[#28B8FF] to-100% px-4 py-2 text-white font-bold rounded-lg">Login</a>
        </div>
    </header>
    <main>
        <section class="flex flex-col text-white items-center">
            <div class="flex flex-col items-center space-y-9">
                <div class="flex flex-col items-center space-y-4">
                    <h1 class="text-5xl font-semibold">Strategi Dalam Market Crypto Untuk</h1>
                    <h1 class="text-5xl font-semibold">Melipat Gandakan Aset Anda</h1>
                    <h2 class="text-xl font-medium text-gray-400">Grand New Crypto Learning System</h2>
                </div>
                <object width="720" height="480" data="https://www.youtube.com/v/e0fbu5QvdWY"
                    type="application/x-shockwave-flash">
                    <param name="src" value="https://www.youtube.com/v/e0fbu5QvdWY" />
                </object>
            </div>
        </section>
        <section class="relative flex flex-col text-white items-center my-32">
            <img class="px-44" src="{{ asset('course-blur.png') }}" alt="LMS no Access">
            <div class="absolute top-0 left-0 right-0 bottom-0 flex flex-col justify-center items-center">
                <p class="text-5xl font-semibold mb-3">Login atau Register akun,</p>
                <p class="text-5xl font-semibold">untuk mendapat akses LMS</p>
                <a class="bg-gradient-to-r from-[#7C6CFB] from-10% to-[#28B8FF] to-100% px-12 py-2 text-white font-bold rounded-lg mt-20"
                    href="/login">Continue</a>
            </div>
        </section>
        <section class="flex flex-col items-center my-64">
            <div class="flex flex-col italic bg-[#131320] border-2 border-[#28B8FF] rounded-xl items-center px-20 py-12">
                <p class="font-semibold text-2xl">“If A Man Empties His Purse Into His</p>
                <p class="font-semibold text-2xl">Head, No Man Can Take It Away”</p>
                <p class="font-light text-xl mt-12">~ Benjamin Franklin ~</p>
            </div>
        </section>
    </main>
    <footer class="px-28 py-14 space-y-6 bg-[#14131F] border-t-2 border-[#28B8FF]">
        <img src="{{ asset('logo.png') }}" alt="Logo">
        <div class="flex justify-between items-center">
            <div class="space-y-3">
                <p class="text-white">tanya@cryon.com</p>
                <p class="text-white">+62 810 5105 51 (WA Only)</p>
            </div>
            <div class="space-y-3">
                <p class="text-white font-semibold">Crypto Education</p>
                <p class="text-white">Copyright © 2024 All Rights Reserved</p>
            </div>
        </div>
    </footer>
</body>

</html>
