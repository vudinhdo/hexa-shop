-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for hexa-shop
CREATE DATABASE IF NOT EXISTS `hexa-shop` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `hexa-shop`;

-- Dumping structure for table hexa-shop.cards
CREATE TABLE IF NOT EXISTS `cards` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hexa-shop.cards: ~0 rows (approximately)

-- Dumping structure for table hexa-shop.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hexa-shop.categories: ~2 rows (approximately)
INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
	(1, 'Nam', 'man', '2025-02-12 08:13:31', '2025-02-12 08:13:31'),
	(2, 'Nữ', 'woman', '2025-02-12 08:15:26', '2025-02-12 08:15:36'),
	(3, 'Trẻ em', 'kid', '2025-02-12 08:16:03', '2025-02-12 08:16:03');

-- Dumping structure for table hexa-shop.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hexa-shop.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table hexa-shop.items
CREATE TABLE IF NOT EXISTS `items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hexa-shop.items: ~1 rows (approximately)
INSERT INTO `items` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
	(2, NULL, '2025-04-09 08:04:10', '2025-04-09 08:04:10'),
	(3, 2, '2025-05-06 07:22:47', '2025-05-06 07:22:47');

-- Dumping structure for table hexa-shop.item_product
CREATE TABLE IF NOT EXISTS `item_product` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cart_id` bigint DEFAULT NULL,
  `product_id` bigint DEFAULT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hexa-shop.item_product: ~0 rows (approximately)

-- Dumping structure for table hexa-shop.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hexa-shop.migrations: ~9 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(10, '2014_10_12_000000_create_users_table', 1),
	(11, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(12, '2019_08_19_000000_create_failed_jobs_table', 1),
	(13, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(14, '2025_02_11_110324_create_products_table', 1),
	(15, '2025_02_11_110350_create_categories_table', 1),
	(17, '2025_02_11_111311_create_cards_table', 1),
	(25, '2025_04_09_141849_create_items_table', 2),
	(26, '2025_04_09_141935_create_product_item_table', 2),
	(27, '2025_04_09_145744_create_item_product_table', 3),
	(28, '2025_05_06_141033_add_verification_code_to_users_table', 4),
	(29, '2025_05_12_205044_create_password_resets_table', 5);

-- Dumping structure for table hexa-shop.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hexa-shop.password_resets: ~2 rows (approximately)
INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`, `updated_at`) VALUES
	(1, 'nguyenvanb2@gmail.com', '863521', '2025-05-12 14:14:14', NULL),
	(2, 'vudinhdo2409@gmail.com', '736965', '2025-05-13 04:39:33', NULL);

-- Dumping structure for table hexa-shop.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hexa-shop.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table hexa-shop.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hexa-shop.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table hexa-shop.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `quantity` int NOT NULL,
  `firstImage` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondImage` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `thirdImage` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_products_categories` (`category_id`),
  CONSTRAINT `FK_products_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hexa-shop.products: ~10 rows (approximately)
INSERT INTO `products` (`id`, `name`, `description`, `slug`, `price`, `quantity`, `firstImage`, `secondImage`, `thirdImage`, `category_id`, `created_at`, `updated_at`) VALUES
	(4, 'sản phẩm 1', 'Chân kim loại sơn đen, bọc vải cao cấp, bao gồm sofa băng dài & đôn', 'san-pham-1', 1234, 10, 'assets/new1-gLZQ.jpg', 'assets/new1-8WIO.jpg', 'assets/new1-ikjn.jpg', 1, '2025-02-12 08:32:32', '2025-02-12 08:32:32'),
	(5, 'sản phẩm 2', 'Chân kim loại sơn đen, bọc vải cao cấp, bao gồm sofa băng dài & đôn', 'san-pham-2', 1234, 10, 'assets/new1-Ay5v.jpg', 'assets/new1-OCXx.jpg', 'assets/new1-lczt.jpg', 2, '2025-02-12 08:35:12', '2025-02-12 08:35:12'),
	(6, 'sản phẩm 3', 'Chân kim loại sơn đen, bọc vải cao cấp, bao gồm sofa băng dài & đôn', 'san-pham-3', 12345, 10, 'assets/pnj1-sKrT.jpg', 'assets/pnj1-Q0VL.jpg', 'assets/pnj1-uvPp.jpg', 3, '2025-05-08 12:07:14', '2025-05-08 12:07:14'),
	(7, 'sản phẩm 4', 'Chân kim loại sơn đen, bọc vải cao cấp, bao gồm sofa băng dài & đôn', 'san-pham-4', 123456, 10, 'assets/new1-Grxo.jpg', 'assets/new1-RrOa.jpg', 'assets/new1-8U2h.jpg', 2, '2025-05-08 12:08:02', '2025-05-08 12:08:02'),
	(8, 'sản phẩm 5', 'Chân kim loại sơn đen, bọc vải cao cấp, bao gồm sofa băng dài & đôn', 'san-pham-5', 123456, 10, 'assets/pnj2-A00L.jpg', 'assets/pnj2-CWex.jpg', 'assets/pnj2-TL0J.jpg', 1, '2025-05-08 12:08:50', '2025-05-08 12:08:50'),
	(9, 'sản phẩm 6', 'Chân kim loại sơn đen, bọc vải cao cấp, bao gồm sofa băng dài & đôn', 'san-pham-6', 123456, 10, 'assets/pnj1-vZjR.jpg', 'assets/pnj1-HFEu.jpg', 'assets/pnj1-AuSX.jpg', 2, '2025-05-08 12:09:40', '2025-05-08 12:09:40'),
	(10, 'sản phẩm 7', 'Chân kim loại sơn đen, bọc vải cao cấp, bao gồm sofa băng dài & đôn', 'san-pham-7', 123456, 10, 'assets/pnj2-sGOX.jpg', 'assets/pnj2-cIX4.jpg', 'assets/pnj2-UcUF.jpg', 3, '2025-05-08 12:10:06', '2025-05-08 12:10:06'),
	(11, 'sản phẩm 8', 'Chân kim loại sơn đen, bọc vải cao cấp, bao gồm sofa băng dài & đôn', 'san-pham-8', 123456, 10, 'assets/pnj1-Tzh8.jpg', 'assets/pnj1-fofk.jpg', 'assets/pnj1-YLQF.jpg', 3, '2025-05-08 12:10:31', '2025-05-08 12:10:31'),
	(12, 'sản phẩm 9', 'Chân kim loại sơn đen, bọc vải cao cấp, bao gồm sofa băng dài & đôn', 'san-pham-9', 123456, 10, 'assets/pnj2-XHof.jpg', 'assets/pnj2-2QkN.jpg', 'assets/pnj2-wXEP.jpg', 2, '2025-05-08 12:10:54', '2025-05-08 12:10:54'),
	(13, 'sản phẩm 10', 'Chân kim loại sơn đen, bọc vải cao cấp, bao gồm sofa băng dài & đôn', 'san-pham-10', 123456, 10, 'assets/pnj3-zSAA.jpg', 'assets/pnj3-JOsd.jpg', 'assets/pnj3-kyt9.jpg', 3, '2025-05-08 12:11:55', '2025-05-08 12:11:55');

-- Dumping structure for table hexa-shop.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `verification_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hexa-shop.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `name`, `fullName`, `address`, `birth`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `verification_code`) VALUES
	(1, 'vudinhdo', NULL, NULL, NULL, 'vudinhdo2409@gmail.com', NULL, '$2y$12$xcY1hQhStof.VkaE7a1jh.ueVBVbzn/SK0cxMqIgmS1MMwnsh0TmG', '4bSvcYN1GvaxjoJxSdLJBTuK4OxibIsYXJx8GEWQFHGXFDpl3fsZ7Yx6kPIY', '2025-02-11 04:34:56', '2025-02-11 04:34:56', NULL),
	(2, 'Nguyễn Văn B', NULL, NULL, NULL, 'nguyenvanb2@gmail.com', NULL, '$2y$12$EqrIShud.p13fX/PUx1qWe9CTeSNKe3VgMJo7DU2NpilWqQ4h2Tnu', NULL, '2025-05-06 07:07:20', '2025-05-06 07:07:20', NULL),
	(3, 'Vũ Đình Đô', NULL, NULL, NULL, 'vudinhdo24092002@gmail.com', NULL, '$2y$12$0AW3quhdGqKfwORqJYPJiuKAChv2Ctf9CsMsrfmuInLcOlalHyQC2', NULL, '2025-05-06 07:14:32', '2025-05-06 07:14:32', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
