<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary-500 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-gradient-to-r from-primary-500 to-primary-400 rounded-lg shadow-sm p-6 mb-6 text-white">
                <h3 class="text-lg font-semibold">Halo, {{ auth()->user()->name }} ˚˖𓍢🌷✧˚.🎀</h3>
                <p class="text-primary-100 text-sm mt-1">Welcome Back! Hope you're doing well today. Siap menulis hari ini? Kelola Artikel, atur Kategori, dan bagikan ide-idemu!</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                <a href="{{ route('articles.index') }}"
                    class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition border border-primary-100 flex items-center gap-4">
                    <div class="bg-primary-50 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">Kelola Artikel</h4>
                        <p class="text-sm text-gray-500">Tulis, edit, atau hapus artikelmu</p>
                    </div>
                </a>

                <a href="{{ route('categories.index') }}"
                    class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition border border-primary-100 flex items-center gap-4">
                    <div class="bg-primary-50 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">Kelola Kategori</h4>
                        <p class="text-sm text-gray-500">Atur kategori artikelmu</p>
                    </div>
                </a>

            </div>

        </div>
    </div>
</x-app-layout>