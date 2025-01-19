# Template Admin Laravel 10 Celestial

## Daftar Fitur Saat Ini

-   Register
-   Login
-   Edit Profil
-   Manajemen Role
-   Manajemen Permission
-   Manajemen User

---

## Persyaratan Sistem

Pastikan komputer Anda memenuhi persyaratan berikut sebelum memulai instalasi:

-   **PHP** >= 8.1
-   **Composer** - [Panduan Instalasi Composer](https://getcomposer.org/doc/00-intro.md)
-   **Node.js & NPM** - [Panduan Instalasi Node.js](https://nodejs.org/)
-   **Git** - [Panduan Instalasi Git](https://git-scm.com/)

---

## Instalasi Project

Jika Anda telah melakukan clone proyek sebelumnya, gunakan perintah berikut untuk memperbarui dan menginstal ulang:

```bash
git pull
composer install
php artisan migrate:fresh --seed
```

Langkah-langkah di bawah ini dapat dilewati.

---

## Langkah 1: Clone Proyek

Buka aplikasi Git dan arahkan ke direktori tempat Anda ingin menyimpan proyek. Misalnya, untuk XAMPP, ketik:

```bash
cd C:\xampp\htdocs
```

Lalu, clone repositori:

```bash
git clone https://github.com/agungkusaeri9/template-admin-laravel10-celestial.git template_laravel10
```

---

## Langkah 2: Instal Dependensi PHP

Masuk ke direktori proyek dan jalankan perintah berikut untuk menginstal semua dependensi PHP:

```bash
cd template_laravel10
composer install
```

---

## Langkah 3: Konfigurasi Lingkungan

Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi di dalamnya:

```bash
cp .env.example .env
php artisan key:generate
```

---

## Langkah 4: Konfigurasi Database

Edit file `.env` Anda untuk menyesuaikan nama database, username, dan password. Contoh konfigurasi untuk XAMPP:

```env
DB_DATABASE=template_laravel10
DB_USERNAME=root
DB_PASSWORD=
```

Selanjutnya, jalankan migrasi dan seed untuk membuat tabel serta pengguna awal:

```bash
php artisan migrate --seed
```

---

## Langkah 5: Buat Storage Link

Jalankan perintah berikut untuk membuat symbolic link storage:

```bash
php artisan storage:link
```

---

## Langkah 6: Jalankan Server

Jalankan server lokal menggunakan perintah berikut:

```bash
php artisan serve
```

Akses proyek melalui browser di:

```bash
http://127.0.0.1:8000
```

---

## Langkah 7: Instal Dependensi NPM

Buka terminal baru dan instal semua dependensi Node.js:

```bash
npm install
```

---

## Langkah 8: Kompilasi Asset

Kompilasi asset frontend menggunakan perintah berikut:

```bash
npm run build
```

---

## Langkah 9: Login ke Sistem

Gunakan kredensial berikut untuk login ke sistem:

-   **Email:** `superadmin@gmail.com`
-   **Password:** `password`

---

## Selamat!

Anda telah berhasil menginstal proyek ini.

---

### Catatan

Proyek ini akan terus diperbarui. Jangan lupa untuk memberikan **star** di repositori untuk mendapatkan pembaruan terbaru. 😊
