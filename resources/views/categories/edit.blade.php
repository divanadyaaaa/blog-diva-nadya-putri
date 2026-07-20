<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif-custom text-center text-2xl text-primary-500 leading-tight">
            Edit Kategori
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
                <form method="POST" action="{{ route('categories.update', $category->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-5">
                        <label for="name" class="block font-medium text-sm text-gray-700 mb-1.5">Nama Kategori</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}"
                            class="border-gray-200 rounded-xl shadow-sm focus:border-primary-400 focus:ring focus:ring-primary-100 focus:ring-opacity-50 transition w-full">
                        @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="description" class="block font-medium text-sm text-gray-700 mb-1.5">Deskripsi</label>
                        <textarea name="description" id="description" rows="3"
                            class="border-gray-200 rounded-xl shadow-sm focus:border-primary-400 focus:ring focus:ring-primary-100 focus:ring-opacity-50 transition w-full">{{ old('description', $category->description) }}</textarea>
                        @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="bg-primary-500 hover:bg-primary-600 text-white px-6 py-2.5 rounded-full text-sm transition">
                            Update
                        </button>
                        <a href="{{ route('categories.index') }}" class="text-gray-500 hover:text-primary-600 text-sm transition">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>