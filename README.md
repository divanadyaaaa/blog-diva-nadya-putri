# Blog Diva Nadya Putri

Aplikasi Blog Pribadi berbasis Laravel 10. Aplikasi ini memungkinkan penulis (setelah login) untuk membuat, mengedit, dan menghapus artikel serta kategori miliknya sendiri, sementara pengunjung umum dapat membaca artikel yang sudah dipublikasikan tanpa perlu login.

## Fitur

- Autentikasi (register, login, logout) menggunakan Laravel Breeze
- CRUD Artikel (tambah, edit, hapus) dengan upload thumbnail
- CRUD Kategori
- Halaman publik: daftar artikel published, detail artikel, pencarian judul, filter kategori
- Fitur bonus: komentar pada artikel tanpa perlu login

## Teknologi

- Laravel 10
- MySQL
- Blade Templating Engine
- Tailwind CSS
- Laravel Breeze

## Cara Instalasi

1. Clone repository ini
git clone https://github.com/divanadyaaaa/blog-diva-nadya-putri.git
cd blog-diva-nadya-putri

2. Install dependency PHP
composer install

3. Install dependency JavaScript
npm install

4. Salin file environment dan generate application key
copy .env.example .env
php artisan key:generate

5. Buat database baru (misal `db_blog_pribadi`) lewat phpMyAdmin/HeidiSQL, lalu sesuaikan konfigurasi di file `.env`:
DB_DATABASE=db_blog_pribadi
DB_USERNAME=root
DB_PASSWORD=

6. Jalankan migration sekaligus seeder (untuk membuat struktur tabel + data contoh & akun demo)
php artisan migrate --seed

7. Buat symbolic link untuk storage (supaya thumbnail bisa tampil)
php artisan storage:link

8. Compile asset frontend
npm run build

9. Jalankan server
php artisan serve

10. Buka `http://127.0.0.1:8000` di browser

## Akun Demo

- Email: `divanadyaputri19@gmail.com`
- Password: `11223344`

## Referensi

- [Dokumentasi Laravel](https://laravel.com/docs/10.x)
- [Dokumentasi Laravel Breeze](https://laravel.com/docs/10.x/starter-kits#laravel-breeze)