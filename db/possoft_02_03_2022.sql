-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 01, 2022 at 07:30 PM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `possoft`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Demo Brand', NULL, '2021-04-12 17:18:21', '2022-01-03 18:19:38');

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
(2, 'Demo Cate', '21', '2021-04-12 17:16:02', '2021-04-12 17:16:34'),
(4, 'New Ca', '11', '2021-04-12 17:16:03', '2022-02-17 21:48:25');

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
(1, 'Black', '66', '2021-04-12 17:18:39', '2022-01-03 17:47:18'),
(2, 'White', '99', '2021-04-12 17:18:49', '2022-01-03 17:47:07');

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
  `address` text COLLATE utf8mb4_unicode_ci,
  `invoice_note` text COLLATE utf8mb4_unicode_ci,
  `logo` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `title`, `name`, `phone`, `email`, `website`, `address`, `invoice_note`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'My Shop', NULL, '052345678', 'ujhiubuh@gmial.com', 'www.new.com', 'Unknown', 'Return in 30 days.', 'public/Logo/61f9d96fbcef7infreq.png', NULL, '2022-02-02 01:07:59');

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
  `address` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `email`, `category`, `balance`, `address`, `created_at`, `updated_at`) VALUES
(2, 'kmkmtbrt', '12321', NULL, 'Normal', '0.00', NULL, '2022-01-17 17:17:28', '2022-01-17 17:17:28'),
(5, 'wesedfgfxjtmnxdfrnfsgrrherhrthrthrthrhnrt', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-21 01:31:48', '2022-01-21 01:31:48'),
(6, 'ervgersgbdre', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-21 01:39:09', '2022-01-21 01:39:09'),
(8, 'xxxxx', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-21 01:43:19', '2022-01-21 01:43:19'),
(9, 'uuuuuu', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-21 01:46:34', '2022-01-21 01:46:34'),
(10, 'cccccccc', NULL, NULL, 'Normal', '0.00', 'kj jk j jl l', '2022-01-21 01:49:30', '2022-02-17 22:04:54'),
(11, 'qqqqqqqqqq', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-21 01:51:15', '2022-01-21 01:51:15'),
(13, 'p', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-21 01:55:26', '2022-01-21 01:55:26'),
(14, 'ii', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-21 01:57:24', '2022-01-21 01:57:24'),
(15, 'wefreg', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-21 02:38:40', '2022-01-21 02:38:40'),
(16, 'qq', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-21 02:52:55', '2022-01-21 02:52:55'),
(17, 'qwvfeqwffgwsegvwergew', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-21 02:56:47', '2022-01-21 02:56:47'),
(18, 'wert', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-21 02:57:01', '2022-01-21 02:57:01'),
(19, 'zaqwsx', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-21 02:57:57', '2022-01-21 02:57:57'),
(20, 'd', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-21 11:41:24', '2022-01-21 11:41:24'),
(21, 'oppo', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-21 11:45:03', '2022-01-21 11:45:03'),
(22, 'uop', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-21 11:46:23', '2022-01-21 11:46:23'),
(23, 'top', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-21 11:47:31', '2022-01-21 11:47:31'),
(24, 'nooo', NULL, NULL, 'Normal', '65839.00', NULL, '2022-01-21 11:51:33', '2022-01-21 11:51:37'),
(25, 'sdvegserg', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-23 18:45:59', '2022-01-23 18:45:59'),
(26, 'uiuiui', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-24 07:41:27', '2022-01-24 07:41:27'),
(27, 'ee', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-24 18:27:38', '2022-01-24 18:27:38'),
(28, 'wqwe', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-24 18:27:50', '2022-01-24 18:27:50'),
(29, 'wqwe', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-24 18:27:51', '2022-01-24 18:27:51'),
(30, 'uoip', NULL, NULL, NULL, NULL, NULL, '2022-01-24 18:37:28', '2022-01-24 18:37:28'),
(31, 'cs', NULL, NULL, NULL, NULL, NULL, '2022-01-24 18:39:30', '2022-01-24 18:39:30'),
(32, 'uiccccccccc', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-24 19:24:57', '2022-01-24 19:24:57'),
(33, 'rvrvef', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-24 19:54:34', '2022-01-24 19:54:34'),
(34, 'erahnrsethn', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-26 15:46:04', '2022-01-26 15:46:04'),
(35, 't', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-26 15:46:12', '2022-01-26 15:46:12'),
(36, 'uuy', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-26 15:54:35', '2022-01-26 15:54:35'),
(37, 'mmm', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-26 17:34:46', '2022-01-26 17:34:46'),
(38, 'nb', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-26 17:40:42', '2022-01-26 17:40:42'),
(39, 'nz', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-26 17:42:54', '2022-01-26 17:42:54'),
(40, 'ouytyuh', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-26 17:50:39', '2022-01-26 17:50:39'),
(41, 'nbvf', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-26 17:59:36', '2022-01-26 17:59:36'),
(42, 'bvc', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-26 18:00:42', '2022-01-26 18:00:42'),
(43, 'ytcgvhbjjh hj hjbhuhhkikbj', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-26 18:03:34', '2022-01-26 18:03:34'),
(44, 'outrew', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-26 18:05:22', '2022-01-26 18:05:22'),
(45, 'jnjn', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-26 18:07:04', '2022-01-26 18:07:04'),
(46, 'New ree', '0010011', NULL, 'Normal', '120.00', 'wvewr jka ,kmkja fkefsj', '2022-02-13 02:23:48', '2022-02-13 02:23:48'),
(47, 'Reb bfrbfr', '029810', NULL, 'Normal', '85.00', 'db de d sr dsafg dgfs ngdf', '2022-02-13 02:32:03', '2022-02-13 02:32:10'),
(48, 'dxfcghvj', '09876543', NULL, 'Normal', '25.00', NULL, '2022-02-14 11:55:55', '2022-02-14 11:56:10'),
(49, 'rtndefn dftr', NULL, NULL, 'Normal', '76.00', NULL, '2022-02-14 12:00:28', '2022-02-14 12:00:41'),
(50, 'new new new', '010101001', NULL, 'Special', '10.00', 'db deberberberbeer', '2022-02-14 12:10:32', '2022-02-14 12:10:32'),
(51, 'ieo', '000212', NULL, 'Normal', '0.00', 'daf ad ae j ek kae bjkekr;b jer', '2022-02-14 12:11:34', '2022-02-14 12:11:34'),
(52, 'eoewwewsevswv', '0220022', NULL, 'Normal', '259.00', NULL, '2022-02-14 12:16:01', '2022-02-14 12:16:16'),
(53, 'oiu', '098765432', NULL, 'Normal', '881.00', 'j gh lk hj luhlhu hj hjl hjb lhjb hjhj', '2022-02-14 12:34:41', '2022-02-14 12:34:46'),
(54, 's`b`sdrdenthdh', NULL, NULL, 'Normal', '0.00', NULL, '2022-02-17 21:14:02', '2022-02-17 21:14:02'),
(55, 'l lm l .', NULL, NULL, 'Normal', '5681.76', NULL, '2022-02-17 22:06:12', '2022-02-21 21:42:50'),
(56, 'nre', NULL, NULL, 'Special', '0.00', NULL, '2022-02-26 03:42:16', '2022-02-26 03:42:16'),
(57, 'nnuuuuuu', NULL, NULL, 'Normal', '0.00', NULL, '2022-02-26 23:08:32', '2022-02-26 23:08:32');

-- --------------------------------------------------------

--
-- Table structure for table `discount_types`
--

CREATE TABLE `discount_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ctype` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount_types`
--

INSERT INTO `discount_types` (`id`, `name`, `ctype`, `amount`, `created_at`, `updated_at`) VALUES
(2, 'Special', 'Customer', 10, '2022-02-26 03:29:34', '2022-02-26 03:29:34'),
(3, 'Vip', 'Customer', 20, '2022-02-26 03:29:42', '2022-02-26 03:29:42'),
(4, 'Normal', 'Customer', 0, '2022-02-26 03:29:58', '2022-02-26 03:38:28'),
(5, 'Normal', 'Supplier', 0, '2022-02-26 04:33:04', '2022-02-26 04:33:04');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime DEFAULT NULL,
  `type` bigint(20) DEFAULT NULL,
  `amount` double(10,2) DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `date`, `type`, `amount`, `comment`, `user_id`, `created_at`, `updated_at`) VALUES
(2, '2022-02-26 00:00:00', 5, 3035.00, NULL, 1, '2022-02-20 16:29:19', '2022-02-20 17:03:18'),
(3, '2022-02-20 00:00:00', 3, 12.00, NULL, 1, '2022-02-20 16:31:07', '2022-02-20 17:04:21'),
(4, '2022-02-20 00:00:00', 1, 1203.00, NULL, 1, '2022-02-20 17:03:03', '2022-02-20 17:04:11'),
(5, '2022-02-20 00:00:00', 12, 66.00, NULL, 1, '2022-02-20 17:48:51', '2022-02-20 17:48:51'),
(6, '2022-02-21 00:00:00', 12, 100.00, NULL, 1, '2022-02-21 01:36:37', '2022-02-21 01:36:37'),
(7, '2022-02-21 00:00:00', 6, 200.00, 'ebererber', 1, '2022-02-21 01:36:55', '2022-02-21 01:36:55');

-- --------------------------------------------------------

--
-- Table structure for table `expense_types`
--

CREATE TABLE `expense_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_types`
--

INSERT INTO `expense_types` (`id`, `name`, `details`, `created_at`, `updated_at`) VALUES
(1, 'tesr', NULL, '2022-02-20 15:49:22', '2022-02-20 15:49:22'),
(3, 'q22r21wrgw', NULL, '2022-02-20 15:51:40', '2022-02-20 16:06:25'),
(5, 'fdn', 'fb', '2022-02-20 15:53:57', '2022-02-20 15:58:05'),
(6, 'rw', NULL, '2022-02-20 15:58:48', '2022-02-20 15:58:48'),
(12, 'e34', NULL, '2022-02-20 16:06:10', '2022-02-20 16:06:10');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(1, 'Test Group', NULL, '2021-04-12 17:17:37', '2021-04-12 17:17:37');

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
(4, '2020_05_14_212406_create_customers_table', 1),
(5, '2020_06_16_233742_create_suppliers_table', 1),
(6, '2020_06_22_132835_create_categories_table', 1),
(7, '2020_06_22_143723_create_groups_table', 1),
(8, '2020_06_22_144110_create_brands_table', 1),
(9, '2020_06_22_144156_create_types_table', 1),
(10, '2020_06_22_144403_create_sizes_table', 1),
(11, '2020_06_22_144537_create_colors_table', 1),
(13, '2020_07_02_143952_create_carts_table', 1),
(14, '2020_07_02_144520_create_purchases_table', 1),
(15, '2020_07_02_145014_create_purchase_items_table', 1),
(16, '2020_07_13_033655_create_stocks_table', 1),
(17, '2020_07_17_045506_create_sales_table', 1),
(18, '2020_07_17_045802_create_sale_items_table', 1),
(19, '2020_07_24_172028_create_companies_table', 1),
(21, '2021_01_06_030802_create_permission_tables', 2),
(22, '2020_06_24_104650_create_products_table', 3),
(23, '2022_01_18_051649_create_settings_table', 4),
(24, '2022_02_20_052557_create_accounts_table', 5),
(27, '2022_02_20_053316_create_expenses_table', 6),
(28, '2022_02_20_053919_create_expense_types_table', 6),
(29, '2022_02_26_081105_create_discount_types_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Model\\User', 1),
(2, 'App\\Model\\User', 2),
(3, 'App\\Model\\User', 3),
(3, 'App\\Model\\User', 4),
(2, 'App\\Model\\User', 5);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `display_name`, `module_name`, `created_at`, `updated_at`) VALUES
(1, 'role_list', 'web', 'Role List', 'Role Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(2, 'role_create', 'web', 'Role Create', 'Role Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(3, 'role_update', 'web', 'Role Update', 'Role Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(4, 'role_delete', 'web', 'Role Delete', 'Role Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(5, 'user_role_list', 'web', 'User Role List', 'User Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(6, 'user_role_create', 'web', 'User Role Create', 'User Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(7, 'user_role_update', 'web', 'User Role Update', 'User Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(8, 'user_password_update', 'web', 'User Password Update', 'User Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(9, 'settings', 'web', 'Settings', 'Configuration Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(10, 'company_info', 'web', 'Company Info', 'Configuration Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(11, 'company_update', 'web', 'Company Info Update', 'Configuration Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(12, 'customer_list', 'web', 'Customer List', 'Configuration Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(13, 'customer_create', 'web', 'Customer Create', 'Configuration Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(14, 'customer_update', 'web', 'Customer Update', 'Configuration Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(15, 'customer_delete', 'web', 'Customer Delete', 'Configuration Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(16, 'supplier_create', 'web', 'Supplier Create', 'Configuration Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(17, 'supplier_list', 'web', 'Supplier List', 'Configuration Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(18, 'supplier_update', 'web', 'Supplier Update', 'Configuration Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(19, 'supplier_delete', 'web', 'Supplier Delete', 'Configuration Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(20, 'product_create', 'web', 'Product Create', 'Product Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(21, 'product_list', 'web', 'Product List', 'Product Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(22, 'product_update', 'web', 'Product Update', 'Product Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(23, 'product_delete', 'web', 'Product Delete', 'Product Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(24, 'category_create', 'web', 'Category Create', 'Product Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(25, 'category_list', 'web', 'Category List', 'Product Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(26, 'category_update', 'web', 'Category Update', 'Product Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(27, 'category_delete', 'web', 'Category Delete', 'Product Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(28, 'brand_create', 'web', 'Brand Create', 'Product Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(29, 'brand_list', 'web', 'Brand List', 'Product Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(30, 'brand_update', 'web', 'Brand Update', 'Product Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(31, 'brand_delete', 'web', 'Brand Delete', 'Product Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(32, 'color_create', 'web', 'Color Create', 'Product Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(33, 'color_list', 'web', 'Color List', 'Product Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(34, 'color_update', 'web', 'Color Update', 'Product Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(35, 'color_delete', 'web', 'Color Delete', 'Product Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(36, 'size_create', 'web', 'Size Create', 'Product Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(37, 'size_list', 'web', 'Size List', 'Product Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(38, 'size_update', 'web', 'Size Update', 'Product Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(39, 'size_delete', 'web', 'Size Delete', 'Product Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(40, 'purchase', 'web', 'Product Purchase', 'Purchase Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(41, 'purchase_date', 'web', 'Purchase Date Update', 'Purchase Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(42, 'sale', 'web', 'Product Sale', 'Sale Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(43, 'sale_date', 'web', 'Sale Date Update', 'Sale Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(44, 'stock_list', 'web', 'Stock List', 'Stock Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(45, 'purchase_report', 'web', 'Purchase Report', 'Report Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(46, 'sale_report', 'web', 'Sale Report', 'Report Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(47, 'expense_list', 'web', 'Expense List', 'Accounts Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(48, 'expense_create', 'web', 'Expense Create', 'Accounts Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(49, 'expense_update', 'web', 'Expense Update', 'Accounts Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(50, 'expense_date', 'web', 'Expense Date', 'Accounts Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(51, 'expense_delete', 'web', 'Expense Delete', 'Accounts Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(52, 'expense_type_list', 'web', 'Expense Type List', 'Accounts Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(53, 'expense_type_create', 'web', 'Expense Type Create', 'Accounts Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(54, 'expense_type_update', 'web', 'Expense Type Update', 'Accounts Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(55, 'expense_type_delete', 'web', 'Expense Type Delete', 'Accounts Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(56, 'discount_type', 'web', 'Discount Type List', 'Configuration Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(57, 'discount_type_create', 'web', 'Discount Type Create', 'Configuration Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(58, 'discount_type_update', 'web', 'Discount Type Update', 'Configuration Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(59, 'discount_type_delete', 'web', 'Discount Type Delete', 'Configuration Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19'),
(60, 'stock_report', 'web', 'Stock Report', 'Report Management', '2022-02-26 02:56:19', '2022-02-26 02:56:19');

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
  `color` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `purchase_price` double(10,2) DEFAULT NULL,
  `cost` double(10,2) DEFAULT NULL,
  `profit` decimal(6,2) DEFAULT NULL,
  `sale_price` double(10,2) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `category`, `brand`, `color`, `size`, `purchase_price`, `cost`, `profit`, `sale_price`, `image`, `created_at`, `updated_at`) VALUES
(5, 'omom', '221100005', 4, 0, 0, 0, 1209.00, 209.00, '45.00', 2056.10, NULL, '2022-02-13 18:17:12', '2022-02-19 23:04:42'),
(6, 'vewvb hb hblhuyvuybuy', '222111006', 2, 1, 0, 3, 1208.00, 120.00, '450.00', 7304990.00, NULL, '2022-02-13 18:18:25', '2022-02-19 23:05:41'),
(7, 'ghj kj', '221111007', 4, 0, 0, 3, 12999.00, 889.00, '77.00', 24581.76, NULL, '2022-02-19 22:48:28', '2022-02-19 23:06:03'),
(8, 'tyvuhij', '221100008', 4, 0, 0, 0, 456.00, 6.00, '8.00', 498.96, NULL, '2022-02-19 22:54:12', '2022-02-19 23:09:04'),
(9, 't', '221100009', 4, 0, 0, 0, 4.00, 2.00, '2.00', 6.12, NULL, '2022-02-19 23:06:40', '2022-02-19 23:06:54'),
(10, 'rer', '2211000010', 4, 0, 0, 0, 120.00, 20.00, '20.00', 168.00, NULL, '2022-02-26 04:54:34', '2022-02-26 04:54:34');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
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
(2, 'P2202052', '2022-02-04 18:00:00', NULL, NULL, 0, 0.00, 0.00, 1, 0.00, 123456.00, 1234.00, 0.00, NULL, '2022-02-04 18:14:58', '2022-02-04 18:14:58'),
(3, 'P2202053', '2022-02-04 18:00:00', 'Cash', NULL, 0, 0.00, 0.00, 1, 0.00, 21.00, 21.00, 0.00, NULL, '2022-02-04 18:16:38', '2022-02-04 18:16:38'),
(4, 'P2202053', '2022-02-04 18:00:00', 'Cash', NULL, 0, 0.00, 0.00, 1, 0.00, 1.00, 1.00, 0.00, NULL, '2022-02-04 18:17:39', '2022-02-04 18:17:39'),
(5, 'P2202055', '2022-02-04 18:00:00', 'Cash', NULL, 200, 24000.00, 0.00, 1, 24000.00, 10000.00, 0.00, 14000.00, NULL, '2022-02-04 19:55:06', '2022-02-04 19:55:06'),
(6, 'P2202136', '2022-02-12 18:00:00', 'Cash', NULL, 14, 57680.00, 40.00, 1, 34608.00, 10000.00, 0.00, 24608.00, NULL, '2022-02-13 02:35:38', '2022-02-13 02:35:38'),
(7, 'P2202137', '2022-02-12 18:00:00', '23', NULL, 1, 120.00, 0.00, 1, 120.00, 1000.00, 880.00, 0.00, NULL, '2022-02-13 02:38:11', '2022-02-13 02:38:11'),
(8, 'P2202148', '2022-02-13 18:00:00', 'Cash', NULL, 117, 14040.00, 0.00, 1, 14040.00, 10000.00, 0.00, 4040.00, NULL, '2022-02-14 11:46:16', '2022-02-14 11:46:16'),
(9, 'P2202148', '2022-02-13 18:00:00', 'Cash', NULL, 117, 14040.00, 0.00, 1, 14040.00, 10000.00, 0.00, 4040.00, NULL, '2022-02-14 11:51:17', '2022-02-14 11:51:17'),
(10, 'P2202148', '2022-02-13 18:00:00', 'Cash', NULL, 117, 14040.00, 0.00, 1, 14040.00, 10000.00, 0.00, 4040.00, NULL, '2022-02-14 11:53:42', '2022-02-14 11:53:42'),
(11, 'P2202148', '2022-02-13 18:00:00', 'Cash', NULL, 0, 0.00, 0.00, 1, 0.00, 123456.00, 123456.00, 0.00, NULL, '2022-02-14 11:54:04', '2022-02-14 11:54:04'),
(12, 'P22021412', '2022-02-13 18:00:00', 'Cash', NULL, 2, 240.00, 0.00, 1, 240.00, 100.00, 0.00, 140.00, 'Cash', '2022-02-14 11:58:14', '2022-02-14 11:58:14'),
(14, 'P22021414', '2022-02-13 18:00:00', 'Cash', NULL, 600, 72900.00, 0.00, 1, 72900.00, 70000.00, 0.00, 2900.00, 'Cash', '2022-02-14 17:53:53', '2022-02-14 17:53:53'),
(16, 'P22021916', '2022-02-18 18:00:00', 'Cash', NULL, 20, 24170.00, 4170.00, 2, 20000.00, 20000.00, 0.00, 0.00, 'Cash', '2022-02-19 00:42:29', '2022-02-19 00:42:29'),
(17, 'P22022017', '2022-02-19 18:00:00', 'Cash', NULL, 1, 12999.00, 0.00, 1, 12999.00, 12000.00, 0.00, 999.00, 'Cash', '2022-02-20 17:51:49', '2022-02-20 17:51:49'),
(18, 'P22022118', '2022-02-20 18:00:00', 'Cash', NULL, 14, 142877.00, 0.00, 1, 142877.00, 140000.00, 0.00, 2877.00, 'Cash', '2022-02-20 18:34:44', '2022-02-20 18:34:44'),
(19, 'P22022119', '2022-02-20 18:00:00', 'Cash', NULL, 1, 6.00, 0.00, 1, 6.00, 6.00, 0.00, 0.00, 'Cash', '2022-02-20 18:35:58', '2022-02-20 18:35:58'),
(20, 'P22022620', '2022-02-25 18:00:00', 'Cash', NULL, 100, 12000.00, 0.00, 1, 12000.00, 12000.00, 0.00, 0.00, 'Cash', '2022-02-26 04:54:58', '2022-02-26 04:54:58');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_items`
--

CREATE TABLE `purchase_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `purchase_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` double(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` double(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_items`
--

INSERT INTO `purchase_items` (`id`, `product_id`, `purchase_no`, `date`, `name`, `cost`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 'P2202022', '2022-02-01 18:00:00', 'New item test', 23120.00, 33, 762960.00, NULL, NULL),
(2, 2, 'P2202022', '2022-02-01 18:00:00', 'Testing data', 1100.00, 43, 47300.00, NULL, NULL),
(3, 1, 'P2202055', '2022-02-04 18:00:00', 'New item test', 120.00, 100, 12000.00, NULL, NULL),
(4, 3, 'P2202055', '2022-02-04 18:00:00', 'wegvserg', 120.00, 100, 12000.00, NULL, NULL),
(5, 1, 'P2202136', '2022-02-12 18:00:00', 'New item test', 4120.00, 14, 57680.00, NULL, NULL),
(6, 1, 'P2202137', '2022-02-12 18:00:00', 'New item test', 120.00, 1, 120.00, NULL, NULL),
(7, 1, 'P2202148', '2022-02-13 18:00:00', 'New item test', 120.00, 91, 10920.00, NULL, NULL),
(8, 4, 'P2202148', '2022-02-13 18:00:00', 'd d df drat ndartn dr', 120.00, 26, 3120.00, NULL, NULL),
(9, 1, 'P2202148', '2022-02-13 18:00:00', 'New item test', 120.00, 91, 10920.00, NULL, NULL),
(10, 4, 'P2202148', '2022-02-13 18:00:00', 'd d df drat ndartn dr', 120.00, 26, 3120.00, NULL, NULL),
(11, 1, 'P2202148', '2022-02-13 18:00:00', 'New item test', 120.00, 91, 10920.00, NULL, NULL),
(12, 4, 'P2202148', '2022-02-13 18:00:00', 'd d df drat ndartn dr', 120.00, 26, 3120.00, NULL, NULL),
(13, 1, 'P22021412', '2022-02-13 18:00:00', 'New item test', 120.00, 1, 120.00, NULL, NULL),
(14, 6, 'P22021412', '2022-02-13 18:00:00', 'vewv', 120.00, 1, 120.00, NULL, NULL),
(15, 1, 'P22021413', '2022-02-13 18:00:00', 'New item test', 1120.00, 100, 112000.00, NULL, NULL),
(16, 4, 'P22021413', '2022-02-13 18:00:00', 'd d df drat ndartn dr', 8120.00, 100, 812000.00, NULL, NULL),
(17, 5, 'P22021413', '2022-02-13 18:00:00', 'tdbdtfb', 5120.00, 100, 512000.00, NULL, NULL),
(18, 6, 'P22021413', '2022-02-13 18:00:00', 'vewv', 2120.00, 100, 212000.00, NULL, NULL),
(19, 7, 'P22021413', '2022-02-13 18:00:00', 'vsds', 4120.00, 100, 412000.00, NULL, NULL),
(20, 8, 'P22021413', '2022-02-13 18:00:00', '4er', 758.00, 100, 75800.00, NULL, NULL),
(21, 1, 'P22021414', '2022-02-13 18:00:00', 'New item test', 120.00, 100, 12000.00, NULL, NULL),
(22, 4, 'P22021414', '2022-02-13 18:00:00', 'd d df drat ndartn dr', 120.00, 100, 12000.00, NULL, NULL),
(23, 5, 'P22021414', '2022-02-13 18:00:00', 'tdbdtfb', 120.00, 100, 12000.00, NULL, NULL),
(24, 6, 'P22021414', '2022-02-13 18:00:00', 'vewv', 120.00, 100, 12000.00, NULL, NULL),
(25, 7, 'P22021414', '2022-02-13 18:00:00', 'vsds', 120.00, 100, 12000.00, NULL, NULL),
(26, 8, 'P22021414', '2022-02-13 18:00:00', '4er', 129.00, 100, 12900.00, NULL, NULL),
(27, 5, 'P22021815', '2022-02-17 18:00:00', 'omom', 1209.00, 200, 241800.00, NULL, NULL),
(28, 6, 'P22021815', '2022-02-17 18:00:00', 'vewvb hb hblhuyvuybuy', 1208.00, 100, 120800.00, NULL, NULL),
(29, 5, 'P22021916', '2022-02-18 18:00:00', 'omom', 1209.00, 10, 12090.00, NULL, NULL),
(30, 6, 'P22021916', '2022-02-18 18:00:00', 'vewvb hb hblhuyvuybuy', 1208.00, 10, 12080.00, NULL, NULL),
(31, 7, 'P22022017', '2022-02-19 18:00:00', 'ghj kj', 12999.00, 1, 12999.00, NULL, NULL),
(32, 5, 'P22022118', '2022-02-20 18:00:00', 'omom', 1209.00, 1, 1209.00, NULL, NULL),
(33, 6, 'P22022118', '2022-02-20 18:00:00', 'vewvb hb hblhuyvuybuy', 1208.00, 1, 1208.00, NULL, NULL),
(34, 7, 'P22022118', '2022-02-20 18:00:00', 'ghj kj', 14000.00, 10, 140000.00, NULL, NULL),
(35, 8, 'P22022118', '2022-02-20 18:00:00', 'tyvuhij', 456.00, 1, 456.00, NULL, NULL),
(36, 9, 'P22022118', '2022-02-20 18:00:00', 't', 4.00, 1, 4.00, NULL, NULL),
(37, 9, 'P22022119', '2022-02-20 18:00:00', 't', 6.00, 1, 6.00, NULL, NULL),
(38, 10, 'P22022620', '2022-02-25 18:00:00', 'rer', 120.00, 100, 12000.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'web', 'System Admin', '2022-01-08 20:15:45', '2022-01-08 20:15:45'),
(2, 'admin', 'web', 'Admin', '2022-01-08 21:25:15', '2022-01-08 21:25:15'),
(3, 'user', 'web', 'User', '2022-01-09 04:31:38', '2022-01-09 04:31:38');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2),
(41, 2),
(42, 2),
(43, 2),
(44, 2),
(45, 2),
(46, 2),
(60, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `total_qty` int(11) DEFAULT NULL,
  `sub_total` double(10,2) DEFAULT NULL,
  `discount` double(10,2) DEFAULT NULL,
  `disc_type` tinyint(4) DEFAULT NULL,
  `vat` double(10,2) DEFAULT NULL,
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

INSERT INTO `sales` (`id`, `sale_no`, `date`, `customer`, `amount`, `total_qty`, `sub_total`, `discount`, `disc_type`, `vat`, `payable`, `paid`, `return`, `due`, `payment_type`, `payment_number`, `created_at`, `updated_at`) VALUES
(1, 'S2202021', '2022-02-01 18:00:00', NULL, NULL, 30, 68973.44, 4.00, 1, NULL, 66215.00, 40000.00, 0.00, 26215.00, NULL, NULL, '2022-02-02 00:58:07', '2022-02-02 00:58:07'),
(2, 'S2202052', '2022-02-04 18:00:00', NULL, NULL, 0, 0.00, 0.00, 1, NULL, 0.00, 32342.00, 32342.00, 0.00, NULL, NULL, '2022-02-04 18:14:06', '2022-02-04 18:14:06'),
(3, 'S2202053', '2022-02-04 18:00:00', 'Cash', NULL, 0, 0.00, 0.00, 1, NULL, 0.00, 10.00, 10.00, 0.00, NULL, NULL, '2022-02-04 18:18:03', '2022-02-04 18:18:03'),
(4, 'S2202054', '2022-02-04 18:00:00', 'Cash', NULL, 0, 0.00, 0.00, 1, NULL, 0.00, 1.00, 1.00, 0.00, NULL, NULL, '2022-02-04 18:20:09', '2022-02-04 18:20:09'),
(5, 'S2202055', '2022-02-04 18:00:00', 'Cash', NULL, 5, 937.20, 0.00, NULL, NULL, 937.00, 123456.00, 11408.00, 0.00, NULL, NULL, '2022-02-04 20:02:27', '2022-02-04 20:02:27'),
(6, 'S2202066', '2022-02-05 18:00:00', 'Cash', NULL, 1, 191.40, 0.00, NULL, NULL, 191.00, 123456.00, 12154.00, 0.00, NULL, NULL, '2022-02-06 17:09:43', '2022-02-06 17:09:43'),
(7, 'S2202067', '2022-02-05 18:00:00', 'Cash', NULL, 1, 184.80, 0.00, NULL, NULL, 185.00, 123456.00, 123271.00, 0.00, NULL, NULL, '2022-02-06 17:10:26', '2022-02-06 17:10:26'),
(8, 'S2202078', '2022-02-06 18:00:00', 'Cash', NULL, 1, 184.80, 0.00, NULL, NULL, 185.00, 12345.00, 12160.00, 0.00, NULL, NULL, '2022-02-06 18:22:47', '2022-02-06 18:22:47'),
(9, 'S2202139', '2022-02-12 18:00:00', 'Cash', NULL, 1, 184.80, 0.00, 1, NULL, 185.00, 100.00, 0.00, 85.00, NULL, NULL, '2022-02-13 02:23:54', '2022-02-13 02:23:54'),
(10, 'S22021310', '2022-02-12 18:00:00', 'Cash', NULL, 1, 191.40, 0.00, 1, NULL, 191.00, 12345.00, 12154.00, 0.00, NULL, NULL, '2022-02-13 02:24:55', '2022-02-13 02:24:55'),
(11, 'S22021311', '2022-02-12 18:00:00', 'Cash', NULL, 1, 184.80, 0.00, 1, NULL, 185.00, 123.00, 0.00, 62.00, NULL, NULL, '2022-02-13 02:28:33', '2022-02-13 02:28:33'),
(12, 'S22021312', '2022-02-12 18:00:00', '47', NULL, 1, 184.80, 0.00, 1, NULL, 185.00, 100.00, 0.00, 85.00, NULL, NULL, '2022-02-13 02:32:10', '2022-02-13 02:32:10'),
(13, 'S22021413', '2022-02-13 18:00:00', 'Cash', NULL, 1, 191.40, 0.00, 1, NULL, 191.00, 100.00, 0.00, 91.00, NULL, NULL, '2022-02-14 11:55:33', '2022-02-14 11:55:33'),
(14, 'S22021413', '2022-02-13 18:00:00', '48', NULL, 1, 184.80, 0.00, 1, NULL, 185.00, 160.00, 0.00, 25.00, NULL, NULL, '2022-02-14 11:56:10', '2022-02-14 11:56:10'),
(15, 'S22021415', '2022-02-13 18:00:00', '49', NULL, 2, 376.20, 0.00, 1, NULL, 376.00, 300.00, 0.00, 76.00, 'Cash', NULL, '2022-02-14 12:00:41', '2022-02-14 12:00:41'),
(16, 'S22021416', '2022-02-13 18:00:00', 'Cash', NULL, 0, 0.00, 60.00, NULL, NULL, 451.00, 400.00, 0.00, 51.00, NULL, NULL, '2022-02-14 12:11:44', '2022-02-14 12:11:44'),
(17, 'S22021417', '2022-02-13 18:00:00', '52', NULL, 4, 759.00, 0.00, NULL, NULL, 759.00, 500.00, 0.00, 259.00, 'Bkash', '001010100', '2022-02-14 12:16:16', '2022-02-14 12:16:16'),
(18, 'S22021418', '2022-02-13 18:00:00', '53', NULL, 10, 1881.00, 0.00, 1, NULL, 1881.00, 1000.00, 0.00, 881.00, 'Bkash', NULL, '2022-02-14 12:34:46', '2022-02-14 12:34:46'),
(19, 'S22021419', '2022-02-13 18:00:00', 'null', NULL, 0, 0.00, 0.00, 1, NULL, 0.00, 1.00, 1.00, 0.00, 'Cash', NULL, '2022-02-14 13:03:19', '2022-02-14 13:03:19'),
(20, 'S22021420', '2022-02-13 18:00:00', 'null', NULL, 0, 0.00, 0.00, 1, NULL, 0.00, 12345.00, 12345.00, 0.00, 'Cash', NULL, '2022-02-14 13:03:51', '2022-02-14 13:03:51'),
(21, 'S22021521', '2022-02-14 18:00:00', 'Cash', NULL, 1, 8180.00, 90.00, 2, NULL, 8090.00, 7800.00, 0.00, 290.00, 'Cash', NULL, '2022-02-14 18:18:48', '2022-02-14 18:18:48'),
(22, 'S22021822', '2022-02-17 18:00:00', 'Cash', NULL, 0, 0.00, 0.00, 1, NULL, 0.00, 100.00, 100.00, 0.00, 'Cash', NULL, '2022-02-18 00:05:55', '2022-02-18 00:05:55'),
(23, 'S22021823', '2022-02-17 18:00:00', 'Cash', NULL, 1, 4990.00, 0.00, 1, NULL, 4990.00, 1000.00, 0.00, 3990.00, 'Cash', NULL, '2022-02-18 00:06:51', '2022-02-18 00:06:51'),
(24, 'S22021924', '2022-02-18 18:00:00', 'Cash', NULL, 10, 1000.00, 0.00, 1, NULL, 1000.00, 1000.00, 0.00, 0.00, 'Cash', NULL, '2022-02-19 00:44:30', '2022-02-19 00:44:30'),
(25, 'S22022125', '2022-02-20 18:00:00', 'Cash', NULL, 2, 230.00, 10.00, 1, NULL, 207.00, 200.00, 0.00, 7.00, 'Cash', NULL, '2022-02-21 00:39:05', '2022-02-21 00:39:05'),
(26, 'S22022126', '2022-02-20 18:00:00', 'Cash', NULL, 2, 300.00, 5.00, 1, NULL, 327.75, 200.00, 0.00, 307.75, 'Cash', NULL, '2022-02-21 00:42:09', '2022-02-21 00:42:09'),
(27, 'S22022227', '2022-02-21 18:00:00', '55', NULL, 0, 0.00, 0.00, 1, 0.00, 24581.76, 18900.00, 0.00, 5681.76, 'Cash', NULL, '2022-02-21 21:42:50', '2022-02-21 21:42:50');

-- --------------------------------------------------------

--
-- Table structure for table `sale_items`
--

CREATE TABLE `sale_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `sale_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` double(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_items`
--

INSERT INTO `sale_items` (`id`, `product_id`, `sale_no`, `date`, `name`, `price`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(3, 1, 'S2202055', '2022-02-04 18:00:00', 'New item test', 184.80, 3, 554.40, NULL, NULL),
(4, 3, 'S2202055', '2022-02-04 18:00:00', 'wegvserg', 191.40, 2, 382.80, NULL, NULL),
(5, 3, 'S2202066', '2022-02-05 18:00:00', 'wegvserg', 191.40, 1, 191.40, NULL, NULL),
(6, 1, 'S2202067', '2022-02-05 18:00:00', 'New item test', 184.80, 1, 184.80, NULL, NULL),
(7, 1, 'S2202078', '2022-02-06 18:00:00', 'New item test', 184.80, 1, 184.80, NULL, NULL),
(8, 1, 'S2202139', '2022-02-12 18:00:00', 'New item test', 184.80, 1, 184.80, NULL, NULL),
(9, 3, 'S22021310', '2022-02-12 18:00:00', 'wegvserg', 191.40, 1, 191.40, NULL, NULL),
(10, 1, 'S22021311', '2022-02-12 18:00:00', 'New item test', 184.80, 1, 184.80, NULL, NULL),
(11, 1, 'S22021312', '2022-02-12 18:00:00', 'New item test', 184.80, 1, 184.80, NULL, NULL),
(12, 4, 'S22021413', '2022-02-13 18:00:00', 'd d df drat ndartn dr', 191.40, 1, 191.40, NULL, NULL),
(13, 1, 'S22021413', '2022-02-13 18:00:00', 'New item test', 184.80, 1, 184.80, NULL, NULL),
(14, 1, 'S22021415', '2022-02-13 18:00:00', 'New item test', 184.80, 1, 184.80, NULL, NULL),
(15, 6, 'S22021415', '2022-02-13 18:00:00', 'vewv', 191.40, 1, 191.40, NULL, NULL),
(16, 1, 'S22021416', '2022-02-13 18:00:00', 'New item test', 184.80, 3, 554.40, NULL, NULL),
(17, 4, 'S22021416', '2022-02-13 18:00:00', 'd d df drat ndartn dr', 191.40, 3, 574.20, NULL, NULL),
(18, 1, 'S22021417', '2022-02-13 18:00:00', 'New item test', 184.80, 1, 184.80, NULL, NULL),
(19, 4, 'S22021417', '2022-02-13 18:00:00', 'd d df drat ndartn dr', 191.40, 3, 574.20, NULL, NULL),
(20, 1, 'S22021418', '2022-02-13 18:00:00', 'New item test', 184.80, 5, 924.00, NULL, NULL),
(21, 4, 'S22021418', '2022-02-13 18:00:00', 'd d df drat ndartn dr', 191.40, 5, 957.00, NULL, NULL),
(22, 1, 'S22021521', '2022-02-14 18:00:00', 'New item test', 8180.00, 1, 8180.00, NULL, NULL),
(23, 5, 'S22021822', '2022-02-17 18:00:00', 'omom', 2056.10, 1, 2056.10, NULL, NULL),
(24, 6, 'S22021823', '2022-02-17 18:00:00', 'vewvb hb hblhuyvuybuy', 4990.00, 1, 4990.00, NULL, NULL),
(25, 5, 'S22021924', '2022-02-18 18:00:00', 'omom', 100.00, 5, 500.00, NULL, NULL),
(26, 6, 'S22021924', '2022-02-18 18:00:00', 'vewvb hb hblhuyvuybuy', 100.00, 5, 500.00, NULL, NULL),
(27, 7, 'S22022125', '2022-02-20 18:00:00', 'ghj kj', 100.00, 2, 200.00, NULL, NULL),
(28, 6, 'S22022126', '2022-02-20 18:00:00', 'vewvb hb hblhuyvuybuy', 100.00, 1, 100.00, NULL, NULL),
(29, 7, 'S22022126', '2022-02-20 18:00:00', 'ghj kj', 200.00, 1, 200.00, NULL, NULL),
(30, 7, 'S22022227', '2022-02-21 18:00:00', 'ghj kj', 24581.76, 1, 24581.76, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_code_initial` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_code_initial` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_code_initial` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_terminal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_terminal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_logo_variant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `navbar_variant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_variant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flat_sidebar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_child_menu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat_percentage` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `purchase_code_initial`, `sale_code_initial`, `item_code_initial`, `purchase_terminal`, `sale_terminal`, `menu_position`, `brand_logo_variant`, `navbar_variant`, `sidebar_variant`, `flat_sidebar`, `sidebar_child_menu`, `vat_percentage`, `created_at`, `updated_at`) VALUES
(1, 'P', 'S', NULL, 'normal', '1', 'sidebar-collapse sidebar-mini', 'cyan', 'cyan', 'sidebar-dark sidebar-dark-light', 'on', 'on', 0, '2022-01-18 01:51:26', '2022-02-21 17:51:53');

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
(1, 'S', '44', '2021-04-12 17:20:46', '2022-01-03 17:47:54'),
(2, 'M', '22', '2021-04-12 17:21:08', '2022-01-03 17:47:46'),
(3, 'L', '11', '2021-04-12 17:21:18', '2022-01-03 17:47:37');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `cost` double(10,2) DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `product_id`, `quantity`, `cost`, `price`, `status`, `created_at`, `updated_at`) VALUES
(18, 7, 7, 18790.38, 24581.76, 1, NULL, NULL),
(19, 5, 1, 1209.00, 2056.10, 1, NULL, NULL),
(20, 6, 1, 1208.00, 7304990.00, 1, NULL, '2022-02-21 01:05:40'),
(21, 8, 10, 456.00, 600.00, 1, NULL, '2022-02-21 01:17:17'),
(22, 9, 2, 5.06, 6.12, 1, NULL, '2022-02-26 04:50:17'),
(23, 10, 100, 120.00, 168.00, 1, NULL, NULL);

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
  `address` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `phone`, `email`, `category`, `balance`, `address`, `created_at`, `updated_at`) VALUES
(2, 'efrbher', '5565657', NULL, 'Normal', '0.00', NULL, '2022-01-03 20:47:11', '2022-01-03 20:47:11'),
(3, 'fnrtnrt', '456787654', NULL, 'Normal', '0.00', NULL, '2022-01-03 20:47:20', '2022-01-03 20:47:20'),
(4, 'erhbreh', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-03 20:47:37', '2022-01-15 18:52:34'),
(5, 'myself', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-24 08:16:31', '2022-01-24 08:16:31'),
(6, '0987pos', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-24 08:27:14', '2022-01-24 08:27:14'),
(7, 'me', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-24 08:27:31', '2022-01-24 08:27:31'),
(8, 'rest', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-24 08:28:28', '2022-01-24 08:28:28'),
(9, 'uiop', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-24 08:29:20', '2022-01-24 08:29:20'),
(10, 'enter supplier', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-24 08:35:41', '2022-01-24 08:35:41'),
(11, 'rat', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-24 09:45:59', '2022-01-24 09:45:59'),
(12, 'oppo mobile', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-24 09:47:45', '2022-01-24 09:47:45'),
(13, 'oppo mobile', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-24 09:47:45', '2022-01-24 09:47:45'),
(14, 'yyyy', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-24 09:49:09', '2022-01-24 09:49:09'),
(15, 'ami ke', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-24 09:50:00', '2022-01-24 09:50:00'),
(16, 'erwq asdw', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-24 09:50:36', '2022-01-24 09:50:36'),
(17, 'wwsvwsvsw', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-24 20:12:32', '2022-01-24 20:12:32'),
(18, 'uhuiui', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-26 15:23:59', '2022-01-26 15:23:59'),
(19, 'oi', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-26 15:59:01', '2022-01-26 15:59:01'),
(20, 'iu', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-26 18:14:57', '2022-01-26 18:14:57'),
(22, 'rrgd ad dadfdf d', '132230202', NULL, 'Normal', '0.00', 'de ders gdr djk', '2022-02-13 02:35:21', '2022-02-17 22:02:04'),
(24, 'rthrt', '6756453', NULL, 'Normal', '0.00', NULL, '2022-02-14 11:58:01', '2022-02-14 11:58:01');

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
(1, 'Amethyst Padilla', 'Rem adipisicing culp', '2021-04-12 17:19:35', '2021-04-12 17:19:35'),
(2, 'Kato Rasmussen', 'Modi impedit illum', '2021-04-12 17:19:45', '2021-04-12 17:19:45');

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
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mahdi Hasan', 'mahdi@gmail.com', NULL, '$2y$10$Me7brEFl7eGn1YuWLKrQx.fP63DBjTqFMsWGjoroBQlfWTwWkMeb6', 'public/profile/620a7fbbaf220avatar5.png', 'LP5W5ivkrBy3AiAtyalmEyPbTUCry1nDgivndpoOhCEZ2vcWCTuXrq5YiN4b', '2021-01-05 21:24:09', '2022-02-14 16:13:47'),
(2, 'Rejaul Hossain', 'reja@infrequentbd.com', NULL, '$2y$10$8zGHNLWHzJqoBQT/3WN88.GK4E7yMuC9VvBqqo90VQ9lbNIV/9sq2', NULL, 'tXJOMkwJhYWN883d81sxfMfvgxVku6IkfqoNVBS8n0yjLEWahg9k2OFRoHPN', '2021-12-21 18:37:34', '2021-12-21 18:37:34'),
(3, 'User', 'user@gmail.com', NULL, '$2y$10$jjsfLuqQIrUyQudmGQgsge9ch2X5vLIyRJ2opghqOzjUTmOZ9xT2K', NULL, NULL, '2022-01-08 20:15:45', '2022-02-17 20:57:34'),
(4, 'jkdf bs`zss', 'b@e.m', NULL, '$2y$10$ludj9uQnVe7n3IrEmXmMS.wKfoNyN.LatUaHHO5n7RQ7f3AeqnfL.', NULL, NULL, '2022-02-17 21:01:28', '2022-02-17 21:07:28'),
(5, 'adb se', 'edbr@gmail.com', NULL, '$2y$10$5UzzPduCuJGr1zpinGzYMejq/VwTLPHLECjaGsWIAQ6Og2EIid4VS', NULL, NULL, '2022-02-17 21:03:55', '2022-02-17 21:07:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `discount_types`
--
ALTER TABLE `discount_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_types`
--
ALTER TABLE `expense_types`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
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
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `discount_types`
--
ALTER TABLE `discount_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `expense_types`
--
ALTER TABLE `expense_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `purchase_items`
--
ALTER TABLE `purchase_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `sale_items`
--
ALTER TABLE `sale_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
