<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
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
        <section class="px-28 pt-6">
            <div class="max-w-4xl mx-auto bg-white text-black p-8 rounded-lg shadow-lg border-2 border-[#28B8FF]">
                <h2 class="text-2xl font-bold mb-6">Edit Materi</h2>
                <form action="/manage-materi/edit/{{ $id_course }}/{{ $materi->id }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="nama_materi" class="block font-medium text-gray-700">Nama Materi</label>
                        <input required type="text" name="nama_materi" id="nama_materi" value="{{ $materi->nama_materi }}"
                            class="mt-1 px-2 py-1.5 block w-full border-gray-300 rounded-md shadow-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div class="mb-4">
                        <label for="gambar_materi" class="block font-medium text-gray-700">Gambar Materi</label>
                        <input type="file" name="gambar_materi" id="gambar_materi" accept=".jpg, .png, .jpeg" class="mt-1 px-2 py-1.5 block w-full border-gray-300 rounded-md shadow-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div class="mb-4">
                        <label for="isi_materi" class="block font-medium text-gray-700">Isi Materi</label>
                        <textarea required name="isi_materi" id="isi_materi" rows="4"
                            class="mt-1 px-2 py-1.5 block w-full border-gray-300 rounded-md shadow-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ $materi->isi_materi }}</textarea>
                    </div>
                    <div class="flex items-center space-x-3 mt-6">
                        <a href="/manage-materi/{{ $id_course }}"
                            class="px-4 py-2 bg-red-600 text-white font-semibold rounded-md shadow hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75">Kembali</a>
                        <button type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-opacity-75">Submit</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    {{-- <script>
        $(document).ready(function() {
            $('#deskripsi_course').summernote();
        });
    </script> --}}

    <script>
        $('#isi_materi').summernote({
            placeholder: 'Tuliskan isi materi disini',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear', 'italic']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>

</body>

</html>
