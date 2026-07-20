<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif-custom text-center text-2xl text-primary-500 leading-tight">
            Kategori Saya
        </h2>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;1,500&display=swap');

        .font-serif-custom {
            font-family: 'Playfair Display', serif;
        }
    </style>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
            <div class="bg-primary-50 text-primary-600 px-4 py-3 rounded-xl mb-6 text-sm">
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white rounded-2xl shadow-sm border border-primary-50 p-6">

                <div class="flex items-center justify-between mb-6">
                    <h3 class="font-serif-custom text-lg text-gray-800">
                        {{ $categories->count() }} Kategori
                    </h3>
                    <a href="{{ route('categories.create') }}"
                        class="bg-primary-500 hover:bg-primary-600 text-white px-5 py-2.5 rounded-full text-sm transition">
                        + Tambah Kategori
                    </a>
                </div>

                @forelse ($categories as $category)
                <div class="flex items-start justify-between gap-4 py-4 {{ !$loop->last ? 'border-b border-gray-50' : '' }}">
                    <div class="flex items-start gap-4 min-w-0">
                        <div class="w-11 h-11 rounded-full bg-primary-50 flex items-center justify-center text-primary-400 text-lg shrink-0">
                            🏷️
                        </div>
                        <div class="min-w-0">
                            <div class="flex items-center gap-2 flex-wrap">
                                <p class="font-serif-custom text-base text-gray-800">{{ $category->name }}</p>
                                <span class="text-[11px] bg-primary-50 text-primary-500 px-2 py-0.5 rounded-full">
                                    {{ $category->slug }}
                                </span>
                            </div>
                            <p class="text-sm text-gray-500 mt-1 leading-relaxed">
                                {{ $category->description ?: 'Belum ada deskripsi.' }}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 shrink-0">
                        <a href="{{ route('categories.edit', $category->id) }}"
                            class="text-primary-600 hover:text-primary-700 text-sm">Edit</a>

                        <form action="{{ route('categories.destroy', $category->id) }}"
                            method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-600 text-sm">Hapus</button>
                        </form>
                    </div>
                </div>
                @empty
                <p class="text-sm text-gray-400 text-center py-10">
                    Belum ada kategori. Yuk buat kategori pertamamu! 🌸
                </p>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>