-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 13, 2022 at 05:04 PM
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
(4, 'New Ca', '11', '2021-04-12 17:16:03', '2022-01-02 14:24:01');

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
(1, 'kjnjnjkjknjkn jk', '345', NULL, 'Normal', '0.00', NULL, '2022-01-08 08:11:49', '2022-01-09 17:19:47'),
(2, 'kmkmtbrt', '12321', NULL, 'Normal', '0.00', NULL, '2022-01-17 17:17:28', '2022-01-17 17:17:28'),
(3, '34ger', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-18 07:34:17', '2022-01-18 07:34:17'),
(4, 'test', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-18 21:52:45', '2022-01-18 21:52:45'),
(5, 'wesedfgfxjtmnxdfrnfsgrrherhrthrthrthrhnrt', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-21 01:31:48', '2022-01-21 01:31:48'),
(6, 'ervgersgbdre', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-21 01:39:09', '2022-01-21 01:39:09'),
(7, 'rrrr', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-21 01:39:24', '2022-01-21 01:39:24'),
(8, 'xxxxx', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-21 01:43:19', '2022-01-21 01:43:19'),
(9, 'uuuuuu', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-21 01:46:34', '2022-01-21 01:46:34'),
(10, 'cccccccc', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-21 01:49:30', '2022-01-21 01:49:30'),
(11, 'qqqqqqqqqq', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-21 01:51:15', '2022-01-21 01:51:15'),
(12, 'ttt', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-21 01:53:14', '2022-01-21 01:53:14'),
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
(47, 'Reb bfrbfr', '029810', NULL, 'Normal', '85.00', 'db de d sr dsafg dgfs ngdf', '2022-02-13 02:32:03', '2022-02-13 02:32:10');

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
(23, '2022_01_18_051649_create_settings_table', 4);

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
(3, 'App\\Model\\User', 5);

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
(1, 'role_list', 'web', 'Role List', 'Role Management', '2022-02-03 23:42:50', '2022-02-03 23:42:50'),
(2, 'role_create', 'web', 'Role Create', 'Role Management', '2022-02-03 23:42:50', '2022-02-03 23:42:50'),
(3, 'role_update', 'web', 'Role Update', 'Role Management', '2022-02-03 23:42:50', '2022-02-03 23:42:50'),
(4, 'role_delete', 'web', 'Role Delete', 'Role Management', '2022-02-03 23:42:50', '2022-02-03 23:42:50'),
(5, 'user_role_list', 'web', 'User Role List', 'User Management', '2022-02-03 23:42:50', '2022-02-03 23:42:50'),
(6, 'user_role_create', 'web', 'User Role Create', 'User Management', '2022-02-03 23:42:50', '2022-02-03 23:42:50'),
(7, 'user_role_update', 'web', 'User Role Update', 'User Management', '2022-02-03 23:42:50', '2022-02-03 23:42:50'),
(8, 'user_password_update', 'web', 'User Password Update', 'User Management', '2022-02-03 23:42:50', '2022-02-03 23:42:50'),
(9, 'settings', 'web', 'Settings', 'Configuration Management', '2022-02-03 23:42:50', '2022-02-03 23:42:50'),
(10, 'company_info', 'web', 'Company Info', 'Configuration Management', '2022-02-03 23:42:50', '2022-02-03 23:42:50'),
(11, 'company_update', 'web', 'Company Info Update', 'Configuration Management', '2022-02-03 23:42:51', '2022-02-03 23:42:51'),
(12, 'customer_list', 'web', 'Customer List', 'Configuration Management', '2022-02-03 23:42:51', '2022-02-03 23:42:51'),
(13, 'customer_create', 'web', 'Customer Create', 'Configuration Management', '2022-02-03 23:42:51', '2022-02-03 23:42:51'),
(14, 'customer_update', 'web', 'Customer Update', 'Configuration Management', '2022-02-03 23:42:51', '2022-02-03 23:42:51'),
(15, 'customer_delete', 'web', 'Customer Delete', 'Configuration Management', '2022-02-03 23:42:51', '2022-02-03 23:42:51'),
(16, 'supplier_create', 'web', 'Supplier Create', 'Configuration Management', '2022-02-03 23:42:51', '2022-02-03 23:42:51'),
(17, 'supplier_list', 'web', 'Supplier List', 'Configuration Management', '2022-02-03 23:42:51', '2022-02-03 23:42:51'),
(18, 'supplier_update', 'web', 'Supplier Update', 'Configuration Management', '2022-02-03 23:42:51', '2022-02-03 23:42:51'),
(19, 'supplier_delete', 'web', 'Supplier Delete', 'Configuration Management', '2022-02-03 23:42:51', '2022-02-03 23:42:51'),
(20, 'product_create', 'web', 'Product Create', 'Product Management', '2022-02-03 23:42:51', '2022-02-03 23:42:51'),
(21, 'product_list', 'web', 'Product List', 'Product Management', '2022-02-03 23:42:51', '2022-02-03 23:42:51'),
(22, 'product_update', 'web', 'Product Update', 'Product Management', '2022-02-03 23:42:51', '2022-02-03 23:42:51'),
(23, 'product_delete', 'web', 'Product Delete', 'Product Management', '2022-02-03 23:42:51', '2022-02-03 23:42:51'),
(24, 'category_create', 'web', 'Category Create', 'Product Management', '2022-02-03 23:42:51', '2022-02-03 23:42:51'),
(25, 'category_list', 'web', 'Category List', 'Product Management', '2022-02-03 23:42:51', '2022-02-03 23:42:51'),
(26, 'category_update', 'web', 'Category Update', 'Product Management', '2022-02-03 23:42:51', '2022-02-03 23:42:51'),
(27, 'category_delete', 'web', 'Category Delete', 'Product Management', '2022-02-03 23:42:51', '2022-02-03 23:42:51'),
(28, 'brand_create', 'web', 'Brand Create', 'Product Management', '2022-02-03 23:42:51', '2022-02-03 23:42:51'),
(29, 'brand_list', 'web', 'Brand List', 'Product Management', '2022-02-03 23:42:51', '2022-02-03 23:42:51'),
(30, 'brand_update', 'web', 'Brand Update', 'Product Management', '2022-02-03 23:42:51', '2022-02-03 23:42:51'),
(31, 'brand_delete', 'web', 'Brand Delete', 'Product Management', '2022-02-03 23:42:51', '2022-02-03 23:42:51'),
(32, 'color_create', 'web', 'Color Create', 'Product Management', '2022-02-03 23:42:51', '2022-02-03 23:42:51'),
(33, 'color_list', 'web', 'Color List', 'Product Management', '2022-02-03 23:42:51', '2022-02-03 23:42:51'),
(34, 'color_update', 'web', 'Color Update', 'Product Management', '2022-02-03 23:42:51', '2022-02-03 23:42:51'),
(35, 'color_delete', 'web', 'Color Delete', 'Product Management', '2022-02-03 23:42:51', '2022-02-03 23:42:51'),
(36, 'size_create', 'web', 'Size Create', 'Product Management', '2022-02-03 23:42:51', '2022-02-03 23:42:51'),
(37, 'size_list', 'web', 'Size List', 'Product Management', '2022-02-03 23:42:51', '2022-02-03 23:42:51'),
(38, 'size_update', 'web', 'Size Update', 'Product Management', '2022-02-03 23:42:51', '2022-02-03 23:42:51'),
(39, 'size_delete', 'web', 'Size Delete', 'Product Management', '2022-02-03 23:42:51', '2022-02-03 23:42:51'),
(40, 'purchase', 'web', 'Product Purchase', 'Purchase Management', '2022-02-03 23:42:51', '2022-02-03 23:42:51'),
(41, 'purchase_date', 'web', 'Purchase Date Update', 'Purchase Management', '2022-02-03 23:42:51', '2022-02-03 23:42:51'),
(42, 'sale', 'web', 'Product Sale', 'Sale Management', '2022-02-03 23:42:51', '2022-02-03 23:42:51'),
(43, 'sale_date', 'web', 'Sale Date Update', 'Sale Management', '2022-02-03 23:42:51', '2022-02-03 23:42:51'),
(44, 'stock_list', 'web', 'Stock List', 'Stock Management', '2022-02-03 23:42:51', '2022-02-03 23:42:51'),
(45, 'purchase_report', 'web', 'Purchase Report', 'Report Management', '2022-02-03 23:42:51', '2022-02-03 23:42:51'),
(46, 'sale_report', 'web', 'Sale Report', 'Report Management', '2022-02-03 23:42:51', '2022-02-03 23:42:51'),
(47, 'stock_adjustment', 'web', 'Stock Adjustment', 'Stock Management', '2022-02-13 16:45:40', NULL),
(48, 'stock_delete', 'web', 'Stock Delete', 'Stock Management', '2022-02-13 16:45:41', NULL);

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
(1, 'New item test', '221100661', 4, 0, 1, 0, 120.00, 12.00, '40.00', 184.80, 'public/product/61fd8476423ff61dfef91b0d835e8a42ab0cec1banner-3.jpg', '2022-02-02 00:47:11', '2022-02-04 19:54:30'),
(3, 'wegvserg', '221100003', 4, 0, 0, 0, 120.00, 12.00, '45.00', 191.40, 'public/product/61fd846a8eec361dfef91b0d835e8a42ab0cec1banner-3.jpg', '2022-02-03 22:43:47', '2022-02-04 19:54:18');

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
(1, 'P2202021', '2022-02-02', NULL, NULL, 76, 810260.00, 50.00, 1, 405130.00, 400000.00, 0.00, 5130.00, NULL, '2022-02-02 00:53:54', '2022-02-02 00:53:54'),
(2, 'P2202052', '2022-02-05', NULL, NULL, 0, 0.00, 0.00, 1, 0.00, 123456.00, 1234.00, 0.00, NULL, '2022-02-04 18:14:58', '2022-02-04 18:14:58'),
(3, 'P2202053', '2022-02-05', 'Cash', NULL, 0, 0.00, 0.00, 1, 0.00, 21.00, 21.00, 0.00, NULL, '2022-02-04 18:16:38', '2022-02-04 18:16:38'),
(4, 'P2202053', '2022-02-05', 'Cash', NULL, 0, 0.00, 0.00, 1, 0.00, 1.00, 1.00, 0.00, NULL, '2022-02-04 18:17:39', '2022-02-04 18:17:39'),
(5, 'P2202055', '2022-02-05', 'Cash', NULL, 200, 24000.00, 0.00, 1, 24000.00, 10000.00, 0.00, 14000.00, NULL, '2022-02-04 19:55:06', '2022-02-04 19:55:06'),
(6, 'P2202136', '2022-02-13', 'Cash', NULL, 14, 57680.00, 40.00, 1, 34608.00, 10000.00, 0.00, 24608.00, NULL, '2022-02-13 02:35:38', '2022-02-13 02:35:38'),
(7, 'P2202137', '2022-02-13', '23', NULL, 1, 120.00, 0.00, 1, 120.00, 1000.00, 880.00, 0.00, NULL, '2022-02-13 02:38:11', '2022-02-13 02:38:11');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_items`
--

CREATE TABLE `purchase_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `purchase_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
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
(1, 1, 'P2202022', '2022-02-02', 'New item test', 23120.00, 33, 762960.00, NULL, NULL),
(2, 2, 'P2202022', '2022-02-02', 'Testing data', 1100.00, 43, 47300.00, NULL, NULL),
(3, 1, 'P2202055', '2022-02-05', 'New item test', 120.00, 100, 12000.00, NULL, NULL),
(4, 3, 'P2202055', '2022-02-05', 'wegvserg', 120.00, 100, 12000.00, NULL, NULL),
(5, 1, 'P2202136', '2022-02-13', 'New item test', 4120.00, 14, 57680.00, NULL, NULL),
(6, 1, 'P2202137', '2022-02-13', 'New item test', 120.00, 1, 120.00, NULL, NULL);

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
(1, 'superadmin', 'web', 'Super Admin', '2022-01-08 20:15:45', '2022-01-08 20:15:45'),
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
(46, 2);

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
(1, 'S2202021', '2022-02-02', NULL, NULL, 30, 68973.44, 4.00, 1, 66215.00, 40000.00, 0.00, 26215.00, NULL, NULL, '2022-02-02 00:58:07', '2022-02-02 00:58:07'),
(2, 'S2202052', '2022-02-05', NULL, NULL, 0, 0.00, 0.00, 1, 0.00, 32342.00, 32342.00, 0.00, NULL, NULL, '2022-02-04 18:14:06', '2022-02-04 18:14:06'),
(3, 'S2202053', '2022-02-05', 'Cash', NULL, 0, 0.00, 0.00, 1, 0.00, 10.00, 10.00, 0.00, NULL, NULL, '2022-02-04 18:18:03', '2022-02-04 18:18:03'),
(4, 'S2202054', '2022-02-05', 'Cash', NULL, 0, 0.00, 0.00, 1, 0.00, 1.00, 1.00, 0.00, NULL, NULL, '2022-02-04 18:20:09', '2022-02-04 18:20:09'),
(5, 'S2202055', '2022-02-05', 'Cash', NULL, 5, 937.20, 0.00, NULL, 937.00, 123456.00, 11408.00, 0.00, NULL, NULL, '2022-02-04 20:02:27', '2022-02-04 20:02:27'),
(6, 'S2202066', '2022-02-06', 'Cash', NULL, 1, 191.40, 0.00, NULL, 191.00, 123456.00, 12154.00, 0.00, NULL, NULL, '2022-02-06 17:09:43', '2022-02-06 17:09:43'),
(7, 'S2202067', '2022-02-06', 'Cash', NULL, 1, 184.80, 0.00, NULL, 185.00, 123456.00, 123271.00, 0.00, NULL, NULL, '2022-02-06 17:10:26', '2022-02-06 17:10:26'),
(8, 'S2202078', '2022-02-07', 'Cash', NULL, 1, 184.80, 0.00, NULL, 185.00, 12345.00, 12160.00, 0.00, NULL, NULL, '2022-02-06 18:22:47', '2022-02-06 18:22:47'),
(9, 'S2202139', '2022-02-13', 'Cash', NULL, 1, 184.80, 0.00, 1, 185.00, 100.00, 0.00, 85.00, NULL, NULL, '2022-02-13 02:23:54', '2022-02-13 02:23:54'),
(10, 'S22021310', '2022-02-13', 'Cash', NULL, 1, 191.40, 0.00, 1, 191.00, 12345.00, 12154.00, 0.00, NULL, NULL, '2022-02-13 02:24:55', '2022-02-13 02:24:55'),
(11, 'S22021311', '2022-02-13', 'Cash', NULL, 1, 184.80, 0.00, 1, 185.00, 123.00, 0.00, 62.00, NULL, NULL, '2022-02-13 02:28:33', '2022-02-13 02:28:33'),
(12, 'S22021312', '2022-02-13', '47', NULL, 1, 184.80, 0.00, 1, 185.00, 100.00, 0.00, 85.00, NULL, NULL, '2022-02-13 02:32:10', '2022-02-13 02:32:10');

-- --------------------------------------------------------

--
-- Table structure for table `sale_items`
--

CREATE TABLE `sale_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `sale_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
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
(3, 1, 'S2202055', '2022-02-05', 'New item test', 184.80, 3, 554.40, NULL, NULL),
(4, 3, 'S2202055', '2022-02-05', 'wegvserg', 191.40, 2, 382.80, NULL, NULL),
(5, 3, 'S2202066', '2022-02-06', 'wegvserg', 191.40, 1, 191.40, NULL, NULL),
(6, 1, 'S2202067', '2022-02-06', 'New item test', 184.80, 1, 184.80, NULL, NULL),
(7, 1, 'S2202078', '2022-02-07', 'New item test', 184.80, 1, 184.80, NULL, NULL),
(8, 1, 'S2202139', '2022-02-13', 'New item test', 184.80, 1, 184.80, NULL, NULL),
(9, 3, 'S22021310', '2022-02-13', 'wegvserg', 191.40, 1, 191.40, NULL, NULL),
(10, 1, 'S22021311', '2022-02-13', 'New item test', 184.80, 1, 184.80, NULL, NULL),
(11, 1, 'S22021312', '2022-02-13', 'New item test', 184.80, 1, 184.80, NULL, NULL);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `purchase_code_initial`, `sale_code_initial`, `item_code_initial`, `purchase_terminal`, `sale_terminal`, `menu_position`, `brand_logo_variant`, `navbar_variant`, `sidebar_variant`, `flat_sidebar`, `sidebar_child_menu`, `created_at`, `updated_at`) VALUES
(1, 'P', 'S', NULL, 'normal', '1', 'sidebar-collapse sidebar-mini', 'cyan', 'cyan', 'sidebar-dark sidebar-dark-light', 'on', 'on', '2022-01-18 01:51:26', '2022-02-10 15:58:16');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `product_id`, `quantity`, `cost`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 124, 3051.70, 184.80, NULL, NULL);

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
(21, 'dr', NULL, NULL, 'Normal', '0.00', NULL, '2022-01-26 18:18:08', '2022-01-26 18:18:08'),
(22, 'rrgd ad dadfdf d', '132230202', NULL, 'Normal', '0.00', 'de ders gdr d', '2022-02-13 02:35:21', '2022-02-13 02:35:21'),
(23, 'bbbb kib', NULL, NULL, 'Normal', '0.00', 'xs `dfsz`da ndan rdn rsn drnsdzrn t', '2022-02-13 02:38:02', '2022-02-13 02:38:02');

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
(1, 'Mahdi Hasan', 'mahdi@gmail.com', NULL, '$2y$10$Me7brEFl7eGn1YuWLKrQx.fP63DBjTqFMsWGjoroBQlfWTwWkMeb6', 'public/profile/62091d007e1b2avatar2.png', NULL, '2021-01-05 21:24:09', '2022-02-13 15:00:16'),
(2, 'Rejaul Hossain', 'reja@infrequentbd.com', NULL, '$2y$10$8zGHNLWHzJqoBQT/3WN88.GK4E7yMuC9VvBqqo90VQ9lbNIV/9sq2', NULL, 'tXJOMkwJhYWN883d81sxfMfvgxVku6IkfqoNVBS8n0yjLEWahg9k2OFRoHPN', '2021-12-21 18:37:34', '2021-12-21 18:37:34'),
(3, 'User', 'user@gmail.com', NULL, '$2y$10$jjsfLuqQIrUyQudmGQgsge9ch2X5vLIyRJ2opghqOzjUTmOZ9xT2K', NULL, NULL, '2022-01-08 20:15:45', '2022-01-08 20:15:45');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purchase_items`
--
ALTER TABLE `purchase_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sale_items`
--
ALTER TABLE `sale_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
