<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🌸</text></svg>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;1,500&family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .font-serif-custom {
            font-family: 'Playfair Display', serif;
        }

        .font-script {
            font-family: 'Dancing Script', cursive;
        }
    </style>
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative overflow-hidden bg-gradient-to-br from-primary-200 via-primary-100 to-white">
        <div class="absolute inset-0 opacity-30" style="background: radial-gradient(circle at 15% 20%, white 0%, transparent 40%), radial-gradient(circle at 85% 80%, white 0%, transparent 35%);"></div>

        <div class="relative flex flex-col items-center mb-2">
            <div class=" w-16 h-16 rounded-full flex items-center justify-center text-3xl shadow-sm mb-3">
                🌸
            </div>
            <a href="{{ route('beranda') }}" class="font-serif-custom text-3xl text-primary-600">LOGIN</a>
        </div>

        <div class="relative w-full sm:max-w-md mt-6 px-8 py-8 bg-white shadow-xl overflow-hidden rounded-3xl border border-primary-50">
            {{ $slot }}
        </div>
    </div>
</body>

</html>