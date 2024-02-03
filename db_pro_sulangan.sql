-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 03, 2024 at 07:21 AM
-- Server version: 8.0.22
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pro_sulangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laba_rugi`
--

CREATE TABLE `laba_rugi` (
  `id` int NOT NULL,
  `pajak_pph` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `laba_rugi`
--

INSERT INTO `laba_rugi` (`id`, `pajak_pph`) VALUES
(1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_jabatan`
--

CREATE TABLE `m_jabatan` (
  `id_jabatan` varchar(255) NOT NULL,
  `nama_jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `m_jabatan`
--

INSERT INTO `m_jabatan` (`id_jabatan`, `nama_jabatan`, `created_at`, `updated_at`) VALUES
('JB-00001', 'Direktur Utama', NULL, NULL),
('JB-00002', 'Karyawan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_karyawan`
--

CREATE TABLE `m_karyawan` (
  `id_karyawan` varchar(255) NOT NULL,
  `id_jabatan` varchar(255) DEFAULT NULL,
  `nama_karyawan` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `tgl_mulai_bekerja` varchar(255) DEFAULT NULL,
  `tgl_selesai_bekerja` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `m_karyawan`
--

INSERT INTO `m_karyawan` (`id_karyawan`, `id_jabatan`, `nama_karyawan`, `email`, `telepon`, `tgl_mulai_bekerja`, `tgl_selesai_bekerja`, `created_at`, `updated_at`) VALUES
('KR-00001', NULL, 'Miroslave Klose', 'mroslvae@gmail.com', '0863546237', '01-06-2022', '27-08-2022', NULL, NULL),
('KR-00002', NULL, 'Thomas Muller', 'thomuller@gmail.com', '48573717', '01-06-2022', '27-08-2022', NULL, NULL),
('KR-00003', NULL, 'Toni Kroos', 'tkroos@gmail.com', '083472349', '01-06-2022', '27-08-2022', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_kode_akun`
--

CREATE TABLE `m_kode_akun` (
  `kode_akun` int NOT NULL,
  `nama_akun` varchar(50) NOT NULL,
  `tabel_bantuan` int NOT NULL,
  `pos_saldo` varchar(255) NOT NULL,
  `pos_laporan` varchar(255) NOT NULL,
  `debit` int DEFAULT NULL,
  `kredit` int DEFAULT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `m_kode_akun`
--

INSERT INTO `m_kode_akun` (`kode_akun`, `nama_akun`, `tabel_bantuan`, `pos_saldo`, `pos_laporan`, `debit`, `kredit`, `kategori`) VALUES
(1101, 'Kas', 1101, 'Debit', 'Neraca', 1000000, 1000000, 'Aset'),
(1102, 'Bank', 1102, 'Debit', 'Neraca', 2500000, 2500000, 'Aset'),
(1103, 'Deposite', 1103, 'Debit', 'Neraca', 1500000, 1500000, 'Aset'),
(2101, 'Hutang Usaha', 2101, 'Kredit', 'Neraca', 1500000, 1500000, 'Liabilitas'),
(2301, 'Hutang Gaji', 2301, 'Kredit', 'Neraca', 900000, 900000, 'Liabilitas'),
(3101, 'Modal Awal', 3101, 'Kredit', 'Neraca', 10000000, 10000000, 'Ekuitas'),
(3102, 'Prive', 3102, 'Kredit', 'Neraca', 2000000, 2000000, 'Ekuitas'),
(4101, 'Pendapatan Jasa', 4101, 'Kredit', 'Laba Rugi', 1200000, 1200000, 'Pendapatan'),
(5101, 'Biaya Sewa Kantor', 5101, 'Debit', 'Laba Rugi', 1200000, 1200000, 'Biaya'),
(6101, 'Pendapatan Jasa Giro', 6101, 'Kredit', 'Laba Rugi', 1000000, 1000000, 'Pendapatan Lain-Lain'),
(7101, 'Biaya Administrasi Bank', 7101, 'Debit', 'Laba Rugi', 1200000, 1200000, 'Biaya Lain-Lain');

-- --------------------------------------------------------

--
-- Table structure for table `m_kode_bantu`
--

CREATE TABLE `m_kode_bantu` (
  `kode_akun_bantu` int NOT NULL,
  `nama_akun_bantu` varchar(50) NOT NULL,
  `saldo_normal` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `tabel_bantuan` int NOT NULL,
  `saldo_awal` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `m_kode_bantu`
--

INSERT INTO `m_kode_bantu` (`kode_akun_bantu`, `nama_akun_bantu`, `saldo_normal`, `kategori`, `tabel_bantuan`, `saldo_awal`) VALUES
(120101, 'Toko KK', 'Debit', 'Piutang', 120101, 10000000),
(120102, 'Toko BB', 'Debit', 'Piutang', 120102, 1000000),
(210101, 'Toko Mebel Boy', 'Kredit', 'Hutang', 210101, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_jurnal_umum`
--

CREATE TABLE `t_jurnal_umum` (
  `id_jurnal_umum` int NOT NULL,
  `tanggal` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_bukti` int NOT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kode_akun` int NOT NULL,
  `kode_akun_bantu` int NOT NULL,
  `debit_jurnal` int NOT NULL,
  `kredit_jurnal` int NOT NULL,
  `id_karyawan1` varchar(255) NOT NULL,
  `saldo_jurnal` int NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `t_jurnal_umum`
--

INSERT INTO `t_jurnal_umum` (`id_jurnal_umum`, `tanggal`, `no_bukti`, `keterangan`, `kode_akun`, `kode_akun_bantu`, `debit_jurnal`, `kredit_jurnal`, `id_karyawan1`, `saldo_jurnal`, `created_at`) VALUES
(22, '05-08-2022', 12, 'Test1', 1102, 120102, 1200000, 1200000, 'KR-00001', 0, '2022-08-09'),
(23, '05-08-2022', 12, 'Test2', 1101, 120101, 1000000, 900000, 'KR-00001', 100000, '2022-09-20'),
(26, '06-08-2022', 5, 'Tes3', 1101, 120102, 1000000, 900000, 'KR-00001', 100000, '0000-00-00'),
(30, '13-08-2022', 6, 'Test6', 1103, 210101, 1000000, 700000, 'KR-00003', 300000, '0000-00-00'),
(31, '07-08-2022', 8, 'Test4', 1101, 120102, 1500000, 1400000, 'KR-00001', 100000, '0000-00-00'),
(32, '07-08-2022', 8, 'Test5', 1102, 120101, 2000000, 1800000, 'KR-00001', 200000, '0000-00-00'),
(33, '21-09-2022', 21, 'Pembelian', 1102, 210101, 1000000, 900000, 'KR-00002', 100000, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `t_neraca_lajur`
--

CREATE TABLE `t_neraca_lajur` (
  `id_laba_lajur` int NOT NULL,
  `kode_akun` int NOT NULL,
  `id_jurnal_umum` int NOT NULL,
  `tahun` year NOT NULL,
  `laba_rugi` int NOT NULL,
  `jumlah` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$/LLGzX4RY.v8wrJe0Mj0LuMIEiJjKheDhu1z69WvqUbBG8kHAibSi', NULL, '2022-05-20 10:31:01', '2022-05-20 10:31:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `laba_rugi`
--
ALTER TABLE `laba_rugi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_jabatan`
--
ALTER TABLE `m_jabatan`
  ADD PRIMARY KEY (`id_jabatan`) USING BTREE;

--
-- Indexes for table `m_karyawan`
--
ALTER TABLE `m_karyawan`
  ADD PRIMARY KEY (`id_karyawan`) USING BTREE,
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `m_kode_akun`
--
ALTER TABLE `m_kode_akun`
  ADD PRIMARY KEY (`kode_akun`);

--
-- Indexes for table `m_kode_bantu`
--
ALTER TABLE `m_kode_bantu`
  ADD PRIMARY KEY (`kode_akun_bantu`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `t_jurnal_umum`
--
ALTER TABLE `t_jurnal_umum`
  ADD PRIMARY KEY (`id_jurnal_umum`),
  ADD KEY `kode_akun` (`kode_akun`),
  ADD KEY `kode_akun_bantu` (`kode_akun_bantu`);

--
-- Indexes for table `t_neraca_lajur`
--
ALTER TABLE `t_neraca_lajur`
  ADD PRIMARY KEY (`id_laba_lajur`),
  ADD KEY `kode_akun` (`kode_akun`),
  ADD KEY `id_jurnal_umum` (`id_jurnal_umum`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laba_rugi`
--
ALTER TABLE `laba_rugi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_jurnal_umum`
--
ALTER TABLE `t_jurnal_umum`
  MODIFY `id_jurnal_umum` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `m_karyawan`
--
ALTER TABLE `m_karyawan`
  ADD CONSTRAINT `m_karyawan_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `m_jabatan` (`id_jabatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
