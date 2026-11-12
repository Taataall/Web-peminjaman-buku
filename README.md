# Website Peminjaman Buku

Ruang Baca adalah katalog perpustakaan dan panel peminjaman sederhana berbasis Laravel 12 dan Filament 4. Tampilannya memakai warna hangat dan beberapa sentuhan retro.

## Fitur

- Beranda katalog dengan pencarian judul, penulis, dan penerbit.
- Halaman detail buku dengan stok dan informasi penerbitan.
- Dashboard admin untuk mengelola buku, anggota, dan transaksi.
- Peminjaman buku oleh anggota dan pencatatan pengembalian oleh admin.

## Menjalankan secara lokal

1. Salin `.env.example` ke `.env`, lalu isi koneksi database.
2. Pasang dependensi PHP dan JavaScript dengan `composer install` dan `npm install`.
3. Jalankan migrasi dengan `php artisan migrate`.
4. Build aset frontend dengan `npm run build`.
5. Jalankan aplikasi dengan `php artisan serve`.

Buka `http://127.0.0.1:8000` untuk katalog dan `/admin/login` untuk panel. Akun lokal dapat dibuat melalui halaman registrasi atau seeder. Ganti kata sandi akun demo sebelum aplikasi digunakan di luar lingkungan lokal.
