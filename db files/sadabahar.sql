-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2018 at 05:21 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sadabahar`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `payment_mode` varchar(255) DEFAULT NULL,
  `cheque_status` varchar(255) DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT '5',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_amount_limit`
--

CREATE TABLE `customer_amount_limit` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_amount_limit` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_cheque_limit`
--

CREATE TABLE `customer_cheque_limit` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `cheque_date_limit` varchar(255) DEFAULT NULL,
  `cheque_date_amount` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_order` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_payment_status`
--

CREATE TABLE `customer_payment_status` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `due_date` varchar(255) DEFAULT NULL,
  `due_amount` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `roll_name` varchar(255) NOT NULL,
  `roll_created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `roll_name`, `roll_created_by`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 1, '2018-04-17 08:34:42', '0000-00-00 00:00:00'),
(2, 'Manager', 1, '2018-04-17 11:15:20', '0000-00-00 00:00:00'),
(3, 'Assistant Manager ', 1, '2018-04-17 08:35:23', '0000-00-00 00:00:00'),
(4, 'Cashier', 1, '2018-04-17 08:36:03', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `cheque_status` varchar(255) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `phone_number`, `address`, `cheque_status`, `payment_mode`, `created_at`, `updated_at`) VALUES
(33, 'Pepsi', '0212526523', 'nazimabad # 2', 'cleared', 'credit_limit', '2018-04-21 11:52:14', '2018-04-21 11:52:14'),
(34, 'Lays', '0212121526', 'Site Industrial area Landhi', 'cleared', 'cash', '2018-04-21 12:12:16', '2018-04-21 12:12:16');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_amount_limit`
--

CREATE TABLE `supplier_amount_limit` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `supplier_amount_limit` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_amount_limit`
--

INSERT INTO `supplier_amount_limit` (`id`, `supplier_id`, `supplier_amount_limit`, `created_at`, `updated_at`) VALUES
(8, 33, 60000, '2018-04-21 11:52:14', '2018-04-21 11:52:14'),
(9, 34, 60000, '2018-04-21 11:52:45', '2018-04-21 11:52:45');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_cheques`
--

CREATE TABLE `supplier_cheques` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `cheque_date_limit` varchar(255) DEFAULT NULL,
  `cheque_amount_limit` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_cheques`
--

INSERT INTO `supplier_cheques` (`id`, `supplier_id`, `cheque_date_limit`, `cheque_amount_limit`, `created_at`, `updated_at`) VALUES
(17, 33, NULL, 0, '2018-04-21 11:52:14', '2018-04-21 11:52:14'),
(18, 34, NULL, 0, '2018-04-21 11:52:45', '2018-04-21 11:52:45');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_payment`
--

CREATE TABLE `supplier_payment` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `due_date` varchar(255) DEFAULT NULL,
  `due_amount` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_payment`
--

INSERT INTO `supplier_payment` (`id`, `supplier_id`, `due_date`, `due_amount`, `status`, `created_at`, `updated_at`) VALUES
(29, 33, NULL, 0, 'cleared', '2018-04-21 11:52:14', '2018-04-21 11:52:14'),
(30, 34, '2018-04-30', 50000, 'due', '2018-04-21 11:52:45', '2018-04-21 11:52:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `joining_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `phone_number`, `address`, `joining_date`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'ammarkhan94.ak@gmail.com', '$2y$10$/EsUzRn5r3ExIPUENuCzDuYUb9WQlGhu1FydCaNLghi4wx2A7lRLe', 1, '03313960846', 'Nazimabad', '', 'bG6A13T4ilsdg7zc9jOyzB6MJuR1jdzNUNSHe89Nu1drzvDVDYZSrAVLSSGC', '2018-04-17 07:29:23', '2018-04-17 07:29:23'),
(6, 'Mujtaba', 'mujtaba@gmail.com', '$2y$10$YzIobXNy6LuU1kemqU.xPuKcdP3innnQqnX6pHaIKXLCYB8Ar5CqG', 2, '03313211236', 'Malir Cant', '2018-04-17', NULL, '2018-04-17 11:10:18', '2018-04-17 11:57:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_amount_limit`
--
ALTER TABLE `customer_amount_limit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_cheque_limit`
--
ALTER TABLE `customer_cheque_limit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_payment_status`
--
ALTER TABLE `customer_payment_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_amount_limit`
--
ALTER TABLE `supplier_amount_limit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_cheques`
--
ALTER TABLE `supplier_cheques`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_payment`
--
ALTER TABLE `supplier_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `customer_amount_limit`
--
ALTER TABLE `customer_amount_limit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customer_cheque_limit`
--
ALTER TABLE `customer_cheque_limit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_payment_status`
--
ALTER TABLE `customer_payment_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `supplier_amount_limit`
--
ALTER TABLE `supplier_amount_limit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `supplier_cheques`
--
ALTER TABLE `supplier_cheques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `supplier_payment`
--
ALTER TABLE `supplier_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
