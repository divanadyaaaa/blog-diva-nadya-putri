<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>{{ $article->title }} - Diva's Blog</title>
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

    <!-- Header artikel -->
    <div class="relative bg-gradient-to-br from-primary-200 via-primary-300 to-primary-100 px-4 py-16 text-center overflow-hidden">
        <div class="absolute inset-0 opacity-20" style="background: radial-gradient(circle at 20% 30%, white 0%, transparent 40%), radial-gradient(circle at 80% 70%, white 0%, transparent 35%);"></div>
        <span class="relative inline-block bg-white/90 text-primary-600 text-xs tracking-widest px-4 py-1.5 rounded-full mb-4 uppercase">
            {{ $article->category->name }}
        </span>
        <h1 class="font-serif-custom relative text-3xl md:text-5xl text-white mb-4 drop-shadow-sm max-w-3xl mx-auto leading-tight">
            {{ $article->title }}
        </h1>
        <p style="font-family: 'Lora', serif;" class="relative text-primary-800 text-sm">
            Oleh {{ $article->user->name }} &middot; {{ $article->created_at->format('d M Y') }}
        </p>
    </div>

    <div class="max-w-3xl mx-auto px-4 py-14">

        <a href="{{ route('beranda') }}"
            class="text-xs tracking-widest text-primary-600 font-semibold hover:text-primary-700 mb-8 inline-block">
            &larr; KEMBALI KE BERANDA
        </a>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-50 overflow-hidden">
            @if ($article->thumbnail)
            <img src="{{ asset('storage/' . $article->thumbnail) }}" class="w-full h-72 md:h-96 object-cover">
            @endif

            <div class="p-8 md:p-10">
                <div style="font-family: 'Playfair Display', serif;" class="prose max-w-none text-gray-700 leading-relaxed text-[15px]">
                    {!! nl2br(e($article->content)) !!}
                </div>

                <hr class="my-10 border-primary-50">

                <h3 class="font-serif-custom text-xl text-gray-800 mb-6">
                    Komentar ({{ $article->comments->count() }})
                </h3>

                @if (session('success'))
                <div class="bg-primary-50 text-primary-600 px-4 py-3 rounded-xl mb-6 text-sm">
                    {{ session('success') }}
                </div>
                @endif

                <div class="space-y-4 mb-8">
                    @forelse ($article->comments->sortByDesc('created_at') as $comment)
                    <div class="bg-primary-50/40 p-4 rounded-xl border border-primary-50">
                        <p class="font-semibold text-sm text-gray-800">{{ $comment->name }}</p>
                        <p class="text-sm text-gray-600 mt-1">{{ $comment->comment }}</p>
                        <p class="text-xs text-gray-400 mt-2">{{ $comment->created_at->diffForHumans() }}</p>
                    </div>
                    @empty
                    <p class="text-sm text-gray-400">Belum ada komentar. Jadilah yang pertama!</p>
                    @endforelse
                </div>

                <form method="POST" action="{{ route('comments.store', $article->id) }}">
                    @csrf

                    <div class="mb-3">
                        <input type="text" name="name" placeholder="Nama kamu" value="{{ old('name') }}"
                            class="border-gray-200 rounded-xl shadow-sm focus:border-primary-400 focus:ring focus:ring-primary-100 transition w-full text-sm">
                        @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <textarea name="comment" rows="3" placeholder="Tulis komentar..."
                            class="border-gray-200 rounded-xl shadow-sm focus:border-primary-400 focus:ring focus:ring-primary-100 transition w-full text-sm">{{ old('comment') }}</textarea>
                        @error('comment')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="bg-primary-500 hover:bg-primary-600 text-white px-6 py-2.5 rounded-full text-sm transition">
                        Kirim Komentar
                    </button>
                </form>
            </div>
        </div>

    </div>

    <footer class="border-t border-gray-100 py-10 text-center">
        <p class="font-script text-3xl text-primary-500 mb-2">Diva Nadya Putri</p>
        <p class="text-xs text-gray-400 tracking-wider">&copy; {{ date('Y') }} — dibuat dengan Laravel</p>
    </footer>

</body>

</html>