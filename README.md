# Blog Diva Nadya Putri

Aplikasi blog pribadi berbasis Laravel yang saya bangun untuk menyelesaikan Project Individu mata kuliah **Pemrograman Web Lanjut (IF-3204)**, Program Studi Teknik Informatika, Universitas Malikussaleh.

Konsepnya sederhana: saya (sebagai penulis, setelah login) bisa menulis, mengedit, dan menghapus artikel serta kategori milik saya sendiri. Sementara siapa pun yang berkunjung ke situs ini — tanpa perlu mendaftar akun — bisa membaca artikel yang sudah dipublikasikan, mencarinya berdasarkan judul, memfilter berdasarkan kategori, dan meninggalkan komentar.

Tampilan aplikasi ini saya desain dengan tema *editorial pink minimalist* — perpaduan warna pink lembut dan putih, font serif untuk judul, dan navigasi yang bisa diakses cukup dengan satu klik.

---

## Fitur

**Autentikasi**
- Register, login, dan logout menggunakan Laravel Breeze
- Dashboard dan seluruh halaman kelola konten hanya bisa diakses setelah login

**Manajemen Artikel**
- CRUD lengkap (tambah, lihat, edit, hapus) — hanya untuk artikel milik sendiri
- Upload thumbnail artikel
- Status draft / dipublikasikan
- Slug dibuat otomatis dari judul

**Manajemen Kategori**
- CRUD kategori, satu kategori bisa digunakan oleh banyak artikel
- Setiap pengguna hanya bisa mengelola kategori miliknya sendiri

**Halaman Publik (tanpa login)**
- Beranda menampilkan artikel berstatus "dipublikasikan"
- Halaman detail artikel
- Pencarian artikel berdasarkan judul
- Filter artikel berdasarkan kategori

**Fitur Bonus**
- Komentar pada artikel — bisa dilakukan siapa saja tanpa perlu login

---

## Dibangun Dengan

|     Komponen    |    Teknologi   |
|-----------------|----------------|
| Framework       | Laravel 10     |
| Bahasa          | PHP 8.1        |
| Basis Data      | MySQL          |
| Template Engine | Blade          |
| Autentikasi     | Laravel Breeze |
| Styling         | Tailwind CSS   |
| Local Server    | Laragon        |

---

## 🚀 Cara Menjalankan di Lokal

**1. Clone repository ini**
```bash
git clone https://github.com/divanadyaaaa/blog-diva-nadya-putri.git
cd blog-diva-nadya-putri
```

**2. Install dependency PHP**
```bash
composer install
```

**3. Install dependency JavaScript**
```bash
npm install
```

**4. Salin file environment dan generate application key**
```bash
copy .env.example .env
php artisan key:generate
```

**5. Buat database baru** (misalnya `db_blog_pribadi`) lewat phpMyAdmin/HeidiSQL, lalu sesuaikan `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_blog_pribadi
DB_USERNAME=root
DB_PASSWORD=
```

**6. Jalankan migration sekaligus seeder** (membuat struktur tabel + data contoh & akun demo)
```bash
php artisan migrate --seed
```

**7. Buat symbolic link storage** (supaya thumbnail artikel bisa tampil)
```bash
php artisan storage:link
```

**8. Compile asset frontend**
```bash
npm run build
```

**9. Jalankan server**
```bash
php artisan serve
```

Buka `http://127.0.0.1:8000` di browser.

---

## Akun Demo

Untuk mencoba fitur yang membutuhkan login (dashboard, kelola artikel, kelola kategori):

Email : `divanadyaputri19@gmail.com`
Password : 11223344

Atau silakan daftar akun baru sendiri lewat halaman Register.

---

## Struktur Basis Data

|     Tabel    | Keterangan |
|--------------|--------------------------------------------------------|
| `users`      | Data pengguna, dibuat otomatis oleh Laravel Breeze |
| `categories` | Kategori artikel, masing-masing dimiliki satu user |
| `articles`   | Artikel, terhubung ke satu user dan satu kategori  |
| `comments`   | Komentar pada artikel, tidak terhubung ke user karena tidak memerlukan login |

Relasi antar tabel menggunakan Eloquent ORM dengan tipe **One-to-Many**. Diagram ERD lengkap tersedia di laporan teknis project ini.

---

## Referensi

- [Dokumentasi Laravel 10.x](https://laravel.com/docs/10.x)
- [Dokumentasi Laravel Breeze](https://laravel.com/docs/10.x/starter-kits#laravel-breeze)
- [Dokumentasi Tailwind CSS](https://tailwindcss.com/docs)

---

## Dibuat Oleh

**Diva Nadya Putri**
NIM 240170232 — Teknik Informatika, Universitas Malikussaleh