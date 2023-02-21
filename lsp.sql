-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 21, 2023 at 07:08 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lsp`
--

-- --------------------------------------------------------

--
-- Table structure for table `bukus`
--

CREATE TABLE `bukus` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` bigint UNSIGNED NOT NULL,
  `penerbit_id` bigint UNSIGNED NOT NULL,
  `tahun_terbit` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isbn` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci,
  `pengarang` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `j_buku_baik` int NOT NULL,
  `j_buku_buruk` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bukus`
--

INSERT INTO `bukus` (`id`, `judul`, `kategori_id`, `penerbit_id`, `tahun_terbit`, `isbn`, `photo`, `pengarang`, `j_buku_baik`, `j_buku_buruk`, `created_at`, `updated_at`) VALUES
(1, 'Restless', 2, 2, '2019', '9786026193032', '/img/restless.png', 'Ahmad Mahdi', 17, 2, '2023-02-21 04:27:36', '2023-02-21 04:30:35'),
(2, 'Bahasa Inggris', 4, 1, '2006', '9786012313032', '/img/bhs-inggris.png', 'Penulis', 28, 2, '2023-02-21 04:27:36', '2023-02-21 04:27:36'),
(3, 'Matematika', 4, 1, '2006', '97860312313032', '/img/matematika.png', 'Penulis', 30, 0, '2023-02-21 04:27:36', '2023-02-21 04:27:36'),
(4, 'Fisika', 4, 1, '2006', '9782312313032', '/img/fisika.png', 'Penulis', 27, 3, '2023-02-21 04:27:36', '2023-02-21 04:27:36'),
(5, 'Kimia', 4, 1, '2006', '9782339133032', '/img/kimia.png', 'Penulis', 27, 3, '2023-02-21 04:27:36', '2023-02-21 04:27:36');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_app` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci,
  `alamat_app` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_app` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_hp` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`id`, `nama_app`, `photo`, `alamat_app`, `email_app`, `nomor_hp`, `created_at`, `updated_at`) VALUES
(1, 'Perpus', '/img/perpus.png', 'Jl. SMEA 6', 'smea6@gmail.com', '098012313', '2023-02-21 04:27:36', '2023-02-21 04:27:36');

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint UNSIGNED NOT NULL,
  `kode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'ENS', 'Ensiklopedia', '2023-02-21 04:27:35', '2023-02-21 04:27:35'),
(2, 'HRR', 'Horor', '2023-02-21 04:27:35', '2023-02-21 04:27:35'),
(3, 'CP', 'Cerpen', '2023-02-21 04:27:35', '2023-02-21 04:27:35'),
(4, 'UM', 'Umum', '2023-02-21 04:27:35', '2023-02-21 04:27:35'),
(5, 'SJ', 'Sejarah', '2023-02-21 04:27:35', '2023-02-21 04:27:35');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_20_022528_create_kategoris_table', 1),
(6, '2023_02_20_022613_create_penerbits_table', 1),
(7, '2023_02_20_022735_create_bukus_table', 1),
(8, '2023_02_20_022804_create_peminjamans_table', 1),
(9, '2023_02_20_022851_create_pemberitahuans_table', 1),
(10, '2023_02_20_022918_create_pesans_table', 1),
(11, '2023_02_20_022952_create_identitas_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemberitahuans`
--

CREATE TABLE `pemberitahuans` (
  `id` bigint UNSIGNED NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_user` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buku_id` bigint UNSIGNED DEFAULT NULL,
  `kategori_id` bigint UNSIGNED DEFAULT NULL,
  `status` enum('aktif','user','admin','nonaktif') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemberitahuans`
--

INSERT INTO `pemberitahuans` (`id`, `isi`, `level_user`, `buku_id`, `kategori_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pesan satu', NULL, NULL, NULL, 'aktif', '2023-02-21 04:27:36', '2023-02-21 04:27:36'),
(2, 'Pesan dua', NULL, NULL, NULL, 'nonaktif', '2023-02-21 04:27:36', '2023-02-21 04:27:36'),
(3, 'Perpustakaan akan tutup pada tanggal 28 Februari 2023', NULL, NULL, NULL, 'user', '2023-02-21 04:27:36', '2023-02-21 04:27:36'),
(4, 'Dimohon untuk segera memverifikasi user yang baru mendaftar', NULL, NULL, NULL, 'admin', '2023-02-21 04:27:36', '2023-02-21 04:27:36'),
(8, 'Buku Restless pada kategori Horor telah dipinjam oleh Achmad Dhani Syahputra', NULL, 1, 2, 'aktif', '2023-02-21 04:30:35', '2023-02-21 04:30:35'),
(9, 'Buku Restless pada kategori Horor telah dikembalikan oleh Achmad Dhani Syahputra', NULL, 1, 2, 'aktif', '2023-02-21 04:31:30', '2023-02-21 04:31:30');

-- --------------------------------------------------------

--
-- Table structure for table `peminjamans`
--

CREATE TABLE `peminjamans` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `buku_id` bigint UNSIGNED NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date DEFAULT NULL,
  `kondisi_buku_saat_dipinjam` enum('baik','buruk') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi_buku_saat_dikembalikan` enum('baik','buruk','hilang') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `denda` double(8,2) DEFAULT NULL,
  `done` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjamans`
--

INSERT INTO `peminjamans` (`id`, `user_id`, `buku_id`, `tanggal_peminjaman`, `tanggal_pengembalian`, `kondisi_buku_saat_dipinjam`, `kondisi_buku_saat_dikembalikan`, `denda`, `done`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-01-06', '2023-02-21', 'baik', 'hilang', 50000.00, 1, '2023-02-21 04:27:36', '2023-02-21 04:31:30'),
(2, 1, 2, '2023-01-08', NULL, 'baik', NULL, NULL, 0, '2023-02-21 04:27:36', '2023-02-21 04:27:36'),
(3, 1, 2, '2023-01-10', '2023-01-18', 'baik', 'hilang', 50000.00, 1, '2023-02-21 04:27:36', '2023-02-21 04:27:36'),
(4, 1, 3, '2023-01-10', '2023-01-14', 'baik', 'buruk', 20000.00, 1, '2023-02-21 04:27:36', '2023-02-21 04:27:36'),
(8, 1, 1, '2023-02-21', NULL, 'baik', NULL, NULL, 0, '2023-02-21 04:30:35', '2023-02-21 04:30:35');

-- --------------------------------------------------------

--
-- Table structure for table `penerbits`
--

CREATE TABLE `penerbits` (
  `id` bigint UNSIGNED NOT NULL,
  `kode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verif` enum('verified','unverified') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unverified',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penerbits`
--

INSERT INTO `penerbits` (`id`, `kode`, `nama`, `verif`, `created_at`, `updated_at`) VALUES
(1, 'erl', 'Erlangga', 'verified', '2023-02-21 04:27:36', '2023-02-21 04:27:36'),
(2, 'fst', 'Fantasteen', 'unverified', '2023-02-21 04:27:36', '2023-02-21 04:27:36');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesans`
--

CREATE TABLE `pesans` (
  `id` bigint UNSIGNED NOT NULL,
  `penerima_id` bigint UNSIGNED NOT NULL,
  `pengirim_id` bigint UNSIGNED NOT NULL,
  `judul` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('terkirim','dibaca') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_kirim` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesans`
--

INSERT INTO `pesans` (`id`, `penerima_id`, `pengirim_id`, `judul`, `isi`, `status`, `tanggal_kirim`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Pesan Pengumuman', 'Tes pesan pertama', 'dibaca', '2023-01-06', '2023-02-21 04:27:36', '2023-02-21 04:27:36'),
(2, 2, 1, 'Pesan Pengumuman 2', 'Tes pesan kedua', 'terkirim', '2023-01-06', '2023-02-21 04:27:36', '2023-02-21 04:27:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `kode` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nis` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullname` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `photo` text COLLATE utf8mb4_unicode_ci,
  `verif` enum('verified','unverified') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unverified',
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `join_date` date DEFAULT NULL,
  `terakhir_login` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `kode`, `nis`, `fullname`, `username`, `password`, `kelas`, `alamat`, `photo`, `verif`, `role`, `join_date`, `terakhir_login`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'USR5b5ahd2a5698b4a6e', '341434432', 'Achmad Dhani Syahputra', 'Dnsy', '$2y$10$NDqmUgr9/WfDMRL98KMFwO5CMmPZe4TOR9GdDv5HtvwkE6DgRw0N6', '12 RPL', '', '/img/akio.png', 'verified', 'user', '2023-01-06', '2023-02-21', NULL, '2023-02-21 04:27:35', '2023-02-21 04:27:52'),
(2, 'ADMdfha0368gc6bal1d6', '', 'Admin Master', 'Admin', '$2y$10$.4EQFzFJpmRmCbthF8vMneawcbgwd0n62u9TkpjpU1Rki23EjSz5C', '', '', '/img/cat-1.png', 'verified', 'admin', '2023-01-06', NULL, NULL, '2023-02-21 04:27:35', '2023-02-21 04:27:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bukus`
--
ALTER TABLE `bukus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bukus_kategori_id_foreign` (`kategori_id`),
  ADD KEY `bukus_penerbit_id_foreign` (`penerbit_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pemberitahuans`
--
ALTER TABLE `pemberitahuans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemberitahuans_buku_id_foreign` (`buku_id`),
  ADD KEY `pemberitahuans_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `peminjamans`
--
ALTER TABLE `peminjamans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjamans_user_id_foreign` (`user_id`),
  ADD KEY `peminjamans_buku_id_foreign` (`buku_id`);

--
-- Indexes for table `penerbits`
--
ALTER TABLE `penerbits`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `penerbits_kode_unique` (`kode`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pesans`
--
ALTER TABLE `pesans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesans_penerima_id_foreign` (`penerima_id`),
  ADD KEY `pesans_pengirim_id_foreign` (`pengirim_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_kode_unique` (`kode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bukus`
--
ALTER TABLE `bukus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pemberitahuans`
--
ALTER TABLE `pemberitahuans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `peminjamans`
--
ALTER TABLE `peminjamans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penerbits`
--
ALTER TABLE `penerbits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesans`
--
ALTER TABLE `pesans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bukus`
--
ALTER TABLE `bukus`
  ADD CONSTRAINT `bukus_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bukus_penerbit_id_foreign` FOREIGN KEY (`penerbit_id`) REFERENCES `penerbits` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pemberitahuans`
--
ALTER TABLE `pemberitahuans`
  ADD CONSTRAINT `pemberitahuans_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `bukus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pemberitahuans_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `peminjamans`
--
ALTER TABLE `peminjamans`
  ADD CONSTRAINT `peminjamans_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `bukus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `peminjamans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pesans`
--
ALTER TABLE `pesans`
  ADD CONSTRAINT `pesans_penerima_id_foreign` FOREIGN KEY (`penerima_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pesans_pengirim_id_foreign` FOREIGN KEY (`pengirim_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
