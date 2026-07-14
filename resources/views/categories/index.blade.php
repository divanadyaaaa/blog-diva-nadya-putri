<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kategori Saya
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <a href="{{ route('categories.create') }}"
                    class="bg-primary-500 hover:bg-primary-600 text-white px-4 py-2 rounded-md transition inline-block mb-4">
                    + Tambah Kategori
                </a>

                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b">
                            <th class="py-2">Nama</th>
                            <th class="py-2">Slug</th>
                            <th class="py-2">Deskripsi</th>
                            <th class="py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                        <tr class="border-b">
                            <td class="py-2">{{ $category->name }}</td>
                            <td class="py-2">{{ $category->slug }}</td>
                            <td class="py-2">{{ $category->description }}</td>
                            <td class="py-2 flex gap-3">
                                <a href="{{ route('categories.edit', $category->id) }}"
                                    class="text-primary-600 hover:text-primary-700">Edit</a>

                                <form action="{{ route('categories.destroy', $category->id) }}"
                                    method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="py-4 text-center text-gray-500">
                                Belum ada kategori.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>