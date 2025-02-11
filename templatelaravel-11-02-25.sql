-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 11, 2025 at 04:15 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `templatelaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE `bulan` (
  `id_bulan` char(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_bulan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`id_bulan`, `nama_bulan`) VALUES
('1', 'Januari'),
('10', 'Oktober'),
('11', 'November'),
('12', 'Desember'),
('2', 'Februari'),
('3', 'Maret'),
('4', 'April'),
('5', 'Mei'),
('6', 'Juni'),
('7', 'Juli'),
('8', 'Agustus'),
('9', 'September');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('admin@admin.com127.0.0.1', 'i:1;', 1738645187),
('admin@admin.com127.0.0.1:timer', 'i:1738645187;', 1738645187),
('admin127.0.0.1', 'i:1;', 1739193061),
('admin127.0.0.1:timer', 'i:1739193061;', 1739193061),
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:43:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:20:\"user change-password\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:12:\"user profile\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:9:\"user view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:11:\"user create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:9:\"user edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:11:\"user delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:26:\"user change-password-admin\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:22:\"role & permission view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:24:\"role & permission create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:22:\"role & permission edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:24:\"role & permission delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:14:\"pelanggan view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:12;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:16:\"pelanggan create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:13;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:14:\"pelanggan edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:14;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:16:\"pelanggan delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:12:\"layanan view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:16;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:14:\"layanan create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:12:\"layanan edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:18;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:14:\"layanan delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:19;a:3:{s:1:\"a\";i:32;s:1:\"b\";s:21:\"kriteria-layanan view\";s:1:\"c\";s:3:\"web\";}i:20;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:23:\"kriteria-layanan create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:21;a:4:{s:1:\"a\";i:34;s:1:\"b\";s:21:\"kriteria-layanan edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:22;a:4:{s:1:\"a\";i:35;s:1:\"b\";s:23:\"kriteria-layanan delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:23;a:4:{s:1:\"a\";i:36;s:1:\"b\";s:14:\"pemakaian view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:24;a:4:{s:1:\"a\";i:37;s:1:\"b\";s:16:\"pemakaian create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:25;a:4:{s:1:\"a\";i:38;s:1:\"b\";s:14:\"pemakaian edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:26;a:4:{s:1:\"a\";i:39;s:1:\"b\";s:16:\"pemakaian delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:27;a:4:{s:1:\"a\";i:40;s:1:\"b\";s:18:\"tarif-layanan view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:28;a:4:{s:1:\"a\";i:41;s:1:\"b\";s:20:\"tarif-layanan create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:29;a:4:{s:1:\"a\";i:42;s:1:\"b\";s:18:\"tarif-layanan edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:30;a:4:{s:1:\"a\";i:43;s:1:\"b\";s:20:\"tarif-layanan delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:31;a:4:{s:1:\"a\";i:44;s:1:\"b\";s:12:\"tagihan view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:32;a:4:{s:1:\"a\";i:45;s:1:\"b\";s:14:\"tagihan create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:33;a:4:{s:1:\"a\";i:46;s:1:\"b\";s:12:\"tagihan edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:34;a:4:{s:1:\"a\";i:47;s:1:\"b\";s:14:\"tagihan delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:35;a:4:{s:1:\"a\";i:48;s:1:\"b\";s:12:\"meteran view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:36;a:4:{s:1:\"a\";i:49;s:1:\"b\";s:14:\"meteran create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:37;a:4:{s:1:\"a\";i:50;s:1:\"b\";s:12:\"meteran edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:38;a:4:{s:1:\"a\";i:51;s:1:\"b\";s:14:\"meteran delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:39;a:4:{s:1:\"a\";i:52;s:1:\"b\";s:15:\"pembayaran view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:40;a:4:{s:1:\"a\";i:53;s:1:\"b\";s:17:\"pembayaran create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:41;a:4:{s:1:\"a\";i:54;s:1:\"b\";s:15:\"pembayaran edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:42;a:4:{s:1:\"a\";i:55;s:1:\"b\";s:17:\"pembayaran delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:1:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:5:\"Admin\";s:1:\"c\";s:3:\"web\";}}}', 1739279406);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembayaran`
--

CREATE TABLE `detail_pembayaran` (
  `id` bigint UNSIGNED NOT NULL,
  `id_pembayaran` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pakai` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_bulan` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` int NOT NULL,
  `pakai` int NOT NULL,
  `tarif` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_pembayaran`
--

INSERT INTO `detail_pembayaran` (`id`, `id_pembayaran`, `id_pakai`, `id_bulan`, `tahun`, `pakai`, `tarif`, `subtotal`, `created_at`, `updated_at`) VALUES
(10, 'admin-2025258784174637082025-02-10-22:35:47', 'TRX2025015878417463', '1', 2025, 30, '6655.00', '199650.00', '2025-02-10 15:35:47', '2025-02-10 15:35:47'),
(11, 'admin-2025258784174637082025-02-10-22:35:47', 'TRX2025025878417463', '2', 2025, 35, '6655.00', '232925.00', '2025-02-10 15:35:47', '2025-02-10 15:35:47');

-- --------------------------------------------------------

--
-- Table structure for table `detail_tagihan`
--

CREATE TABLE `detail_tagihan` (
  `id` bigint UNSIGNED NOT NULL,
  `id_tagihan` bigint UNSIGNED NOT NULL,
  `id_pakai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pakai` int NOT NULL,
  `tarif` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_tagihan`
--

INSERT INTO `detail_tagihan` (`id`, `id_tagihan`, `id_pakai`, `pakai`, `tarif`, `subtotal`, `created_at`, `updated_at`) VALUES
(20, 202525878417463933, 'TRX2025015878417463', 30, '6655.00', '199650.00', NULL, NULL),
(21, 202525878417463933, 'TRX2025025878417463', 35, '6655.00', '232925.00', NULL, NULL);

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_layanan`
--

CREATE TABLE `kriteria_layanan` (
  `id_kriteria_layanan` int NOT NULL,
  `id_layanan` int NOT NULL,
  `kriteria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kriteria_layanan`
--

INSERT INTO `kriteria_layanan` (`id_kriteria_layanan`, `id_layanan`, `kriteria`) VALUES
(1, 1, 'Hidran Umum'),
(3, 1, 'Terminal Air'),
(8, 2, 'Tempat Ibadah'),
(12, 2, 'Panti Asuah'),
(13, 2, 'Yayasan Sosial'),
(14, 2, 'Sekolah Negeri'),
(15, 2, 'Sekolah Swasta'),
(16, 3, 'Luas bangunan: &lt;= 30 m2'),
(17, 3, 'Jenis lantai: Tanah'),
(18, 3, 'Dinding Bambu/gedeg/kayu tahun'),
(19, 3, 'Plafon: Tanpa plafon'),
(20, 3, 'Atap: Seng/Asbes/Kajang'),
(21, 3, 'Daya listrik: &lt;= 450 watt'),
(22, 3, 'Jumlah lantai: 1 (tidak bertingkat)'),
(23, 3, 'Jalan masuk: &lt;= 1 Meter'),
(24, 4, 'Luas bangunan: >= 30 m2 s.d. &lt;= 45 m2'),
(25, 4, 'Jenis lantai: Lantai semen, Tegel'),
(26, 4, 'Dinding: Setengah tembok');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int NOT NULL,
  `nama_layanan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`) VALUES
(1, 'Sosial Umum'),
(2, 'Sosial Khusus'),
(3, 'Rumah A 1'),
(4, 'Rumah A 2'),
(5, 'Rumah A 2');

-- --------------------------------------------------------

--
-- Table structure for table `meteran`
--

CREATE TABLE `meteran` (
  `nomor_meteran` bigint NOT NULL,
  `id_pelanggan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_layanan` int NOT NULL,
  `lokasi_pemasangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pemasangan` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `chip_kartu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meteran`
--

INSERT INTO `meteran` (`nomor_meteran`, `id_pelanggan`, `id_layanan`, `lokasi_pemasangan`, `tanggal_pemasangan`, `status`, `chip_kartu`, `created_at`, `updated_at`) VALUES
(5878417463, 'PLG0001', 3, 'Purwokerto Barat', '2025-02-07', 1, '1060380630', '2025-02-08 04:32:19', '2025-02-08 04:37:59');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_11_30_090547_create_permission_tables', 1),
(5, '2025_02_03_173004_add_timestamps_and_user_tracking_to_pemakaian', 2),
(6, '2025_02_03_200953_create_table_tarif_layanan', 3),
(7, '2025_02_03_212821_create_tagihan', 4),
(8, '2025_02_03_221313_create_detail_tagihan', 5),
(9, '2025_02_03_222446_create_detail_tagihan2', 6),
(10, '2025_02_04_211559_create_meteran', 7),
(11, '2025_02_06_225314_create_pembayaran', 8),
(12, '2025_02_06_230428_create_detail_pembayaran', 9),
(13, '2025_02_07_101703_add_nomor_kartu_to_meteran', 10);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pelanggan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_ktp` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `no_ktp`, `alamat`, `no_hp`, `status`) VALUES
('PLG0001', 'Januar Surya', '1234567890123456', 'Kedungwuluh, Purwokerto Barat, Kabupaten Banyumas, Provinsi Jawa Tengah', '082133781736', 1),
('PLG0002', 'M Hafiz Abdil', '0987654321654321', 'Purwokerto', '087812345678', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pemakaian`
--

CREATE TABLE `pemakaian` (
  `id_pakai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_meteran` bigint NOT NULL,
  `bulan` char(3) NOT NULL,
  `id_layanan` int NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `tahun` char(4) NOT NULL,
  `awal` int NOT NULL,
  `akhir` int NOT NULL,
  `pakai` int NOT NULL,
  `status_pembayaran` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemakaian`
--

INSERT INTO `pemakaian` (`id_pakai`, `nomor_meteran`, `bulan`, `id_layanan`, `deskripsi`, `tahun`, `awal`, `akhir`, `pakai`, `status_pembayaran`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
('TRX2025015878417463', 5878417463, '1', 3, 'Rumah A 1', '2025', 0, 30, 30, 0, '2025-02-08 05:09:31', '2025-02-10 15:35:47', 1, 1),
('TRX2025025878417463', 5878417463, '2', 3, 'Rumah A 1', '2025', 30, 65, 35, 0, '2025-02-08 17:48:59', '2025-02-10 15:35:47', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_tagihan` bigint UNSIGNED NOT NULL,
  `nomor_meteran` bigint NOT NULL,
  `id_bulan` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` int NOT NULL,
  `total_nominal` decimal(10,2) NOT NULL,
  `waktu_pembayaran` timestamp NOT NULL,
  `metode_pembayaran` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `petugas` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint NOT NULL,
  `updated_by` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user change-password', 'web', '2025-02-03 03:40:13', '2025-02-03 03:40:13'),
(2, 'user profile', 'web', '2025-02-03 03:40:13', '2025-02-03 03:40:13'),
(3, 'user view', 'web', '2025-02-03 03:40:13', '2025-02-03 03:40:13'),
(4, 'user create', 'web', '2025-02-03 03:40:13', '2025-02-03 03:40:13'),
(5, 'user edit', 'web', '2025-02-03 03:40:13', '2025-02-03 03:40:13'),
(6, 'user delete', 'web', '2025-02-03 03:40:13', '2025-02-03 03:40:13'),
(7, 'user change-password-admin', 'web', '2025-02-03 03:40:13', '2025-02-03 03:40:13'),
(8, 'role & permission view', 'web', '2025-02-03 03:40:13', '2025-02-03 03:40:13'),
(9, 'role & permission create', 'web', '2025-02-03 03:40:13', '2025-02-03 03:40:13'),
(10, 'role & permission edit', 'web', '2025-02-03 03:40:13', '2025-02-03 03:40:13'),
(11, 'role & permission delete', 'web', '2025-02-03 03:40:13', '2025-02-03 03:40:13'),
(20, 'pelanggan view', 'web', '2025-02-03 03:52:37', '2025-02-03 03:52:37'),
(21, 'pelanggan create', 'web', '2025-02-03 03:52:37', '2025-02-03 03:52:37'),
(22, 'pelanggan edit', 'web', '2025-02-03 03:52:37', '2025-02-03 03:52:37'),
(23, 'pelanggan delete', 'web', '2025-02-03 03:52:37', '2025-02-03 03:52:37'),
(24, 'layanan view', 'web', '2025-02-03 04:42:11', '2025-02-03 04:42:11'),
(25, 'layanan create', 'web', '2025-02-03 04:42:11', '2025-02-03 04:42:11'),
(26, 'layanan edit', 'web', '2025-02-03 04:42:11', '2025-02-03 04:42:11'),
(27, 'layanan delete', 'web', '2025-02-03 04:42:11', '2025-02-03 04:42:11'),
(32, 'kriteria-layanan view', 'web', '2025-02-03 04:51:04', '2025-02-03 04:51:04'),
(33, 'kriteria-layanan create', 'web', '2025-02-03 04:51:04', '2025-02-03 04:51:04'),
(34, 'kriteria-layanan edit', 'web', '2025-02-03 04:51:04', '2025-02-03 04:51:04'),
(35, 'kriteria-layanan delete', 'web', '2025-02-03 04:51:04', '2025-02-03 04:51:04'),
(36, 'pemakaian view', 'web', '2025-02-03 08:30:02', '2025-02-03 08:30:02'),
(37, 'pemakaian create', 'web', '2025-02-03 08:30:02', '2025-02-03 08:30:02'),
(38, 'pemakaian edit', 'web', '2025-02-03 08:30:02', '2025-02-03 08:30:02'),
(39, 'pemakaian delete', 'web', '2025-02-03 08:30:02', '2025-02-03 08:30:02'),
(40, 'tarif-layanan view', 'web', '2025-02-03 13:31:44', '2025-02-03 13:31:44'),
(41, 'tarif-layanan create', 'web', '2025-02-03 13:31:44', '2025-02-03 13:31:44'),
(42, 'tarif-layanan edit', 'web', '2025-02-03 13:31:44', '2025-02-03 13:31:44'),
(43, 'tarif-layanan delete', 'web', '2025-02-03 13:31:44', '2025-02-03 13:31:44'),
(44, 'tagihan view', 'web', '2025-02-03 15:11:13', '2025-02-03 15:11:13'),
(45, 'tagihan create', 'web', '2025-02-03 15:11:13', '2025-02-03 15:11:13'),
(46, 'tagihan edit', 'web', '2025-02-03 15:11:13', '2025-02-03 15:11:13'),
(47, 'tagihan delete', 'web', '2025-02-03 15:11:13', '2025-02-03 15:11:13'),
(48, 'meteran view', 'web', '2025-02-04 14:32:06', '2025-02-04 14:32:06'),
(49, 'meteran create', 'web', '2025-02-04 14:32:06', '2025-02-04 14:32:06'),
(50, 'meteran edit', 'web', '2025-02-04 14:32:06', '2025-02-04 14:32:06'),
(51, 'meteran delete', 'web', '2025-02-04 14:32:06', '2025-02-04 14:32:06'),
(52, 'pembayaran view', 'web', '2025-02-06 16:19:38', '2025-02-06 16:19:38'),
(53, 'pembayaran create', 'web', '2025-02-06 16:19:38', '2025-02-06 16:19:38'),
(54, 'pembayaran edit', 'web', '2025-02-06 16:19:38', '2025-02-06 16:19:38'),
(55, 'pembayaran delete', 'web', '2025-02-06 16:19:38', '2025-02-06 16:19:38');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2025-02-03 03:40:13', '2025-02-08 09:38:51');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('yaJdEv7cnuU8mW07JHs5s4iH58nrbQ7J0NDAVubJ', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRlQ3NG8yWXJHREVTZkpsbnlCdnhKdjRCaktBWXFMcVZ2d3lSaTlFZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90YWdpaGFuL2NyZWF0ZS81ODc4NDE3NDYzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1739202525);

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `id_tagihan` bigint UNSIGNED NOT NULL,
  `id_bulan` char(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` int NOT NULL,
  `id_pelanggan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_meteran` bigint NOT NULL,
  `nominal` decimal(10,2) DEFAULT NULL,
  `waktu_awal` date NOT NULL,
  `waktu_akhir` date NOT NULL,
  `status_tagihan` tinyint(1) NOT NULL,
  `status_pembayaran` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` bigint NOT NULL,
  `updated_by` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`id_tagihan`, `id_bulan`, `tahun`, `id_pelanggan`, `nomor_meteran`, `nominal`, `waktu_awal`, `waktu_akhir`, `status_tagihan`, `status_pembayaran`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(202525878417463933, '2', 2025, 'PLG0001', 5878417463, '432575.00', '2025-02-01', '2025-02-28', 1, 0, '2025-02-10 15:46:43', '2025-02-10 15:46:43', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tarif_layanan`
--

CREATE TABLE `tarif_layanan` (
  `id_tarif_layanan` bigint UNSIGNED NOT NULL,
  `id_layanan` int NOT NULL,
  `tier` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_pemakaian` int NOT NULL,
  `max_pemakaian` int DEFAULT NULL,
  `tarif` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tarif_layanan`
--

INSERT INTO `tarif_layanan` (`id_tarif_layanan`, `id_layanan`, `tier`, `min_pemakaian`, `max_pemakaian`, `tarif`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tarif 1', 0, 10, '1760.00', '2025-02-03 13:32:52', '2025-02-03 13:32:52'),
(2, 1, 'Tarif 2', 11, 20, '2475.00', '2025-02-03 13:34:32', '2025-02-03 13:34:32'),
(3, 1, 'Tarif 3', 21, 0, '4235.00', '2025-02-03 13:35:07', '2025-02-03 13:35:07'),
(5, 3, 'Tarifff 1', 0, 10, '2805.00', '2025-02-05 11:25:43', '2025-02-08 08:31:09'),
(6, 3, 'Tarif 2', 11, 20, '3905.00', '2025-02-05 11:26:16', '2025-02-05 11:26:16'),
(7, 3, 'Tarif 3', 21, 0, '6655.00', '2025-02-05 11:26:43', '2025-02-05 11:26:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', NULL, NULL, '$2y$12$h4OwqZRGik0gB4q2v0ZCe.LcUXNb7etfdS2N9wbT5Dw1rBzUT3gBS', NULL, '2025-02-03 03:40:12', '2025-02-03 05:59:04');

-- --------------------------------------------------------

--
-- Table structure for table `users_login_logs`
--

CREATE TABLE `users_login_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `browser` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `platform` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('success','failed') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_login_logs`
--

INSERT INTO `users_login_logs` (`id`, `user_id`, `username`, `ip_address`, `user_agent`, `browser`, `platform`, `device`, `status`, `failed_reason`, `created_at`) VALUES
(1, NULL, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'failed', 'Username tidak ditemukan', '2025-02-03 03:39:51'),
(2, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-03 03:40:24'),
(3, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-03 04:20:50'),
(4, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-03 04:27:15'),
(5, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-03 05:05:55'),
(6, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-03 05:52:38'),
(7, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'failed', 'Password salah', '2025-02-03 13:31:20'),
(8, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-03 13:31:25'),
(9, NULL, 'admin@admin.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'failed', 'Username tidak ditemukan', '2025-02-04 04:58:48'),
(10, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-04 04:59:03'),
(11, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'failed', 'Password salah', '2025-02-04 11:06:43'),
(12, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-04 11:06:48'),
(13, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-04 14:31:07'),
(14, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-05 00:49:48'),
(15, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-05 06:43:39'),
(16, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-05 09:51:31'),
(17, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'failed', 'Password salah', '2025-02-06 09:35:01'),
(18, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-06 09:35:13'),
(19, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-06 14:16:38'),
(20, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-06 22:41:52'),
(21, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'failed', 'Password salah', '2025-02-07 03:02:33'),
(22, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-07 03:02:41'),
(23, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-07 06:17:40'),
(24, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-07 08:57:49'),
(25, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-08 03:45:37'),
(26, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-08 08:25:53'),
(27, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-08 13:55:41'),
(28, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-08 16:54:55'),
(29, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-08 22:57:26'),
(30, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-09 10:04:26'),
(31, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-09 22:55:04'),
(32, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-10 13:10:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id_bulan`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pembayaran` (`id_pembayaran`),
  ADD KEY `id_pakai` (`id_pakai`),
  ADD KEY `id_bulan` (`id_bulan`);

--
-- Indexes for table `detail_tagihan`
--
ALTER TABLE `detail_tagihan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pakai` (`id_pakai`),
  ADD KEY `detail_tagihan_id_tagihan_foreign` (`id_tagihan`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria_layanan`
--
ALTER TABLE `kriteria_layanan`
  ADD PRIMARY KEY (`id_kriteria_layanan`),
  ADD KEY `id_layanan` (`id_layanan`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `meteran`
--
ALTER TABLE `meteran`
  ADD PRIMARY KEY (`nomor_meteran`),
  ADD KEY `meteran_id_pelanggan_foreign` (`id_pelanggan`),
  ADD KEY `meteran_id_layanan_foreign` (`id_layanan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pemakaian`
--
ALTER TABLE `pemakaian`
  ADD PRIMARY KEY (`id_pakai`),
  ADD KEY `bulan` (`bulan`),
  ADD KEY `pemakaian_created_by_foreign` (`created_by`),
  ADD KEY `pemakaian_updated_by_foreign` (`updated_by`),
  ADD KEY `id_meteran` (`nomor_meteran`),
  ADD KEY `id_layanan` (`id_layanan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_tagihan` (`id_tagihan`),
  ADD KEY `id_meteran` (`nomor_meteran`),
  ADD KEY `id_bulan` (`id_bulan`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `nomor_meteran` (`nomor_meteran`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id_tagihan`),
  ADD KEY `tagihan_id_bulan_foreign` (`id_bulan`),
  ADD KEY `tagihan_id_pelanggan_foreign` (`id_pelanggan`),
  ADD KEY `id_meteran` (`nomor_meteran`);

--
-- Indexes for table `tarif_layanan`
--
ALTER TABLE `tarif_layanan`
  ADD PRIMARY KEY (`id_tarif_layanan`),
  ADD KEY `tarif_layanan_id_layanan_foreign` (`id_layanan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_login_logs`
--
ALTER TABLE `users_login_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_login_logs_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `detail_tagihan`
--
ALTER TABLE `detail_tagihan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kriteria_layanan`
--
ALTER TABLE `kriteria_layanan`
  MODIFY `id_kriteria_layanan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tarif_layanan`
--
ALTER TABLE `tarif_layanan`
  MODIFY `id_tarif_layanan` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_login_logs`
--
ALTER TABLE `users_login_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  ADD CONSTRAINT `detail_pembayaran_id_bulan_foreign` FOREIGN KEY (`id_bulan`) REFERENCES `bulan` (`id_bulan`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `detail_pembayaran_id_pakai_foreign` FOREIGN KEY (`id_pakai`) REFERENCES `pemakaian` (`id_pakai`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `detail_tagihan`
--
ALTER TABLE `detail_tagihan`
  ADD CONSTRAINT `detail_tagihan_ibfk_1` FOREIGN KEY (`id_pakai`) REFERENCES `pemakaian` (`id_pakai`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_tagihan_id_tagihan_foreign` FOREIGN KEY (`id_tagihan`) REFERENCES `tagihan` (`id_tagihan`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `kriteria_layanan`
--
ALTER TABLE `kriteria_layanan`
  ADD CONSTRAINT `kriteria_layanan_ibfk_1` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `meteran`
--
ALTER TABLE `meteran`
  ADD CONSTRAINT `meteran_id_layanan_foreign` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`) ON DELETE RESTRICT;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pemakaian`
--
ALTER TABLE `pemakaian`
  ADD CONSTRAINT `pemakaian_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT,
  ADD CONSTRAINT `pemakaian_id_layanan_foreign` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `pemakaian_nomor_meteran_foreign` FOREIGN KEY (`nomor_meteran`) REFERENCES `meteran` (`nomor_meteran`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `pemakaian_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_id_bulan_foreign` FOREIGN KEY (`id_bulan`) REFERENCES `bulan` (`id_bulan`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `pembayaran_nomor_meteran_foreign` FOREIGN KEY (`nomor_meteran`) REFERENCES `meteran` (`nomor_meteran`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD CONSTRAINT `tagihan_id_bulan_foreign` FOREIGN KEY (`id_bulan`) REFERENCES `bulan` (`id_bulan`) ON DELETE RESTRICT,
  ADD CONSTRAINT `tagihan_id_pelanggan_foreign` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE RESTRICT;

--
-- Constraints for table `tarif_layanan`
--
ALTER TABLE `tarif_layanan`
  ADD CONSTRAINT `tarif_layanan_id_layanan_foreign` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`) ON DELETE RESTRICT;

--
-- Constraints for table `users_login_logs`
--
ALTER TABLE `users_login_logs`
  ADD CONSTRAINT `users_login_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
