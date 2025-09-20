-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2025 at 02:31 AM
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
-- Database: `hokabento`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `company`) VALUES
(1, 'OCBC'),
(2, 'Mandiri'),
(3, 'BCA');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `address`) VALUES
(1, '62902 Gulgowski Turnpike Apt. 876\nGorczanyburgh, MI 32629'),
(2, '635 Gordon Island\nChristiansenshire, AZ 31362'),
(3, '5265 Gabrielle Field Suite 137\nVivienneshire, GA 18358');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `package_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `customer_id`, `product_id`, `package_id`, `quantity`) VALUES
(6, 4, NULL, 3, 1),
(8, 4, 3, NULL, 1),
(9, 4, NULL, 1, 2);

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '2024_10_23_063338_create_products_table', 1),
(3, '2024_10_25_071347_create_payment_table', 1),
(4, '2024_10_25_084151_create_transaction_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `package_price` int(11) NOT NULL,
  `package_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_name`, `package_price`, `package_image`, `created_at`, `updated_at`) VALUES
(1, 'Paket A', 56500, 'imges/products/paketA.png', '2024-10-26 11:49:07', '2024-10-26 11:49:07'),
(2, 'Paket B', 50000, 'imges/products/paket B.png', '2024-10-26 11:49:07', '2024-10-26 11:49:07'),
(3, 'Paket C', 56500, 'imges/products/paketc.png', '2024-10-26 11:49:07', '2024-10-26 11:49:07'),
(4, 'Paket D', 50500, 'imges/products/paketd.png', '2024-10-26 11:49:07', '2024-10-26 11:49:07'),
(5, 'Bento Special 1', 59500, 'imges/products/bento1.png', '2024-10-26 11:49:07', '2024-10-26 11:49:07'),
(6, 'Bento Special 2', 64500, 'imges/products/bento2.png', '2024-10-26 11:49:07', '2024-10-26 11:49:07'),
(7, 'Bento Special 3', 64500, 'imges/products/bento3.png', '2024-10-26 11:49:07', '2024-10-26 11:49:07'),
(8, 'Bento Special 4', 64500, 'imges/products/bento4.png', '2024-10-26 11:49:07', '2024-10-26 11:49:07');

-- --------------------------------------------------------

--
-- Table structure for table `packages_products`
--

CREATE TABLE `packages_products` (
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages_products`
--

INSERT INTO `packages_products` (`package_id`, `product_id`) VALUES
(1, 4),
(1, 8),
(1, 10),
(2, 2),
(2, 9),
(2, 11),
(3, 1),
(3, 10),
(3, 12),
(4, 2),
(4, 5),
(4, 8),
(5, 4),
(5, 6),
(5, 8),
(5, 9),
(5, 10),
(6, 1),
(6, 6),
(6, 9),
(6, 10),
(6, 12),
(7, 2),
(7, 5),
(7, 7),
(7, 8),
(7, 9),
(8, 6),
(8, 9),
(8, 10),
(8, 11),
(8, 12);

-- --------------------------------------------------------

--
-- Table structure for table `packages_promos`
--

CREATE TABLE `packages_promos` (
  `promo_id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages_promos`
--

INSERT INTO `packages_promos` (`promo_id`, `package_id`) VALUES
(1, 3),
(1, 5),
(1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `bank_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_method`, `bank_id`) VALUES
(1, 'Cash', NULL),
(2, 'Online', 1),
(3, 'Online', 2),
(4, 'Online', 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `product_point` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_type`, `product_point`, `product_price`, `product_image`, `created_at`, `updated_at`) VALUES
(1, 'Beef Yakiniku', 'Food', 3, 46500, 'imges/products/beef-yakiniku.png', '2024-10-26 11:49:07', '2024-10-26 11:49:07'),
(2, 'Salad', 'Dessert', 2, 20000, 'imges/products/salad.png', '2024-10-26 11:49:07', '2024-10-26 11:49:07'),
(3, 'Cold Ocha', 'Beverages', 1, 10000, 'imges/products/ocha.png', '2024-10-26 11:49:07', '2024-10-26 11:49:07'),
(4, 'Spicy Chicken Teriyaki', 'Food', 3, 45000, 'imges/products/spicy-chichken.png', '2024-10-26 11:49:07', '2024-10-26 11:49:07'),
(5, 'Fried Chicken', 'Food', 2, 24000, 'imges/products/fried-chichken.png', '2024-10-26 11:49:07', '2024-10-26 11:49:07'),
(6, 'Lemon Tea', 'Beverages', 1, 12000, 'imges/products/lemontea.png', '2024-10-26 11:49:07', '2024-10-26 11:49:07'),
(7, 'Aqua', 'Beverages', 1, 9000, 'imges/products/Aqua.png', '2024-10-26 11:49:07', '2024-10-26 11:49:07'),
(8, 'Shrimp Roll', 'Snack', 1, 10000, 'imges/products/shrimproll.png', '2024-10-26 11:49:07', '2024-10-26 11:49:07'),
(9, 'Takoyaki', 'Snack', 1, 8000, 'imges/products/takoyaki.png', '2024-10-26 11:49:07', '2024-10-26 11:49:07'),
(10, 'Choco Pudding', 'Dessert', 1, 12000, 'imges/products/pudding.png', '2024-10-26 11:49:07', '2024-10-26 11:49:07'),
(11, 'Miso Ramen', 'Food', 3, 42000, 'imges/products/miso-ramen.png', '2024-10-26 11:49:07', '2024-10-26 11:49:07'),
(12, 'Ebi Furai', 'Snack', 2, 20000, 'imges/products/ebifurai.png', '2024-10-26 11:49:07', '2024-10-26 11:49:07');

-- --------------------------------------------------------

--
-- Table structure for table `promos`
--

CREATE TABLE `promos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `discount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promos`
--

INSERT INTO `promos` (`id`, `start_date`, `end_date`, `discount`) VALUES
(1, '2024-10-01', '2024-12-31', 20);

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
('sHQFhDa2fdzFYSZQXGYu3zGrD1aEAqBQLJ9V0GR2', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiczdEbzFHZTlUQXk3QlhjeWFwZDFOczhOcDRJd0RKQzNoMVlqOGF2SCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tZW51Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTt9', 1758327796);

-- --------------------------------------------------------

--
-- Table structure for table `transactiondetails`
--

CREATE TABLE `transactiondetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header_id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `promo_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactiondetails`
--

INSERT INTO `transactiondetails` (`id`, `header_id`, `package_id`, `product_id`, `promo_id`, `quantity`, `price`) VALUES
(1, 1, 2, NULL, NULL, 2, 50000),
(2, 1, 3, NULL, 1, 1, 56500),
(3, 1, NULL, 4, NULL, 1, 45000),
(4, 2, 7, NULL, NULL, 1, 64500),
(5, 2, NULL, 7, NULL, 1, 9000);

-- --------------------------------------------------------

--
-- Table structure for table `transactionheaders`
--

CREATE TABLE `transactionheaders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_date` date NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactionheaders`
--

INSERT INTO `transactionheaders` (`id`, `transaction_date`, `customer_id`, `branch_id`, `payment_id`) VALUES
(1, '2024-10-26', 4, 1, 4),
(2, '2024-10-26', 4, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `member_point` int(11) NOT NULL DEFAULT 0,
  `staff_branch_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone_number`, `role`, `member_point`, `staff_branch_id`) VALUES
(1, 'Admin1', 'admin1@gmail.com', '$2y$12$EGLN.URLAnlQf/RwGtzFGeCUfoXmJA/Pckzww.KrFO7hnjuz9LPcK', NULL, 'Staff', 0, 1),
(2, 'Admin2', 'admin2@gmail.com', '$2y$12$GZ2gt.0plJvA.twUmtvEYuSysioF7t0ZdtkDopNNifsfwHkLPDUZi', NULL, 'Staff', 0, 2),
(3, 'Admin3', 'admin3@gmail.com', '$2y$12$txTkjSnj0NjrcXaGRVdbfeFtwOwXIffB8io0.fd9lxiyeUtD166zG', NULL, 'Staff', 0, 3),
(4, 'kennthandrew18@gmail.com', 'kennthandrew18@gmail.com', '$2y$12$6poaP0X/YxIxQEpE5ChCDOU8w5Fd95IfaaSOa5XOT7JxyjI6DuPHy', NULL, 'customer', 25, NULL),
(5, 'Kenneth Andrew', 'kennethandrew67@yahoo.com', '$2y$12$x1XdIKyJt1tgsjtFVwNEveoJ.9tA/FV29NjDOHq122sTh/BZqLCxq', '085282679305', 'customer', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_customer_id_foreign` (`customer_id`),
  ADD KEY `carts_package_id_foreign` (`package_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages_products`
--
ALTER TABLE `packages_products`
  ADD PRIMARY KEY (`package_id`,`product_id`),
  ADD KEY `packages_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `packages_promos`
--
ALTER TABLE `packages_promos`
  ADD PRIMARY KEY (`promo_id`,`package_id`),
  ADD KEY `packages_promos_package_id_foreign` (`package_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_bank_id_foreign` (`bank_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promos`
--
ALTER TABLE `promos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transactiondetails`
--
ALTER TABLE `transactiondetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactiondetails_header_id_foreign` (`header_id`),
  ADD KEY `transactiondetails_package_id_foreign` (`package_id`),
  ADD KEY `transactiondetails_product_id_foreign` (`product_id`),
  ADD KEY `transactiondetails_promo_id_foreign` (`promo_id`);

--
-- Indexes for table `transactionheaders`
--
ALTER TABLE `transactionheaders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactionheaders_customer_id_foreign` (`customer_id`),
  ADD KEY `transactionheaders_branch_id_foreign` (`branch_id`),
  ADD KEY `transactionheaders_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_staff_branch_id_foreign` (`staff_branch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `promos`
--
ALTER TABLE `promos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactiondetails`
--
ALTER TABLE `transactiondetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transactionheaders`
--
ALTER TABLE `transactionheaders`
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
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `carts_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`),
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `packages_products`
--
ALTER TABLE `packages_products`
  ADD CONSTRAINT `packages_products_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`),
  ADD CONSTRAINT `packages_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `packages_promos`
--
ALTER TABLE `packages_promos`
  ADD CONSTRAINT `packages_promos_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`),
  ADD CONSTRAINT `packages_promos_promo_id_foreign` FOREIGN KEY (`promo_id`) REFERENCES `promos` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`);

--
-- Constraints for table `transactiondetails`
--
ALTER TABLE `transactiondetails`
  ADD CONSTRAINT `transactiondetails_header_id_foreign` FOREIGN KEY (`header_id`) REFERENCES `transactionheaders` (`id`),
  ADD CONSTRAINT `transactiondetails_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`),
  ADD CONSTRAINT `transactiondetails_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `transactiondetails_promo_id_foreign` FOREIGN KEY (`promo_id`) REFERENCES `promos` (`id`);

--
-- Constraints for table `transactionheaders`
--
ALTER TABLE `transactionheaders`
  ADD CONSTRAINT `transactionheaders_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  ADD CONSTRAINT `transactionheaders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `transactionheaders_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_staff_branch_id_foreign` FOREIGN KEY (`staff_branch_id`) REFERENCES `branches` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
