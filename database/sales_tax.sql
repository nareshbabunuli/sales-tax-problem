-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Creato il: Mag 25, 2020 alle 08:35
-- Versione del server: 10.4.10-MariaDB
-- Versione PHP: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales_tax`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2020_05_20_094511_create_receipts_table', 5),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_05_19_070902_create_product_categories_table', 1),
(6, '2020_05_20_035339_create_settings_table', 4),
(5, '2020_05_19_165202_create_products_table', 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `product_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `product_category`, `description`, `created_at`, `updated_at`) VALUES
(2, 'book', 12.49, '8', 'Books', '2020-05-19 21:16:58', '2020-05-19 21:16:58'),
(3, 'music CD', 14.99, '10', 'music CD', '2020-05-19 21:17:59', '2020-05-19 21:17:59'),
(4, 'chocolate bar', 0.85, '7', 'chocolate bar', '2020-05-19 21:19:09', '2020-05-19 21:19:09'),
(5, 'imported box of chocolates', 10, '7', 'The Imported Box of Chocolates', '2020-05-19 21:20:04', '2020-05-19 21:20:04'),
(6, 'imported bottle of perfume', 47.5, '10', 'The Imported bottle of perfume', '2020-05-19 21:21:30', '2020-05-19 21:21:30'),
(7, 'imported bottle of perfume', 27.99, '10', 'Imported bottle of perfume', '2020-05-19 21:22:31', '2020-05-23 13:22:21'),
(8, 'bottle of perfume', 18.99, '10', 'bottle of perfume', '2020-05-19 21:23:08', '2020-05-19 21:23:08'),
(9, 'packet of headache pills', 9.75, '9', 'packet of headache pills', '2020-05-19 21:23:32', '2020-05-19 21:24:19'),
(10, 'imported box of chocolates', 11.25, '7', 'box of imported chocolates', '2020-05-19 21:24:02', '2020-05-23 13:26:09');

-- --------------------------------------------------------

--
-- Struttura della tabella `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE IF NOT EXISTS `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enable_sales_tax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enable_custom_duty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `product_categories`
--

INSERT INTO `product_categories` (`id`, `category_name`, `enable_sales_tax`, `enable_custom_duty`, `created_at`, `updated_at`) VALUES
(7, 'Foods', '0', '1', '2020-05-19 05:58:13', '2020-05-19 06:10:35'),
(8, 'Books', '0', '1', '2020-05-19 06:10:30', '2020-05-19 06:10:30'),
(9, 'Medical', '0', '1', '2020-05-19 06:13:59', '2020-05-19 06:13:59'),
(10, 'Uncategorized', '1', '1', '2020-05-19 06:14:29', '2020-05-19 06:14:29');

-- --------------------------------------------------------

--
-- Struttura della tabella `receipts`
--

DROP TABLE IF EXISTS `receipts`;
CREATE TABLE IF NOT EXISTS `receipts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `receipt_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `products` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_sales_tax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_custom_duty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `receipts`
--

INSERT INTO `receipts` (`id`, `receipt_name`, `shop_name`, `products`, `total_sales_tax`, `total_custom_duty`, `total_price`, `created_at`, `updated_at`) VALUES
(3, 'Output 2', '1', '{\"1\":{\"name\":\"5\",\"product_quantity\":\"1\",\"sales_tax\":\"0.50\",\"price\":\"10.50\"},\"2\":{\"name\":\"6\",\"product_quantity\":\"1\",\"sales_tax\":\"7.13\",\"price\":\"54.63\"},\"3\":{\"name\":\"Select a Product\",\"product_quantity\":null,\"sales_tax\":null,\"price\":null},\"4\":{\"name\":\"Select a Product\",\"product_quantity\":null,\"sales_tax\":null,\"price\":null}}', '7.63', NULL, '65.13', '2020-05-24 11:41:31', '2020-05-24 11:43:22'),
(2, 'Output 3', '1', '{\"1\":{\"name\":\"7\",\"product_quantity\":\"1\",\"sales_tax\":\"4.20\",\"price\":\"32.19\"},\"2\":{\"name\":\"8\",\"product_quantity\":\"1\",\"sales_tax\":\"1.90\",\"price\":\"20.89\"},\"3\":{\"name\":\"9\",\"product_quantity\":\"1\",\"sales_tax\":\"0\",\"price\":\"9.75\"},\"4\":{\"name\":\"10\",\"product_quantity\":\"3\",\"sales_tax\":\"1.69\",\"price\":\"35.44\"}}', '7.79', NULL, '98.27', '2020-05-24 08:41:59', '2020-05-24 11:39:51'),
(4, 'Output 1', '1', '{\"1\":{\"name\":\"2\",\"product_quantity\":\"2\",\"sales_tax\":\"0\",\"price\":\"24.98\"},\"2\":{\"name\":\"3\",\"product_quantity\":\"1\",\"sales_tax\":\"1.50\",\"price\":\"16.49\"},\"3\":{\"name\":\"4\",\"product_quantity\":\"1\",\"sales_tax\":\"0\",\"price\":\"0.85\"},\"4\":{\"name\":\"Select a Product\",\"product_quantity\":null,\"sales_tax\":null,\"price\":null}}', '1.50', NULL, '42.32', '2020-05-24 11:42:09', '2020-05-24 11:42:59');

-- --------------------------------------------------------

--
-- Struttura della tabella `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `currency_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_symbol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `settings`
--

INSERT INTO `settings` (`id`, `currency_name`, `currency_symbol`, `shop_name`, `created_at`, `updated_at`) VALUES
(1, 'US dollar', '$', 'My Shop', '2020-05-20 03:07:59', '2020-05-20 03:18:18');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
