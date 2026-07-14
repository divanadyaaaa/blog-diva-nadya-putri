<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        $categories = Category::all();

        $articles = [
            [
                'title' => 'Perkembangan Teknologi AI di Tahun 2026',
                'content' => "Teknologi kecerdasan buatan terus berkembang pesat setiap tahunnya. Berbagai inovasi baru bermunculan di berbagai sektor kehidupan.\n\nDari kesehatan hingga pendidikan, AI kini menjadi bagian penting dalam menyelesaikan berbagai permasalahan.",
                'status' => 'published',
            ],
            [
                'title' => 'Resep Mudah Membuat Kopi Susu di Rumah',
                'content' => "Kopi susu menjadi minuman favorit banyak orang. Berikut cara membuatnya dengan mudah menggunakan bahan yang tersedia di rumah.\n\nCukup siapkan kopi, susu, dan gula sesuai selera.",
                'status' => 'published',
            ],
            [
                'title' => 'Tips Belajar Efektif untuk Mahasiswa',
                'content' => "Belajar efektif membutuhkan strategi yang tepat, bukan sekadar durasi waktu yang lama.\n\nBeberapa metode seperti Pomodoro dan spaced repetition terbukti membantu banyak mahasiswa.",
                'status' => 'published',
            ],
            [
                'title' => 'Pentingnya Menjaga Kesehatan Mental',
                'content' => "Kesehatan mental sama pentingnya dengan kesehatan fisik. Banyak orang mengabaikan hal ini karena dianggap kurang penting.\n\nMengenali tanda-tanda stres sejak dini dapat membantu mencegah masalah yang lebih besar.",
                'status' => 'draft',
            ],
            [
                'title' => 'Destinasi Wisata Tersembunyi di Aceh',
                'content' => "Aceh memiliki banyak destinasi wisata alam yang belum banyak diketahui wisatawan.\n\nMulai dari pantai tersembunyi hingga air terjun yang masih asri, semua menawarkan pengalaman berbeda.",
                'status' => 'published',
            ],
        ];

        foreach ($articles as $index => $data) {
            Article::create([
                'user_id' => $user->id,
                'category_id' => $categories->random()->id,
                'title' => $data['title'],
                'slug' => Str::slug($data['title']) . '-' . uniqid(),
                'content' => $data['content'],
                'thumbnail' => null,
                'status' => $data['status'],
            ]);
        }
    }
}
