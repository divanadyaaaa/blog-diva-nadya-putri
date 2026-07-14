<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>{{ $article->title }} - Blog Pribadi</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    <nav class="bg-white shadow p-4 mb-6">
        <div class="max-w-3xl mx-auto flex justify-between items-center">
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

    <div class="max-w-3xl mx-auto px-4 pb-12">

        <a href="{{ route('beranda') }}" class="text-sm text-gray-500 mb-4 inline-block">&larr; Kembali ke Beranda</a>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            @if ($article->thumbnail)
            <img src="{{ asset('storage/' . $article->thumbnail) }}" class="w-full h-64 object-cover">
            @endif

            <div class="p-6">
                <h1 class="text-2xl font-bold mb-2">{{ $article->title }}</h1>
                <p class="text-sm text-gray-500 mb-6">
                    Oleh {{ $article->user->name }} • {{ $article->category->name }} •
                    {{ $article->created_at->format('d M Y') }}
                </p>

                <div class="prose max-w-none">
                    {!! nl2br(e($article->content)) !!}
                </div>

                <hr class="my-6">

                <h3 class="font-semibold text-lg mb-4">
                    Komentar ({{ $article->comments->count() }})
                </h3>

                @if (session('success'))
                <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
                @endif

                <div class="space-y-4 mb-6">
                    @forelse ($article->comments->sortByDesc('created_at') as $comment)
                    <div class="bg-gray-50 p-3 rounded">
                        <p class="font-medium text-sm">{{ $comment->name }}</p>
                        <p class="text-sm text-gray-600">{{ $comment->comment }}</p>
                        <p class="text-xs text-gray-400 mt-1">{{ $comment->created_at->diffForHumans() }}</p>
                    </div>
                    @empty
                    <p class="text-sm text-gray-400">Belum ada komentar. Jadilah yang pertama!</p>
                    @endforelse
                </div>

                <form method="POST" action="{{ route('comments.store', $article->id) }}">
                    @csrf

                    <div class="mb-3">
                        <input type="text" name="name" placeholder="Nama kamu" value="{{ old('name') }}"
                            class="border-gray-300 rounded-md shadow-sm focus:border-primary-400 focus:ring focus:ring-primary-200 focus:ring-opacity-50 transition w-full">
                        @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <textarea name="comment" rows="3" placeholder="Tulis komentar..."
                            class="border-gray-300 rounded-md shadow-sm focus:border-primary-400 focus:ring focus:ring-primary-200 focus:ring-opacity-50 transition w-full">{{ old('comment') }}</textarea>
                        @error('comment')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="bg-primary-500 hover:bg-primary-600 text-white px-4 py-2 rounded-md transition">
                        Kirim Komentar
                    </button>
                </form>
            </div>
        </div>

    </div>

</body>

</html>