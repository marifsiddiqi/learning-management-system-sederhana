<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Manage Materi</title>
</head>

<body class="w-full h-full bg-[#181727] text-white">
    <header class="flex w-full justify-between items-center px-12 py-6 mb-12">
        <img src="{{ asset('logo.png') }}" alt="Logo">
        <div class="flex space-x-6 items-center">
            <p class="text-white font-medium italic">Hai, <span class="font-bold">Admin</span></p>
            <a href="/dashboard" class="font-bold">Home</a>
            <a href="/manage-education" class="text-[#28B8FF] font-bold">Manage Education</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="font-bold border-2 border-red-400 rounded-xl px-4 py-2 text-red-400 hover:bg-red-400 hover:text-white">Logout</button>
            </form>
        </div>
    </header>
    <main>
        <section class="flex flex-col items-center px-28 pb-44 space-y-16">
            <div class="w-[95%] flex justify-between items-center">
                <div class="flex justify-center items-center space-x-3">
                    <a href="/manage-education" class="flex justify-center items-center h-fit px-3 py-1.5 bg-red-500 rounded-lg space-x-2 hover:bg-red-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="m4 10l-.707.707L2.586 10l.707-.707zm17 8a1 1 0 1 1-2 0zM8.293 15.707l-5-5l1.414-1.414l5 5zm-5-6.414l5-5l1.414 1.414l-5 5zM4 9h10v2H4zm17 7v2h-2v-2zm-7-7a7 7 0 0 1 7 7h-2a5 5 0 0 0-5-5z" />
                        </svg>
                        {{-- <p class="font-bold"">Kembali</p> --}}
                    </a>
                    <h1 class="text-5xl font-semibold">Manage Materi</h1>
                </div>
                <a href="/manage-materi/create/{{ $id_course }}"
                    class="flex justify-center items-center h-fit px-3 py-2 bg-green-500 rounded-lg space-x-2 hover:bg-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                        <g fill="none" fill-rule="evenodd">
                            <path
                                d="M24 0v24H0V0zM12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036c-.01-.003-.019 0-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z" />
                            <path fill="currentColor"
                                d="M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v4h4a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-4v4a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-4H5a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h4z" />
                        </g>
                    </svg>
                    <p class="font-bold">Tambah Course</p>
                </a>
            </div>
            <div class="flex justify-center">
                <table class="table-auto w-[95%] border-separate bg-[#28B8FF] rounded-md">
                    <thead>
                        <tr>
                            <th scope="col" class="py-3">No</th>
                            <th scope="col" class="py-3 w-1/6">Gambar</th>
                            <th scope="col" class="py-3 w-1/6">Nama</th>
                            <th scope="col" class="py-3 w-3/6">Deskripsi</th>
                            <th scope="col" class="py-3 w-fit">Tanggal Dibuat</th>
                            <th scope="col" class="py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-[#181727]">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($materis as $materi)
                            <tr>
                                <td scope="row" class="">
                                    <div class="w-full flex justify-center p-3">
                                        <p class="flex w-full justify-center p-3">
                                            {{ $no++ }}
                                        </p>
                                    </div>
                                </td>
                                <td scope="row" class="">
                                    <div class="w-full flex justify-center p-3">
                                        <img src="{{ asset('materi_course/' . $materi->gambar_materi) }}" alt="Gambar Materi"
                                            class="w-48 rounded-md">
                                    </div>
                                </td>
                                <td scope="row" class="">
                                    <p class="flex w-full justify-center p-3">
                                        {{ $materi->nama_materi }}
                                    </p>
                                </td>
                                <td scope="row">
                                    <div class="flex flex-col w-full justify-center p-3 text-justify leading-7 indent-10">
                                        {!! $materi->isi_materi !!}</div>
                                </td>
                                <td scope="row">
                                    <p class="flex w-full justify-center p-3">
                                        {{ \Carbon\Carbon::parse($materi->created_at)->format('d-m-Y / H:i') }}</p>
                                </td>
                                <td scope="row">
                                    <div class="flex justify-center items-center p-3 space-x-2">
                                        <a href="/manage-materi/edit/{{ $id_course }}/{{ $materi->id }}"
                                            class="flex justify-center items-center bg-blue-500 px-3 py-1.5 space-x-1.5 rounded-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="m18.988 2.012l3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287l-3-3L8 13z" />
                                                <path fill="currentColor"
                                                    d="M19 19H8.158c-.026 0-.053.01-.079.01c-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2z" />
                                            </svg>
                                            <p>Edit</p>
                                        </a>
                                        <form action="/manage-materi/delete/{{ $id_course }}/{{ $materi->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="flex justify-center items-center bg-red-500 px-3 py-1.5 space-x-1 rounded-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M19 4h-3.5l-1-1h-5l-1 1H5v2h14M6 19a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7H6z" />
                                                </svg>
                                                <p>Hapus</p>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
