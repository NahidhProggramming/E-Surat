-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 07, 2024 at 01:28 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id_bidang` int NOT NULL,
  `nama_bidang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id_bidang`, `nama_bidang`) VALUES
(1, 'Departemen Keuangan'),
(2, 'Departemen Sumber Daya Manusia(HR)'),
(3, 'Departemen Pemasaran'),
(4, 'Departemen IT');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_11_03_095839_buat_table_surat_masuk', 2),
(6, '2024_11_03_110033_buat_table_surat_keluar', 3),
(7, '2024_11_18_024212_add_two_factor_columns_to_users_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('brYGaBDvxxyAbAkTr35r2RmRlExgIzRZrniIZlxB', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVjEzaHhiOXVaQ3NvVHFuYkc5cGxCdHlmRnZUaVdvYjE2UktJUmVPMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9lLXN1cmF0LnRlc3QvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1733576643),
('TRY5HtrZidMG1LLJjHd42Dn7L5ITw4TdE1lOqKS9', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibzZQVDJvVjEwQ29XdlFYVWdVMlZjcTdrR2ZzM2VRTlRLSGNqUU96ciI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9lLXN1cmF0LnRlc3Qvc3VyYXQtbWFzdWsiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1733297236);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id` bigint UNSIGNED NOT NULL,
  `nomor_surat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_kirim` date NOT NULL,
  `penerima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perihal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id`, `nomor_surat`, `tanggal_kirim`, `penerima`, `perihal`, `pengirim`, `created_at`, `updated_at`) VALUES
(3, '043/SK-P/KKMES/VIII/2024', '2024-09-06', 'Kepala Dinas Tenaga Kerja Kabupaten Probolinggo', 'Permohonan Pengesahan Peraturan Perusahaan', 'Koperasi Karyawan Mitra Energi Sejahtera', '2024-11-17 23:21:58', '2024-11-17 23:21:58'),
(4, '0117/SKL/KKMES/IIV/2023', '2023-07-11', 'Alma Indah Arsy', 'Pemberitahuan Kekeliruan Total Pembayaran Pembelian Material sesuai No referensi transaksi 20230706152602440911', 'Koperasi Karyawan Mitra Energi Sejahtera', '2024-11-17 23:23:12', '2024-11-17 23:23:12'),
(5, '042/SKL-P/VIII/KKMES/2022', '2022-08-01', 'Karyawan Maufirotul Miftah', 'Pemberitahuan perubahan jobdes pekerjaan', 'Koperasi Karyawan Mitra Energi Sejahtera', '2024-11-17 23:25:19', '2024-11-17 23:25:19'),
(6, '046/SKL-P/KKMES/IX/2022', '2022-09-12', 'Iwan P', 'Surat Penagihan Pembayaran Simpan Pinjam', 'Koperasi Karyawan Mitra Energi Sejahtera', '2024-11-17 23:26:30', '2024-11-17 23:26:30'),
(7, '040/SKL-P/VIII/KKMES/2022', '2022-08-01', 'Karyawan Bp Hasan Busri', 'Pemberitahuan perubahan jobdes pekerjaan', 'Koperasi Karyawan Mitra Energi Sejahtera', '2024-11-17 23:27:40', '2024-11-17 23:27:40'),
(8, '030/SKL-P/KKMES/V/2022', '2022-05-10', 'Bp Akhsanul Kholiqin', 'Undangan Halal Bihalal', 'Koperasi Karyawan Mitra Energi Sejahtera', '2024-11-17 23:28:30', '2024-11-17 23:28:30'),
(9, '030/SKL-P/KKMES/V/2022', '2022-05-10', 'Bp sarifudin', 'Undangan Halal Bihalal', 'Koperasi Karyawan Mitra Energi Sejahtera', '2024-11-17 23:29:06', '2024-11-17 23:29:06'),
(10, '030/SKL-P/KKMES/V/2022', '2022-05-10', 'Bp Faisal Riza', 'Undangan Halal Bihalal', 'Koperasi Karyawan Mitra Energi Sejahtera', '2024-11-17 23:29:38', '2024-11-17 23:29:38'),
(11, '030/SKL-P/KKMES/V/2022', '2022-05-10', 'Bp Hariyanto', 'Undangan Halal Bihalal', 'Koperasi Karyawan Mitra Energi Sejahtera', '2024-11-17 23:30:15', '2024-11-17 23:30:15'),
(12, '029/SKL-P/KKMES/V/2022', '2022-05-10', 'Pengurus & Karyawan KKMES', 'Undangan Halal Bihalal', 'Koperasi Karyawan Mitra Energi Sejahtera', '2024-11-17 23:30:56', '2024-11-17 23:30:56'),
(13, '028/SKL-P/KKMES/V/2022', '2022-05-10', 'Managemen PT Mitra Mitra Energi Sembilan', 'Undangan Halal Bihalal', 'Koperasi Karyawan Mitra Energi Sejahtera', '2024-11-17 23:31:36', '2024-11-17 23:31:36');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id` bigint UNSIGNED NOT NULL,
  `nomor_surat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_terima` date NOT NULL,
  `pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perihal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id`, `nomor_surat`, `tanggal_terima`, `pengirim`, `perihal`, `penerima`, `created_at`, `updated_at`) VALUES
(3, 'B/2889/032024', '2024-03-22', 'PBJS Ketenagakerjaan', 'Implementasi Program Jaminan Sosial Ketenagakerjaan Pada Ekosistem Koperasi', 'Pengurus Koperasi se-Kabupaten Probolinggo', '2024-11-04 02:55:12', '2024-11-04 18:49:49'),
(5, 'B/41686/IX/YAN.1.2/2022/Ditlantas', '2022-09-11', 'Kepolisian Negara Republik Indonesia Daerah Jawa Timur Direktorat Lalu Lintas', 'Surat Konfirmasi ETLE', 'Koperasi Karyawan Mitra Energi Sejahtera', '2024-11-04 00:51:01', '2024-11-04 00:51:01'),
(6, '-', '2022-05-20', 'PT. Mitra Energi Sembilan', 'Pemberitahuan Penundaan Pembayaran Invoice', 'Manager KopKar Mitra Energi Sejahtera Up. Bpk Hasan Basri', '2024-11-04 00:54:10', '2024-11-04 00:54:10'),
(9, '6321', '2023-03-02', 'PT UGT SYSTEM INTEGRATOR DEVELOPMENT', 'Invoice Layanan Si BMT', 'KopKar Mitra Energi Sejahtera', '2024-11-04 19:34:10', '2024-11-04 20:12:21'),
(10, '6074', '2023-01-02', 'PT UGT SYSTEM INTEGRATOR DEVELOPMENT', 'Invoice Layanan Si BMT', 'KopKar Mitra Energi Sejahtera', '2024-11-04 19:37:25', '2024-11-04 20:11:39'),
(11, '5955', '2022-12-05', 'PT UGT SYSTEM INTEGRATOR DEVELOPMENT', 'Invoice Layanan Si BMT', 'KopKar Mitra Energi Sejahtera', '2024-11-04 19:39:19', '2024-11-04 20:11:14'),
(12, '5837', '2022-11-01', 'PT UGT SYSTEM INTEGRATOR DEVELOPMENT', 'Invoice Layanan Si BMT', 'KopKar Mitra Energi Sejahtera', '2024-11-04 19:40:13', '2024-11-04 20:10:50'),
(13, '5724', '2022-10-03', 'PT UGT SYSTEM INTEGRATOR DEVELOPMENT', 'Invoice Layanan Si BMT', 'KopKar Mitra Energi Sejahtera', '2024-11-04 19:41:36', '2024-11-04 20:10:27'),
(14, '5609', '2022-09-02', 'PT UGT SYSTEM INTEGRATOR DEVELOPMENT', 'Invoice Layanan Si BMT', 'KopKar Mitra Energi Sejahtera', '2024-11-04 19:42:31', '2024-11-04 20:10:01'),
(15, '5500', '2022-08-01', 'PT UGT SYSTEM INTEGRATOR DEVELOPMENT', 'Invoice Layanan Si BMT', 'KopKar Mitra Energi Sejahtera', '2024-11-04 19:43:47', '2024-11-04 20:09:36'),
(16, '-', '2021-12-02', 'PT. PJB UNIT BISNIS JASA O DAN M PLTU PAITON', 'Permohonan Bantuan Biaya Kegiatan Capacity Building Tahun 2021', 'Ketua Koperasi Karyawan Mitra Energi Sejahtera', '2024-11-04 19:46:12', '2024-11-04 19:46:12'),
(17, '5379', '2022-07-01', 'PT UGT SYSTEM INTEGRATOR DEVELOPMENT', 'Invoice Layanan Si BMT', 'KopKar Mitra Energi Sejahtera', '2024-11-04 19:47:26', '2024-11-04 20:09:00'),
(18, '5257', '2022-06-03', 'PT UGT SYSTEM INTEGRATOR DEVELOPMENT', 'Invoice Layanan Si BMT', 'KopKar Mitra Energi Sejahtera', '2024-11-04 19:48:08', '2024-11-04 20:08:28'),
(19, '4845', '2022-04-04', 'PT UGT SYSTEM INTEGRATOR DEVELOPMENT', 'Invoice Layanan Si BMT', 'KopKar Mitra Energi Sejahtera', '2024-11-04 19:49:00', '2024-11-04 20:08:02'),
(20, 'B/ /032022', '2022-03-15', 'BPJS Ketenagakerjaan', 'Pengiriman Tanda Bukti Kepesertaan NPP: NN041923 DIV: 000', 'KOPKAR MITRA ENERGI SEJAHTERA - 000', '2024-11-04 19:52:08', '2024-11-04 19:52:08'),
(21, '033.SK/PTMES/V/2022', '2022-05-24', 'PT. Mitra Energi Sembilan', 'Pengajuan Penyertaan Modal Usaha', 'Manager Koperasi Karyawan Mitra Energi Sejahtera', '2024-11-04 19:54:29', '2024-11-04 19:54:29'),
(22, '-', '2022-05-20', 'Moch. Izzul Prayoga Izzuluqi', 'Laporan Praktek Kerja Lapangan (PKL)', 'KopKar Mitra Energi Sejahtera', '2024-11-04 20:00:27', '2024-11-04 20:00:27'),
(23, '-', '2022-05-21', 'Elisa Helma Hairani', 'Laporan Praktek Kerja Lapangan (PKL)', 'KopKar Mitra Energi Sejahtera', '2024-11-04 20:02:19', '2024-11-04 20:02:19'),
(24, '4964', '2022-05-09', 'PT UGT SYSTEM INTEGRATOR DEVELOPMENT', 'Invoice Layanan Si BMT', 'KopKar Mitra Energi Sejahtera', '2024-11-04 20:04:28', '2024-11-04 20:06:59'),
(25, '4730', '2022-03-02', 'PT UGT SYSTEM INTEGRATOR DEVELOPMENT', 'Invoice Layanan Si BMT', 'KopKar Mitra Energi Sejahtera', '2024-11-04 20:06:22', '2024-11-04 20:06:22'),
(26, '6196', '2023-02-06', 'PT UGT SYSTEM INTEGRATOR DEVELOPMENT', 'Invoice Layanan Si BMT', 'KopKar Mitra Energi Sejahtera', '2024-11-04 20:13:04', '2024-11-04 20:13:04'),
(27, 'B/1265/III/YAN.1.2/2024/Satlantas', '2024-03-23', 'Kepolisian Negara Republik Indonesia Daerah Jawa Timur Resor Kota Besar Surabaya', 'Surat Konfirmasi ETLE', 'KOPKAR MITRA ENERGI SJHTR', '2024-11-04 20:26:02', '2024-11-04 20:26:02'),
(28, 'B/1407/III/YAN.1.2/2024/Ditlantas', '2024-03-28', 'Kepolisian Negara Republik Indonesia Daerah Jawa Timur Direktorat Lalu Lintas', 'Surat Konfirmasi ETLE', 'KOPKAR MITRA ENERGI SJHTR', '2024-11-04 20:27:55', '2024-11-04 20:27:55'),
(29, 'B/5226/IV/YAN.1.2/2024/Ditlantas', '2024-04-14', 'Kepolisian Negara Republik Indonesia Daerah Jawa Timur Direktorat Lalu Lintas', 'Surat Konfirmasi ETLE', 'KOPKAR MITRA ENERGI SJHTR', '2024-11-04 20:29:20', '2024-11-04 20:29:20'),
(30, 'B/32718/VIII/YAN.1.2/2024/Satlantas', '2024-08-01', 'Kepolisian Negara Republik Indonesia Daerah Jawa Timur Direktorat Lalu Lintas', 'Surat Konfirmasi ETLE', 'KOPKAR MITRA ENERGI SJHTR', '2024-11-04 20:30:46', '2024-11-04 20:30:46'),
(31, 'B/34147/VIII/YAN.1.2/2024/Satlantas', '2024-08-06', 'Kepolisian Negara Republik Indonesia Daerah Jawa Timur Direktorat Lalu Lintas', 'Surat Konfirmasi ETLE', 'KOPKAR MITRA ENERGI SJHTR', '2024-11-04 20:31:50', '2024-11-13 05:17:42'),
(32, 'B/22110/VII/YAN.1.2/2024/Satlantas', '2024-07-04', 'Kepolisian Negara Republik Indonesia Daerah Jawa Timur Direktorat Lalu Lintas', 'Surat Konfirmasi ETLE', 'KOPKAR MITRA ENERGI SJHTR', '2024-11-04 20:32:54', '2024-11-04 20:32:54'),
(37, '01/PMN/MD.NM/08/2024', '2024-08-19', 'Panitia Peringatan Maulid Nabi SAW Yayasan Nurul Mun\'im Binnur Madin Nurul Mun\'im', 'Permohonan Sumbangan Dana', 'Bapak Pimpinan Manager PT. KKMES', '2024-11-18 18:13:15', '2024-11-18 18:13:15'),
(38, '04/PHBI/Musholla Al AMIN/IX/2024', '2024-09-07', 'Panitia Memperingati Maulid Nabi Muhammad SAW Musholla Al-Amin RT 21 RW 06 Desa.Sumberanyar Kec.Paiton', 'Permohonan Bantuan Dana', 'Pimpinan PT. KKMES Sumberanyar', '2024-11-18 18:16:57', '2024-11-18 18:16:57'),
(39, 'B/4366/072024', '2024-07-04', 'BPJS Ketenagakerjaan', 'Kewajiban Update Terbaru Aplikasi JMO', 'Pimpinan Badan Usaha', '2024-11-18 18:18:54', '2024-11-18 18:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','staff') NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Nahidhul Umam', 'nahidh2018@gmail.com', '$2y$12$2UpajCRHvTruo7wd1FFHo.0Q0YFzGY5qp.y0TKq.14wu.mCrCkLEa', 'admin', '2024-11-28 01:29:17', '2024-11-27 19:02:25'),
(2, 'Abdul Qodir', 'abdulqodir15@gmail.com', '$2y$12$mOS9deD0B1kIQ50HgqsCduPX3fu37IOKA0eHVlUJvFxLX7tZWlrde', 'staff', '2024-11-28 03:33:30', '2024-11-27 20:33:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id_bidang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
