-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Apr 2020 pada 06.20
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `email`, `nama`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
('c23c76d2-0425-41f9-808b-18cecb928a24', 'destriher@gmail.com', 'Destri herdini', '083115309476', 'Jl.Pemuda 1', '2020-04-21 21:04:18', '2020-04-21 21:04:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_01_06_170758_create_table_paket', 2),
(5, '2020_01_08_232425_table_customer', 3),
(6, '2020_01_11_035159_status_pesanan', 4),
(7, '2020_01_11_155520_alter_status', 5),
(8, '2020_01_13_170452_table_status_pembayaran', 6),
(9, '2020_01_15_033645_create_table_transaksi', 7),
(10, '2020_01_22_175018_created_nama_usaha', 8),
(11, '2020_01_24_022352_alter_status_pembayaran', 9),
(12, '2020_01_26_004113_alter_table_users', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nama_usaha`
--

CREATE TABLE `nama_usaha` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nama_usaha`
--

INSERT INTO `nama_usaha` (`id`, `nama`, `created_at`, `updated_at`) VALUES
('eccbc87e4b5ce2fe28308fd9f2a7baf3', 'Laundry Center', '2020-04-22 03:56:52', '2020-04-22 03:56:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id`, `nama`, `harga`, `created_at`, `updated_at`) VALUES
('3a883fce-3a1a-4785-9948-ca80a9e83440', 'Paket Medium', 10000, '2020-01-17 19:59:50', '2020-01-17 19:59:50'),
('5dbcd18f-02f5-4f25-a6c5-c2300f2cf078', 'Paket Premium', 15000, '2020-01-06 10:30:45', '2020-01-06 10:30:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_pembayaran`
--

CREATE TABLE `status_pembayaran` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `status_pembayaran`
--

INSERT INTO `status_pembayaran` (`id`, `nama`, `urutan`, `created_at`, `updated_at`) VALUES
('9f493f56-30ec-483d-b4a7-8039c020f1fc', 'Belum Lunas', 1, '2020-04-21 21:11:42', '2020-04-21 21:11:42'),
('d7832528-73e2-48df-a353-6f66f0ccaac7', 'Lunas', 2, '2020-04-21 21:11:58', '2020-04-21 21:11:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_pesanan`
--

CREATE TABLE `status_pesanan` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `status_pesanan`
--

INSERT INTO `status_pesanan` (`id`, `nama`, `urutan`, `created_at`, `updated_at`) VALUES
('2e012b1e-cb15-4790-b77a-7b0fd9214ed8', 'Di jemur', 2, '2020-04-21 21:07:25', '2020-04-21 21:09:49'),
('324608de-7188-4bad-882c-0b82b3494914', 'Di cuci', 3, '2020-04-21 21:10:12', '2020-04-21 21:10:12'),
('87cc4123-ab35-42da-9a37-44b459f3c4fc', 'Selesai', 4, '2020-04-21 21:10:32', '2020-04-21 21:10:32'),
('99febe57-3e47-4787-ad7d-a41240a09554', 'Di antarkan', 1, '2020-04-21 21:05:20', '2020-04-21 21:05:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pesanan`
--

CREATE TABLE `t_pesanan` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paket` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `status_pesanan` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pembayaran` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `t_pesanan`
--

INSERT INTO `t_pesanan` (`id`, `customer`, `paket`, `berat`, `grand_total`, `status_pesanan`, `status_pembayaran`, `created_at`, `updated_at`) VALUES
('8dcd9bfc-9893-43ad-9a61-81366f9514fd', 'c23c76d2-0425-41f9-808b-18cecb928a24', '3a883fce-3a1a-4785-9948-ca80a9e83440', 1, 10000, '87cc4123-ab35-42da-9a37-44b459f3c4fc', 'd7832528-73e2-48df-a353-6f66f0ccaac7', '2020-04-21 21:12:24', '2020-04-21 21:12:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Destri', 'destriherdini@gmail.com', NULL, '$2y$10$9nJGDdibbj8U.8el4KmnT.4s/w3CHQrjZYFwZSTwtwZ4HzrScHQ8S', NULL, '2020-01-04 20:08:13', '2020-01-04 20:08:13'),
(3, NULL, 'Dina', 'karyawan@yahoo.com', NULL, '$2y$10$InGl.IaHfeAQILBNItQLyOlDOD4gpGpOIoHAR1M3UhaXBBcgvpOVq', NULL, '2020-04-21 21:14:59', '2020-04-21 21:14:59');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `status_pembayaran`
--
ALTER TABLE `status_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status_pesanan`
--
ALTER TABLE `status_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_pesanan`
--
ALTER TABLE `t_pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_pesanan_customer_foreign` (`customer`),
  ADD KEY `t_pesanan_paket_foreign` (`paket`),
  ADD KEY `t_pesanan_status_pesanan_foreign` (`status_pesanan`),
  ADD KEY `t_pesanan_status_pembayaran_foreign` (`status_pembayaran`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_pesanan`
--
ALTER TABLE `t_pesanan`
  ADD CONSTRAINT `t_pesanan_customer_foreign` FOREIGN KEY (`customer`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `t_pesanan_paket_foreign` FOREIGN KEY (`paket`) REFERENCES `paket` (`id`),
  ADD CONSTRAINT `t_pesanan_status_pembayaran_foreign` FOREIGN KEY (`status_pembayaran`) REFERENCES `status_pembayaran` (`id`),
  ADD CONSTRAINT `t_pesanan_status_pesanan_foreign` FOREIGN KEY (`status_pesanan`) REFERENCES `status_pesanan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
