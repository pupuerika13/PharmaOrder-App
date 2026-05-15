# PharmaOrder - Panduan Setup Database MySQL

Aplikasi PharmaOrder saat ini sedang dalam proses transisi dari penyimpanan sementara (*Session-based mock*) menuju penyimpanan permanen menggunakan **MySQL**. 

Dokumen ini berisi panduan langkah demi langkah tentang cara menyiapkan *database* MySQL di komputer Anda menggunakan **XAMPP**, dan bagaimana menyambungkannya dengan aplikasi Laravel ini.

---

## Prasyarat
- **XAMPP** sudah terinstal di komputer Anda.
- **PHP** dan **Composer** sudah terkonfigurasi.
- Proyek Laravel PharmaOrder sudah berjalan (melalui `php artisan serve`).

## Langkah 1: Menyiapkan XAMPP & MySQL
1. Buka aplikasi **XAMPP Control Panel**.
2. Klik tombol **Start** pada baris **Apache**. Tunggu hingga warnanya berubah menjadi hijau.
3. Klik tombol **Start** pada baris **MySQL**. Tunggu hingga warnanya berubah menjadi hijau.
4. Buka web browser (Chrome, Firefox, dsb.) dan akses URL berikut:
   👉 `http://localhost/phpmyadmin/`

## Langkah 2: Membuat Database di phpMyAdmin
Setelah panel phpMyAdmin terbuka:
1. Klik menu **"New"** (Baru) di bilah navigasi sebelah kiri.
2. Di kolom *"Database name"* (Nama basis data), ketikkan persis:
   **`pharmaorder_db`**
3. Biarkan opsi *collation* di sebelah kanannya tetap bawaan (biasanya `utf8mb4_general_ci`).
4. Klik tombol **"Create"** (Buat).
5. Selamat! *Database* kosong bernama `pharmaorder_db` sudah berhasil dibuat.

## Langkah 3: Menghubungkan Laravel ke Database
Sekarang kita perlu memberi tahu aplikasi Laravel di mana *database* tersebut berada.
1. Buka folder proyek ini di *Code Editor* Anda (VS Code, dsb.).
2. Cari file bernama **`.env`** (biasanya ada di luar/root folder, sejajar dengan `README.md`).
3. Buka file `.env` tersebut dan cari bagian yang mengatur database (baris 23).
4. Ubah pengaturannya menjadi seperti ini:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pharmaorder_db
DB_USERNAME=root
DB_PASSWORD=
```
*(Catatan: Biarkan `DB_PASSWORD` kosong jika Anda tidak pernah mengubah *password default* XAMPP).*

## Langkah 4: Migrasi & Pengisian Data Awal (Seeding)
*(Langkah ini akan dijalankan oleh AI (Antigravity) atau bisa Anda jalankan secara manual setelah struktur *migration* dan *seeder* dibuat).*

Buka terminal/CMD di dalam folder proyek Anda, lalu jalankan perintah:
```bash
php artisan migrate:fresh --seed
```
**Apa yang dilakukan perintah ini?**
- `migrate:fresh`: Akan membangun tabel `medicines` dan `transactions` di dalam MySQL.
- `--seed`: Akan mengisi tabel `medicines` dengan data obat awal (Amoxicillin, Lantus, Vitamin D3, dll) secara otomatis agar Anda tidak perlu menginputnya satu per satu.

---

## Langkah Selanjutnya
Jika Anda sudah menyelesaikan **Langkah 1 sampai 3**, beri tahu Antigravity (AI Anda) dengan mengetik **"Setuju"**, agar AI dapat melanjutkan pembuatan *Migration* dan penulisan ulang kode `routes/web.php` untuk merampungkan integrasi MySQL!
