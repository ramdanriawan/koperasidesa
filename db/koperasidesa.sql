-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2019 at 01:43 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasidesa`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggotas`
--

CREATE TABLE `anggotas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `no_ktp` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `anggotas`
--

INSERT INTO `anggotas` (`id`, `nama`, `alamat`, `no_hp`, `no_ktp`, `created_at`, `updated_at`) VALUES
(1, 'Dongoran', '9059 Cassandre Branch, Balistreriport 31460-8676, OR', '0420 8351 811', '0234061403039434', '2019-02-16 06:22:31', '2019-02-16 06:22:31');

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenis` enum('pupuk','racun') COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `gambar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `jenis`, `nama`, `jumlah`, `harga`, `total`, `gambar`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'pupuk', 'sianida 12', '2', 10000, 20000, 'gambarProduk/produk1.jpg', 'ini adalah racun paling berbahaya', '2019-02-16 06:22:31', '2019-02-16 13:01:16'),
(18, 'racun', 'barang aneh', '0', 1000, 1000, 'imgBarang/ramdanriawan.jpg', 'sdfdsfsdf', '2019-02-16 12:02:05', '2019-02-16 13:01:16'),
(19, 'pupuk', 'gak jelas', '1', 2342, 2342, 'imgBarang/not_found.png', 'dsfsdfsdf', '2019-02-16 12:04:14', '2019-02-16 12:54:16'),
(20, 'pupuk', 'sdfdsf22', '2', 23424, 46848, 'imgBarang/laravel 5.6.png', '23424', '2019-02-16 12:15:15', '2019-02-16 12:15:30'),
(21, 'pupuk', 'sianida 13', '2', 11000, 20000, 'gambarProduk/produk1.jpg', 'ini adalah racun paling berbahaya', '2019-02-16 17:34:42', '2019-02-16 17:34:42'),
(22, 'pupuk', 'sianida 13', '2', 11000, 20000, 'gambarProduk/produk1.jpg', 'ini adalah racun paling berbahaya', '2019-02-16 17:34:42', '2019-02-16 17:34:42');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(43, '2014_10_12_000000_create_users_table', 1),
(44, '2014_10_12_100000_create_password_resets_table', 1),
(45, '2019_02_16_010000_create_barangs_table', 1),
(46, '2019_02_16_020000_create_anggotas_table', 1),
(47, '2019_02_16_030000_create_pembelians_table', 1),
(48, '2019_02_16_040000_create_pengeluarans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembelians`
--

CREATE TABLE `pembelians` (
  `id` int(10) UNSIGNED NOT NULL,
  `barang_id` int(10) UNSIGNED NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `catatan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pembelians`
--

INSERT INTO `pembelians` (`id`, `barang_id`, `harga`, `jumlah`, `total`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 1, 10000, 2, 20000, NULL, '2019-02-16 06:22:31', '2019-02-16 06:22:31'),
(4, 18, 1000, 1, 10000, 'ssfsfsdfsdf', '2019-02-16 12:33:34', '2019-02-16 12:52:07'),
(5, 1, 10000, 1, 10000, 'wafsdfsdfsfsdf', '2019-02-16 12:53:07', '2019-02-16 12:54:15'),
(6, 18, 1000, 1, 10000, 'kagak jelas', '2019-02-16 12:56:29', '2019-02-16 12:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluarans`
--

CREATE TABLE `pengeluarans` (
  `id` int(10) UNSIGNED NOT NULL,
  `barang_id` int(10) UNSIGNED NOT NULL,
  `anggota_id` int(10) UNSIGNED NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` enum('selesai','pending') COLLATE utf8_unicode_ci NOT NULL,
  `catatan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pengeluarans`
--

INSERT INTO `pengeluarans` (`id`, `barang_id`, `anggota_id`, `harga`, `jumlah`, `total`, `status`, `catatan`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 10000, 10, 100000, 'selesai', 'sdfdsfsdfdsfdsf', '2019-02-16 11:52:52', '2019-02-16 11:52:52'),
(4, 18, 1, 1000, 2, 2000, 'selesai', 'sdfsfsff', '2019-02-16 12:25:18', '2019-02-16 12:28:02'),
(5, 18, 1, 1000, 9, 9000, 'selesai', 'sddsfdsfdsfdsfdsf', '2019-02-16 12:29:07', '2019-02-16 12:32:21'),
(6, 18, 1, 1000, 1, 10000, 'selesai', NULL, '2019-02-16 12:59:45', '2019-02-16 13:01:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ramdan riawan', 'ramdanriawan3@gmail.com', NULL, '$2y$10$efZpCgINZUPbGiFNvzt.1OGuZxx0gV4U.QNjMGEQZf7hJTEj0NV/e', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggotas`
--
ALTER TABLE `anggotas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `anggotas_no_hp_unique` (`no_hp`),
  ADD UNIQUE KEY `anggotas_no_ktp_unique` (`no_ktp`);

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
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
-- Indexes for table `pembelians`
--
ALTER TABLE `pembelians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembelians_barang_id_foreign` (`barang_id`);

--
-- Indexes for table `pengeluarans`
--
ALTER TABLE `pengeluarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengeluarans_barang_id_foreign` (`barang_id`),
  ADD KEY `pengeluarans_anggota_id_foreign` (`anggota_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggotas`
--
ALTER TABLE `anggotas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `pembelians`
--
ALTER TABLE `pembelians`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengeluarans`
--
ALTER TABLE `pengeluarans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembelians`
--
ALTER TABLE `pembelians`
  ADD CONSTRAINT `pembelians_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengeluarans`
--
ALTER TABLE `pengeluarans`
  ADD CONSTRAINT `pengeluarans_anggota_id_foreign` FOREIGN KEY (`anggota_id`) REFERENCES `anggotas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengeluarans_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
