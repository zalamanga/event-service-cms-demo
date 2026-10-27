# Event Service CMS Demo

Demo katalog jasa acara dengan paket, kategori, galeri, banner, dan area administrasi Laravel.

## Yang tersedia

- Halaman layanan serta daftar harga paket, tenda, makeup, dan aksesori.
- CRUD kategori, paket, banner, serta galeri dengan pengurutan.
- Login admin dan halaman pengelolaan profil.

## Menjalankan demo

Laravel v10.48.15, PHP ^8.1, Composer, serta MySQL/MariaDB. Aset frontend memakai perintah pada package.json. Dependency Composer dan Node tidak disertakan.

1. Pakai versi PHP yang memenuhi composer.json dan lockfile. Aktifkan ekstensi PDO MySQL, mbstring, OpenSSL, tokenizer, XML, ctype, dan fileinfo.
2. Salin .env.example menjadi .env bila belum ada, lalu isi koneksi database sendiri. Jangan commit .env.
3. Jalankan `composer install`, lalu `php artisan key:generate`.
4. Buat database demo kosong, lalu jalankan `php artisan migrate`. Baca isi seeder sebelum menjalankan `php artisan db:seed`.
5. Untuk aset yang berasal dari source, jalankan `npm install` dan script development/production atau build yang tersedia pada package.json. Toolchain Node legacy belum diuji ulang.
6. Jalankan `php artisan serve` dan buka alamat yang dicetak terminal.

## Struktur yang perlu dibaca

`app/` menyimpan controller/model atau komponen Livewire, `routes/` memetakan URL, `resources/views/` menyimpan Blade, `database/migrations/` berisi skema, dan `public/` adalah web root. `tests/` yang tersedia sebagian besar masih contoh bawaan framework.

## Batas implementasi

- Area pengelolaan memakai middleware auth; peran admin terpisah belum terlihat pada route. Batasi akun demo yang dibuat.

- Dump database yang berisi baris pengguna dan data operasional tidak disertakan. Gunakan migrasi untuk database kosong.
- Seeder bawaan membuat pengguna Faker, bukan admin demo dengan kredensial terdokumentasi; buat akun lokal secara eksplisit melalui prosedur Laravel.
- Endpoint publik /linkstorage yang menjalankan Artisan dikeluarkan dari salinan publik. Jalankan php artisan storage:link dari terminal bila diperlukan.
- Aset unggahan dan foto komentar lokal tidak disertakan. Gunakan konten uji milik sendiri.

## Pemeriksaan publikasi

- PHP lint: 81/81 berkas PHP non-Blade lolos menggunakan PHP 8.1.12.
- Salinan publik tidak menyertakan .env aktual, dependency Composer/Node, log, database dump, arsip, sesi, atau unggahan lokal.
- Tes framework, koneksi database, pengoperasian UI, build aset, dan API eksternal belum dijalankan pada salinan ini. Lint hanya memeriksa sintaks; tidak membuktikan seluruh fitur berfungsi.

## Asal source dan lisensi

Berasal dari [https://github.com/ArdiantoN19/yovi-wedding-laravel](https://github.com/ArdiantoN19/yovi-wedding-laravel). Riwayat Git sumber tidak dibawa ke salinan publik ini; atribusi upstream dan berkas lisensi yang tersedia tetap dipertahankan.

Aset UI statis yang dirujuk aplikasi tetap disertakan beserta lisensi yang tersedia. Konten merek dan gambar mengikuti hak pemilik aslinya. Perubahan untuk publikasi ini meliputi dokumentasi, pemisahan konfigurasi lokal, skema demo bila diperlukan, dan koreksi terbatas yang dicatat pada persiapan proyek.
