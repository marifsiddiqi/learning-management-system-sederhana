<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Dashboard</title>
</head>

<body class="w-full h-full bg-[#181727] text-white">
    <header class="flex w-full justify-between items-center px-12 py-6 mb-12">
        <img src="{{ asset('logo.png') }}" alt="Logo">
        <div class="flex space-x-6 items-center">
            <p class="text-white font-medium italic">Hai, <span class="font-bold">Admin</span></p>
            <a href="/dashboard" class="text-[#28B8FF] font-bold">Home</a>
            <a href="/manage-education"
                class="bg-gradient-to-r from-[#7C6CFB] from-10% to-[#28B8FF] to-100% px-4 py-2 text-white font-bold rounded-lg">Manage
                Education</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="font-bold border-2 border-red-400 rounded-xl px-4 py-2 text-red-400 hover:bg-red-400 hover:text-white">Logout</button>
            </form>
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
        <section class="flex flex-col text-white items-center my-32">
            <p class="text-lg mb-3">Kurikulum Program</p>
            <h1 class="text-5xl font-semibold mb-20">Edukasi</h1>
            <div class="flex flex-col items-center px-44 space-y-20">
                @foreach ($course as $courses)
                    <div class="flex space-x-32 items-start">
                        <img class="w-[464px] rounded-2xl border-4 border-white"
                            src="{{ asset('course/' . $courses->gambar_course) }}" alt="Gambar Course">
                        <div class="space-y-9">
                            <h1 class="text-4xl font-medium">{{ $courses->nama_course }}</h1>
                            <p class="text-justify">{{ $courses->deskripsi_course }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="bg-gradient-to-r from-[#7C6CFB] from-10% to-[#28B8FF] to-100% px-12 py-2 text-white font-bold rounded-lg mt-32"
                href="/manage-education">Open LMS</a>
        </section>
        <section class="flex flex-col items-center my-64">
            <div
                class="flex flex-col italic bg-[#131320] border-2 border-[#28B8FF] rounded-xl items-center px-20 py-12">
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
