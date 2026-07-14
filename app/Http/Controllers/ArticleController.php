<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    // Tampilkan semua artikel milik user yang login (untuk dashboard)
    public function index()
    {
        $articles = Article::where('user_id', auth()->id())->latest()->get();
        return view('articles.index', compact('articles'));
    }

    // Tampilkan form tambah artikel
    public function create()
    {
        $categories = Category::where('user_id', auth()->id())->get();
        return view('articles.create', compact('categories'));
    }

    // Proses simpan artikel baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        Article::create([
            'user_id' => auth()->id(),
            'category_id' => $validated['category_id'],
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']) . '-' . uniqid(),
            'content' => $validated['content'],
            'thumbnail' => $thumbnailPath,
            'status' => $validated['status'],
        ]);

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    // Tampilkan detail 1 artikel (dipakai juga nanti untuk dashboard)
    public function show(string $id)
    {
        $article = Article::where('user_id', auth()->id())->findOrFail($id);
        return view('articles.show', compact('article'));
    }

    // Tampilkan form edit artikel
    public function edit(string $id)
    {
        $article = Article::where('user_id', auth()->id())->findOrFail($id);
        $categories = Category::where('user_id', auth()->id())->get();
        return view('articles.edit', compact('article', 'categories'));
    }

    // Proses update artikel
    public function update(Request $request, string $id)
    {
        $article = Article::where('user_id', auth()->id())->findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        $thumbnailPath = $article->thumbnail; // default: pakai thumbnail lama
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $article->update([
            'category_id' => $validated['category_id'],
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']) . '-' . uniqid(),
            'content' => $validated['content'],
            'thumbnail' => $thumbnailPath,
            'status' => $validated['status'],
        ]);

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    // Hapus artikel
    public function destroy(string $id)
    {
        $article = Article::where('user_id', auth()->id())->findOrFail($id);
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
