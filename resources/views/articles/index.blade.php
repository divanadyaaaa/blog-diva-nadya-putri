<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif-custom text-center text-2xl text-primary-500 leading-tight">
            Artikel Saya
        </h2>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;1,500&display=swap');

        .font-serif-custom {
            font-family: 'Playfair Display', serif;
        }
    </style>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
            <div class="bg-primary-50 text-primary-600 px-4 py-3 rounded-xl mb-6 text-sm">
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white rounded-2xl shadow-sm border border-primary-50 p-6">

                <div class="flex items-center justify-between mb-6">
                    <h3 class="font-serif-custom text-lg text-gray-800">
                        {{ $articles->count() }} Artikel
                    </h3>
                    <a href="{{ route('articles.create') }}"
                        class="bg-primary-500 hover:bg-primary-600 text-white px-5 py-2.5 rounded-full text-sm transition">
                        + Tulis Artikel
                    </a>
                </div>

                @forelse ($articles as $article)
                <div class="flex items-center justify-between py-4 gap-4 {{ !$loop->last ? 'border-b border-gray-50' : '' }}">
                    <div class="flex items-center gap-4 min-w-0">
                        @if ($article->thumbnail)
                        <img src="{{ asset('storage/' . $article->thumbnail) }}"
                            alt="{{ $article->title }}" class="w-16 h-16 rounded-xl object-cover shrink-0">
                        @else
                        <div class="w-16 h-16 rounded-xl bg-primary-50 flex items-center justify-center text-primary-300 text-lg shrink-0">
                            🌸
                        </div>
                        @endif
                        <div class="min-w-0">
                            <p class="font-serif-custom text-base text-gray-800 truncate">{{ $article->title }}</p>
                            <p class="text-xs text-gray-400 mt-1">
                                {{ $article->category->name }} &middot; {{ $article->created_at->format('d M Y') }}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 shrink-0">
                        @if ($article->status == 'published')
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">Published</span>
                        @else
                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs">Draft</span>
                        @endif

                        <a href="{{ route('articles.edit', $article->id) }}"
                            class="text-primary-600 hover:text-primary-700 text-sm">Edit</a>

                        <form action="{{ route('articles.destroy', $article->id) }}"
                            method="POST" onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-600 text-sm">Hapus</button>
                        </form>
                    </div>
                </div>
                @empty
                <p class="text-sm text-gray-400 text-center py-10">
                    Belum ada artikel. Yuk mulai menulis!
                </p>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>