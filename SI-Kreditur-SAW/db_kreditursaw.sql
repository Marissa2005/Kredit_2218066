-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 07:35 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kreditursaw`
--

-- --------------------------------------------------------

--
-- Table structure for table `calon_krediturs`
--

CREATE TABLE `calon_krediturs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_calon` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telp` varchar(255) DEFAULT NULL,
  `jml_hutang` varchar(255) DEFAULT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `penghasilan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calon_krediturs`
--

INSERT INTO `calon_krediturs` (`id`, `nama_calon`, `alamat`, `no_telp`, `jml_hutang`, `pekerjaan`, `penghasilan`, `created_at`, `updated_at`) VALUES
(2, 'Ahmad', 'pp', '085967162714', '100000', '-', '100000', '2024-05-24 05:04:42', '2024-05-24 05:04:42'),
(3, 'Sulis', 'jkladakjda', '085967162715', '2000', NULL, '200', '2024-05-24 05:05:14', '2024-05-24 05:05:14'),
(4, 'Adolf', 'pp', '085967162716', '3000', 'ppp', '3000', '2024-05-24 05:05:38', '2024-05-24 05:05:38'),
(5, 'Gerry', 'jkladakjda', '085967162717', '4000', 'pqpo', '4000', '2024-05-24 05:06:04', '2024-05-24 05:06:04'),
(6, 'Rian', 'perum city view 1', '085967162717', '50000', 'poajdl', '600', '2024-05-24 05:06:31', '2024-05-24 05:06:31');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `jaminans`
--

CREATE TABLE `jaminans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `calon_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_aset` varchar(255) DEFAULT NULL,
  `nilai_aset` varchar(255) DEFAULT NULL,
  `status_kepemilikan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `karyawans`
--

CREATE TABLE `karyawans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telp` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `karyawans`
--

INSERT INTO `karyawans` (`id`, `user_id`, `nama_karyawan`, `alamat`, `no_telp`, `jabatan`, `created_at`, `updated_at`) VALUES
(3, 7, 'Admin', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kriterias`
--

CREATE TABLE `kriterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kriteria` varchar(255) DEFAULT NULL,
  `kategori` enum('Benefit','Cost') DEFAULT NULL,
  `bobot_kriteria` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriterias`
--

INSERT INTO `kriterias` (`id`, `nama_kriteria`, `kategori`, `bobot_kriteria`, `created_at`, `updated_at`) VALUES
(2, 'Nilai Jaminan', 'Benefit', '3', '2024-05-24 04:03:48', '2024-05-24 04:05:03'),
(3, 'Kemampuan Debitur', 'Benefit', '2', '2024-05-24 04:07:08', '2024-05-24 04:07:08'),
(4, 'Kredibilitas', 'Benefit', '2', '2024-05-24 04:08:20', '2024-05-24 04:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_05_24_062009_create_karyawans_table', 1),
(6, '2024_05_24_062532_create_calon_krediturs_table', 1),
(7, '2024_05_24_063553_create_jaminans_table', 1),
(8, '2024_05_24_064100_create_kriterias_table', 1),
(9, '2024_05_24_065812_create_sub_kriterias_table', 1),
(10, '2024_05_24_070125_create_penilaians_table', 1),
(11, '2024_05_24_070512_create_perankingans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penilaians`
--

CREATE TABLE `penilaians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `calon_kreditur_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `nilai` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penilaians`
--

INSERT INTO `penilaians` (`id`, `calon_kreditur_id`, `kriteria_id`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 3.00, '2024-05-24 05:11:55', '2024-05-24 05:11:55'),
(2, 2, 3, 3.00, '2024-05-24 05:11:55', '2024-05-24 05:11:55'),
(3, 2, 4, 4.00, '2024-05-24 05:11:55', '2024-05-24 05:11:55'),
(4, 3, 2, 3.00, '2024-05-24 05:13:26', '2024-05-24 05:13:26'),
(5, 3, 3, 3.00, '2024-05-24 05:13:26', '2024-05-24 05:13:26'),
(6, 3, 4, 5.00, '2024-05-24 05:13:26', '2024-05-24 05:13:26'),
(7, 4, 2, 1.00, '2024-05-24 05:13:58', '2024-05-24 05:13:58'),
(8, 4, 3, 2.00, '2024-05-24 05:13:58', '2024-05-24 05:13:58'),
(9, 4, 4, 3.00, '2024-05-24 05:13:58', '2024-05-24 05:13:58'),
(10, 5, 2, 2.00, '2024-05-24 05:14:50', '2024-05-24 05:14:50'),
(11, 5, 3, 2.00, '2024-05-24 05:14:50', '2024-05-24 05:14:50'),
(12, 5, 4, 3.00, '2024-05-24 05:14:50', '2024-05-24 05:14:50'),
(13, 6, 2, 4.00, '2024-05-24 05:15:09', '2024-05-24 05:15:09'),
(14, 6, 3, 3.00, '2024-05-24 05:15:09', '2024-05-24 05:15:09'),
(15, 6, 4, 4.00, '2024-05-24 05:15:09', '2024-05-24 05:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `perankingans`
--

CREATE TABLE `perankingans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `calon_id` bigint(20) UNSIGNED NOT NULL,
  `nilai_hasil` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perankingans`
--

INSERT INTO `perankingans` (`id`, `calon_id`, `nilai_hasil`, `created_at`, `updated_at`) VALUES
(1, 2, 5.85, '2024-05-24 05:11:56', '2024-05-24 07:52:10'),
(2, 3, 6.25, '2024-05-24 05:13:27', '2024-05-24 07:52:10'),
(3, 4, 3.29, '2024-05-24 05:13:58', '2024-05-24 07:52:10'),
(4, 5, 4.04, '2024-05-24 05:14:51', '2024-05-24 07:52:10'),
(5, 6, 6.60, '2024-05-24 05:15:10', '2024-05-24 07:52:10');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriterias`
--

CREATE TABLE `sub_kriterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `nama_sub` varchar(255) NOT NULL,
  `bobot_sub` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_kriterias`
--

INSERT INTO `sub_kriterias` (`id`, `kriteria_id`, `nama_sub`, `bobot_sub`, `created_at`, `updated_at`) VALUES
(1, 2, '>= 100 juta', 5, '2024-05-24 04:03:48', '2024-05-24 04:03:48'),
(2, 2, '70-99 juta', 4, '2024-05-24 04:03:48', '2024-05-24 04:03:48'),
(3, 2, '50-69 juta', 3, '2024-05-24 04:03:48', '2024-05-24 04:03:48'),
(4, 2, '10-49 juta', 2, '2024-05-24 04:03:48', '2024-05-24 04:03:48'),
(5, 2, '5-9 juta', 1, '2024-05-24 04:03:48', '2024-05-24 04:03:48'),
(6, 3, '71-100 juta', 5, '2024-05-24 04:07:08', '2024-05-24 04:14:01'),
(7, 3, '51-70 juta', 4, '2024-05-24 04:07:08', '2024-05-24 04:07:08'),
(8, 3, '31-50 juta', 3, '2024-05-24 04:07:08', '2024-05-24 04:07:08'),
(9, 3, '11-30 juta', 2, '2024-05-24 04:07:08', '2024-05-24 04:07:08'),
(10, 3, '7-10 juta', 1, '2024-05-24 04:07:08', '2024-05-24 04:07:08'),
(11, 4, 'Sangat Baik', 5, '2024-05-24 04:08:20', '2024-05-24 04:08:20'),
(12, 4, 'Baik', 4, '2024-05-24 04:08:20', '2024-05-24 04:08:20'),
(13, 4, 'Cukup', 3, '2024-05-24 04:08:20', '2024-05-24 04:08:20'),
(14, 4, 'Kurang', 2, '2024-05-24 04:08:20', '2024-05-24 04:08:20'),
(15, 4, 'Sangat Kurang', 1, '2024-05-24 04:08:20', '2024-05-24 04:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'admin@gmail.com', '$2y$12$qxAKWruko34kl31Tw62vpOaZm9ZZautAlKWbf.rB/rnfAVkaf21Iu', NULL, '2024-05-24 09:59:45', '2024-05-24 09:59:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calon_krediturs`
--
ALTER TABLE `calon_krediturs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jaminans`
--
ALTER TABLE `jaminans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jaminans_calon_id_foreign` (`calon_id`);

--
-- Indexes for table `karyawans`
--
ALTER TABLE `karyawans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `karyawans_user_id_foreign` (`user_id`);

--
-- Indexes for table `kriterias`
--
ALTER TABLE `kriterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `penilaians`
--
ALTER TABLE `penilaians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilaians_calon_id_foreign` (`calon_kreditur_id`),
  ADD KEY `penilaians_kriteria_id_foreign` (`kriteria_id`);

--
-- Indexes for table `perankingans`
--
ALTER TABLE `perankingans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perankingans_calon_id_foreign` (`calon_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sub_kriterias`
--
ALTER TABLE `sub_kriterias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_kriterias_kriteria_id_foreign` (`kriteria_id`);

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
-- AUTO_INCREMENT for table `calon_krediturs`
--
ALTER TABLE `calon_krediturs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jaminans`
--
ALTER TABLE `jaminans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `karyawans`
--
ALTER TABLE `karyawans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kriterias`
--
ALTER TABLE `kriterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `penilaians`
--
ALTER TABLE `penilaians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `perankingans`
--
ALTER TABLE `perankingans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_kriterias`
--
ALTER TABLE `sub_kriterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jaminans`
--
ALTER TABLE `jaminans`
  ADD CONSTRAINT `jaminans_calon_id_foreign` FOREIGN KEY (`calon_id`) REFERENCES `calon_krediturs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `karyawans`
--
ALTER TABLE `karyawans`
  ADD CONSTRAINT `karyawans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penilaians`
--
ALTER TABLE `penilaians`
  ADD CONSTRAINT `penilaians_calon_id_foreign` FOREIGN KEY (`calon_kreditur_id`) REFERENCES `calon_krediturs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaians_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriterias` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `perankingans`
--
ALTER TABLE `perankingans`
  ADD CONSTRAINT `perankingans_calon_id_foreign` FOREIGN KEY (`calon_id`) REFERENCES `calon_krediturs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_kriterias`
--
ALTER TABLE `sub_kriterias`
  ADD CONSTRAINT `sub_kriterias_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriterias` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
