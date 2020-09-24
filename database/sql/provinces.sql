-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.31-0ubuntu0.18.04.1 - (Ubuntu)
-- Server OS:                    Linux
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table quickcount.provinces
DROP TABLE IF EXISTS `provinces`;
CREATE TABLE IF NOT EXISTS `provinces` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table quickcount.provinces: ~34 rows (approximately)
DELETE FROM `provinces`;
/*!40000 ALTER TABLE `provinces` DISABLE KEYS */;
INSERT INTO `provinces` (`id`, `country_id`, `name`, `code`, `created_at`, `updated_at`) VALUES
	(1, 0, 'ACEH', '11', NULL, NULL),
	(2, 0, 'SUMATERA UTARA', '12', NULL, NULL),
	(3, 0, 'SUMATERA BARAT', '13', NULL, NULL),
	(4, 0, 'RIAU', '14', NULL, NULL),
	(5, 0, 'JAMBI', '15', NULL, NULL),
	(6, 0, 'SUMATERA SELATAN', '16', NULL, NULL),
	(7, 0, 'BENGKULU', '17', NULL, NULL),
	(8, 0, 'LAMPUNG', '18', NULL, NULL),
	(9, 0, 'KEPULAUAN BANGKA BELITUNG', '19', NULL, NULL),
	(10, 0, 'KEPULAUAN RIAU', '21', NULL, NULL),
	(11, 0, 'DKI JAKARTA', '31', NULL, NULL),
	(12, 0, 'JAWA BARAT', '32', NULL, NULL),
	(13, 0, 'JAWA TENGAH', '33', NULL, NULL),
	(14, 0, 'DAERAH ISTIMEWA YOGYAKARTA', '34', NULL, NULL),
	(15, 0, 'JAWA TIMUR', '35', NULL, NULL),
	(16, 0, 'BANTEN', '36', NULL, NULL),
	(17, 0, 'BALI', '51', NULL, NULL),
	(18, 0, 'NUSA TENGGARA BARAT', '52', NULL, NULL),
	(19, 0, 'NUSA TENGGARA TIMUR', '53', NULL, NULL),
	(20, 0, 'KALIMANTAN BARAT', '61', NULL, NULL),
	(21, 0, 'KALIMANTAN TENGAH', '62', NULL, NULL),
	(22, 0, 'KALIMANTAN SELATAN', '63', NULL, NULL),
	(23, 0, 'KALIMANTAN TIMUR', '64', NULL, NULL),
	(24, 0, 'KALIMANTAN UTARA', '65', NULL, NULL),
	(25, 0, 'SULAWESI UTARA', '71', NULL, NULL),
	(26, 0, 'SULAWESI TENGAH', '72', NULL, NULL),
	(27, 0, 'SULAWESI SELATAN', '73', NULL, NULL),
	(28, 0, 'SULAWESI TENGGARA', '74', NULL, NULL),
	(29, 0, 'GORONTALO', '75', NULL, NULL),
	(30, 0, 'SULAWESI BARAT', '76', NULL, NULL),
	(31, 0, 'MALUKU', '81', NULL, NULL),
	(32, 0, 'MALUKU UTARA', '82', NULL, NULL),
	(33, 0, 'P A P U A', '91', NULL, NULL),
	(34, 0, 'PAPUA BARAT', '92', NULL, NULL);
/*!40000 ALTER TABLE `provinces` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
