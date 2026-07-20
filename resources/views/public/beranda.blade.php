<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Div's Blog</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🌸</text></svg>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;1,500&family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        .font-serif-custom {
            font-family: 'Playfair Display', serif;
        }

        .font-script {
            font-family: 'Dancing Script', cursive;
        }
    </style>
</head>

<body class="bg-white">

    <nav class="bg-white border-b border-primary-50 p-4 sticky top-0 z-50">
        <div style="font-family: 'Playfair Display', serif;" class="max-w-6xl mx-auto flex justify-between items-center">
            <a href="{{ route('beranda') }}" class="font-bold text-lg text-primary-600/80 tracking-wide">DIVA NADYA PUTRI</a>
            <div>
                @auth
                <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-primary-500 transition text-sm">Dashboard</a>
                @else
                <a href="{{ route('login') }}" class="text-primary-500 hover:text-gray-600 transition mr-4 text-sm">Login</a>
                <a href="{{ route('register') }}" class="text-primary-500 hover:text-gray-600 transition text-sm">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <div class="relative bg-gradient-to-br from-primary-200 via-primary-300 to-primary-100 px-4 py-24 text-center overflow-hidden">
        <div class="absolute inset-0 opacity-20" style="background: radial-gradient(circle at 20% 30%, white 0%, transparent 40%), radial-gradient(circle at 80% 70%, white 0%, transparent 35%);"></div>
        <p class="font-script relative text-primary-800 text-xs tracking-[0.3em] mb-3">SELAMAT DATANG DI</p>
        <h1 class="font-serif-custom relative text-5xl md:text-6xl text-white mb-4 drop-shadow-sm">DIVA'S BLOG</h1>
        <p style="font-family: 'Playfair Display', serif;" class="relative text-primary-800 max-w-3xl mx-auto text-sm md:text-base">
            Your Go-To Space For Beauty, Fashion, Coffee, CafÉ Hops & Little Moments That Make Life Beautiful.
        </p>
    </div>

    <!-- Browse categories -->
    <div class="bg-primary-50/60 border-b border-primary-100 py-5 px-4">
        <div class="max-w-6xl mx-auto flex flex-wrap items-center justify-center gap-x-8 gap-y-2">
            <span class="font-script text-2xl text-primary-500 mr-2">Jelajahi blog</span>
            @foreach ($categories->take(5) as $cat)
            <a style="font-family: 'Playfair Display', serif;" href="{{ route('beranda', ['category' => $cat->id]) }}"
                class="text-xs tracking-wider text-gray-600 hover:text-primary-500 transition uppercase">
                {{ $cat->name }}
            </a>
            @endforeach
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-4 py-14">

        <form method="GET" action="{{ route('beranda') }}" class="flex gap-3 mb-14 max-w-md mx-auto">
            <input type="text" name="search" placeholder="Cari judul artikel..." value="{{ request('search') }}"
                class="border-gray-200 rounded-full flex-1 text-sm focus:border-primary-400 focus:ring focus:ring-primary-100 transition">
            <button type="submit"
                class="bg-primary-500 hover:bg-primary-600 text-white px-6 rounded-full text-sm transition">
                Cari
            </button>
        </form>

        @php
        $featured = $articles->first();
        $rest = $articles->skip(1);
        @endphp

        @if ($featured)
        <a href="{{ route('artikel.detail', $featured->slug) }}"
            class="group grid grid-cols-1 md:grid-cols-2 gap-0 mb-16 rounded-2xl overflow-hidden shadow-lg border border-gray-50">
            <div class="relative h-72 md:h-auto">
                @if ($featured->thumbnail)
                <img src="{{ asset('storage/' . $featured->thumbnail) }}" class="w-full h-full object-cover">
                @else
                <div class="w-full h-full bg-primary-50 flex items-center justify-center text-primary-300">Tidak ada gambar</div>
                @endif
                <span class="absolute top-4 left-4 bg-primary-500 text-white text-xs tracking-widest px-3 py-1.5 rounded-full">
                    TERBARU
                </span>
            </div>
            <div class="bg-primary-50/50 p-8 md:p-10 flex flex-col justify-center">
                <span class="text-xs tracking-widest text-primary-500 mb-3 uppercase">{{ $featured->category->name }}</span>
                <h2 class="font-serif-custom text-2xl md:text-3xl text-gray-800 mb-4 leading-snug group-hover:text-primary-600 transition">
                    {{ $featured->title }}
                </h2>
                <p class="text-sm text-gray-500 mb-6 leading-relaxed">
                    {{ Str::limit(strip_tags($featured->content), 140) }}
                </p>
                <span class="text-xs tracking-widest text-primary-600 font-semibold">BACA SELENGKAPNYA &rarr;</span>
            </div>
        </a>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-x-8 gap-y-12">
            @forelse ($rest as $article)
            <div>
                <a href="{{ route('artikel.detail', $article->slug) }}" class="group block">
                    <div class="relative mb-4 overflow-hidden rounded-xl">
                        @if ($article->thumbnail)
                        <img src="{{ asset('storage/' . $article->thumbnail) }}"
                            class="w-full h-52 object-cover group-hover:scale-105 transition duration-300">
                        @else
                        <div class="w-full h-52 bg-primary-50 flex items-center justify-center text-primary-300 text-sm">
                            Tidak ada gambar
                        </div>
                        @endif
                    </div>
                    <span class="text-xs tracking-widest text-primary-500 uppercase">{{ $article->category->name }}</span>
                    <h3 class="font-serif-custom text-lg text-gray-800 mt-2 mb-2 leading-snug group-hover:text-primary-600 transition">
                        {{ $article->title }}
                    </h3>
                </a>
                <p class="text-sm text-gray-500 mb-3 leading-relaxed">
                    {{ Str::limit(strip_tags($article->content), 85) }}
                </p>
                <a href="{{ route('artikel.detail', $article->slug) }}"
                    class="text-xs tracking-widest text-primary-600 font-semibold hover:text-primary-700">
                    BACA SELENGKAPNYA &rarr;
                </a>
            </div>
            @empty
            @if (!$featured)
            <p class="col-span-3 text-center text-gray-400 py-12">Belum ada artikel yang dipublikasikan.</p>
            @endif
            @endforelse
        </div>

    </div>

    <footer class="border-t border-gray-100 py-10 text-center">
        <p class="font-script text-3xl text-primary-500 mb-2">Diva Nadya Putri</p>
        <p class="text-xs text-gray-400 tracking-wider">&copy; {{ date('Y') }} — dibuat dengan Laravel</p>
    </footer>

</body>

</html>