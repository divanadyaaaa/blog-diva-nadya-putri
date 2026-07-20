<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif-custom text-center text-2xl text-primary-500 leading-tight">
            Edit Artikel
        </h2>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;1,500&display=swap');

        .font-serif-custom {
            font-family: 'Playfair Display', serif;
        }
    </style>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-sm border border-primary-50 p-8">

                <form method="POST" action="{{ route('articles.update', $article->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-5">
                        <label for="title" class="block font-medium text-sm text-gray-700 mb-1.5">Judul Artikel</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $article->title) }}"
                            class="border-gray-200 rounded-xl shadow-sm focus:border-primary-400 focus:ring focus:ring-primary-100 focus:ring-opacity-50 transition w-full">
                        @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="category_id" class="block font-medium text-sm text-gray-700 mb-1.5">Kategori</label>
                        <select name="category_id" id="category_id"
                            class="border-gray-200 rounded-xl shadow-sm focus:border-primary-400 focus:ring focus:ring-primary-100 focus:ring-opacity-50 transition w-full">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                @selected(old('category_id', $article->category_id) == $category->id)>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="content" class="block font-medium text-sm text-gray-700 mb-1.5">Konten</label>
                        <textarea name="content" id="content" rows="8"
                            class="border-gray-200 rounded-xl shadow-sm focus:border-primary-400 focus:ring focus:ring-primary-100 focus:ring-opacity-50 transition w-full">{{ old('content', $article->content) }}</textarea>
                        @error('content')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label class="block font-medium text-sm text-gray-700 mb-1.5">Thumbnail Saat Ini</label>
                        @if ($article->thumbnail)
                        <img src="{{ asset('storage/' . $article->thumbnail) }}"
                            class="w-24 h-24 object-cover rounded-xl mb-3">
                        @else
                        <p class="text-gray-400 text-sm mb-3">Belum ada thumbnail.</p>
                        @endif
                        <label for="thumbnail" class="block font-medium text-sm text-gray-700 mb-1.5">Ganti Thumbnail (opsional)</label>
                        <input type="file" name="thumbnail" id="thumbnail"
                            class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-primary-50 file:text-primary-600 hover:file:bg-primary-100 file:transition">
                        @error('thumbnail')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="status" class="block font-medium text-sm text-gray-700 mb-1.5">Status</label>
                        <select name="status" id="status"
                            class="border-gray-200 rounded-xl shadow-sm focus:border-primary-400 focus:ring focus:ring-primary-100 focus:ring-opacity-50 transition w-full">
                            <option value="draft" @selected(old('status', $article->status) == 'draft')>Draft</option>
                            <option value="published" @selected(old('status', $article->status) == 'published')>Publikasikan</option>
                        </select>
                        @error('status')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit"
                            class="bg-primary-500 hover:bg-primary-600 text-white px-6 py-2.5 rounded-full text-sm transition">
                            Update
                        </button>
                        <a href="{{ route('articles.index') }}" class="text-gray-500 hover:text-primary-600 text-sm transition">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>