-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 08, 2025 at 08:21 AM
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
('admin127.0.0.1', 'i:1;', 1741418245),
('admin127.0.0.1:timer', 'i:1741418245;', 1741418245),
('afridho127.0.0.1', 'i:1;', 1740207369),
('afridho127.0.0.1:timer', 'i:1740207369;', 1740207369),
('kasir1127.0.0.1', 'i:1;', 1741418318),
('kasir1127.0.0.1:timer', 'i:1741418318;', 1741418318),
('petugas127.0.0.1', 'i:1;', 1741421800),
('petugas127.0.0.1:timer', 'i:1741421800;', 1741421800),
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:52:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:20:\"user change-password\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:4;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:12:\"user profile\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:4;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:9:\"user view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:11:\"user create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:9:\"user edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:11:\"user delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:26:\"user change-password-admin\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:22:\"role & permission view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:24:\"role & permission create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:22:\"role & permission edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:24:\"role & permission delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:14:\"pelanggan view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:4;}}i:12;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:16:\"pelanggan create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:13;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:14:\"pelanggan edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:14;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:16:\"pelanggan delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:12:\"layanan view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:4;}}i:16;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:14:\"layanan create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:12:\"layanan edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:18;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:14:\"layanan delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:19;a:4:{s:1:\"a\";i:32;s:1:\"b\";s:21:\"kriteria-layanan view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:20;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:23:\"kriteria-layanan create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:21;a:4:{s:1:\"a\";i:34;s:1:\"b\";s:21:\"kriteria-layanan edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:22;a:4:{s:1:\"a\";i:35;s:1:\"b\";s:23:\"kriteria-layanan delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:23;a:4:{s:1:\"a\";i:36;s:1:\"b\";s:14:\"pemakaian view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:4;}}i:24;a:4:{s:1:\"a\";i:37;s:1:\"b\";s:16:\"pemakaian create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:25;a:4:{s:1:\"a\";i:38;s:1:\"b\";s:14:\"pemakaian edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:26;a:4:{s:1:\"a\";i:39;s:1:\"b\";s:16:\"pemakaian delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:27;a:4:{s:1:\"a\";i:40;s:1:\"b\";s:18:\"tarif-layanan view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:4;}}i:28;a:4:{s:1:\"a\";i:41;s:1:\"b\";s:20:\"tarif-layanan create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:29;a:4:{s:1:\"a\";i:42;s:1:\"b\";s:18:\"tarif-layanan edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:30;a:4:{s:1:\"a\";i:43;s:1:\"b\";s:20:\"tarif-layanan delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:31;a:4:{s:1:\"a\";i:44;s:1:\"b\";s:12:\"tagihan view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:4;}}i:32;a:4:{s:1:\"a\";i:45;s:1:\"b\";s:14:\"tagihan create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:33;a:4:{s:1:\"a\";i:46;s:1:\"b\";s:12:\"tagihan edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:34;a:4:{s:1:\"a\";i:47;s:1:\"b\";s:14:\"tagihan delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:35;a:4:{s:1:\"a\";i:48;s:1:\"b\";s:12:\"meteran view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:4;}}i:36;a:4:{s:1:\"a\";i:49;s:1:\"b\";s:14:\"meteran create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:37;a:4:{s:1:\"a\";i:50;s:1:\"b\";s:12:\"meteran edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:38;a:4:{s:1:\"a\";i:51;s:1:\"b\";s:14:\"meteran delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:39;a:4:{s:1:\"a\";i:52;s:1:\"b\";s:15:\"pembayaran view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:4;}}i:40;a:4:{s:1:\"a\";i:53;s:1:\"b\";s:17:\"pembayaran create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:4;}}i:41;a:4:{s:1:\"a\";i:54;s:1:\"b\";s:15:\"pembayaran edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:4;}}i:42;a:4:{s:1:\"a\";i:55;s:1:\"b\";s:17:\"pembayaran delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:4;}}i:43;a:4:{s:1:\"a\";i:56;s:1:\"b\";s:23:\"laporan-pembayaran view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:4;}}i:44;a:4:{s:1:\"a\";i:57;s:1:\"b\";s:22:\"laporan-pelanggan view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:4;}}i:45;a:4:{s:1:\"a\";i:58;s:1:\"b\";s:10:\"rekap view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:4;}}i:46;a:3:{s:1:\"a\";i:59;s:1:\"b\";s:17:\"meteran buatkartu\";s:1:\"c\";s:3:\"web\";}i:47;a:3:{s:1:\"a\";i:60;s:1:\"b\";s:19:\"meteran mapping    \";s:1:\"c\";s:3:\"web\";}i:48;a:3:{s:1:\"a\";i:61;s:1:\"b\";s:21:\"pembayaran pembatalan\";s:1:\"c\";s:3:\"web\";}i:49;a:4:{s:1:\"a\";i:62;s:1:\"b\";s:24:\"pembayaran cetakkuitansi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:50;a:4:{s:1:\"a\";i:63;s:1:\"b\";s:18:\"tagihan pembayaran\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:51;a:4:{s:1:\"a\";i:64;s:1:\"b\";s:23:\"tagihan generatetagihan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}}s:5:\"roles\";a:3:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:5:\"Admin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:7:\"Petugas\";s:1:\"c\";s:3:\"web\";}i:2;a:3:{s:1:\"a\";i:4;s:1:\"b\";s:5:\"Kasir\";s:1:\"c\";s:3:\"web\";}}}', 1741508347);

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
(22, 'administrator-2025258784174639352025-02-21-16:01:41', 'TRX2025015878417463', '1', 2025, 30, '6655.00', '199650.00', '2025-02-21 09:01:41', '2025-02-21 09:01:41'),
(23, 'administrator-2025258784174639352025-02-21-16:01:41', 'TRX2025025878417463', '2', 2025, 15, '3905.00', '58575.00', '2025-02-21 09:01:41', '2025-02-21 09:01:41'),
(26, 'administrator-202523023277293372025-02-22-10:51:27', 'TRX202501302327729', '1', 2025, 12, '4345.00', '52140.00', '2025-02-22 03:51:27', '2025-02-22 03:51:27'),
(27, 'administrator-202523023277293372025-02-22-10:51:27', 'TRX202502302327729', '2', 2025, 12, '4345.00', '52140.00', '2025-02-22 03:51:27', '2025-02-22 03:51:27'),
(28, 'administrator-2025221279675851062025-02-22-13:37:36', 'TRX2025012127967585', '1', 2025, 10, '2915.00', '29150.00', '2025-02-22 06:37:36', '2025-02-22 06:37:36'),
(29, 'administrator-2025221279675851062025-02-22-13:37:36', 'TRX2025022127967585', '2', 2025, 1, '2915.00', '2915.00', '2025-02-22 06:37:36', '2025-02-22 06:37:36');

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
(29, 202525878417463935, 'TRX2025015878417463', 30, '6655.00', '199650.00', NULL, NULL),
(30, 202525878417463935, 'TRX2025025878417463', 15, '3905.00', '58575.00', NULL, NULL),
(31, 20252302327729337, 'TRX202501302327729', 12, '4345.00', '52140.00', NULL, NULL),
(32, 20252302327729337, 'TRX202502302327729', 12, '4345.00', '52140.00', NULL, NULL),
(33, 20252622682483943, 'TRX202501622682483', 13, '3905.00', '50765.00', NULL, NULL),
(34, 20252622682483943, 'TRX202502622682483', 13, '3905.00', '50765.00', NULL, NULL),
(35, 20252774547919908, 'TRX202501774547919', 9, '1760.00', '15840.00', NULL, NULL),
(36, 20252774547919908, 'TRX202502774547919', 7, '1760.00', '12320.00', NULL, NULL),
(37, 202521188654974193, 'TRX2025011188654974', 17, '2475.00', '42075.00', NULL, NULL),
(38, 202521188654974193, 'TRX2025021188654974', 12, '2475.00', '29700.00', NULL, NULL),
(39, 202521258670185247, 'TRX2025021258670185', 19, '2695.00', '51205.00', NULL, NULL),
(40, 202522127967585106, 'TRX2025012127967585', 10, '2915.00', '29150.00', NULL, NULL),
(41, 202522127967585106, 'TRX2025022127967585', 1, '2915.00', '2915.00', NULL, NULL),
(42, 202532127967585941, 'TRX2025032127967585', 14, '4125.00', '57750.00', NULL, NULL);

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
  `nama_layanan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`) VALUES
(1, 'Sosial Umum'),
(2, 'Sosial Khusus'),
(3, 'Rumah A.1'),
(4, 'Rumah A.2'),
(5, 'Rumah B.1'),
(6, 'Rumah B.2'),
(7, 'Instansi Pemerintah Desa/Kelurahan'),
(8, 'Instansi Pemerintah Kecamatan'),
(9, 'Niaga Kecil'),
(10, 'Niaga Besar'),
(11, 'Industri Kecil'),
(12, 'Industri Besar');

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
(31067366, 'PLG0037', 3, 'Dk. Sugiono No. 566, Cilegon 76244, Banten', '2008-06-14', 1, '1060380630', '2025-02-17 23:11:27', '2025-02-22 03:20:25'),
(302327729, 'PLG0014', 5, 'Ds. Abang No. 700, Palu 94504, DKI', '2007-02-01', 1, '1769712130', '2025-02-17 23:11:27', '2025-02-22 03:21:05'),
(622682483, 'PLG0029', 3, 'Ki. Baung No. 677, Mataram 77744, Sulut', '1976-08-13', 1, '3584401468', '2025-02-17 23:11:27', '2025-02-22 04:04:54'),
(774547919, 'PLG0046', 1, 'Psr. Ir. H. Juanda No. 431, Banjar 55714, Bali', '1996-10-13', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(1188654974, 'PLG0033', 1, 'Psr. Salak No. 327, Subulussalam 41984, Pabar', '2005-09-29', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(1258670185, 'PLG0006', 2, 'Jr. Elang No. 970, Payakumbuh 58101, Sultra', '2021-07-11', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(1769712130, 'PLG0001', 3, 'Purwokerto Timur', '2025-02-16', 1, NULL, '2025-02-16 04:53:04', '2025-02-16 04:53:04'),
(1896373025, 'PLG0013', 1, 'Kpg. Siliwangi No. 345, Parepare 59765, DIY', '2020-09-03', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(2115615261, 'PLG0049', 4, 'Jln. Bahagia No. 9, Kotamobagu 29805, Sulteng', '1985-07-13', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(2127967585, 'PLG0047', 4, 'Kpg. Adisumarmo No. 176, Metro 74912, Sumut', '2021-05-21', 1, '1394228620', '2025-02-17 23:11:27', '2025-02-22 06:34:44'),
(2423698708, 'PLG0039', 2, 'Gg. Banceng Pondok No. 378, Singkawang 74092, Sulteng', '1993-01-30', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(2429622170, 'PLG0044', 1, 'Ds. Wahid No. 817, Sorong 59478, Sulut', '2013-03-31', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(2681495051, 'PLG0021', 3, 'Ds. Kiaracondong No. 624, Solok 52368, Pabar', '2006-03-14', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(2681704910, 'PLG0050', 4, 'Gg. Teuku Umar No. 291, Banjar 76939, Sumut', '1996-04-05', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(3306570688, 'PLG0034', 3, 'Gg. Suharso No. 45, Banda Aceh 31509, Babel', '2006-08-25', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(3663332424, 'PLG0024', 1, 'Ki. Pelajar Pejuang 45 No. 510, Pekanbaru 66030, Bengkulu', '1984-02-22', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(4278140636, 'PLG0009', 5, 'Gg. Moch. Yamin No. 172, Serang 11703, Bali', '1974-12-27', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(4357919556, 'PLG0028', 5, 'Kpg. Kartini No. 946, Mataram 17438, DKI', '2021-12-03', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(4697362903, 'PLG0027', 3, 'Kpg. Dago No. 183, Tanjungbalai 16486, NTT', '2022-09-15', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(4727737755, 'PLG0036', 4, 'Dk. Baing No. 731, Pagar Alam 35540, Sulteng', '2019-06-26', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(4812928010, 'PLG0003', 5, 'Jln. R.M. Said No. 688, Batu 88313, DKI', '2020-12-17', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(4859066541, 'PLG0043', 1, 'Kpg. Pasteur No. 113, Gunungsitoli 18404, Sultra', '2010-05-27', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(4897306052, 'PLG0035', 5, 'Psr. Acordion No. 823, Serang 59429, NTT', '2004-10-30', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(5119124521, 'PLG0025', 2, 'Kpg. Tubagus Ismail No. 163, Cirebon 81943, Sulteng', '1997-03-31', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(5173397413, 'PLG0041', 2, 'Psr. Radio No. 966, Kediri 50936, DKI', '1981-07-21', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(5323529189, 'PLG0031', 1, 'Psr. Baing No. 849, Tangerang Selatan 46096, Malut', '1992-10-30', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(5453796328, 'PLG0010', 1, 'Dk. Gegerkalong Hilir No. 24, Pekanbaru 17467, Papua', '2024-10-12', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(5702009892, 'PLG0052', 3, 'Ds. Laswi No. 509, Sungai Penuh 75403, Sumbar', '1984-04-26', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(5734948706, 'PLG0017', 4, 'Jr. Radio No. 226, Padangsidempuan 64869, Sulut', '2012-08-28', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(5878417463, 'PLG0001', 3, 'Purwokerto Barat', '2025-02-07', 1, NULL, '2025-02-08 04:32:19', '2025-02-08 04:37:59'),
(6209941366, 'PLG0023', 4, 'Kpg. Fajar No. 274, Ambon 13581, Jambi', '1999-04-28', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(6544817617, 'PLG0007', 1, 'Gg. Bacang No. 639, Binjai 89907, Kalsel', '2000-07-10', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(6629193751, 'PLG0011', 3, 'Jln. Mulyadi No. 790, Madiun 82240, NTT', '1972-07-13', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(6849163385, 'PLG0045', 2, 'Kpg. Baha No. 914, Lhokseumawe 75391, Jabar', '2017-06-26', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(6852244064, 'PLG0012', 5, 'Ds. Ki Hajar Dewantara No. 907, Bandung 66127, Malut', '2017-06-25', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(7254959957, 'PLG0004', 5, 'Ds. Perintis Kemerdekaan No. 860, Palopo 73971, Bengkulu', '2006-01-28', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(7296846395, 'PLG0048', 4, 'Gg. Wahidin No. 921, Sabang 65136, Kalteng', '2005-01-31', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(7321362931, 'PLG0032', 3, 'Kpg. Baja No. 78, Palopo 26435, Kalbar', '2021-02-01', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(7608981542, 'PLG0026', 5, 'Dk. Jamika No. 480, Tebing Tinggi 38355, NTT', '1991-10-06', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(7753520750, 'PLG0051', 1, 'Gg. Banceng Pondok No. 383, Medan 53815, Kepri', '2020-11-11', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(7762616683, 'PLG0005', 5, 'Gg. Merdeka No. 419, Depok 22864, NTB', '2013-01-02', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(7803632984, 'PLG0042', 4, 'Jr. Eka No. 580, Tegal 10455, NTT', '1984-07-05', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(7937230762, 'PLG0019', 3, 'Kpg. Gajah Mada No. 369, Pasuruan 63765, Papua', '1997-06-08', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(8174109135, 'PLG0040', 5, 'Ki. Jend. A. Yani No. 660, Banjarbaru 56827, Kaltim', '1974-07-22', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(8416801854, 'PLG0016', 2, 'Dk. Ters. Jakarta No. 455, Tasikmalaya 48161, Sulut', '2002-03-04', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(8760955944, 'PLG0020', 2, 'Ds. Padma No. 695, Serang 47192, Sumsel', '1982-01-18', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(9298790867, 'PLG0008', 2, 'Jln. Antapani Lama No. 104, Banjar 79050, Kalsel', '2012-01-29', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(9447826188, 'PLG0022', 3, 'Ds. Bata Putih No. 632, Administrasi Jakarta Pusat 73193, DKI', '2003-05-18', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(9535834980, 'PLG0030', 5, 'Psr. Ters. Pasir Koja No. 628, Padangpanjang 61103, Riau', '2006-04-06', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(9729690198, 'PLG0038', 4, 'Jr. Antapani Lama No. 421, Administrasi Jakarta Utara 72437, Kalsel', '2012-06-19', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(9776706966, 'PLG0015', 5, 'Ds. Acordion No. 58, Sawahlunto 78290, Sumsel', '1987-01-11', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(9828137420, 'PLG0018', 1, 'Dk. Raden No. 656, Padangsidempuan 92792, Bali', '2009-03-01', 1, NULL, '2025-02-17 23:11:27', '2025-02-17 23:11:27'),
(9987654321, 'PLG0002', 3, 'Purwokerto Barat', '2025-02-16', 1, NULL, '2025-02-16 04:04:04', '2025-02-16 04:04:04');

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
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 4);

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
('PLG0002', 'M Hafiz Abdil', '0987654321654321', 'Purwokerto', '087812345678', 1),
('PLG0003', 'Murti Pradana', '9550250723008950', 'Jln. Jakarta No. 32, Bukittinggi 54382, Jabar', '088346465731', 1),
('PLG0004', 'Ida Nuraini S.I.Kom', '4773297485829932', 'Jr. Pasteur No. 677, Administrasi Jakarta Selatan 64212, NTB', '083943328369', 1),
('PLG0005', 'Salwa Safitri S.E.', '1766655309272519', 'Gg. Baing No. 772, Padang 56809, Maluku', '084316487715', 1),
('PLG0006', 'Malika Queen Yolanda S.Kom', '7224323700451993', 'Dk. Salak No. 429, Administrasi Jakarta Selatan 15333, Banten', '083213810168', 1),
('PLG0007', 'Yessi Rahimah S.Gz', '3166543935685232', 'Jln. Dr. Junjunan No. 641, Samarinda 26911, Aceh', '085856450657', 1),
('PLG0008', 'Irma Uyainah', '1416440974568269', 'Ds. Sadang Serang No. 632, Probolinggo 87395, Sultra', '083486897944', 1),
('PLG0009', 'Jaka Perkasa Mandala', '1357963277197895', 'Jr. R.E. Martadinata No. 98, Lubuklinggau 33567, Bengkulu', '083296445726', 1),
('PLG0010', 'Ani Mayasari S.Sos', '3813694698213540', 'Psr. Bah Jaya No. 496, Binjai 32146, DIY', '081451623188', 1),
('PLG0011', 'Melinda Nilam Rahimah', '4320920595047046', 'Ki. Sugiyopranoto No. 902, Subulussalam 31561, NTT', '083177204230', 1),
('PLG0012', 'Maria Laksita', '9728642220685796', 'Dk. Teuku Umar No. 110, Bau-Bau 94727, Aceh', '087233057581', 1),
('PLG0013', 'Raditya Taufik Wibowo M.TI.', '2459540761712145', 'Dk. Hayam Wuruk No. 351, Ternate 37569, Sulut', '087527979823', 1),
('PLG0014', 'Estiawan Emil Wibisono S.Gz', '6092977813012225', 'Kpg. Baha No. 655, Cimahi 28208, Sulsel', '085200750524', 1),
('PLG0015', 'Faizah Halimah', '6262892646039992', 'Dk. Monginsidi No. 761, Pematangsiantar 86469, Jabar', '082627636454', 1),
('PLG0016', 'Aris Latupono M.Kom.', '0579082049101802', 'Dk. Abdul. Muis No. 887, Tasikmalaya 19805, Kalsel', '085844782395', 1),
('PLG0017', 'Omar Gandi Dongoran', '9551539586611354', 'Jr. Ciumbuleuit No. 756, Lhokseumawe 16216, Sumbar', '088559212702', 1),
('PLG0018', 'Ridwan Habibi S.Gz', '2297186896083106', 'Jln. R.M. Said No. 704, Tanjungbalai 17827, Jateng', '083821118651', 1),
('PLG0019', 'Lasmanto Prakasa', '2547204290672759', 'Jr. Suryo No. 967, Mojokerto 51092, Kaltim', '087443371972', 1),
('PLG0020', 'Jayeng Harsaya Lazuardi', '2387004533366670', 'Gg. Pelajar Pejuang 45 No. 900, Tual 34208, Sumsel', '080490114531', 1),
('PLG0021', 'Yuni Ghaliyati Safitri', '4034425072959623', 'Kpg. Moch. Yamin No. 581, Pangkal Pinang 15818, Maluku', '088442962007', 1),
('PLG0022', 'Nova Widya Widiastuti', '6927951667363552', 'Jln. Taman No. 295, Administrasi Jakarta Barat 57875, Papua', '080551889695', 1),
('PLG0023', 'Gamblang Gangsa Prabowo M.Kom.', '5046062516471260', 'Gg. Gajah Mada No. 867, Administrasi Jakarta Pusat 68825, Papua', '080599992977', 1),
('PLG0024', 'Iriana Puspasari S.E.', '5470675734947884', 'Psr. Cokroaminoto No. 884, Bekasi 81336, Sultra', '081349701116', 1),
('PLG0025', 'Maras Siregar', '6514287310615644', 'Ki. Bank Dagang Negara No. 390, Samarinda 44868, Pabar', '085706073986', 1),
('PLG0026', 'Balapati Rajasa', '9186827025270494', 'Dk. Padang No. 671, Singkawang 43533, Bali', '087016396124', 1),
('PLG0027', 'Talia Fujiati', '2738776190769573', 'Kpg. Madrasah No. 77, Banjar 89647, Sumbar', '083702780395', 1),
('PLG0028', 'Nilam Kusmawati', '6493491918006580', 'Kpg. Sampangan No. 335, Tual 53005, Sumbar', '081632053476', 1),
('PLG0029', 'Icha Nuraini', '2811011275396421', 'Kpg. Pattimura No. 402, Tangerang Selatan 38203, Jateng', '083024381092', 1),
('PLG0030', 'Olivia Pertiwi', '1974810145932416', 'Ds. Warga No. 55, Padang 61847, Pabar', '082184049564', 1),
('PLG0031', 'Kania Halimah', '6067558993193394', 'Kpg. Nangka No. 91, Pekanbaru 18479, Banten', '086975149197', 1),
('PLG0032', 'Bakda Wibowo', '2102782658434644', 'Kpg. Aceh No. 383, Parepare 10405, Maluku', '084234627832', 1),
('PLG0033', 'Kenes Purwadi Prayoga S.H.', '4344858317440002', 'Ds. Uluwatu No. 861, Magelang 52523, Jateng', '086540433388', 1),
('PLG0034', 'Syahrini Yulianti S.I.Kom', '9414786279050964', 'Ki. Baha No. 211, Magelang 57662, Kalsel', '085137971913', 1),
('PLG0035', 'Patricia Utami', '6504645971788603', 'Psr. Kiaracondong No. 922, Pontianak 73537, NTT', '083528452913', 1),
('PLG0036', 'Marsito Panji Siregar M.M.', '3576545525101057', 'Psr. Supomo No. 281, Palu 73456, Kalbar', '082638299916', 1),
('PLG0037', 'Vega Darmaji Siregar', '8577138818684503', 'Jr. Mahakam No. 988, Cilegon 25363, Lampung', '080668682206', 1),
('PLG0038', 'Rachel Nasyidah', '6997985537608733', 'Ds. Imam Bonjol No. 142, Tanjungbalai 10607, Banten', '085781665120', 1),
('PLG0039', 'Icha Kuswandari S.Psi', '1415317426366141', 'Ki. Yogyakarta No. 15, Probolinggo 82024, Papua', '081842912123', 1),
('PLG0040', 'Salsabila Hasanah', '8333885577085036', 'Psr. Asia Afrika No. 341, Administrasi Jakarta Utara 91966, Sulut', '080177977186', 1),
('PLG0041', 'Tari Puspasari', '1623470422300984', 'Ds. Bazuka Raya No. 618, Pangkal Pinang 14407, Sumbar', '084248127508', 1),
('PLG0042', 'Tri Mansur', '2918868513853675', 'Dk. Achmad No. 298, Samarinda 45478, Kaltim', '087992223374', 1),
('PLG0043', 'Umi Febi Rahimah', '1816601213986386', 'Jr. Kebangkitan Nasional No. 750, Administrasi Jakarta Utara 14056, Aceh', '087178710410', 1),
('PLG0044', 'Usyi Maya Pudjiastuti S.T.', '8498395018941987', 'Jln. Kalimantan No. 913, Administrasi Jakarta Utara 47199, Pabar', '082713479506', 1),
('PLG0045', 'Ridwan Hutasoit M.Kom.', '5787038963117838', 'Ds. Ikan No. 997, Pariaman 10574, Sulut', '086076139844', 1),
('PLG0046', 'Sabrina Aryani', '9537411777070163', 'Jln. Monginsidi No. 104, Tasikmalaya 80038, Jateng', '083613062429', 1),
('PLG0047', 'Latika Pertiwi', '6303231001070882', 'Ki. Perintis Kemerdekaan No. 21, Tebing Tinggi 51801, Sulbar', '081688509506', 1),
('PLG0048', 'Halima Lestari', '0292901208219675', 'Ki. Haji No. 305, Bekasi 64396, Pabar', '083627615263', 1),
('PLG0049', 'Jasmani Mumpuni Mandala S.IP', '8888351421031582', 'Jr. W.R. Supratman No. 583, Bukittinggi 87361, Jambi', '089855857491', 1),
('PLG0050', 'Paris Pudjiastuti', '3031940615868561', 'Psr. R.E. Martadinata No. 125, Bau-Bau 11112, Pabar', '089863518731', 1),
('PLG0051', 'Ika Salimah Winarsih S.Ked', '4380146486691868', 'Kpg. Suniaraja No. 405, Tarakan 70305, Sulsel', '089736969222', 1),
('PLG0052', 'Jarwa Emil Jailani S.Pd', '2531838395316280', 'Dk. Muwardi No. 296, Solok 42216, Jabar', '085262078814', 1);

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
('TRX2025011188654974', 1188654974, '1', 1, 'Sosial Umum', '2025', 0, 17, 17, 0, '2025-02-21 23:56:38', '2025-02-22 03:04:06', 1, 1),
('TRX2025012127967585', 2127967585, '1', 4, 'Rumah A.2', '2025', 0, 10, 10, 1, '2025-02-22 06:28:43', '2025-02-22 06:37:36', 1, 1),
('TRX202501302327729', 302327729, '1', 5, 'Rumah B.1', '2025', 0, 12, 12, 1, '2025-02-19 12:29:28', '2025-02-22 03:51:27', 1, 1),
('TRX2025015878417463', 5878417463, '1', 3, 'Rumah A 1', '2025', 0, 30, 30, 1, '2025-02-08 05:09:31', '2025-02-21 09:01:41', 1, 1),
('TRX202501622682483', 622682483, '1', 3, 'Rumah A.1', '2025', 0, 13, 13, 0, '2025-02-21 23:54:16', '2025-02-21 23:54:16', 1, 1),
('TRX202501774547919', 774547919, '1', 1, 'Sosial Umum', '2025', 0, 9, 9, 0, '2025-02-21 23:55:24', '2025-02-21 23:55:24', 1, 1),
('TRX2025021188654974', 1188654974, '2', 1, 'Sosial Umum', '2025', 17, 29, 12, 0, '2025-02-21 23:56:56', '2025-02-22 03:04:06', 1, 1),
('TRX2025021258670185', 1258670185, '2', 2, 'Sosial Khusus', '2025', 0, 19, 19, 0, '2025-02-21 23:57:44', '2025-02-21 23:57:44', 1, 1),
('TRX2025022127967585', 2127967585, '2', 4, 'Rumah A.2', '2025', 10, 11, 1, 1, '2025-02-22 06:29:44', '2025-02-22 06:37:36', 1, 1),
('TRX202502302327729', 302327729, '2', 5, 'Rumah B.1', '2025', 12, 24, 12, 1, '2025-02-21 23:52:38', '2025-02-22 03:51:27', 1, 1),
('TRX2025025878417463', 5878417463, '2', 3, 'Rumah A.1', '2025', 30, 45, 15, 1, '2025-02-21 09:01:07', '2025-02-21 09:01:41', 1, 1),
('TRX202502622682483', 622682483, '2', 3, 'Rumah A.1', '2025', 13, 26, 13, 0, '2025-02-21 23:54:49', '2025-02-21 23:54:49', 1, 1),
('TRX202502774547919', 774547919, '2', 1, 'Sosial Umum', '2025', 9, 16, 7, 0, '2025-02-21 23:55:50', '2025-02-21 23:55:50', 1, 1),
('TRX2025032127967585', 2127967585, '3', 4, 'Rumah A.2', '2025', 11, 25, 14, 0, '2025-03-08 08:16:44', '2025-03-08 08:16:44', 3, 3);

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

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_tagihan`, `nomor_meteran`, `id_bulan`, `tahun`, `total_nominal`, `waktu_pembayaran`, `metode_pembayaran`, `catatan`, `petugas`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
('administrator-2025221279675851062025-02-22-13:37:36', 202522127967585106, 2127967585, '2', 2025, '32065.00', '2025-02-22 06:37:36', 'tunai', 'beliau sudah membayar', 'Administrator', 1, 1, '2025-02-22 06:37:36', '2025-02-22 06:37:36'),
('administrator-202523023277293372025-02-22-10:51:27', 20252302327729337, 302327729, '2', 2025, '104280.00', '2025-02-22 03:51:27', 'transfer_bank', 'testing pembayaran', 'Administrator', 1, 1, '2025-02-22 03:51:27', '2025-02-22 03:51:27'),
('administrator-2025258784174639352025-02-21-16:01:41', 202525878417463935, 5878417463, '2', 2025, '258225.00', '2025-02-21 09:01:41', 'tunai', 'testing pembayaran', 'Administrator', 1, 1, '2025-02-21 09:01:41', '2025-02-21 09:01:41');

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
(55, 'pembayaran delete', 'web', '2025-02-06 16:19:38', '2025-02-06 16:19:38'),
(56, 'laporan-pembayaran view', 'web', '2025-02-16 02:53:20', '2025-02-16 02:53:20'),
(57, 'laporan-pelanggan view', 'web', '2025-02-19 12:13:46', '2025-02-19 12:13:46'),
(58, 'rekap view', 'web', '2025-02-19 12:13:46', '2025-02-19 12:13:46'),
(59, 'meteran buatkartu', 'web', '2025-03-08 07:47:20', '2025-03-08 07:47:20'),
(60, 'meteran mapping    ', 'web', '2025-03-08 07:47:20', '2025-03-08 07:47:20'),
(61, 'pembayaran pembatalan', 'web', '2025-03-08 07:49:20', '2025-03-08 07:49:20'),
(62, 'pembayaran cetakkuitansi', 'web', '2025-03-08 07:50:55', '2025-03-08 07:50:55'),
(63, 'tagihan pembayaran', 'web', '2025-03-08 07:53:52', '2025-03-08 07:53:52'),
(64, 'tagihan generatetagihan', 'web', '2025-03-08 08:17:36', '2025-03-08 08:17:36');

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
(1, 'Admin', 'web', '2025-02-03 03:40:13', '2025-02-19 12:16:11'),
(3, 'Petugas', 'web', '2025-02-16 06:42:53', '2025-03-08 08:19:07'),
(4, 'Kasir', 'web', '2025-02-22 06:53:56', '2025-03-08 07:55:40');

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
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(1, 3),
(2, 3),
(36, 3),
(37, 3),
(44, 3),
(45, 3),
(64, 3),
(1, 4),
(2, 4),
(20, 4),
(24, 4),
(32, 4),
(36, 4),
(40, 4),
(44, 4),
(48, 4),
(52, 4),
(53, 4),
(54, 4),
(55, 4),
(56, 4),
(57, 4),
(58, 4),
(62, 4),
(63, 4);

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
('5JOOE938qO2e8S5Qqdyv01xh7FrZciQKECjS9MZl', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:136.0) Gecko/20100101 Firefox/136.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZWdSZnA1NnJGREU5dnRBOG9iZWlrZ3FVZlhNZllDODdGdjR6bmh4cCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9sYXJhdmVsLXRlbXBsYXRlLW1haW4udGVzdCI7fX0=', 1741421977),
('E1zfiXeDJOzOnabi81isTUkOIkz47srFLKzmAf0M', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoia3lRNFN3UUJLaFVuem5rRERTYnljMEN6ZDJlMjY0R2pqZXJBckxDdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly9sYXJhdmVsLXRlbXBsYXRlLW1haW4udGVzdC9yb2xlcy8zL2VkaXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1741421947);

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
(20252302327729337, '2', 2025, 'PLG0014', 302327729, '104280.00', '2025-02-01', '2025-02-28', 0, 1, '2025-02-21 23:52:52', '2025-02-22 03:51:27', 1, 1),
(20252622682483943, '2', 2025, 'PLG0029', 622682483, '101530.00', '2025-02-01', '2025-02-28', 1, 0, '2025-02-21 23:54:55', '2025-02-21 23:54:55', 1, 1),
(20252774547919908, '2', 2025, 'PLG0046', 774547919, '28160.00', '2025-02-01', '2025-02-28', 1, 0, '2025-02-21 23:55:55', '2025-02-21 23:55:55', 1, 1),
(202521188654974193, '2', 2025, 'PLG0033', 1188654974, '71775.00', '2025-02-01', '2025-02-28', 1, 0, '2025-02-21 23:57:01', '2025-02-22 03:04:06', 1, 1),
(202521258670185247, '2', 2025, 'PLG0006', 1258670185, '51205.00', '2025-02-01', '2025-02-28', 1, 0, '2025-02-21 23:57:51', '2025-02-21 23:57:51', 1, 1),
(202522127967585106, '2', 2025, 'PLG0047', 2127967585, '32065.00', '2025-02-01', '2025-02-28', 0, 1, '2025-02-22 06:33:19', '2025-02-22 06:37:36', 1, 1),
(202525878417463935, '2', 2025, 'PLG0001', 5878417463, '258225.00', '2025-02-01', '2025-02-28', 0, 1, '2025-02-21 09:01:20', '2025-02-21 09:01:41', 1, 1),
(202532127967585941, '3', 2025, 'PLG0047', 2127967585, '57750.00', '2025-03-01', '2025-03-31', 1, 0, '2025-03-08 08:18:57', '2025-03-08 08:18:57', 3, 3);

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
(7, 3, 'Tarif 3', 21, 0, '6655.00', '2025-02-05 11:26:43', '2025-02-05 11:26:43'),
(8, 2, 'Tarif 1', 0, 10, '1870.00', '2025-02-17 23:23:29', '2025-02-17 23:23:29'),
(9, 2, 'Tarif 2', 11, 20, '2695.00', '2025-02-17 23:23:55', '2025-02-17 23:23:55'),
(10, 2, 'Tarif 3', 21, 0, '4510.00', '2025-02-17 23:24:18', '2025-02-17 23:24:18'),
(11, 4, 'Tarif 1', 0, 10, '2915.00', '2025-02-17 23:25:02', '2025-02-17 23:25:02'),
(12, 4, 'Tarif 2', 11, 20, '4125.00', '2025-02-17 23:25:26', '2025-02-17 23:25:26'),
(13, 4, 'Tarif 3', 21, 0, '6875.00', '2025-02-17 23:25:51', '2025-02-17 23:25:51'),
(14, 5, 'Tarif 1', 0, 10, '3025.00', '2025-02-17 23:30:55', '2025-02-17 23:30:55'),
(15, 5, 'Tarif 2', 11, 20, '4345.00', '2025-02-17 23:31:13', '2025-02-17 23:31:13'),
(16, 5, 'Tarif 3', 21, 0, '7205.00', '2025-02-17 23:31:36', '2025-02-17 23:31:36');

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
(1, 'admin', 'Administrator', NULL, NULL, '$2y$12$WZcv6ywbbaUJz/jFkdcbsuNpxnYqnEWb2VIbCXCgK0CJwAvdt/VXi', NULL, '2025-02-03 03:40:12', '2025-02-21 08:52:09'),
(3, 'petugas', 'Petugas', NULL, NULL, '$2y$12$W492aWWfyNA2Ox783.zV4eDDNfPIJaj7DTst9Bpr.GKhhnfjoLaLq', NULL, '2025-02-16 06:43:33', '2025-03-08 08:15:57'),
(4, 'kasir1', 'Kasir 1', NULL, NULL, '$2y$12$r06b7gV0BkVHLqiGKUVvCuHYqHeSJVtIYqhWUz3d2Q1XzeIGP5lPe', NULL, '2025-02-22 06:54:37', '2025-03-08 07:16:59');

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
(32, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-10 13:10:03'),
(33, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-13 10:18:53'),
(34, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-13 10:23:11'),
(35, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-13 13:46:32'),
(36, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-16 02:46:30'),
(37, 3, 'petugas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-16 06:43:50'),
(38, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-16 06:48:51'),
(39, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-16 07:11:39'),
(40, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-17 10:49:27'),
(41, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-17 23:15:12'),
(42, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-19 12:11:33'),
(43, 3, 'petugas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:135.0) Gecko/20100101 Firefox/135.0', 'Firefox', 'Windows', '0', 'success', NULL, '2025-02-19 12:19:13'),
(44, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-20 02:35:30'),
(45, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-20 23:23:46'),
(46, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'failed', 'Password salah', '2025-02-21 08:51:21'),
(47, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-21 08:51:30'),
(48, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:135.0) Gecko/20100101 Firefox/135.0', 'Firefox', 'Windows', '0', 'success', NULL, '2025-02-21 09:06:38'),
(49, 3, 'petugas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:135.0) Gecko/20100101 Firefox/135.0', 'Firefox', 'Windows', '0', 'success', NULL, '2025-02-21 09:06:53'),
(50, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-21 14:11:15'),
(51, 3, 'petugas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:135.0) Gecko/20100101 Firefox/135.0', 'Firefox', 'Windows', '0', 'success', NULL, '2025-02-21 14:18:58'),
(52, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-21 23:38:37'),
(53, 3, 'petugas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:135.0) Gecko/20100101 Firefox/135.0', 'Firefox', 'Windows', '0', 'success', NULL, '2025-02-22 02:49:06'),
(54, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-02-22 06:17:21'),
(55, 4, 'afridho', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:135.0) Gecko/20100101 Firefox/135.0', 'Firefox', 'Windows', '0', 'success', NULL, '2025-02-22 06:55:10'),
(56, 1, 'admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'Chrome', 'Windows', 'WebKit', 'success', NULL, '2025-03-08 07:16:27'),
(57, 4, 'kasir1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:136.0) Gecko/20100101 Firefox/136.0', 'Firefox', 'Windows', '0', 'success', NULL, '2025-03-08 07:17:39'),
(58, 3, 'petugas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:136.0) Gecko/20100101 Firefox/136.0', 'Firefox', 'Windows', '0', 'failed', 'Password salah', '2025-03-08 07:58:22'),
(59, 3, 'petugas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:136.0) Gecko/20100101 Firefox/136.0', 'Firefox', 'Windows', '0', 'failed', 'Password salah', '2025-03-08 08:00:30'),
(60, 3, 'petugas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:136.0) Gecko/20100101 Firefox/136.0', 'Firefox', 'Windows', '0', 'success', NULL, '2025-03-08 08:00:34'),
(61, 3, 'petugas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:136.0) Gecko/20100101 Firefox/136.0', 'Firefox', 'Windows', '0', 'success', NULL, '2025-03-08 08:15:40');

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
  ADD UNIQUE KEY `chip_kartu` (`chip_kartu`),
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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `detail_tagihan`
--
ALTER TABLE `detail_tagihan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

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
  MODIFY `id_layanan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tarif_layanan`
--
ALTER TABLE `tarif_layanan`
  MODIFY `id_tarif_layanan` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users_login_logs`
--
ALTER TABLE `users_login_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

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
