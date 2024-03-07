## Daftar Fitur Saat Ini

-   Register
-   Login
-   Edit Profile
-   Manajemen Role
-   Manajemen Permission
-   Manajemen User

## Persyaratan Sistem

Sebelum Anda memulai instalasi, pastikan komputer Anda memenuhi persyaratan sistem berikut:

-   PHP >= 8.1
-   Composer - [Panduan Instalasi Composer](https://getcomposer.org/doc/00-intro.md)
-   Node.js & NPM - [Panduan Instalasi Node.js](https://nodejs.org/)
-   Git - [Panduan Instalasi Git](https://git-scm.com/)

## Instalasi Project

Jika Sebelumnya sudah melakukan clone, anda bisa mengetikan perintah

```bash
git pull
composer install
php artisan migrate:fresh --seed
```

di direktor project sebelumnya dan lewati langkah-langkah dibawah ini.

## Langkah 1: Clone Project

Buka aplikasi git yang sudah di download dan sesuaikan direktori nya, jika anda ingin disimpan di htdocs ketikan perintah berikut :

```bash
cd C:\xampp\htdocs
```

selanjutnya clone repositori proyek ini dari GitHub:

```bash
git clone https://github.com/agungkusaeri9/template-admin-laravel10-celestial.git template_laravel10
```

## Langkah 2: Install Dependensi PHP

Anda perlu memasuki direktori proyek yang baru saja Anda clone dan menjalankan perintah berikut untuk menginstal semua dependensi PHP:

```bash
cd template_laravel10
composer install
```

## Langkah 3: Konfigurasi Lingkungan

Anda perlu menyalin file `.env.example` menjadi `.env` dan mengonfigurasi file `.env` sesuai dengan preferensi Anda:

```bash
cp .env.example .env
php artisan key:generate
```

## Langkah 4: Migrasi Database

Sesuaikan nama database, username, dan passwordnya, jika anda menggunakan xampp anda hanya menyesuaikan nama database nya saja, untuk mengkonfigurasi database di file `.env` seperti berikut :

```bash
DB_DATABASE=template_laravel
DB_USERNAME=root
DB_PASSWORD=
```

Kemudian anda perlu membuat tabel-tabel yang diperlukan sekaligus dibuatkan user untuk login, dengan menjalankan migrasi dan seeder database:

```bash
php artisan migrate --seed
```

## Langkah 5: Menjalankan server

Untuk menjalankan server, tuliskan perintah berikut:

```bash
php artisan serve
```

## Langkah 6: Instalasi NPM Dependencies

Untuk menginstal semua dependensi Node.js yang diperlukan, jalankan perintah berikut:

```bash
npm install
```

## Langkah 7: Kompilasi Asset

Untuk mengkompilasi asset, jalankan perintah berikut:

```bash
npm run dev
```

biarkan berjalan bersaamaan dengan server.

## Langkah 8 : Login ke Sistem

Setelah semuanya berjalan dengan lancar, silahkan buka google chrome dan akses

```bash
http://127.0.0.1:8000
```

Selanjutnya anda bisa melakukan login dengan :

-   Email : admin@gmail.com
-   Password : admin

## Selamat! Anda telah berhasil menginstal proyek tersebut.

Catatan : Fitur akan terus saya perbaharui, anda bisa mengklik start untuk updatean selanjutnya.
