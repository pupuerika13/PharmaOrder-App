-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Bulan Mei 2026 pada 09.14
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmaorder_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `medicines`
--

CREATE TABLE `medicines` (
  `id` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `wajib_resep` tinyint(1) NOT NULL DEFAULT 0,
  `stok` varchar(255) NOT NULL,
  `stok_angka` int(11) NOT NULL,
  `pabrikan` varchar(255) DEFAULT NULL,
  `bentuk` varchar(255) DEFAULT NULL,
  `kemasan` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `medicines`
--

INSERT INTO `medicines` (`id`, `kategori`, `nama`, `harga`, `gambar`, `wajib_resep`, `stok`, `stok_angka`, `pabrikan`, `bentuk`, `kemasan`, `deskripsi`, `catatan`, `created_at`, `updated_at`) VALUES
('amoxicillin', 'Obat Resep', 'Amoxicillin 500mg', 12000, '/images/amoxicillin.png', 1, 'Stok Menipis', 1240, 'GlobalPharma Labs.', 'Kapsul', 'Strip', 'Mengobati berbagai infeksi bakteri.', 'Wajib dengan resep dokter.', '2026-05-14 23:48:52', '2026-05-14 23:48:52'),
('ibuprofen', 'Pereda Nyeri', 'Prosis Ibuprofen', 11000, '/images/prosisibuprofen.png', 0, 'Tersedia', 100, 'Combiphar', 'Kapsul', 'Isi 10/strip', 'Meredakan nyeri ringan hingga sedang dan menurunkan demam.', 'Tidak disarankan untuk penderita maag akut.', '2026-05-14 23:48:52', '2026-05-14 23:48:52'),
('imboost', 'Vitamin', 'Imboost Force', 72000, '/images/imboodt.png', 0, 'Tersedia', 50, 'Soho Global Health', 'Tablet', 'Strip', 'Meningkatkan daya tahan tubuh dan membantu memulihkan kondisi setelah sakit.', 'Konsumsi 1 kali sehari.', '2026-05-14 23:48:52', '2026-05-14 23:48:52'),
('lactulax', 'Pencernaan', 'Lactulax', 60000, '/images/lactulax.png', 0, 'Tersedia', 100, 'Ikapharmindo', 'Cair', 'Botol 60 ml', 'Mengatasi sembelit dan membantu melancarkan BAB.', 'Gunakan sesuai dosis anjuran.', '2026-05-14 23:48:52', '2026-05-14 23:48:52'),
('mylanta', 'Pencernaan', 'Mylanta', 25000, '/images/mylanta.png', 0, 'Stok Menipis', 28, 'Bayer', 'Cair', 'Botol 50 ml', 'Menetralkan asam lambung dan mengatasi masalah pencernaan.', 'Kocok dahulu sebelum diminum.', '2026-05-14 23:48:52', '2026-05-14 23:48:52'),
('neorheumacyl', 'Pereda Nyeri', 'Neo Rheumacyl', 10000, '/images/neorheumacyl.png', 0, 'Tersedia', 120, 'Tempo Scan', 'Tablet', 'Isi 20', 'Meredakan nyeri otot, nyeri sendi, pegal linu, hingga sakit kepala dan sakit gigi.', 'Multifungsi untuk berbagai nyeri.', '2026-05-14 23:48:52', '2026-05-14 23:48:52'),
('omeprazole', 'Pencernaan', 'Omeprazole 20mg', 12000, '/images/omeprazole.png', 0, 'Tersedia', 300, 'Generic Pharma', 'Kapsul', 'Strip', 'Pereda asam lambung persisten dan mulas.', 'Minum 30 menit sebelum makan pagi.', '2026-05-14 23:48:52', '2026-05-14 23:48:52'),
('panadol', 'Pereda Nyeri', 'Panadol', 12000, '/images/panadol.png', 0, 'Tersedia', 200, 'GSK', 'Tablet', 'Strip', 'Untuk meredakan nyeri (seperti sakit kepala, sakit gigi, nyeri otot).', 'Cepat bereaksi meredakan nyeri.', '2026-05-14 23:48:52', '2026-05-14 23:48:52'),
('promag', 'Pencernaan', 'Promag', 9000, '/images/promag.png', 0, 'Stok Menipis', 10, 'Kalbe Farma', 'Tablet', 'Strip', 'Mengurangi gejala maag dan menetralkan asam lambung.', 'Kunyah tablet sebelum ditelan.', '2026-05-14 23:48:52', '2026-05-14 23:48:52'),
('sidomuncul-vitd3', 'Vitamin', 'Sido Muncul Vitamin D3 400 IU', 107000, '/images/sidomuncul.png', 0, 'Tersedia', 50, 'Sido Muncul', 'Kapsul', 'Botol 50 kapsul', 'Meningkatkan imunitas dan kesehatan autoimun.', 'Cocok untuk kebutuhan vitamin harian.', '2026-05-14 23:48:52', '2026-05-14 23:48:52'),
('sumagesic', 'Pereda Nyeri', 'Sumagesic', 8000, '/images/sumagesic.png', 0, 'Tersedia', 150, 'Darya-Varia', 'Tablet', 'Isi 4 tablet', 'Meredakan nyeri dan menurunkan demam.', 'Mengandung Paracetamol.', '2026-05-14 23:48:52', '2026-05-14 23:48:52'),
('vit-b-complex', 'Vitamin', 'Vitamin B Complex IPI', 16000, '/images/vitaminbcomplex.png', 0, 'Stok Menipis', 10, 'IPI', 'Tablet', 'Pot 45 Tablet', 'Memenuhi kebutuhan vitamin B kompleks dalam tubuh.', 'Tablet kecil mudah ditelan.', '2026-05-14 23:48:52', '2026-05-14 23:48:52'),
('vitamind3', 'Vitamin', 'Vitamin D3 2000IU', 80000, '/images/vitamind3.png', 0, 'Tersedia', 500, 'NatureWise', 'Kapsul', 'Botol 60 Kapsul', 'Mendukung kesehatan tulang dan fungsi sistem kekebalan tubuh.', 'Konsumsi setelah makan.', '2026-05-14 23:48:52', '2026-05-14 23:48:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_05_13_033200_create_medicines_table', 1),
(5, '2026_05_13_033202_create_transactions_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('o3cXKj0daWOGJWcwDdHukeFsN48qXjcSEtA6Mgce', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUEE0Vk05NVNINTdBUnZZWkQwUER0R2pyUlVtUEtacEVVUVlOY0p0bSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1778828687);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` varchar(255) NOT NULL,
  `obat_id` varchar(255) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `nama_klien` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `pembayaran` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'customer',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Pharma', NULL, '08123456789', 'admin', NULL, '$2y$12$jq9RvrTOXFDECVdLUBVcYO9LDmXAMi9GFND/4R/G9L4shB/gZftW2', NULL, '2026-05-14 23:48:52', '2026-05-14 23:48:52');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
