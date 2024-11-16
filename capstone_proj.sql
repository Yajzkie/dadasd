-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 16, 2024 at 11:00 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone_proj`
--

-- --------------------------------------------------------

--
-- Table structure for table `agency`
--

CREATE TABLE `agency` (
  `id` bigint UNSIGNED NOT NULL,
  `agency-name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` decimal(10,7) NOT NULL,
  `longitude` decimal(10,7) NOT NULL,
  `municipality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_cots` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size_of_cots` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activity_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observer_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `description`, `latitude`, `longitude`, `municipality`, `created_at`, `updated_at`, `photo`, `number_of_cots`, `size_of_cots`, `activity_type`, `observer_category`) VALUES
(2, 'gdfgd', 'dgdfg', '10.3169459', '124.9976349', 'liloan', '2024-10-26 11:29:47', '2024-10-26 11:29:47', 'photos/B0ImbL8RbfJhFWORhgsDqtqo1cgwTSfCrBZ3a5x5.png', '21-30', NULL, NULL, NULL),
(3, 'vxcvxc', 'dfgdfgnmjlkkj', '10.3378871', '125.0027847', 'liloan', '2024-10-26 11:44:12', '2024-10-26 11:44:12', 'photos/9W7VzSDxQsLPA4nzGBDR0oISuuohwXZXCFIicbSq.png', '1-5', NULL, NULL, NULL),
(4, 'Jehdjs', 'Isisnwhs', '10.3152571', '125.0765991', 'liloan', '2024-10-26 11:50:48', '2024-10-26 11:50:48', 'photos/bDzULeITkp7q7lC4nqnouzk3G3gdOqETKEfCuDFw.jpg', '6-10', NULL, NULL, NULL),
(5, 'sdfsdf', 'fsdfsdf', '10.3902339', '124.8785019', 'liloan', '2024-10-26 13:00:39', '2024-10-26 13:00:39', 'photos/jMmnRJMYQqm6CCnRHmC0JaQ7SkW6Jx42oI6RPSFz.png', '11-20', NULL, NULL, NULL),
(6, 'sdfsdf', 'fsdfsdf', '10.3524100', '124.9413300', 'bontoc', '2024-10-26 13:03:56', '2024-10-26 13:03:56', 'photos/BO7uEMZBuEOQINo4jV3FXWVlkdvBeBxtTOojUkOz.png', '31-50', NULL, NULL, NULL),
(7, 'asdsad', 'fsdfsfsdf', '10.3453175', '125.0103378', 'tomas oppus', '2024-10-28 09:53:52', '2024-10-28 09:53:52', 'photos/1cm4hGFzNTDiqA8XT6hk8I8Sy56pHwNts55pWcfv.png', '11-20', 'medium', 'recreational_diving', 'fisherfolks'),
(8, 'jay sabalo', 'werwewer', '10.3047859', '125.0288773', 'bontoc', '2024-10-28 10:12:51', '2024-10-28 10:12:51', 'photos/PLRt04djKfFXiNSSckBHK9irJNwJKVEnGYqzcbED.png', '11-20', 'large', 'recreational_diving', 'barangay_residents'),
(9, 'Wrbqgrhg', 'Wfwfef', '10.2612086', '125.0288773', 'libagon', '2024-10-28 10:13:10', '2024-10-28 10:13:10', NULL, '1-5', 'small', 'fishing', 'fisherfolks'),
(11, NULL, 'dasda', '10.3017458', '125.0048447', 'liloan', '2024-11-12 07:10:59', '2024-11-12 07:10:59', NULL, '1-5', 'small', 'fishing/namasol', 'fisherfolks'),
(12, NULL, 'sdfsdfsdfsd', '10.1273992', '125.6962967', 'liloan', '2024-11-12 07:13:09', '2024-11-12 07:13:09', NULL, '6-10', 'small', 'fishing/namasol', 'fisherfolks'),
(13, 'jay sasasasas', 'sasdas', '10.2757351', '124.9969482', 'liloan', '2024-11-14 00:18:30', '2024-11-14 00:18:30', NULL, '1-5', 'small', 'spear fishing', 'fisherfolks'),
(14, NULL, 'sdsadas', '10.2885718', '125.0542831', 'sogod', '2024-11-14 06:56:18', '2024-11-14 06:56:18', NULL, '1-5', 'small', 'fishing/namasol', 'fisherfolks'),
(15, NULL, 'dsfsdf', '10.2071510', '125.0127411', 'bontoc', '2024-11-14 06:56:24', '2024-11-14 06:56:24', NULL, '1-5', 'small', 'fishing/namasol', 'fisherfolks'),
(16, NULL, 'Hshehesjs', '10.3463307', '125.0323105', 'libagon', '2024-11-14 07:49:29', '2024-11-14 07:49:29', NULL, '1-5', 'small', 'fishing/namasol', 'fisherfolks'),
(17, NULL, 'Jeysjsydud', '10.2419516', '125.0566864', 'liloan', '2024-11-14 07:51:49', '2024-11-14 07:51:49', NULL, '6-10', 'small', 'fishing/namasol', 'fisherfolks'),
(18, NULL, 'Jsjshs', '10.2554654', '125.0120544', 'libagon', '2024-11-14 08:40:34', '2024-11-14 08:40:34', NULL, '51_or_more', 'small', 'fishing/namasol', 'fisherfolks'),
(19, NULL, 'Yhh', '10.3787521', '124.9832153', 'sogod', '2024-11-14 08:42:20', '2024-11-14 08:42:20', NULL, '20', 'small', 'fishing/namasol', 'fisherfolks'),
(20, NULL, 'Nasdsd', '10.3337567', '124.9728709', 'liloan', '2024-11-14 18:32:56', '2024-11-14 18:32:56', 'photos/U7T3WY87mNIXFzmR4Sp5USTHodazQC1NJlQDFNXz.png', '5', 'small', 'other', 'fisherfolks');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_07_26_161637_create_locations_table', 1),
(7, '2024_07_26_164228_add_photo_to_locations_table', 1),
(8, '2024_08_27_040741_create_roles_table', 1),
(9, '2024_08_27_042142_create_agency_table', 1),
(10, '2024_08_28_165706_add_role_to_users_table', 1),
(13, '2024_10_26_190306_create_user_locations_table', 2),
(14, '2024_10_28_174536_add_additional_fields_to_locations_table', 3),
(15, '2024_11_12_150859_alter_locations_table_allow_null_name', 4),
(16, '2024_11_14_153250_add_municipality_to_locations_table', 5);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2024-10-26 10:14:04', '2024-10-26 10:14:04'),
(2, 'user', '2024-10-26 10:14:04', '2024-10-26 10:14:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`) VALUES
(1, 'Jay sabalo', 'yajzkie@gmail.com', '2024-10-26 10:15:20', '$2y$12$/J7A2zxqRy6TpvL8.0f14Oq.COVmWUsG646Y5RnWm7DVINM7RB15a', 'kBnTTy50BS', NULL, NULL, 1),
(2, 'meryjie meking', 'meryjie@gmail.com', '2024-10-26 10:15:20', '$2y$12$HSpiAIsbcqqHhzRJnjX/POdVQ3DPWLcmKD60Yil.sSnUZcDtOb57G', 'r0fQxPT38P', NULL, NULL, 2),
(3, 'administrator', 'administrator@gmail.com', NULL, '$2y$12$u6LGUvC26evR7TOXqduM.ONmrnnXpn6ROsfy7NRm1uH9iJTAPeGYq', NULL, '2024-10-26 10:29:38', '2024-10-26 10:29:38', 1),
(4, 'user', 'user@gmail.com', NULL, '$2y$12$HYzXYwHcHQEFRn19.FOtvO3G4z5EjP/7z.3tpL3EFYc2a9H6aAaa6', NULL, '2024-10-26 10:31:35', '2024-10-26 10:31:35', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agency`
--
ALTER TABLE `agency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_role_name_unique` (`role_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agency`
--
ALTER TABLE `agency`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
