<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Education</title>
</head>

<body class="w-full h-full bg-[#181727] text-white">
    <header class="flex w-full justify-between items-center px-12 py-6 mb-12">
        <img src="{{ asset('logo.png') }}" alt="Logo">
        <div class="flex space-x-6 items-center">
            <p class="text-white font-medium italic">Hai, <span class="font-bold">{{ $user->name }}</span></p>
            <a href="/home" class="font-bold">Home</a>
            <a href="/education" class="text-[#28B8FF] font-bold">Education</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="font-bold border-2 border-red-400 rounded-xl px-4 py-2 text-red-400 hover:bg-red-400 hover:text-white">Logout</button>
            </form>
        </div>
    </header>
    <main class="mb-20">
        <section class="flex flex-col items-center space-y-14">
            <h1 class="text-5xl font-semibold">ALL COURSE</h1>
            <div class="grid grid-cols-2 gap-20">
                @foreach ($course as $courses)
                    <a class="flex flex-col items-center justify-between space-y-3" href="education-detail/{{ $courses->id }}">
                        <img class="w-[464px] rounded-2xl border-4 border-white"
                            src="{{ asset('course/' . $courses->gambar_course) }}" alt="Gambar Course">
                        <h1 class="text-4xl font-medium">{{ $courses->nama_course }}</h1>
                    </a>
                @endforeach
            </div>
        </section>
    </main>
</body>

</html>
