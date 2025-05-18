<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Form Pendaftaran</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-r from-red-100 via-red-50 to-red-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg border-2 border-red-300 w-full max-w-md transition-shadow duration-300 hover:shadow-2xl">
        <h1 class="text-3xl font-extrabold mb-6 text-red-700 tracking-wide">Form Pendaftaran</h1>

        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.post') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="name" class="block mb-2 font-semibold text-gray-700">Nama</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required class="w-full border border-gray-300 rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-red-400 transition duration-300" />
            </div>
            <div class="mb-6">
                <label for="email" class="block mb-2 font-semibold text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required class="w-full border border-gray-300 rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-red-400 transition duration-300" />
            </div>
            <div class="mb-6">
                <label for="password" class="block mb-2 font-semibold text-gray-700">Password</label>
                <input type="password" name="password" id="password" required class="w-full border border-gray-300 rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-red-400 transition duration-300" />
            </div>
            <div class="mb-6">
                <label for="password_confirmation" class="block mb-2 font-semibold text-gray-700">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required class="w-full border border-gray-300 rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-red-400 transition duration-300" />
            </div>
            <button type="submit" class="bg-gradient-to-r from-red-600 to-red-700 text-white px-6 py-3 rounded-lg font-semibold shadow-md hover:from-red-700 hover:to-red-800 transition duration-300">Daftar</button>
        </form>
        <p class="mt-6 text-sm text-gray-600">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-red-600 font-semibold underline hover:text-red-800 transition duration-300">Login di sini</a>
        </p>
    </div>
</body>
</html>
