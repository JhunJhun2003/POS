-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 12, 2026 at 11:12 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `billitem`
--

CREATE TABLE `billitem` (
  `id` bigint UNSIGNED NOT NULL,
  `bill_id` int NOT NULL,
  `item_id` int NOT NULL,
  `quantity` int NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billitem`
--

INSERT INTO `billitem` (`id`, `bill_id`, `item_id`, `quantity`, `amount`, `created_at`, `updated_at`) VALUES
(1, 8, 1111, 1, 100.00, '2026-03-02 11:01:38', '2026-03-02 11:01:38'),
(2, 9, 1111, 1, 100.00, '2026-03-02 11:02:44', '2026-03-02 11:02:44'),
(3, 10, 1111, 1, 100.00, '2026-03-02 11:04:39', '2026-03-02 11:04:39'),
(4, 10, 3333, 1, 200.00, '2026-03-02 11:04:39', '2026-03-02 11:04:39'),
(5, 11, 1111, 1, 100.00, '2026-03-02 11:04:57', '2026-03-02 11:04:57'),
(6, 12, 3333, 10, 2000.00, '2026-03-02 21:47:55', '2026-03-02 21:47:55'),
(7, 12, 1111, 2, 200.00, '2026-03-02 21:47:55', '2026-03-02 21:47:55'),
(8, 13, 1111, 1, 100.00, '2026-03-02 22:43:31', '2026-03-02 22:43:31'),
(9, 14, 1111, 1, 100.00, '2026-03-02 22:46:00', '2026-03-02 22:46:00'),
(10, 15, 3333, 1, 200.00, '2026-03-02 23:58:52', '2026-03-02 23:58:52'),
(11, 15, 1111, 1, 100.00, '2026-03-02 23:58:52', '2026-03-02 23:58:52'),
(12, 16, 1111, 1, 100.00, '2026-03-03 02:59:34', '2026-03-03 02:59:34'),
(13, 16, 3333, 1, 200.00, '2026-03-03 02:59:34', '2026-03-03 02:59:34'),
(14, 17, 1111, 1, 100.00, '2026-03-03 04:47:25', '2026-03-03 04:47:25'),
(15, 17, 2222, 1, 100.00, '2026-03-03 04:47:25', '2026-03-03 04:47:25'),
(16, 18, 1111, 10, 1000.00, '2026-03-03 07:06:38', '2026-03-03 07:06:38'),
(17, 19, 1111, 2, 200.00, '2026-03-03 09:10:03', '2026-03-03 09:10:03'),
(18, 20, 1111, 1, 100.00, '2026-03-03 09:13:28', '2026-03-03 09:13:28'),
(19, 20, 2222, 2, 200.00, '2026-03-03 09:13:28', '2026-03-03 09:13:28'),
(20, 21, 1111, 1, 100.00, '2026-03-04 03:36:12', '2026-03-04 03:36:12'),
(21, 21, 1111, 3, 300.00, '2026-03-04 03:36:12', '2026-03-04 03:36:12'),
(22, 22, 1111, 1, 100.00, '2026-03-04 03:36:21', '2026-03-04 03:36:21'),
(23, 23, 1111, 2, 200.00, '2026-03-04 03:45:50', '2026-03-04 03:45:50'),
(24, 23, 1111, 1, 100.00, '2026-03-04 03:45:50', '2026-03-04 03:45:50'),
(25, 23, 1111, 2, 200.00, '2026-03-04 03:45:50', '2026-03-04 03:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` bigint UNSIGNED NOT NULL,
  `bill_date` date NOT NULL,
  `bill_number` int NOT NULL,
  `cashier_id` bigint UNSIGNED NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `cash_bill` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `bill_date`, `bill_number`, `cashier_id`, `total_amount`, `cash_bill`, `created_at`, `updated_at`) VALUES
(3, '2026-03-02', 1772472292, 1, 100.00, 0.00, '2026-03-02 10:54:52', '2026-03-02 10:54:52'),
(4, '2026-03-02', 1772472297, 1, 100.00, 0.00, '2026-03-02 10:54:57', '2026-03-02 10:54:57'),
(5, '2026-03-02', 1772472340, 1, 100.00, 0.00, '2026-03-02 10:55:40', '2026-03-02 10:55:40'),
(7, '2026-03-02', 1772472485, 1, 100.00, 0.00, '2026-03-02 10:58:05', '2026-03-02 10:58:05'),
(9, '2026-03-02', 1772472764, 1, 100.00, 0.00, '2026-03-02 11:02:44', '2026-03-02 11:02:44'),
(10, '2026-03-02', 1772472879, 1, 300.00, 0.00, '2026-03-02 11:04:39', '2026-03-02 11:04:39'),
(11, '2026-03-02', 1772472897, 1, 100.00, 0.00, '2026-03-02 11:04:57', '2026-03-02 11:04:57'),
(12, '2026-03-03', 1772511475, 1, 2200.00, 0.00, '2026-03-02 21:47:55', '2026-03-02 21:47:55'),
(13, '2026-03-03', 1772514811, 1, 100.00, 0.00, '2026-03-02 22:43:31', '2026-03-02 22:43:31'),
(14, '2026-03-03', 1772514960, 1, 100.00, 0.00, '2026-03-02 22:46:00', '2026-03-02 22:46:00'),
(15, '2026-03-03', 1772519332, 2, 300.00, 0.00, '2026-03-02 23:58:52', '2026-03-02 23:58:52'),
(16, '2026-03-03', 1772530174, 2, 300.00, 0.00, '2026-03-03 02:59:34', '2026-03-03 02:59:34'),
(17, '2026-03-03', 1772536645, 1, 200.00, 0.00, '2026-03-03 04:47:25', '2026-03-03 04:47:25'),
(18, '2026-03-03', 1772544998, 2, 1000.00, 0.00, '2026-03-03 07:06:38', '2026-03-03 07:06:38'),
(19, '2026-03-03', 1772552403, 1, 200.00, 0.00, '2026-03-03 09:10:03', '2026-03-03 09:10:03'),
(20, '2026-03-03', 1772552608, 2, 300.00, 0.00, '2026-03-03 09:13:28', '2026-03-03 09:13:28'),
(21, '2026-03-04', 1772618772, 1, 400.00, 0.00, '2026-03-04 03:36:12', '2026-03-04 03:36:12'),
(22, '2026-03-04', 1772618781, 1, 100.00, 0.00, '2026-03-04 03:36:21', '2026-03-04 03:36:21'),
(23, '2026-03-04', 1772619350, 1, 500.00, 0.00, '2026-03-04 03:45:50', '2026-03-04 03:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'food', '2026-03-02 10:37:30', '2026-03-02 10:37:30'),
(2, 'drink', '2026-03-03 03:32:49', '2026-03-03 03:32:49'),
(3, 'smoke', '2026-03-03 07:12:36', '2026-03-03 07:12:36');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` bigint UNSIGNED NOT NULL,
  `itemCode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `itemName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `categoryid` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `cost` decimal(8,2) NOT NULL,
  `exp_Date` date NOT NULL,
  `alert_Date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `itemCode`, `itemName`, `price`, `categoryid`, `quantity`, `cost`, `exp_Date`, `alert_Date`, `created_at`, `updated_at`) VALUES
(1, '1111', 'one', 100.00, 1, 4, 800.00, '2026-04-09', '2026-04-02', '2026-03-02 10:37:30', '2026-03-04 04:01:04'),
(2, '3333', 'tree', 200.00, 1, 10, 1800.00, '2026-04-08', '2026-04-08', '2026-03-02 10:37:44', '2026-03-03 03:33:07'),
(3, '2222', 'two', 100.00, 1, 7, 800.00, '2026-04-10', '2026-04-02', '2026-03-03 03:21:14', '2026-03-03 09:13:28'),
(4, '4444', 'coca cola', 2000.00, 2, 10, 1800.00, '2026-03-27', '2026-03-24', '2026-03-03 07:15:28', '2026-03-03 07:15:28');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(18, '0001_01_01_000001_create_cache_table', 2),
(19, '0001_01_01_000002_create_jobs_table', 2),
(20, '2026_03_01_104147_add_usertype_column_to_users_table', 2),
(21, '2026_03_02_082350_create_inventory_table', 2),
(22, '2026_03_02_082850_create_category_table', 2),
(25, '2026_03_02_120829_create_orders_table', 3),
(26, '2026_03_02_155848_create_billitem_table', 3),
(29, '2026_03_02_155906_create_bill_table', 4),
(30, '2026_03_02_160339_create_salereport_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `itemCode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cashierid` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `orderDate` date NOT NULL,
  `commingDate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `itemCode`, `cashierid`, `quantity`, `orderDate`, `commingDate`, `created_at`, `updated_at`) VALUES
(1, '1111', 1, 1, '2026-03-03', '2026-03-10', '2026-03-03 05:03:52', '2026-03-03 05:03:52');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salereport`
--

CREATE TABLE `salereport` (
  `id` bigint UNSIGNED NOT NULL,
  `sale_date` date NOT NULL,
  `bill_no` int NOT NULL,
  `cashier_id` int NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salereport`
--

INSERT INTO `salereport` (`id`, `sale_date`, `bill_no`, `cashier_id`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, '2026-03-03', 1772514960, 1, 100.00, '2026-03-02 22:46:00', '2026-03-02 22:46:00'),
(2, '2026-03-03', 1772519332, 2, 300.00, '2026-03-02 23:58:52', '2026-03-02 23:58:52'),
(3, '2026-03-03', 1772530174, 2, 300.00, '2026-03-03 02:59:34', '2026-03-03 02:59:34'),
(4, '2026-03-03', 1772536645, 1, 200.00, '2026-03-03 04:47:25', '2026-03-03 04:47:25'),
(5, '2026-03-03', 1772544998, 2, 1000.00, '2026-03-03 07:06:38', '2026-03-03 07:06:38'),
(6, '2026-03-03', 1772552403, 1, 200.00, '2026-03-03 09:10:03', '2026-03-03 09:10:03'),
(7, '2026-03-03', 1772552608, 2, 300.00, '2026-03-03 09:13:28', '2026-03-03 09:13:28'),
(8, '2026-03-04', 1772618772, 1, 400.00, '2026-03-04 03:36:12', '2026-03-04 03:36:12'),
(9, '2026-03-04', 1772618781, 1, 100.00, '2026-03-04 03:36:21', '2026-03-04 03:36:21'),
(10, '2026-03-04', 1772619350, 1, 500.00, '2026-03-04 03:45:50', '2026-03-04 03:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('xj3ldGFKGjghK6trgNoqgBw8QwcKKvBLO2OUr20i', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTHFMaHRYWHV2dU42OUdoSzE1eTZSVlh0eHFkTjVmNHBkRmszRFlnVyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9fQ==', 1773307972);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `usertype`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', NULL, '$2y$12$t.SD4YrioJUEpYK5uZOtc.2Om8RG7PcqYiNFouE6nuZwazuVjuyAi', NULL, '2026-03-02 09:57:14', '2026-03-02 09:57:14'),
(2, 'jhun jhun', 'aaa@gmail.com', 'user', NULL, '$2y$12$2TsEfD5xtp8gpKUNUMLCSeSuAtEjidQiePWWaliT5h.R4dfopf4uW', NULL, '2026-03-02 22:53:24', '2026-03-02 22:53:24'),
(3, 'manager', 'manager@gmail.com', 'manager', NULL, '$2y$12$U1Zr2VXmO7uj7cjtIskCfOHFQvE/SX80SG6bmrELOKghqJHWye716', NULL, '2026-03-03 03:43:38', '2026-03-03 03:43:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billitem`
--
ALTER TABLE `billitem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bills_bill_number_unique` (`bill_number`),
  ADD KEY `bills_cashier_id_foreign` (`cashier_id`);

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
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inventory_itemcode_unique` (`itemCode`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `salereport`
--
ALTER TABLE `salereport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `billitem`
--
ALTER TABLE `billitem`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `salereport`
--
ALTER TABLE `salereport`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_cashier_id_foreign` FOREIGN KEY (`cashier_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
