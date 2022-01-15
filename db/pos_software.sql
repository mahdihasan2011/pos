-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2020 at 11:42 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_software`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `details`, `created_at`, `updated_at`) VALUES
(1, 'Demo Brand', NULL, '2020-06-22 08:58:16', '2020-06-22 08:58:27');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `total` double(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `details`, `created_at`, `updated_at`) VALUES
(2, 'Demo 22', 'nai', '2020-06-22 07:56:02', '2020-06-22 07:59:16'),
(3, 'New 33', 'dcd  sdvd', '2020-06-22 08:01:58', '2020-06-24 04:41:57');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `details`, `created_at`, `updated_at`) VALUES
(1, 'Red', NULL, '2020-06-22 18:06:44', '2020-06-22 18:06:44'),
(2, 'Black', NULL, '2020-06-22 18:06:57', '2020-06-22 18:06:57'),
(3, 'White', NULL, '2020-06-22 18:07:13', '2020-06-22 18:07:13');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `title`, `name`, `phone`, `email`, `website`, `address`, `invoice_note`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'My Company Title', 'Demo Company Name', '01928717133', 'company@email.com', 'www.companywebsite.com', 'Dhaka- 1203.', 'Compau sthsrth sr jbsmv evwevw wtrh rh srtsrtts err hs rsrtsr ht srhaer arh aer her arey t', 'public/Logo/5f1b03228b146Blood-fighter-icon.png', '2020-07-24 11:59:04', '2020-08-06 18:54:15');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` decimal(10,2) DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `email`, `category`, `balance`, `address`, `created_at`, `updated_at`) VALUES
(3, 'Demo svs', '0192871733', 'demo@gmail.com', 'Special', '2345.00', 'fvg', '2020-07-16 23:24:17', '2020-08-06 20:26:45'),
(4, 'Demo222nrtntr', '01621532677', 'srewber@gmail.com', 'Blocked', '145.00', 'sgds', '2020-07-16 23:24:43', '2020-08-14 00:47:42'),
(5, 'New Customer', '01910191019', 'new@gmail.com', 'Special', '10.00', 'ki jani', '2020-07-16 23:25:39', '2020-07-16 23:25:39'),
(6, 'Demo Try', '01928717000', 'admiern@gmail.com', 'Vip', '10000.00', 'nsnng', '2020-07-17 01:31:24', '2020-08-06 20:27:10'),
(7, 'New Customer For testing', '0192871733', 'dee4rmo@gmail.com', 'Special', '10011851.00', 'rstn', '2020-07-17 01:31:57', '2020-08-15 21:27:46'),
(8, 'Demo C usr', '01621532677', NULL, 'Normal', '237.00', NULL, '2020-08-06 19:22:41', '2020-08-14 00:09:11'),
(9, 'New Cyy', '01621532677', NULL, 'Normal', '0.00', NULL, '2020-08-06 20:16:11', '2020-08-06 20:16:11'),
(10, 'New tryerne', '0192871733', 'maherehdi@gmail.com', 'Blocked', '1.00', 'msod', '2020-08-06 20:28:41', '2020-08-06 20:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `details`, `created_at`, `updated_at`) VALUES
(2, 'testing group', NULL, '2020-06-22 09:20:03', '2020-06-22 09:20:03');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2020_06_22_132835_create_categories_table', 4),
(9, '2020_06_22_143723_create_groups_table', 5),
(10, '2020_06_22_144110_create_brands_table', 5),
(11, '2020_06_22_144156_create_types_table', 5),
(12, '2020_06_22_144403_create_sizes_table', 5),
(13, '2020_06_22_144537_create_colors_table', 5),
(14, '2020_06_24_104650_create_products_table', 6),
(15, '2020_05_14_212406_create_customers_table', 7),
(16, '2020_06_16_233742_create_suppliers_table', 7),
(18, '2020_07_02_144520_create_purchases_table', 7),
(19, '2020_07_02_145014_create_purchase_items_table', 7),
(20, '2020_07_02_143952_create_carts_table', 8),
(21, '2020_07_13_033655_create_stocks_table', 9),
(23, '2020_07_17_045802_create_sale_items_table', 10),
(24, '2020_07_17_045506_create_sales_table', 11),
(25, '2020_07_24_172028_create_companies_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `brand` int(11) DEFAULT NULL,
  `group` int(11) DEFAULT NULL,
  `color` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `cost` double(10,2) DEFAULT NULL,
  `margin` decimal(6,2) DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `category`, `brand`, `group`, `color`, `type`, `size`, `cost`, `margin`, `price`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Demo item', '007', 2, 1, 2, 2, 2, 5, 100.50, '44.34', 145.06, 'public/Image/5ef3b336072ee5e1436de263cfshowcase.png', '2020-06-24 14:10:30', '2020-07-03 14:47:23'),
(3, 'srt', '0001', 2, 1, 2, 2, 1, 3, 200.40, '11.52', 223.07, NULL, '2020-06-27 18:03:05', '2020-06-27 18:03:05'),
(5, 'Test', '0073', 2, 1, 2, 2, 1, 2, 200.67, '46.60', 294.18, NULL, '2020-06-27 20:02:39', '2020-06-27 20:02:39'),
(6, 'FFF', '00733', 2, 1, 2, 2, 1, 4, 200.00, '11.00', 222.00, NULL, '2020-07-11 00:45:30', '2020-07-11 00:45:30'),
(7, 'New45rfv', '00012', 2, 1, 2, 1, 1, 2, 100.00, '45.00', 145.00, NULL, '2020-07-11 00:46:12', '2020-07-11 00:46:12'),
(8, 'New 44', '44', 2, 1, 2, 2, 1, 3, 200.00, '11.00', 222.00, NULL, '2020-07-22 20:50:42', '2020-07-22 20:50:42'),
(9, 'RTdh ddehhb 444', '444', 2, 1, 2, 2, 1, 2, 200.00, '11.00', 222.00, NULL, '2020-07-22 20:51:21', '2020-07-22 20:51:21'),
(10, 'Demo cccsav xfnxfgm xg', '007555', 2, 1, 2, 2, 1, 3, 100.00, '11.00', 111.00, NULL, '2020-08-06 23:56:41', '2020-08-06 23:56:41'),
(11, 'New ssrease rs  rw45', '000133', 3, 1, 2, 3, 1, 3, 200.00, '110.00', 420.00, NULL, '2020-08-06 23:57:07', '2020-08-06 23:57:07'),
(12, 'vsxb xxft tr rtj xrtj srt jxrtj fth r', '007444', 2, 1, 2, 2, 1, 4, 10.00, '110.00', 21.00, NULL, '2020-08-06 23:57:48', '2020-08-06 23:57:48'),
(13, 'Newzdr zr zrerh zr hzrh drh zdrh', '5564334', 3, 1, NULL, 2, 1, 1, 300.00, '110.00', 630.00, NULL, '2020-08-06 23:58:20', '2020-08-06 23:58:20'),
(14, 'Demoqq2q12 44', '00014442', 2, 1, 2, 3, 2, 5, 50.00, '11.00', 55.50, NULL, '2020-08-07 00:25:43', '2020-08-07 00:25:43'),
(15, 'Demo22 2', '2 2 2', 2, 1, 2, 2, 1, 5, 200.00, '110.00', 420.00, NULL, '2020-08-07 00:26:07', '2020-08-07 00:26:07'),
(16, 'Dqfw s44y45 y54 emo', '0001w22', 2, 1, 2, 3, 1, 4, 100.00, '11.00', 111.00, NULL, '2020-08-07 00:27:32', '2020-08-07 00:27:32'),
(17, 'svsz sths5reh aerhrh', '0w3307', 2, 1, 2, 2, 2, 5, 300.00, '123.44', 670.32, NULL, '2020-08-07 00:30:01', '2020-08-07 00:30:01'),
(18, 'Demo', '0071', 2, 1, 2, 2, 1, 2, 100.00, '110.00', 210.00, NULL, '2020-08-10 17:34:58', '2020-08-10 17:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `supplier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `total_qty` int(11) DEFAULT NULL,
  `sub_total` double(10,2) DEFAULT NULL,
  `discount` double(10,2) DEFAULT NULL,
  `disc_type` tinyint(4) DEFAULT NULL,
  `payable` double(10,2) DEFAULT NULL,
  `paid` double(10,2) DEFAULT NULL,
  `return` double(10,2) DEFAULT NULL,
  `due` double(10,2) DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `purchase_no`, `date`, `supplier`, `amount`, `total_qty`, `sub_total`, `discount`, `disc_type`, `payable`, `paid`, `return`, `due`, `payment_type`, `created_at`, `updated_at`) VALUES
(1, 'P2007131', '2020-07-13', NULL, NULL, 26, 4473.07, 20.00, NULL, 3578.00, 1000.00, 0.00, 2578.00, NULL, '2020-07-12 22:11:04', '2020-07-12 22:11:04'),
(2, 'P2007132', '2020-07-13', NULL, NULL, 3, 661.24, 30.00, NULL, 463.00, 100.00, 0.00, 363.00, NULL, '2020-07-12 22:15:59', '2020-07-12 22:15:59'),
(3, 'P2007133', '2020-07-13', NULL, NULL, 2, 367.00, 30.00, 1, 257.00, 100.00, 0.00, 157.00, NULL, '2020-07-12 22:25:32', '2020-07-12 22:25:32'),
(4, 'P2007134', '2020-07-13', NULL, NULL, 35, 4896.05, 30.00, 1, 3427.00, 1000.00, 0.00, 2427.00, NULL, '2020-07-13 15:17:14', '2020-07-13 15:17:14'),
(5, 'P2007135', '2020-07-13', NULL, NULL, 3, 590.07, 30.00, 1, 413.00, 1000.00, 587.00, 0.00, NULL, '2020-07-13 15:23:51', '2020-07-13 15:23:51'),
(6, 'P2007136', '2020-07-13', NULL, NULL, 2, 367.00, 30.00, 1, 257.00, 1000.00, 743.00, 0.00, NULL, '2020-07-13 15:25:53', '2020-07-13 15:25:53'),
(7, 'P2007137', '2020-07-13', NULL, NULL, 3, 661.24, 30.00, 1, 463.00, 100.00, 0.00, 363.00, NULL, '2020-07-13 15:27:00', '2020-07-13 15:27:00'),
(8, 'P2007138', '2020-07-13', NULL, NULL, 3, 661.24, 30.00, 1, 463.00, 100.00, 0.00, 363.00, NULL, '2020-07-13 15:27:15', '2020-07-13 15:27:15'),
(9, 'P2007139', '2020-07-13', NULL, NULL, 2, 367.00, 30.00, 1, 257.00, 1000.00, 743.00, 0.00, NULL, '2020-07-13 15:29:08', '2020-07-13 15:29:08'),
(10, 'P2007139', '2020-07-13', NULL, NULL, 2, 367.00, 30.00, 1, 257.00, 1000.00, 743.00, 0.00, NULL, '2020-07-13 15:29:53', '2020-07-13 15:29:53'),
(11, 'P20071311', '2020-07-13', NULL, NULL, 2, 367.00, 30.00, 1, 257.00, 1000.00, 743.00, 0.00, NULL, '2020-07-13 15:31:26', '2020-07-13 15:31:26'),
(13, 'P20071313', '2020-07-13', NULL, NULL, 2, 367.00, 30.00, 1, 257.00, 1000.00, 743.00, 0.00, NULL, '2020-07-13 15:33:37', '2020-07-13 15:33:37'),
(14, 'P20071314', '2020-07-13', NULL, NULL, 3, 590.07, 30.00, 1, 413.00, 100.00, 0.00, 313.00, NULL, '2020-07-13 15:57:03', '2020-07-13 15:57:03'),
(15, 'P20071315', '2020-07-13', NULL, NULL, 22, 5750.16, 30.00, 1, 4025.00, 3000.00, 0.00, 1025.00, NULL, '2020-07-13 16:00:58', '2020-07-13 16:00:58'),
(16, 'P20071316', '2020-07-13', NULL, NULL, 11, 1204.00, 30.00, 1, 843.00, 100.00, 0.00, 743.00, NULL, '2020-07-13 16:03:52', '2020-07-13 16:03:52'),
(17, 'P20071317', '2020-07-13', NULL, NULL, 10, 500.00, 30.00, 1, 350.00, 100.00, 0.00, 250.00, NULL, '2020-07-13 16:04:48', '2020-07-13 16:04:48'),
(18, 'P20071318', '2020-07-13', NULL, NULL, 3, 500.40, 30.00, 1, 350.00, 1000.00, 650.00, 0.00, NULL, '2020-07-13 16:08:18', '2020-07-13 16:08:18'),
(19, 'P20071319', '2020-07-13', NULL, NULL, 2, 400.67, 30.00, 1, 280.00, 1000.00, 720.00, 0.00, NULL, '2020-07-13 16:12:36', '2020-07-13 16:12:36'),
(20, 'P20071320', '2020-07-13', NULL, NULL, 25, 5500.50, 30.00, 1, 3850.00, 1000.00, 0.00, 2850.00, NULL, '2020-07-13 16:40:37', '2020-07-13 16:40:37'),
(21, 'P20071421', '2020-07-14', '3', NULL, 65, 8002.00, 30.00, 1, 5601.00, 3000.00, 0.00, 2601.00, NULL, '2020-07-14 16:01:25', '2020-07-14 16:01:25'),
(22, 'P20071422', '2020-07-14', '2', NULL, 27, 4312.50, 50.00, 1, 2156.00, 2000.00, 0.00, 156.00, NULL, '2020-07-14 16:03:16', '2020-07-14 16:03:16'),
(23, 'P20071423', '2020-07-14', '5', '0.00', 3, 500.90, 30.00, 1, 351.00, 3000.00, 2649.00, 0.00, NULL, '2020-07-14 16:04:35', '2020-07-14 16:04:35'),
(24, 'P20071424', '2020-07-14', '2', '200.00', 2, 300.67, 30.00, 1, 210.00, 3000.00, 2790.00, 0.00, NULL, '2020-07-14 16:08:01', '2020-07-14 16:08:01'),
(25, 'P20071925', '2020-07-19', 'Cash', NULL, 11, 1105.00, 30.00, 1, 774.00, 1000.00, 226.00, 0.00, NULL, '2020-07-18 23:18:38', '2020-07-18 23:18:38'),
(26, 'P20071926', '2020-07-19', 'Cash', NULL, 500, 204613.00, 40.00, 1, 122768.00, 110000.00, 0.00, 12768.00, NULL, '2020-07-18 23:34:31', '2020-07-18 23:34:31'),
(27, 'P20072027', '2020-07-20', 'Cash', NULL, 101, 320100.50, 30.00, 1, 224070.00, 3000.00, 0.00, 221070.00, NULL, '2020-07-19 20:17:53', '2020-07-19 20:17:53'),
(28, 'P20072028', '2020-07-20', 'Cash', NULL, 2, 300.50, 20.00, 1, 240.00, 100.00, 0.00, 140.00, NULL, '2020-07-19 21:30:54', '2020-07-19 21:30:54'),
(29, 'P20072029', '2020-07-20', 'Cash', NULL, 2, 300.00, 30.00, 1, 210.00, 100.00, 0.00, 110.00, NULL, '2020-07-19 21:32:44', '2020-07-19 21:32:44'),
(30, 'P20072030', '2020-07-20', 'Cash', NULL, 13, 2407.70, 30.00, 1, 1685.00, 1000.00, 0.00, 685.00, NULL, '2020-07-19 21:36:09', '2020-07-19 21:36:09'),
(31, 'P20072131', '2020-07-21', 'Cash', NULL, 3, 400.90, 30.00, 1, 281.00, 100.00, 0.00, 181.00, NULL, '2020-07-20 18:26:45', '2020-07-20 18:26:45'),
(32, 'P20072332', '2020-07-23', 'Cash', NULL, 8, 1401.57, 40.00, 1, 1346.00, 1000.00, 0.00, 346.00, NULL, '2020-07-22 20:52:17', '2020-07-22 20:52:17'),
(33, 'P20080733', '2020-08-07', 'Cash', NULL, 45, 8184.46, 0.00, 1, 8184.00, 0.00, 0.00, 8184.00, NULL, '2020-08-06 23:59:00', '2020-08-06 23:59:00'),
(34, 'P20080734', '2020-08-07', 'Cash', NULL, 467, 108776.18, 0.00, 1, 108776.00, 0.00, 0.00, 108776.00, NULL, '2020-08-07 00:31:31', '2020-08-07 00:31:31'),
(35, 'P20080735', '2020-08-07', 'Cash', NULL, 0, 0.00, 0.00, 1, 0.00, 0.00, 0.00, 0.00, NULL, '2020-08-07 00:31:45', '2020-08-07 00:31:45'),
(36, 'P20080736', '2020-08-07', 'Cash', NULL, 0, 0.00, 0.00, 1, 0.00, 0.00, 0.00, 0.00, NULL, '2020-08-07 00:32:12', '2020-08-07 00:32:12'),
(37, 'P20080737', '2020-08-07', 'Cash', NULL, 0, 0.00, 0.00, 1, 0.00, 0.00, 0.00, 0.00, NULL, '2020-08-07 00:33:14', '2020-08-07 00:33:14');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_items`
--

CREATE TABLE `purchase_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` double(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` double(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_items`
--

INSERT INTO `purchase_items` (`id`, `purchase_no`, `date`, `name`, `code`, `cost`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(1, 'P20071421', '2020-07-14', 'Demo item', '007', 100.00, 50, 5000.00, NULL, NULL),
(2, 'P20071421', '2020-07-14', 'srt', '0001', 200.40, 5, 1002.00, NULL, NULL),
(3, 'P20071421', '2020-07-14', 'FFF', '00733', 200.00, 10, 2000.00, NULL, NULL),
(4, 'P20071422', '2020-07-14', 'Demo item', '007', 100.50, 1, 100.50, NULL, NULL),
(5, 'P20071422', '2020-07-14', 'srt', '0001', 200.40, 15, 3006.00, NULL, NULL),
(6, 'P20071422', '2020-07-14', 'Test', '0073', 206.00, 1, 206.00, NULL, NULL),
(7, 'P20071422', '2020-07-14', 'New45rfv', '00012', 100.00, 10, 1000.00, NULL, NULL),
(8, 'P20071423', '2020-07-14', 'Demo item', '007', 100.50, 1, 100.50, NULL, NULL),
(9, 'P20071423', '2020-07-14', 'srt', '0001', 200.40, 1, 200.40, NULL, NULL),
(10, 'P20071423', '2020-07-14', 'FFF', '00733', 200.00, 1, 200.00, NULL, NULL),
(11, 'P20071424', '2020-07-14', 'Test', '0073', 200.67, 1, 200.67, NULL, NULL),
(12, 'P20071424', '2020-07-14', 'New45rfv', '00012', 100.00, 1, 100.00, NULL, NULL),
(13, 'P20071925', '2020-07-19', 'Demo item', '007', 100.50, 10, 1005.00, NULL, NULL),
(14, 'P20071925', '2020-07-19', 'New45rfv', '00012', 100.00, 1, 100.00, NULL, NULL),
(15, 'P20071926', '2020-07-19', 'Demo item', '007', 145.06, 100, 14506.00, NULL, NULL),
(16, 'P20071926', '2020-07-19', 'srt', '0001', 200.40, 100, 20040.00, NULL, NULL),
(17, 'P20071926', '2020-07-19', 'Test', '0073', 200.67, 100, 20067.00, NULL, NULL),
(18, 'P20071926', '2020-07-19', 'FFF', '00733', 200.00, 100, 20000.00, NULL, NULL),
(19, 'P20071926', '2020-07-19', 'New45rfv', '00012', 1300.00, 100, 130000.00, NULL, NULL),
(20, 'P20072027', '2020-07-20', 'Demo item', '007', 100.50, 1, 100.50, NULL, NULL),
(21, 'P20072027', '2020-07-20', 'FFF', '00733', 3200.00, 100, 320000.00, NULL, NULL),
(22, 'P20072028', '2020-07-20', 'Demo item', '007', 100.50, 1, 100.50, NULL, NULL),
(23, 'P20072028', '2020-07-20', 'FFF', '00733', 200.00, 1, 200.00, NULL, NULL),
(24, 'P20072029', '2020-07-20', 'FFF', '00733', 200.00, 1, 200.00, NULL, NULL),
(25, 'P20072029', '2020-07-20', 'New45rfv', '00012', 100.00, 1, 100.00, NULL, NULL),
(26, 'P20072030', '2020-07-20', 'Demo item', '007', 100.50, 2, 201.00, NULL, NULL),
(27, 'P20072030', '2020-07-20', 'Test', '0073', 200.67, 10, 2006.70, NULL, NULL),
(28, 'P20072030', '2020-07-20', 'FFF', '00733', 200.00, 1, 200.00, NULL, NULL),
(29, 'P20072131', '2020-07-21', 'Demo item', '007', 100.50, 1, 100.50, NULL, NULL),
(30, 'P20072131', '2020-07-21', 'srt', '0001', 200.40, 1, 200.40, NULL, NULL),
(31, 'P20072131', '2020-07-21', 'New45rfv', '00012', 100.00, 1, 100.00, NULL, NULL),
(32, 'P20072332', '2020-07-23', 'Demo item', '007', 100.50, 1, 100.50, NULL, NULL),
(33, 'P20072332', '2020-07-23', 'srt', '0001', 200.40, 1, 200.40, NULL, NULL),
(34, 'P20072332', '2020-07-23', 'Test', '0073', 200.67, 1, 200.67, NULL, NULL),
(35, 'P20072332', '2020-07-23', 'FFF', '00733', 200.00, 1, 200.00, NULL, NULL),
(36, 'P20072332', '2020-07-23', 'New45rfv', '00012', 100.00, 1, 100.00, NULL, NULL),
(37, 'P20072332', '2020-07-23', 'New 44', '44', 200.00, 2, 400.00, NULL, NULL),
(38, 'P20072332', '2020-07-23', 'RTdh ddehhb 444', '444', 200.00, 1, 200.00, NULL, NULL),
(39, 'P20080733', '2020-08-07', 'Demo item', '007', 145.06, 16, 2320.96, NULL, NULL),
(40, 'P20080733', '2020-08-07', 'srt', '0001', 223.07, 2, 446.14, NULL, NULL),
(41, 'P20080733', '2020-08-07', 'Test', '0073', 294.18, 2, 588.36, NULL, NULL),
(42, 'P20080733', '2020-08-07', 'FFF', '00733', 222.00, 7, 1554.00, NULL, NULL),
(43, 'P20080733', '2020-08-07', 'New45rfv', '00012', 145.00, 3, 435.00, NULL, NULL),
(44, 'P20080733', '2020-08-07', 'New 44', '44', 222.00, 5, 1110.00, NULL, NULL),
(45, 'P20080733', '2020-08-07', 'RTdh ddehhb 444', '444', 222.00, 5, 1110.00, NULL, NULL),
(46, 'P20080733', '2020-08-07', 'Demo cccsav xfnxfgm xg', '007555', 100.00, 1, 100.00, NULL, NULL),
(47, 'P20080733', '2020-08-07', 'New ssrease rs  rw45', '000133', 200.00, 1, 200.00, NULL, NULL),
(48, 'P20080733', '2020-08-07', 'vsxb xxft tr rtj xrtj srt jxrtj fth r', '007444', 10.00, 2, 20.00, NULL, NULL),
(49, 'P20080733', '2020-08-07', 'Newzdr zr zrerh zr hzrh drh zdrh', '5564334', 300.00, 1, 300.00, NULL, NULL),
(50, 'P20080734', '2020-08-07', 'Demo item', '007', 100.50, 21, 2110.50, NULL, NULL),
(51, 'P20080734', '2020-08-07', 'srt', '0001', 200.40, 24, 4809.60, NULL, NULL),
(52, 'P20080734', '2020-08-07', 'Test', '0073', 200.67, 24, 4816.08, NULL, NULL),
(53, 'P20080734', '2020-08-07', 'FFF', '00733', 200.00, 11, 2200.00, NULL, NULL),
(54, 'P20080734', '2020-08-07', 'New45rfv', '00012', 100.00, 22, 2200.00, NULL, NULL),
(55, 'P20080734', '2020-08-07', 'New 44', '44', 200.00, 12, 2400.00, NULL, NULL),
(56, 'P20080734', '2020-08-07', 'RTdh ddehhb 444', '444', 200.00, 24, 4800.00, NULL, NULL),
(57, 'P20080734', '2020-08-07', 'Demo cccsav xfnxfgm xg', '007555', 100.00, 12, 1200.00, NULL, NULL),
(58, 'P20080734', '2020-08-07', 'New ssrease rs  rw45', '000133', 200.00, 2, 400.00, NULL, NULL),
(59, 'P20080734', '2020-08-07', 'vsxb xxft tr rtj xrtj srt jxrtj fth r', '007444', 10.00, 14, 140.00, NULL, NULL),
(60, 'P20080734', '2020-08-07', 'Newzdr zr zrerh zr hzrh drh zdrh', '5564334', 300.00, 21, 6300.00, NULL, NULL),
(61, 'P20080734', '2020-08-07', 'Demoqq2q12 44', '00014442', 50.00, 12, 600.00, NULL, NULL),
(62, 'P20080734', '2020-08-07', 'Demo22 2', '2 2 2', 200.00, 12, 2400.00, NULL, NULL),
(63, 'P20080734', '2020-08-07', 'Dqfw s44y45 y54 emo', '0001w22', 100.00, 12, 1200.00, NULL, NULL),
(64, 'P20080734', '2020-08-07', 'svsz sths5reh aerhrh', '0w3307', 300.00, 244, 73200.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `total_qty` int(11) DEFAULT NULL,
  `sub_total` double(10,2) DEFAULT NULL,
  `discount` double(10,2) DEFAULT NULL,
  `disc_type` tinyint(4) DEFAULT NULL,
  `payable` double(10,2) DEFAULT NULL,
  `paid` double(10,2) DEFAULT NULL,
  `return` double(10,2) DEFAULT NULL,
  `due` double(10,2) DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `sale_no`, `date`, `customer`, `amount`, `total_qty`, `sub_total`, `discount`, `disc_type`, `payable`, `paid`, `return`, `due`, `payment_type`, `payment_number`, `created_at`, `updated_at`) VALUES
(1, 'INV2007171', '2020-07-17', '6', '10000.00', 39, 7518.88, 30.00, 1, 5263.00, 2000.00, 0.00, 3263.00, NULL, '01210000055', '2020-07-17 02:55:46', '2020-07-17 02:55:46'),
(2, 'INV2007172', '2020-07-17', '5', '10.00', 1, 222.00, 30.00, 1, 155.00, 100.00, 0.00, 55.00, NULL, NULL, '2020-07-17 03:00:42', '2020-07-17 03:00:42'),
(3, 'INV2007173', '2020-07-17', NULL, '0.00', 1, 294.18, 30.00, 1, 206.00, 100.00, 0.00, 106.00, 'Nagad', NULL, '2020-07-17 03:18:26', '2020-07-17 03:18:26'),
(4, 'INV2007174', '2020-07-17', NULL, '2345.00', 1, 294.18, 30.00, 1, 206.00, 100.00, 0.00, 106.00, 'Rocket', NULL, '2020-07-17 03:19:53', '2020-07-17 03:19:53'),
(5, 'INV2007175', '2020-07-17', NULL, '10000.00', 1, 223.07, 30.00, 1, 156.00, 100.00, 0.00, 56.00, 'Bkash', '01212445789', '2020-07-17 03:22:21', '2020-07-17 03:22:21'),
(6, 'INV2007176', '2020-07-17', NULL, '2345.00', 1, 223.07, 30.00, 1, 156.00, 100.00, 0.00, 56.00, 'Rocket', NULL, '2020-07-17 03:23:59', '2020-07-17 03:23:59'),
(7, 'INV2007177', '2020-07-17', '3', '2345.00', 1, 223.07, 30.00, 1, 156.00, 100.00, 0.00, 56.00, 'Nagad', NULL, '2020-07-17 03:25:49', '2020-07-17 03:25:49'),
(8, 'INV2007178', '2020-07-17', 'Cash', NULL, 1, 223.07, 30.00, 1, 156.00, 100.00, 0.00, 56.00, 'Nagad', NULL, '2020-07-17 03:27:50', '2020-07-17 03:27:50'),
(9, 'INV2007179', '2020-07-17', '6', '10000.00', 1, 223.07, 30.00, 1, 156.00, 100.00, 0.00, 56.00, 'Nagad', '0120190374', '2020-07-17 03:38:22', '2020-07-17 03:38:22'),
(10, 'INV20071910', '2020-07-19', 'Cash', NULL, 2, 368.13, 30.00, 1, 258.00, 100.00, 0.00, 158.00, 'Cash', NULL, '2020-07-18 23:25:43', '2020-07-18 23:25:43'),
(11, 'INV20071911', '2020-07-19', 'Cash', NULL, 2, 368.13, 30.00, 1, 258.00, 100.00, 0.00, 158.00, 'Cash', NULL, '2020-07-18 23:31:22', '2020-07-18 23:31:22'),
(12, 'INV20071912', '2020-07-19', 'Cash', NULL, 2, 290.06, 30.00, 1, 203.00, 100.00, 0.00, 103.00, 'Cash', NULL, '2020-07-18 23:32:12', '2020-07-18 23:32:12'),
(13, 'INV20071913', '2020-07-19', 'Cash', NULL, 2, 367.06, 30.00, 1, 257.00, 100.00, 0.00, 157.00, 'Cash', NULL, '2020-07-18 23:34:55', '2020-07-18 23:34:55'),
(14, 'INV20071914', '2020-07-19', 'Cash', NULL, 1, 145.06, 30.00, 1, 102.00, 100.00, 0.00, 2.00, 'Cash', NULL, '2020-07-18 23:35:33', '2020-07-18 23:35:33'),
(15, 'INV20071915', '2020-07-19', 'Cash', NULL, 2, 367.06, 30.00, 1, 257.00, 100.00, 0.00, 157.00, 'Cash', NULL, '2020-07-18 23:36:32', '2020-07-18 23:36:32'),
(16, 'INV20071916', '2020-07-19', 'Cash', NULL, 3, 590.13, 30.00, 1, 413.00, 100.00, 0.00, 313.00, 'Cash', NULL, '2020-07-18 23:37:48', '2020-07-18 23:37:48'),
(17, 'INV20071917', '2020-07-19', 'Cash', NULL, 7, 2788.38, 30.00, 1, 1952.00, 1000.00, 0.00, 952.00, 'Cash', NULL, '2020-07-19 07:58:25', '2020-07-19 07:58:25'),
(18, 'INV20072018', '2020-07-20', 'Cash', NULL, 2, 367.00, NULL, 1, NULL, NULL, NULL, NULL, 'Cash', NULL, '2020-07-19 21:28:29', '2020-07-19 21:28:29'),
(19, 'INV20072019', '2020-07-20', 'Cash', NULL, 28, 129138.19, NULL, 1, NULL, NULL, NULL, NULL, 'Cash', NULL, '2020-07-19 21:52:42', '2020-07-19 21:52:42'),
(20, 'INV20072120', '2020-07-21', 'Cash', NULL, 4, 735.13, 30.00, 1, 515.00, NULL, NULL, NULL, 'Cash', NULL, '2020-07-20 18:11:37', '2020-07-20 18:11:37'),
(21, 'INV20072121', '2020-07-21', 'Cash', NULL, 101, 140823.07, NULL, 1, NULL, NULL, NULL, NULL, 'Cash', NULL, '2020-07-21 11:28:35', '2020-07-21 11:28:35'),
(22, 'INV20072122', '2020-07-21', 'Cash', NULL, 5, 1029.31, NULL, 1, NULL, NULL, NULL, NULL, 'Cash', NULL, '2020-07-21 11:55:41', '2020-07-21 11:55:41'),
(23, 'INV20072223', '2020-07-22', 'Cash', NULL, 2, 445.07, 30.00, 1, 312.00, 100.00, 0.00, 212.00, 'Cash', NULL, '2020-07-22 14:31:24', '2020-07-22 14:31:24'),
(24, 'INV20072324', '2020-07-23', '7', '10000000.00', 7, 13573.07, 20.00, 1, 10858.00, 5000.00, 0.00, 5858.00, 'Nagad', '012123948', '2020-07-22 20:41:31', '2020-07-22 20:41:31'),
(25, 'INV20081425', NULL, 'Cash', NULL, 2, 256.06, 20.00, 1, 205.00, 200.00, 0.00, 5.00, 'Cash', NULL, '2020-08-13 23:32:08', '2020-08-13 23:32:08'),
(26, 'INV20081426', NULL, 'Cash', NULL, 0, 0.00, 0.00, 1, 0.00, 198.00, 200.00, 0.00, 'Cash', NULL, '2020-08-13 23:32:54', '2020-08-13 23:32:54'),
(27, 'INV20081426', NULL, 'Cash', NULL, 0, 0.00, 0.00, 1, 0.00, 198.00, 200.00, 0.00, 'Cash', NULL, '2020-08-13 23:33:46', '2020-08-13 23:33:46'),
(28, 'INV20081428', NULL, 'Cash', NULL, 6, 1695.18, 30.00, 1, 1187.00, 1000.00, 0.00, 187.00, 'Cash', NULL, '2020-08-13 23:49:33', '2020-08-13 23:49:33'),
(29, 'INV20081429', NULL, '8', NULL, 4, 546.18, 20.00, 1, 437.00, 200.00, 0.00, 237.00, 'Cash', NULL, '2020-08-14 00:09:11', '2020-08-14 00:09:11'),
(30, 'INV20081430', NULL, '7', NULL, 27, 7172.76, 0.00, 1, 7173.00, 0.00, 0.00, 7173.00, 'Cash', NULL, '2020-08-14 00:36:45', '2020-08-14 00:36:45'),
(31, 'INV20081431', NULL, '4', NULL, 1, 145.06, 0.00, 1, 145.00, 0.00, 0.00, 145.00, 'Cash', NULL, '2020-08-14 00:47:42', '2020-08-14 00:47:42'),
(32, 'INV20081432', NULL, 'Cash', NULL, 4, 1108.00, 0.00, 1, 1108.00, 0.00, 0.00, 1108.00, 'Cash', NULL, '2020-08-14 00:52:03', '2020-08-14 00:52:03'),
(33, 'INV20081433', NULL, '7', NULL, 18, 3780.80, 50.00, 1, 1890.00, 500.00, 0.00, 1390.00, 'Cash', NULL, '2020-08-14 02:06:05', '2020-08-14 02:06:05'),
(34, 'INV20081434', '2020-08-14', '7', '10008563.00', 10, 2701.45, 30.00, 1, 1891.00, 500.00, 0.00, 1391.00, 'Cash', NULL, '2020-08-14 02:07:33', '2020-08-14 02:07:33'),
(35, 'INV20081435', '2020-08-14', 'Cash', NULL, 3, 311.56, 40.00, 2, 272.00, 40.00, 0.00, 232.00, 'Cash', NULL, '2020-08-14 02:31:11', '2020-08-14 02:31:11'),
(36, 'INV20081436', '2020-08-14', 'Cash', NULL, 0, 0.00, 30.00, 2, 226.00, 50.00, 0.00, 176.00, 'Cash', NULL, '2020-08-14 02:32:40', '2020-08-14 02:32:40'),
(37, 'INV20081637', '2020-08-16', '7', '10009954.00', 42, 8620.89, 20.00, 1, 6897.00, 5000.00, 0.00, 1897.00, 'Cash', NULL, '2020-08-15 21:27:46', '2020-08-15 21:27:46'),
(38, 'INV20081638', '2020-08-16', 'Cash', NULL, 5, 1639.06, 0.00, 1, 1639.00, 0.00, 0.00, 1639.00, 'Cash', NULL, '2020-08-15 21:30:57', '2020-08-15 21:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `sale_items`
--

CREATE TABLE `sale_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` double(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_items`
--

INSERT INTO `sale_items` (`id`, `sale_no`, `date`, `name`, `code`, `price`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(1, 'INV2007171', '2020-07-17', 'Demo item', '007', 145.06, 15, 2175.90, NULL, NULL),
(2, 'INV2007171', '2020-07-17', 'srt', '0001', 223.07, 14, 3122.98, NULL, NULL),
(3, 'INV2007171', '2020-07-17', 'FFF', '00733', 222.00, 10, 2220.00, NULL, NULL),
(4, 'INV2007172', '2020-07-17', 'FFF', '00733', 222.00, 1, 222.00, NULL, NULL),
(5, 'INV2007173', '2020-07-17', 'Test', '0073', 294.18, 1, 294.18, NULL, NULL),
(6, 'INV2007174', '2020-07-17', 'Test', '0073', 294.18, 1, 294.18, NULL, NULL),
(7, 'INV2007175', '2020-07-17', 'srt', '0001', 223.07, 1, 223.07, NULL, NULL),
(8, 'INV2007176', '2020-07-17', 'srt', '0001', 223.07, 1, 223.07, NULL, NULL),
(9, 'INV2007177', '2020-07-17', 'srt', '0001', 223.07, 1, 223.07, NULL, NULL),
(10, 'INV2007178', '2020-07-17', 'srt', '0001', 223.07, 1, 223.07, NULL, NULL),
(11, 'INV2007179', '2020-07-17', 'srt', '0001', 223.07, 1, 223.07, NULL, NULL),
(12, 'INV20071910', '2020-07-19', 'Demo item', '007', 145.06, 1, 145.06, NULL, NULL),
(13, 'INV20071910', '2020-07-19', 'srt', '0001', 223.07, 1, 223.07, NULL, NULL),
(14, 'INV20071911', '2020-07-19', 'Demo item', '007', 145.06, 1, 145.06, NULL, NULL),
(15, 'INV20071911', '2020-07-19', 'srt', '0001', 223.07, 1, 223.07, NULL, NULL),
(16, 'INV20071912', '2020-07-19', 'New45rfv', '00012', 145.00, 1, 145.00, NULL, NULL),
(17, 'INV20071912', '2020-07-19', 'Demo item', '007', 145.06, 1, 145.06, NULL, NULL),
(18, 'INV20071913', '2020-07-19', 'Demo item', '007', 145.06, 1, 145.06, NULL, NULL),
(19, 'INV20071913', '2020-07-19', 'FFF', '00733', 222.00, 1, 222.00, NULL, NULL),
(20, 'INV20071914', '2020-07-19', 'Demo item', '007', 145.06, 1, 145.06, NULL, NULL),
(21, 'INV20071915', '2020-07-19', 'Demo item', '007', 145.06, 1, 145.06, NULL, NULL),
(22, 'INV20071915', '2020-07-19', 'FFF', '00733', 222.00, 1, 222.00, NULL, NULL),
(23, 'INV20071916', '2020-07-19', 'FFF', '00733', 222.00, 1, 222.00, NULL, NULL),
(24, 'INV20071916', '2020-07-19', 'srt', '0001', 223.07, 1, 223.07, NULL, NULL),
(25, 'INV20071916', '2020-07-19', 'Demo item', '007', 145.06, 1, 145.06, NULL, NULL),
(26, 'INV20071917', '2020-07-19', 'FFF', '00733', 222.00, 2, 444.00, NULL, NULL),
(27, 'INV20071917', '2020-07-19', 'Demo item', '007', 145.06, 1, 145.06, NULL, NULL),
(28, 'INV20071917', '2020-07-19', 'New45rfv', '00012', 1459.00, 1, 1459.00, NULL, NULL),
(29, 'INV20071917', '2020-07-19', 'srt', '0001', 223.07, 2, 446.14, NULL, NULL),
(30, 'INV20071917', '2020-07-19', 'Test', '0073', 294.18, 1, 294.18, NULL, NULL),
(31, 'INV20072018', '2020-07-20', 'FFF', '00733', 222.00, 1, 222.00, NULL, NULL),
(32, 'INV20072018', '2020-07-20', 'New45rfv', '00012', 145.00, 1, 145.00, NULL, NULL),
(33, 'INV20072019', '2020-07-20', 'New45rfv', '00012', 5145.00, 25, 128625.00, NULL, NULL),
(34, 'INV20072019', '2020-07-20', 'Demo item', '007', 145.06, 2, 290.12, NULL, NULL),
(35, 'INV20072019', '2020-07-20', 'srt', '0001', 223.07, 1, 223.07, NULL, NULL),
(36, 'INV20072120', '2020-07-21', 'New45rfv', '00012', 145.00, 1, 145.00, NULL, NULL),
(37, 'INV20072120', '2020-07-21', 'srt', '0001', 223.07, 1, 223.07, NULL, NULL),
(38, 'INV20072120', '2020-07-21', 'Demo item', '007', 145.06, 1, 145.06, NULL, NULL),
(39, 'INV20072120', '2020-07-21', 'FFF', '00733', 222.00, 1, 222.00, NULL, NULL),
(40, 'INV20072121', '2020-07-21', 'srt', '0001', 223.07, 1, 223.07, NULL, NULL),
(41, 'INV20072121', '2020-07-21', 'Demo item', '007', 1406.00, 100, 140600.00, NULL, NULL),
(42, 'INV20072122', '2020-07-21', 'Demo item', '007', 145.06, 1, 145.06, NULL, NULL),
(43, 'INV20072122', '2020-07-21', 'New45rfv', '00012', 145.00, 1, 145.00, NULL, NULL),
(44, 'INV20072122', '2020-07-21', 'FFF', '00733', 222.00, 1, 222.00, NULL, NULL),
(45, 'INV20072122', '2020-07-21', 'srt', '0001', 223.07, 1, 223.07, NULL, NULL),
(46, 'INV20072122', '2020-07-21', 'Test', '0073', 294.18, 1, 294.18, NULL, NULL),
(47, 'INV20072223', '2020-07-22', 'FFF', '00733', 222.00, 1, 222.00, NULL, NULL),
(48, 'INV20072223', '2020-07-22', 'srt', '0001', 223.07, 1, 223.07, NULL, NULL),
(49, 'INV20072324', '2020-07-23', 'FFF', '00733', 2225.00, 6, 13350.00, NULL, NULL),
(50, 'INV20072324', '2020-07-23', 'srt', '0001', 223.07, 1, 223.07, NULL, NULL),
(51, 'INV20081426', NULL, 'Demo cccsav xfnxfgm xg', '007555', 111.00, 1, 111.00, NULL, NULL),
(52, 'INV20081426', NULL, 'Demo item', '007', 145.06, 1, 145.06, NULL, NULL),
(53, 'INV20081428', NULL, 'Demo item', '007', 145.06, 3, 435.18, NULL, NULL),
(54, 'INV20081428', NULL, 'Demo22 2', '2 2 2', 420.00, 1, 420.00, NULL, NULL),
(55, 'INV20081428', NULL, 'New ssrease rs  rw45', '000133', 420.00, 2, 840.00, NULL, NULL),
(56, 'INV20081429', NULL, 'Demo item', '007', 145.06, 3, 435.18, NULL, NULL),
(57, 'INV20081429', NULL, 'Demo cccsav xfnxfgm xg', '007555', 111.00, 1, 111.00, NULL, NULL),
(58, 'INV20081430', NULL, 'Demo item', '007', 145.06, 2, 290.12, NULL, NULL),
(59, 'INV20081430', NULL, 'Demo cccsav xfnxfgm xg', '007555', 111.00, 2, 222.00, NULL, NULL),
(60, 'INV20081430', NULL, 'Demoqq2q12 44', '00014442', 55.50, 2, 111.00, NULL, NULL),
(61, 'INV20081430', NULL, 'FFF', '00733', 222.00, 2, 444.00, NULL, NULL),
(62, 'INV20081430', NULL, 'Dqfw s44y45 y54 emo', '0001w22', 111.00, 2, 222.00, NULL, NULL),
(63, 'INV20081430', NULL, 'New 44', '44', 222.00, 2, 444.00, NULL, NULL),
(64, 'INV20081430', NULL, 'New ssrease rs  rw45', '000133', 420.00, 2, 840.00, NULL, NULL),
(65, 'INV20081430', NULL, 'Newzdr zr zrerh zr hzrh drh zdrh', '5564334', 630.00, 3, 1890.00, NULL, NULL),
(66, 'INV20081430', NULL, 'New45rfv', '00012', 145.00, 3, 435.00, NULL, NULL),
(67, 'INV20081430', NULL, 'RTdh ddehhb 444', '444', 222.00, 2, 444.00, NULL, NULL),
(68, 'INV20081430', NULL, 'srt', '0001', 223.07, 2, 446.14, NULL, NULL),
(69, 'INV20081430', NULL, 'Test', '0073', 294.18, 1, 294.18, NULL, NULL),
(70, 'INV20081430', NULL, 'svsz sths5reh aerhrh', '0w3307', 670.32, 1, 670.32, NULL, NULL),
(71, 'INV20081430', NULL, 'Demo22 2', '2 2 2', 420.00, 1, 420.00, NULL, NULL),
(72, 'INV20081431', NULL, 'Demo item', '007', 145.06, 1, 145.06, NULL, NULL),
(73, 'INV20081432', NULL, 'Demo cccsav xfnxfgm xg', '007555', 111.00, 1, 111.00, NULL, NULL),
(74, 'INV20081432', NULL, 'New45rfv', '00012', 145.00, 1, 145.00, NULL, NULL),
(75, 'INV20081432', NULL, 'RTdh ddehhb 444', '444', 222.00, 1, 222.00, NULL, NULL),
(76, 'INV20081432', NULL, 'Newzdr zr zrerh zr hzrh drh zdrh', '5564334', 630.00, 1, 630.00, NULL, NULL),
(77, 'INV20081433', NULL, 'Demo cccsav xfnxfgm xg', '007555', 111.00, 5, 555.00, NULL, NULL),
(78, 'INV20081433', NULL, 'Demo item', '007', 145.06, 5, 725.30, NULL, NULL),
(79, 'INV20081433', NULL, 'Demo22 2', '2 2 2', 420.00, 3, 1260.00, NULL, NULL),
(80, 'INV20081433', NULL, 'Demoqq2q12 44', '00014442', 55.50, 1, 55.50, NULL, NULL),
(81, 'INV20081433', NULL, 'RTdh ddehhb 444', '444', 222.00, 1, 222.00, NULL, NULL),
(82, 'INV20081433', NULL, 'Newzdr zr zrerh zr hzrh drh zdrh', '5564334', 630.00, 1, 630.00, NULL, NULL),
(83, 'INV20081433', NULL, 'New 44', '44', 222.00, 1, 222.00, NULL, NULL),
(84, 'INV20081433', NULL, 'Dqfw s44y45 y54 emo', '0001w22', 111.00, 1, 111.00, NULL, NULL),
(85, 'INV20081434', '2020-08-14', 'Demo item', '007', 145.06, 1, 145.06, NULL, NULL),
(86, 'INV20081434', '2020-08-14', 'Demo cccsav xfnxfgm xg', '007555', 111.00, 1, 111.00, NULL, NULL),
(87, 'INV20081434', '2020-08-14', 'New45rfv', '00012', 145.00, 1, 145.00, NULL, NULL),
(88, 'INV20081434', '2020-08-14', 'RTdh ddehhb 444', '444', 222.00, 1, 222.00, NULL, NULL),
(89, 'INV20081434', '2020-08-14', 'Newzdr zr zrerh zr hzrh drh zdrh', '5564334', 630.00, 1, 630.00, NULL, NULL),
(90, 'INV20081434', '2020-08-14', 'svsz sths5reh aerhrh', '0w3307', 670.32, 1, 670.32, NULL, NULL),
(91, 'INV20081434', '2020-08-14', 'srt', '0001', 223.07, 1, 223.07, NULL, NULL),
(92, 'INV20081434', '2020-08-14', 'New 44', '44', 222.00, 2, 444.00, NULL, NULL),
(93, 'INV20081434', '2020-08-14', 'Dqfw s44y45 y54 emo', '0001w22', 111.00, 1, 111.00, NULL, NULL),
(94, 'INV20081435', '2020-08-14', 'Demo cccsav xfnxfgm xg', '007555', 111.00, 1, 111.00, NULL, NULL),
(95, 'INV20081435', '2020-08-14', 'Demo item', '007', 145.06, 1, 145.06, NULL, NULL),
(96, 'INV20081435', '2020-08-14', 'Demoqq2q12 44', '00014442', 55.50, 1, 55.50, NULL, NULL),
(97, 'INV20081436', '2020-08-14', 'Demo item', '007', 145.06, 1, 145.06, NULL, NULL),
(98, 'INV20081436', '2020-08-14', 'Demo cccsav xfnxfgm xg', '007555', 111.00, 1, 111.00, NULL, NULL),
(99, 'INV20081637', '2020-08-16', 'Demo22 2', '2 2 2', 420.00, 2, 840.00, NULL, NULL),
(100, 'INV20081637', '2020-08-16', 'Demo item', '007', 145.06, 3, 435.18, NULL, NULL),
(101, 'INV20081637', '2020-08-16', 'Dqfw s44y45 y54 emo', '0001w22', 111.00, 8, 888.00, NULL, NULL),
(102, 'INV20081637', '2020-08-16', 'FFF', '00733', 222.00, 6, 1332.00, NULL, NULL),
(103, 'INV20081637', '2020-08-16', 'New45rfv', '00012', 145.00, 16, 2320.00, NULL, NULL),
(104, 'INV20081637', '2020-08-16', 'srt', '0001', 223.07, 1, 223.07, NULL, NULL),
(105, 'INV20081637', '2020-08-16', 'RTdh ddehhb 444', '444', 222.00, 1, 222.00, NULL, NULL),
(106, 'INV20081637', '2020-08-16', 'svsz sths5reh aerhrh', '0w3307', 670.32, 3, 2010.96, NULL, NULL),
(107, 'INV20081637', '2020-08-16', 'Test', '0073', 294.18, 1, 294.18, NULL, NULL),
(108, 'INV20081637', '2020-08-16', 'Demoqq2q12 44', '00014442', 55.50, 1, 55.50, NULL, NULL),
(109, 'INV20081638', '2020-08-16', 'Demo item', '007', 145.06, 1, 145.06, NULL, NULL),
(110, 'INV20081638', '2020-08-16', 'Demo22 2', '2 2 2', 420.00, 1, 420.00, NULL, NULL),
(111, 'INV20081638', '2020-08-16', 'RTdh ddehhb 444', '444', 222.00, 1, 222.00, NULL, NULL),
(112, 'INV20081638', '2020-08-16', 'Newzdr zr zrerh zr hzrh drh zdrh', '5564334', 630.00, 1, 630.00, NULL, NULL),
(113, 'INV20081638', '2020-08-16', 'New 44', '44', 222.00, 1, 222.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `details`, `created_at`, `updated_at`) VALUES
(1, 'xl', NULL, '2020-06-22 18:00:06', '2020-06-27 18:44:03'),
(2, 'm', NULL, '2020-06-22 18:00:15', '2020-06-22 18:00:15'),
(3, 'l', NULL, '2020-06-22 18:00:25', '2020-06-22 18:03:20'),
(4, 's', NULL, '2020-06-22 18:03:43', '2020-06-22 18:03:43'),
(5, 'S', NULL, '2020-06-22 18:03:58', '2020-06-22 18:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `cost` double(10,2) DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `code`, `name`, `quantity`, `cost`, `price`, `created_at`, `updated_at`) VALUES
(1, '007', 'Demo item', 56, 111.81, 145.06, NULL, NULL),
(2, '0001', 'srt', 115, 206.07, 223.07, NULL, NULL),
(3, '00733', 'FFF', 199, 228.94, 222.00, NULL, NULL),
(4, '0073', 'Test', 133, 224.13, 294.18, NULL, NULL),
(6, '00012', 'New45rfv', 78, 130.00, 145.00, NULL, NULL),
(7, '44', 'New 44', 13, 205.50, 222.00, NULL, NULL),
(8, '444', 'RTdh ddehhb 444', 23, 205.50, 222.00, NULL, NULL),
(9, '007555', 'Demo cccsav xfnxfgm xg', 0, 100.00, 111.00, NULL, NULL),
(10, '000133', 'New ssrease rs  rw45', -1, 200.00, 420.00, NULL, NULL),
(11, '007444', 'vsxb xxft tr rtj xrtj srt jxrtj fth r', 16, 10.00, 21.00, NULL, NULL),
(12, '5564334', 'Newzdr zr zrerh zr hzrh drh zdrh', 15, 300.00, 630.00, NULL, NULL),
(13, '00014442', 'Demoqq2q12 44', 7, 50.00, 55.50, NULL, NULL),
(14, '2 2 2', 'Demo22 2', 4, 200.00, 420.00, NULL, NULL),
(15, '0001w22', 'Dqfw s44y45 y54 emo', 0, 100.00, 111.00, NULL, NULL),
(16, '0w3307', 'svsz sths5reh aerhrh', 239, 300.00, 670.32, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` decimal(10,2) DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `phone`, `email`, `category`, `balance`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Demo', '0192871733', 'admin@gmail.com', 'Blocked', '100.00', 'f gfg', '2020-07-03 04:23:10', '2020-07-03 14:11:51'),
(2, 'New', '0192871733', 'admin@gmail.com', 'Special', '200.00', 'szdntd', '2020-07-03 09:09:11', '2020-07-05 14:03:20'),
(3, 'Mahdi', '0192871733', 'mahdi@gmail.com', 'Vip', '1000.00', 'xdb dx', '2020-07-03 14:24:58', '2020-07-03 14:24:58'),
(4, 'Mr Hasan', '0192871733', NULL, 'Normal', '0.00', NULL, '2020-07-03 14:29:51', '2020-07-03 14:29:51'),
(5, 'New Try', '01621532677', NULL, 'Normal', '0.00', NULL, '2020-07-05 14:10:39', '2020-07-05 14:10:39'),
(6, 'Ami vsdv', '0192871733', 'adsvewmin@gmail.com', 'Normal', '40.00', NULL, '2020-07-26 21:39:04', '2020-07-26 21:39:04'),
(7, 'Demo33', '0192871733', '33@gmail.com', 'Special', '600.00', 'nai', '2020-07-26 22:42:22', '2020-07-26 22:42:22');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `details`, `created_at`, `updated_at`) VALUES
(1, 'New', 'vdes', '2020-06-22 17:59:43', '2020-06-22 17:59:43'),
(2, 'szv dszv', NULL, '2020-06-22 17:59:50', '2020-06-22 17:59:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mahdi Hasan', 'mahdi@gmail.com', NULL, '$2y$10$YkvRcXAC1w0jXhmJGNrpY.E4zESjwGQqOIVsCuul4f8xet.kzOPdS', '5CMFjPti9QHeaUpgBzuOsorBfaN8j74pEdAo0jUI5VK6aNYAXaYndNWzhXg6', '2020-05-10 14:11:44', '2020-05-10 14:11:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_items`
--
ALTER TABLE `sale_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `purchase_items`
--
ALTER TABLE `purchase_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `sale_items`
--
ALTER TABLE `sale_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
