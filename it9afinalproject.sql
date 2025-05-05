-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2025 at 01:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it9afinalproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_|127.0.0.1', 'i:1;', 1746082594),
('laravel_cache_|127.0.0.1:timer', 'i:1746082594;', 1746082594),
('laravel_cache_jara@gmail.com|127.0.0.1', 'i:1;', 1745815091),
('laravel_cache_jara@gmail.com|127.0.0.1:timer', 'i:1745815091;', 1745815091),
('laravel_cache_test@gmail.com|127.0.0.1', 'i:1;', 1745797156),
('laravel_cache_test@gmail.com|127.0.0.1:timer', 'i:1745797156;', 1745797156);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ptid` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ptid`, `category_name`, `created_at`, `updated_at`) VALUES
(7, 'rogdollz', '2025-05-04 11:55:51', '2025-05-04 12:59:41'),
(8, 'ADS', '2025-05-04 12:52:42', '2025-05-04 12:52:42'),
(9, 'rags', '2025-05-04 12:57:50', '2025-05-04 12:57:50');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `eid` bigint(20) UNSIGNED NOT NULL,
  `eadid` bigint(20) UNSIGNED DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`eid`, `eadid`, `first_name`, `middle_name`, `last_name`, `age`, `gender`, `birthday`, `email`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(3, 3, 'Joaquin', 'Teo', 'Jara', 19, 'male', '2025-06-06', 'tetsuya@example.com', '0929454678', 1, '2025-05-01 06:21:14', '2025-05-01 06:32:59'),
(4, 4, 'Ari', 'Battillo', 'Bartiquien', 19, 'female', '2025-05-21', 'tets4@example.com', '09292396544', 1, '2025-05-01 06:36:12', '2025-05-01 06:41:09'),
(5, 5, 'Teo', 'Jara', 'Joaquin', 42, 'male', '2025-05-14', 'tets42@example.com', '09292396234', 1, '2025-05-01 07:37:01', '2025-05-01 07:37:20'),
(15, 15, 'as', 'as', 'as', 23, 'male', '2025-05-15', 'tets24@example.com', '09578396544', 1, '2025-05-01 16:06:53', '2025-05-02 00:43:52'),
(21, 21, 'Same', 'Same', 'Same', 19, 'male', '2025-05-14', 'Jogn@gmail.com', '09294562783', 1, '2025-05-01 16:15:59', '2025-05-04 12:52:06'),
(22, 22, 'asdsad', 'asdsad', 'asdsad', 23, 'male', '2025-05-14', 'test@example.com', '09292396599', 1, '2025-05-01 16:16:21', '2025-05-05 02:57:11'),
(24, 24, 'Light', 'Light', 'asd', 19, 'male', '2025-05-15', 'tetsuyaasa@example.com', '09292354678', 0, '2025-05-01 16:18:38', '2025-05-01 16:18:38'),
(25, 25, 'das', 'asdas', 'asd', 34, 'female', '2025-05-20', 'tets2@example.com', '09292354656', 0, '2025-05-01 16:19:12', '2025-05-01 16:19:12'),
(26, 26, 'Summer', 'Soe', 'Laster', 23, 'male', '2025-05-28', 'Laster23@example.com', '09292396521', 0, '2025-05-01 16:19:53', '2025-05-01 16:19:53'),
(28, 28, 'Maria', 'Teresa', 'Labo', 35, 'female', '2025-05-22', 'tetsuyahey@example.com', '09281234567', 1, '2025-05-01 16:24:30', '2025-05-04 14:53:27');

-- --------------------------------------------------------

--
-- Table structure for table `employee_addresses`
--

CREATE TABLE `employee_addresses` (
  `eadid` bigint(20) UNSIGNED NOT NULL,
  `street` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_addresses`
--

INSERT INTO `employee_addresses` (`eadid`, `street`, `city`, `province`, `zip`, `created_at`, `updated_at`) VALUES
(2, 'Prk. 6', 'Davao city', 'Davao del sur', 8000, '2025-05-01 06:14:23', '2025-05-01 06:14:23'),
(3, 'Prk. 6', 'Davao city', 'Davao del sur', 8000, '2025-05-01 06:21:14', '2025-05-01 06:21:14'),
(4, 'Prk. 6', 'Davao city', 'Davao del sur', 8000, '2025-05-01 06:36:12', '2025-05-01 06:36:12'),
(5, 'Prk. 6', 'Davao city', 'Davao del sur', 8000, '2025-05-01 07:37:01', '2025-05-01 07:37:01'),
(15, 'Prk. 6', 'Davao city', 'Davao del sur', 8000, '2025-05-01 16:06:53', '2025-05-01 16:06:53'),
(21, 'Quaxe', 'Nargea', 'Nargea Pronzea', 9862, '2025-05-01 16:15:59', '2025-05-01 16:15:59'),
(22, 'Prk. 6', 'Davao city', 'Davao del sur', 8000, '2025-05-01 16:16:21', '2025-05-01 16:16:21'),
(24, 'Prk. 6', 'Davao city', 'Davao del sur', 8000, '2025-05-01 16:18:38', '2025-05-01 16:18:38'),
(25, 'Prk. 6', 'Davao city', 'Davao del sur', 8000, '2025-05-01 16:19:12', '2025-05-01 16:19:12'),
(26, 'Prk. 7', 'Davao city', 'Davao del sur', 8000, '2025-05-01 16:19:53', '2025-05-01 16:19:53'),
(28, 'Prk. 45', 'Davao city', 'Davao del sur', 8000, '2025-05-01 16:24:30', '2025-05-01 16:24:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_03_15_040649_create_categories_table', 1),
(2, '2025_03_15_042611_create_sessions_table', 1),
(3, '2025_03_17_030454_create_suppliers_table', 1),
(4, '2025_03_17_030922_create_suppliers_addresses_table', 1),
(5, '2025_04_06_042225_create_stocks_table', 1),
(6, '2025_04_06_064408_products', 1),
(7, '2025_04_06_072002_create_cache_table', 1),
(8, '2025_04_27_183609_create_users_table', 1),
(9, '2025_04_27_193842_create_roles_table', 2),
(10, '2025_04_27_193857_create_employees_table', 2),
(25, '2025_04_29_104225_create_employee_addresses_table', 3),
(26, '2025_04_29_112310_employees', 3),
(27, '2025_05_01_120306_add_role_to_users', 4),
(28, '2025_05_01_135308_remove_email_from_users', 5),
(29, '2025_05_01_135637_remove_unsername_from_users', 6);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` bigint(20) UNSIGNED NOT NULL,
  `ptid` bigint(20) UNSIGNED DEFAULT NULL,
  `sid` bigint(20) UNSIGNED DEFAULT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_desc` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `rid` bigint(20) UNSIGNED NOT NULL,
  `roles` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`rid`, `roles`, `created_at`, `updated_at`) VALUES
(18, 'Admin', '2025-04-28 18:25:15', '2025-05-01 09:01:27'),
(19, 'Employee', '2025-04-28 18:25:40', '2025-04-28 18:25:40'),
(25, 'AnotherRole', '2025-05-04 14:52:25', '2025-05-04 14:52:25');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Nm3SLlC7egmkzRzI8AfdlL3v4RAdSIzR3J0pEOxl', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTGRRbFZOTTJqb0RjQkVWVVBMR3d4b0VwY2NyeWx6aGVJNGltZjlTOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9lbXBsb3llZS9jYXNoaWVyL2FkZHByb2R1Y3RzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTt9', 1746426330);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `STID` bigint(20) UNSIGNED NOT NULL,
  `stocks` int(11) NOT NULL COMMENT 'Stock Quantity',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `sid` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`sid`, `company_name`, `created_at`, `updated_at`) VALUES
(1, 'Aaaaa', '2025-04-27 10:55:16', '2025-05-04 11:39:48'),
(4, 'Supplier 1', '2025-05-04 05:59:15', '2025-05-04 05:59:15');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers_addresses`
--

CREATE TABLE `suppliers_addresses` (
  `bid` bigint(20) UNSIGNED NOT NULL,
  `sid` bigint(20) UNSIGNED DEFAULT NULL,
  `branch` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers_addresses`
--

INSERT INTO `suppliers_addresses` (`bid`, `sid`, `branch`, `created_at`, `updated_at`) VALUES
(1, 1, 'asda', '2025-04-27 10:55:16', '2025-05-04 11:39:48'),
(2, 4, 'Ma-a', '2025-05-04 05:59:15', '2025-05-04 05:59:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rid` bigint(20) UNSIGNED DEFAULT NULL,
  `eid` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `rid`, `eid`) VALUES
(1, 'Test User', '2025-04-27 10:41:18', '$2y$12$TWKTYStcBXYGczcQAPzYzeqTCOgjeoPmJd1pLO1p4953yfC44t2yW', NULL, '2025-04-27 10:41:18', '2025-04-27 10:41:18', 18, NULL),
(4, 'Jara', NULL, '$2y$12$EA1PYB4fenTuq1HNZITaVODkHk1fYgQmulQxQLIsgqB3JOQZktgzW', NULL, '2025-05-01 06:32:59', '2025-05-01 06:32:59', 18, 3),
(5, 'User 2', NULL, '$2y$12$Mzt2avFHz9RIugIKfriKf.6pUzNd1GQ2jDj0k1/ckKwadRn/0Thx2', NULL, '2025-05-01 06:41:09', '2025-05-01 06:41:09', 19, 4),
(6, 'Jay', NULL, '$2y$12$YV1yMA8CnjM.EQdujlD9/.SsKPwIrjUXpBfNptchdkmrHCfYb1F.C', NULL, '2025-05-01 07:37:20', '2025-05-01 07:37:20', 18, 5),
(8, 'Arianne', NULL, '$2y$12$1Vaq6PO/1GrYTGvQTxHrnuf.3os.E43eZcCGM47y0f9jMulhMUHaO', NULL, '2025-05-02 00:43:52', '2025-05-02 00:43:52', 18, 15),
(9, 'AaD', NULL, '$2y$12$bAqjxth0RoMMcbRCq0MqUunYNoLaUSlQgIby/EmYtx2/Xx9DUP6lq', NULL, '2025-05-04 12:52:06', '2025-05-04 12:52:06', 18, 21),
(10, 'OtherRole', NULL, '$2y$12$EaQ.TPwLAgnAQOSIeuZLQOSqMHMInzngxAJ7.TY9nnVMnt9nKrR6u', NULL, '2025-05-04 14:53:27', '2025-05-04 14:53:27', 25, 28),
(11, 'Employee new', NULL, '$2y$12$/bzw1xvw48NWyXRqDVYop./tjk6juVXGh/zfD97XNf1t5t5STd0rC', NULL, '2025-05-05 02:57:11', '2025-05-05 02:57:11', 19, 22);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ptid`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`eid`),
  ADD UNIQUE KEY `employees_email_unique` (`email`),
  ADD UNIQUE KEY `employees_phone_unique` (`phone`),
  ADD KEY `employees_eadid_foreign` (`eadid`);

--
-- Indexes for table `employee_addresses`
--
ALTER TABLE `employee_addresses`
  ADD PRIMARY KEY (`eadid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `products_ptid_foreign` (`ptid`),
  ADD KEY `products_sid_foreign` (`sid`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`STID`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `suppliers_addresses`
--
ALTER TABLE `suppliers_addresses`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `suppliers_addresses_sid_foreign` (`sid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_rid_foreign` (`rid`),
  ADD KEY `users_eid_foreign` (`eid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ptid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `eid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `employee_addresses`
--
ALTER TABLE `employee_addresses`
  MODIFY `eadid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `rid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `STID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `sid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suppliers_addresses`
--
ALTER TABLE `suppliers_addresses`
  MODIFY `bid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_eadid_foreign` FOREIGN KEY (`eadid`) REFERENCES `employee_addresses` (`eadid`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ptid_foreign` FOREIGN KEY (`PTID`) REFERENCES `categories` (`PTID`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_sid_foreign` FOREIGN KEY (`SID`) REFERENCES `suppliers` (`SID`) ON DELETE CASCADE;

--
-- Constraints for table `suppliers_addresses`
--
ALTER TABLE `suppliers_addresses`
  ADD CONSTRAINT `suppliers_addresses_sid_foreign` FOREIGN KEY (`SID`) REFERENCES `suppliers` (`SID`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_eid_foreign` FOREIGN KEY (`eid`) REFERENCES `employees` (`eid`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_rid_foreign` FOREIGN KEY (`rid`) REFERENCES `roles` (`rid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
