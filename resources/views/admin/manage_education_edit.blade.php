<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Manage Education</title>
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
        <section class="px-28 py-14">
            <div class="max-w-4xl mx-auto bg-white text-black p-8 rounded-lg shadow-lg border-2 border-[#28B8FF]">
                <h2 class="text-2xl font-bold mb-6">Edit Course</h2>
                <form action="/manage-education/edit/{{ $course->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="nama_course" class="block font-medium text-gray-700">Nama Course</label>
                        <input required type="text" name="nama_course" id="nama_course" value="{{ $course->nama_course }}" class="mt-1 px-2 py-1.5 block w-full border-gray-300 rounded-md shadow-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div class="mb-4">
                        <label for="gambar_course" class="block font-medium text-gray-700">Gambar Course</label>
                        <input type="file" name="gambar_course" id="gambar_course" accept=".jpg, .png, .jpeg" class="mt-1 px-2 py-1.5 block w-full border-gray-300 rounded-md shadow-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div class="mb-4">
                        <label for="deskripsi_course" class="block font-medium text-gray-700">Deskripsi Course</label>
                        <textarea required name="deskripsi_course" id="deskripsi_course" rows="4" class="mt-1 px-2 py-1.5 block w-full border-gray-300 rounded-md shadow-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ $course->deskripsi_course }}</textarea>
                    </div>
                    <div class="flex items-center space-x-3 mt-6">
                        <a href="/manage-education" class="px-4 py-2 bg-red-600 text-white font-semibold rounded-md shadow hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75">Kembali</a>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-opacity-75">Submit</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>

</html>
