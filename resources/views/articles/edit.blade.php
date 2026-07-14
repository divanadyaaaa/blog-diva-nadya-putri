<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Artikel
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form method="POST" action="{{ route('articles.update', $article->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="title" class="block font-medium text-sm text-gray-700">Judul Artikel</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $article->title) }}"
                            class="border-gray-300 rounded-md shadow-sm focus:border-primary-400 focus:ring focus:ring-primary-200 focus:ring-opacity-50 transition w-full mt-1">
                        @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="category_id" class="block font-medium text-sm text-gray-700">Kategori</label>
                        <select name="category_id" id="category_id"
                            class="border-gray-300 rounded-md shadow-sm focus:border-primary-400 focus:ring focus:ring-primary-200 focus:ring-opacity-50 transition w-full mt-1">
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

                    <div class="mb-4">
                        <label for="content" class="block font-medium text-sm text-gray-700">Konten</label>
                        <textarea name="content" id="content" rows="8"
                            class="border-gray-300 rounded-md shadow-sm focus:border-primary-400 focus:ring focus:ring-primary-200 focus:ring-opacity-50 transition w-full mt-1">{{ old('content', $article->content) }}</textarea>
                        @error('content')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Thumbnail Saat Ini</label>
                        @if ($article->thumbnail)
                        <img src="{{ asset('storage/' . $article->thumbnail) }}"
                            class="w-24 h-24 object-cover rounded mt-1 mb-2">
                        @else
                        <p class="text-gray-400 text-sm mb-2">Belum ada thumbnail.</p>
                        @endif
                        <label for="thumbnail" class="block font-medium text-sm text-gray-700">Ganti Thumbnail (opsional)</label>
                        <input type="file" name="thumbnail" id="thumbnail" class="mt-1">
                        @error('thumbnail')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="status" class="block font-medium text-sm text-gray-700">Status</label>
                        <select name="status" id="status"
                            class="border-gray-300 rounded-md shadow-sm focus:border-primary-400 focus:ring focus:ring-primary-200 focus:ring-opacity-50 transition w-full mt-1">
                            <option value="draft" @selected(old('status', $article->status) == 'draft')>Draft</option>
                            <option value="published" @selected(old('status', $article->status) == 'published')>Publikasikan</option>
                        </select>
                        @error('status')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit"
                            class="bg-primary-500 hover:bg-primary-600 text-white px-4 py-2 rounded-md transition">
                            Update
                        </button>
                        <a href="{{ route('articles.index') }}" class="text-gray-600">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>