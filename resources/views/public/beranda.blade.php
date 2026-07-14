<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Diva's Blog</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    <nav class="bg-white shadow p-4 mb-6">
        <div class="max-w-5xl mx-auto flex justify-between items-center">
            <a href="{{ route('beranda') }}" class="font-bold text-lg text-primary-500">Blog Diva Nadya Putri</a>
            <div>
                @auth
                <a href="{{ route('dashboard') }}" class="text-gray-700">Dashboard</a>
                @else
                <a href="{{ route('login') }}" class="text-gray-700 mr-4">Login</a>
                <a href="{{ route('register') }}" class="text-gray-700">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="max-w-5xl mx-auto px-4">

        <form method="GET" action="{{ route('beranda') }}" class="flex gap-3 mb-6">
            <input type="text" name="search" placeholder="Cari judul artikel..." value="{{ request('search') }}"
                class="border-gray-300 rounded-md shadow-sm flex-1">

            <select name="category" class="border-gray-300 rounded-md shadow-sm">
                <option value="">Semua Kategori</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(request('category')==$category->id)>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>

            <button type="submit" class="bg-primary-500 hover:bg-primary-600 text-white px-4 py-2 rounded-md transition">Cari</button>
        </form>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse ($articles as $article)
            <a href="{{ route('artikel.detail', $article->slug) }}"
                class="bg-white rounded-lg shadow overflow-hidden block hover:shadow-md">
                @if ($article->thumbnail)
                <img src="{{ asset('storage/' . $article->thumbnail) }}"
                    class="w-full h-40 object-cover">
                @else
                <div class="w-full h-40 bg-gray-200 flex items-center justify-center text-gray-400">
                    Tidak ada gambar
                </div>
                @endif
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-1">{{ $article->title }}</h3>
                    <p class="text-sm text-gray-500 mb-2">
                        {{ $article->category->name }} • {{ $article->user->name }}
                    </p>
                    <p class="text-xs text-gray-400">{{ $article->created_at->format('d M Y') }}</p>
                </div>
            </a>
            @empty
            <p class="col-span-3 text-center text-gray-500">Belum ada artikel yang dipublikasikan.</p>
            @endforelse
        </div>

    </div>

</body>

</html>