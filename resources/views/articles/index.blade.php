<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Artikel Saya
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <a href="{{ route('articles.create') }}"
                    class="bg-primary-500 hover:bg-primary-600 text-white px-4 py-2 rounded-md transition inline-block mb-4">
                    + Tulis Artikel
                </a>

                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b">
                            <th class="py-2">Thumbnail</th>
                            <th class="py-2">Judul</th>
                            <th class="py-2">Kategori</th>
                            <th class="py-2">Status</th>
                            <th class="py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($articles as $article)
                        <tr class="border-b">
                            <td class="py-2">
                                @if ($article->thumbnail)
                                <img src="{{ asset('storage/' . $article->thumbnail) }}"
                                    alt="{{ $article->title }}" class="w-16 h-16 object-cover rounded">
                                @else
                                <span class="text-gray-400 text-sm">Tidak ada</span>
                                @endif
                            </td>
                            <td class="py-2">{{ $article->title }}</td>
                            <td class="py-2">{{ $article->category->name }}</td>
                            <td class="py-2">
                                @if ($article->status == 'published')
                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">Published</span>
                                @else
                                <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs">Draft</span>
                                @endif
                            </td>
                            <td class="py-2 flex gap-3">
                                <a href="{{ route('articles.edit', $article->id) }}" class="text-primary-600 hover:text-primary-700">Edit</a>

                                <form action="{{ route('articles.destroy', $article->id) }}"
                                    method="POST" onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="py-4 text-center text-gray-500">
                                Belum ada artikel.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>