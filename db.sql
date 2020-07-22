-- --------------------------------------------------------
-- Host:                         localhost
-- Versi server:                 10.3.21-MariaDB-log - mariadb.org binary distribution
-- OS Server:                    Win64
-- HeidiSQL Versi:               10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Membuang struktur basisdata untuk sia-kas
CREATE DATABASE IF NOT EXISTS `sia-kas` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sia-kas`;

-- membuang struktur untuk table sia-kas.barang
CREATE TABLE IF NOT EXISTS `barang` (
  `barang_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barang_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barang_harga_pembelian` double NOT NULL,
  `barang_margin` int(11) NOT NULL,
  `barang_satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barang_stok` decimal(15,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`barang_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel sia-kas.barang: ~5 rows (lebih kurang)
DELETE FROM `barang`;
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` (`barang_id`, `barang_nama`, `barang_harga_pembelian`, `barang_margin`, `barang_satuan`, `barang_stok`, `created_at`, `updated_at`, `deleted_at`) VALUES
	('BR-1', 'Bolpen', 3000, 20, 'Buah', 60.00, '2020-04-22 09:45:24', '2020-07-21 23:02:17', NULL),
	('BR-2', 'Tipe-X', 5000, 20, 'Buah', 50.00, '2020-04-22 09:45:25', '2020-07-21 23:03:27', NULL),
	('BR-3', 'Penggaris', 4000, 20, 'Buah', 30.00, '2020-04-22 09:45:26', '2020-07-21 23:04:09', NULL),
	('BR-4', 'Beras', 10500, 20, 'Kilogram', 90.00, '2020-04-22 09:45:27', '2020-07-21 23:39:24', NULL),
	('BR-5', 'Susu Dancow', 2500, 20, 'Sachet', 25.00, '2020-07-21 23:09:26', '2020-07-21 23:42:36', NULL);
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;

-- membuang struktur untuk table sia-kas.beli
CREATE TABLE IF NOT EXISTS `beli` (
  `beli_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `beli_faktur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `beli_tgl` date NOT NULL,
  `beli_total` double NOT NULL,
  `beli_retur` double NOT NULL DEFAULT 0,
  `supplier_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`beli_id`),
  KEY `beli_supplier_id_foreign` (`supplier_id`),
  CONSTRAINT `beli_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel sia-kas.beli: ~0 rows (lebih kurang)
DELETE FROM `beli`;
/*!40000 ALTER TABLE `beli` DISABLE KEYS */;
INSERT INTO `beli` (`beli_id`, `beli_faktur`, `beli_tgl`, `beli_total`, `beli_retur`, `supplier_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	('BL-1', 'BL-1', '2020-07-21', 30000, 12500, 'SP-1', '2020-07-21 23:22:59', '2020-07-21 23:42:36', NULL);
/*!40000 ALTER TABLE `beli` ENABLE KEYS */;

-- membuang struktur untuk table sia-kas.beli_detail
CREATE TABLE IF NOT EXISTS `beli_detail` (
  `beli_detail_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `beli_detail_jml` decimal(15,2) NOT NULL,
  `beli_detail_harga` double NOT NULL,
  `beli_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barang_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`beli_detail_id`),
  KEY `beli_detail_beli_id_foreign` (`beli_id`),
  KEY `beli_detail_barang_id_foreign` (`barang_id`),
  CONSTRAINT `beli_detail_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`barang_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `beli_detail_beli_id_foreign` FOREIGN KEY (`beli_id`) REFERENCES `beli` (`beli_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel sia-kas.beli_detail: ~1 rows (lebih kurang)
DELETE FROM `beli_detail`;
/*!40000 ALTER TABLE `beli_detail` DISABLE KEYS */;
INSERT INTO `beli_detail` (`beli_detail_id`, `beli_detail_jml`, `beli_detail_harga`, `beli_id`, `barang_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	('BD-1', 12.00, 2500, 'BL-1', 'BR-5', '2020-07-21 23:22:28', '2020-07-21 23:22:59', NULL);
/*!40000 ALTER TABLE `beli_detail` ENABLE KEYS */;

-- membuang struktur untuk table sia-kas.biaya
CREATE TABLE IF NOT EXISTS `biaya` (
  `biaya_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`biaya_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel sia-kas.biaya: ~4 rows (lebih kurang)
DELETE FROM `biaya`;
/*!40000 ALTER TABLE `biaya` DISABLE KEYS */;
INSERT INTO `biaya` (`biaya_id`, `biaya_nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
	('BY-1', 'Biaya Angkut', '2020-04-22 09:45:24', '2020-07-21 22:56:27', NULL),
	('BY-2', 'Biaya Antar', '2020-04-22 09:45:25', '2020-07-21 22:56:27', NULL),
	('BY-3', 'Biaya Listrik', '2020-04-22 09:45:26', '2020-07-21 22:56:27', NULL),
	('BY-4', 'Biaya Gaji', '2020-04-22 09:45:27', '2020-07-21 22:56:27', NULL),
	('BY-5', 'Biaya Lain-Lain', '2020-07-21 23:20:41', '2020-07-21 23:20:41', NULL);
/*!40000 ALTER TABLE `biaya` ENABLE KEYS */;

-- membuang struktur untuk table sia-kas.biaya_detail
CREATE TABLE IF NOT EXISTS `biaya_detail` (
  `biaya_detail_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya_detail_tgl` date NOT NULL,
  `biaya_detail_jml` double NOT NULL,
  `biaya_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`biaya_detail_id`),
  KEY `biaya_detail_biaya_id_foreign` (`biaya_id`),
  CONSTRAINT `biaya_detail_biaya_id_foreign` FOREIGN KEY (`biaya_id`) REFERENCES `biaya` (`biaya_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel sia-kas.biaya_detail: ~2 rows (lebih kurang)
DELETE FROM `biaya_detail`;
/*!40000 ALTER TABLE `biaya_detail` DISABLE KEYS */;
INSERT INTO `biaya_detail` (`biaya_detail_id`, `biaya_detail_tgl`, `biaya_detail_jml`, `biaya_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	('BT-1', '2020-07-21', 20000, 'BY-1', '2020-07-21 23:33:51', '2020-07-21 23:33:51', NULL),
	('BT-2', '2020-07-21', 10000, 'BY-2', '2020-07-21 23:41:31', '2020-07-21 23:41:31', NULL);
/*!40000 ALTER TABLE `biaya_detail` ENABLE KEYS */;

-- membuang struktur untuk table sia-kas.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel sia-kas.failed_jobs: ~0 rows (lebih kurang)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- membuang struktur untuk table sia-kas.jual
CREATE TABLE IF NOT EXISTS `jual` (
  `jual_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jual_tgl` date NOT NULL,
  `jual_total` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`jual_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel sia-kas.jual: ~0 rows (lebih kurang)
DELETE FROM `jual`;
/*!40000 ALTER TABLE `jual` DISABLE KEYS */;
INSERT INTO `jual` (`jual_id`, `jual_tgl`, `jual_total`, `created_at`, `updated_at`, `deleted_at`) VALUES
	('JL-1', '2020-07-21', 198000, '2020-07-21 23:39:24', '2020-07-21 23:39:24', NULL);
/*!40000 ALTER TABLE `jual` ENABLE KEYS */;

-- membuang struktur untuk table sia-kas.jual_detail
CREATE TABLE IF NOT EXISTS `jual_detail` (
  `jual_detail_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jual_detail_jml` decimal(15,2) NOT NULL,
  `jual_detail_harga` double NOT NULL,
  `jual_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barang_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`jual_detail_id`),
  KEY `jual_detail_jual_id_foreign` (`jual_id`),
  KEY `jual_detail_barang_id_foreign` (`barang_id`),
  CONSTRAINT `jual_detail_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`barang_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `jual_detail_jual_id_foreign` FOREIGN KEY (`jual_id`) REFERENCES `jual` (`jual_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel sia-kas.jual_detail: ~2 rows (lebih kurang)
DELETE FROM `jual_detail`;
/*!40000 ALTER TABLE `jual_detail` DISABLE KEYS */;
INSERT INTO `jual_detail` (`jual_detail_id`, `jual_detail_jml`, `jual_detail_harga`, `jual_id`, `barang_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	('JD-1', 10.00, 12600, 'JL-1', 'BR-4', '2020-07-21 23:39:08', '2020-07-21 23:39:25', NULL),
	('JD-2', 24.00, 3000, 'JL-1', 'BR-5', '2020-07-21 23:39:21', '2020-07-21 23:39:25', NULL);
/*!40000 ALTER TABLE `jual_detail` ENABLE KEYS */;

-- membuang struktur untuk table sia-kas.kas
CREATE TABLE IF NOT EXISTS `kas` (
  `kas_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kas_tgl` date NOT NULL DEFAULT current_timestamp(),
  `kas_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'transaksi',
  `kas_ket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kas_id_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kas_debet` double NOT NULL DEFAULT 0,
  `kas_kredit` double NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kas_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel sia-kas.kas: ~6 rows (lebih kurang)
DELETE FROM `kas`;
/*!40000 ALTER TABLE `kas` DISABLE KEYS */;
INSERT INTO `kas` (`kas_id`, `kas_tgl`, `kas_type`, `kas_ket`, `kas_id_value`, `kas_debet`, `kas_kredit`, `created_at`, `updated_at`, `deleted_at`) VALUES
	('KS-1', '2020-07-21', 'modal', 'modal', 'modal', 500000, 0, '2020-07-21 23:21:42', '2020-07-21 23:21:42', NULL),
	('KS-2', '2020-07-21', 'transaksi', 'beli', 'BL-1', 0, 30000, '2020-07-21 23:22:59', '2020-07-21 23:22:59', NULL),
	('KS-3', '2020-07-21', 'transaksi', 'biaya', 'BT-1', 0, 20000, '2020-07-21 23:33:51', '2020-07-21 23:33:51', NULL),
	('KS-4', '2020-07-21', 'transaksi', 'jual', 'JL-1', 198000, 0, '2020-07-21 23:39:25', '2020-07-21 23:39:25', NULL),
	('KS-5', '2020-07-21', 'transaksi', 'biaya', 'BT-2', 0, 10000, '2020-07-21 23:41:32', '2020-07-21 23:41:32', NULL),
	('KS-6', '2020-07-21', 'transaksi', 'retur', 'BL-1', 12500, 0, '2020-07-21 23:42:36', '2020-07-21 23:42:36', NULL);
/*!40000 ALTER TABLE `kas` ENABLE KEYS */;

-- membuang struktur untuk table sia-kas.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel sia-kas.migrations: ~11 rows (lebih kurang)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(14, '2014_10_12_000000_create_users_table', 1),
	(15, '2014_10_12_100000_create_password_resets_table', 1),
	(16, '2019_08_19_000000_create_failed_jobs_table', 1),
	(17, '2020_04_07_130410_create_barang_table', 1),
	(18, '2020_04_07_131123_create_biaya_table', 1),
	(19, '2020_04_07_131254_create_biaya_transaksi_table', 1),
	(20, '2020_04_07_133849_create_supplier_table', 1),
	(21, '2020_04_07_134006_create_beli_table', 1),
	(22, '2020_04_07_134400_create_beli_detail_table', 1),
	(23, '2020_04_07_134400_create_retur_table', 1),
	(24, '2020_04_07_140037_create_jual_table', 1),
	(25, '2020_04_07_140044_create_jual_detail_table', 1),
	(26, '2020_04_07_140060_create_kas_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- membuang struktur untuk table sia-kas.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel sia-kas.password_resets: ~0 rows (lebih kurang)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- membuang struktur untuk table sia-kas.retur
CREATE TABLE IF NOT EXISTS `retur` (
  `retur_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `retur_jml` decimal(15,2) NOT NULL,
  `retur_harga` double NOT NULL,
  `beli_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barang_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`retur_id`),
  KEY `retur_beli_id_foreign` (`beli_id`),
  KEY `retur_barang_id_foreign` (`barang_id`),
  CONSTRAINT `retur_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`barang_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `retur_beli_id_foreign` FOREIGN KEY (`beli_id`) REFERENCES `beli` (`beli_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel sia-kas.retur: ~0 rows (lebih kurang)
DELETE FROM `retur`;
/*!40000 ALTER TABLE `retur` DISABLE KEYS */;
INSERT INTO `retur` (`retur_id`, `retur_jml`, `retur_harga`, `beli_id`, `barang_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	('BD-1', 5.00, 2500, 'BL-1', 'BR-5', '2020-07-21 23:42:36', '2020-07-21 23:42:36', NULL);
/*!40000 ALTER TABLE `retur` ENABLE KEYS */;

-- membuang struktur untuk table sia-kas.supplier
CREATE TABLE IF NOT EXISTS `supplier` (
  `supplier_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel sia-kas.supplier: ~5 rows (lebih kurang)
DELETE FROM `supplier`;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` (`supplier_id`, `supplier_nama`, `supplier_telp`, `supplier_alamat`, `created_at`, `updated_at`, `deleted_at`) VALUES
	('SP-1', 'Luwes', '085332115224', 'Wonogiri', '2020-04-22 09:45:24', '2020-07-21 23:11:27', NULL),
	('SP-2', 'Amanah Pena', '08985671682', 'Surakarta', '2020-04-22 09:45:25', '2020-07-21 23:16:56', NULL),
	('SP-3', 'Baru Grosir', '081267540922', 'Wonogiri', '2020-04-22 09:45:26', '2020-07-21 23:17:22', NULL),
	('SP-4', 'Tunjung', '082188549327', 'Pracimantoro', '2020-04-22 09:45:27', '2020-07-21 23:18:14', NULL),
	('SP-5', 'Lina Jaya', '087126554097', 'Solo', '2020-07-21 23:15:47', '2020-07-21 23:15:47', NULL);
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;

-- membuang struktur untuk table sia-kas.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel sia-kas.users: ~3 rows (lebih kurang)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `jabatan`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
	('US-1', 'Ichsan', 'pemilik', 'pemilik@email.com', NULL, '$2y$10$1U/iC4/JUpnTkaIrWp1usufNzMF7A52ypMe4U975pWwAmM5.4ssEu', NULL, '2020-04-22 09:45:24', '2020-07-21 22:56:27', NULL),
	('US-2', 'Marfiana', 'kasir', 'kasir@email.com', NULL, '$2y$10$0K99dx9H1gsbXJ5Fe6B83eLIkFe6xLvmDGlBJN0lKgcEQZYJx/rga', NULL, '2020-04-22 09:45:25', '2020-07-21 22:56:27', NULL),
	('US-3', 'Ayu', 'pembelian', 'pembelian@email.com', NULL, '$2y$10$g5mB88JtQJW9YMWSkA.D.eh/uR1KSPCNTCe61MZFjuyWWXTMNFOby', NULL, '2020-04-22 09:45:26', '2020-07-21 22:56:27', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
