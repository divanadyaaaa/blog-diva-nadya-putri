<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    // Halaman beranda: daftar artikel published + search + filter kategori
    public function beranda(Request $request)
    {
        $query = Article::where('status', 'published');

        // Fitur pencarian berdasarkan judul
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Fitur filter berdasarkan kategori
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        $articles = $query->latest()->get();

        // Ambil semua kategori untuk ditampilkan sebagai pilihan filter
        $categories = Category::all();

        return view('public.beranda', compact('articles', 'categories'));
    }

    // Halaman detail 1 artikel (harus published, siapapun bisa akses)
    public function detail(string $slug)
    {
        $article = Article::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        return view('public.detail', compact('article'));
    }
}
