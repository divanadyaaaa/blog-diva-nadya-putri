<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif-custom text-center text-2xl text-primary-500 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;1,500&family=Dancing+Script:wght@600&display=swap');

        .font-serif-custom {
            font-family: 'Playfair Display', serif;
        }

        .font-script {
            font-family: 'Dancing Script', cursive;
        }
    </style>

    @php
    $totalArtikel = \App\Models\Article::where('user_id', auth()->id())->count();
    $totalPublished = \App\Models\Article::where('user_id', auth()->id())->where('status', 'published')->count();
    $totalKategori = \App\Models\Category::where('user_id', auth()->id())->count();
    $recentArticles = \App\Models\Article::where('user_id', auth()->id())->latest()->take(5)->get();
    @endphp

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Banner sambutan -->
            <div class="relative rounded-2xl shadow-sm p-8 mb-8 text-white overflow-hidden bg-gradient-to-br from-primary-400 via-primary-500 to-primary-400">
                <div class="absolute inset-0 opacity-20" style="background: radial-gradient(circle at 15% 20%, white 0%, transparent 40%), radial-gradient(circle at 85% 80%, white 0%, transparent 35%);"></div>
                <p class="relative font-script text-3xl mb-1">Halo, {{ auth()->user()->name }} ˚˖𓍢✧˚. </p>
                <p class="font-serif-custom text-primary-50 text-sm max-w-2xl">
                    Welcome back! Siap menulis hari ini? Kelola artikel, atur kategori, dan bagikan ide-idemu.
                </p>
            </div>

            <!-- Statistik -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mb-8">
                <div class="bg-white rounded-2xl shadow-sm border border-primary-50 p-6 text-center">
                    <p class="font-serif-custom text-4xl text-primary-500 mb-1">{{ $totalArtikel }}</p>
                    <p class="text-xs tracking-widest text-gray-500 uppercase">Total Artikel</p>
                </div>
                <div class="bg-white rounded-2xl shadow-sm border border-primary-50 p-6 text-center">
                    <p class="font-serif-custom text-4xl text-primary-500 mb-1">{{ $totalPublished }}</p>
                    <p class="text-xs tracking-widest text-gray-500 uppercase">Sudah Dipublikasikan</p>
                </div>
                <div class="bg-white rounded-2xl shadow-sm border border-primary-50 p-6 text-center">
                    <p class="font-serif-custom text-4xl text-primary-500 mb-1">{{ $totalKategori }}</p>
                    <p class="text-xs tracking-widest text-gray-500 uppercase">Total Kategori</p>
                </div>
            </div>

            <!-- Menu cepat -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">

                <a href="{{ route('articles.index') }}"
                    class="group bg-white rounded-2xl shadow-sm p-6 hover:shadow-lg transition border border-primary-50 flex items-center gap-4">
                    <div class="bg-primary-50 p-3.5 rounded-full group-hover:bg-primary-100 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-serif-custom text-lg text-gray-800">Kelola Artikel</h4>
                        <p class="text-sm text-gray-500">Tulis, edit, atau hapus artikelmu</p>
                    </div>
                </a>

                <a href="{{ route('categories.index') }}"
                    class="group bg-white rounded-2xl shadow-sm p-6 hover:shadow-lg transition border border-primary-50 flex items-center gap-4">
                    <div class="bg-primary-50 p-3.5 rounded-full group-hover:bg-primary-100 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-serif-custom text-lg text-gray-800">Kelola Kategori</h4>
                        <p class="text-sm text-gray-500">Atur kategori artikelmu</p>
                    </div>
                </a>

            </div>

            <!-- Artikel terbaru -->
            <div class="bg-white rounded-2xl shadow-sm border border-primary-50 p-6">
                <h4 class="font-serif-custom text-lg text-gray-800 mb-4">Artikel Terbaru</h4>

                @forelse ($recentArticles as $article)
                <div class="flex items-center justify-between py-3 {{ !$loop->last ? 'border-b border-gray-50' : '' }}">
                    <div class="flex items-center gap-3">
                        @if ($article->thumbnail)
                        <img src="{{ asset('storage/' . $article->thumbnail) }}" class="w-12 h-12 rounded-lg object-cover">
                        @else
                        <div class="w-12 h-12 rounded-lg bg-primary-50 flex items-center justify-center text-primary-300 text-xs">🌸</div>
                        @endif
                        <div>
                            <p class="text-sm font-medium text-gray-800">{{ $article->title }}</p>
                            <p class="text-xs text-gray-400">{{ $article->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    @if ($article->status == 'published')
                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">Published</span>
                    @else
                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs">Draft</span>
                    @endif
                </div>
                @empty
                <p class="text-sm text-gray-400 text-center py-6">Belum ada artikel. Yuk mulai menulis! 🌸</p>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>