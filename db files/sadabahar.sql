-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2018 at 01:46 PM
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
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `dop` varchar(255) NOT NULL,
  `chemical_amount` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `supplier` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `limit_amount` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `cheque_number` varchar(255) DEFAULT NULL,
  `cheque_image` varchar(255) DEFAULT NULL,
  `limit_cheque_date` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) NOT NULL,
  `due_date` varchar(255) DEFAULT NULL,
  `due_amount` int(11) DEFAULT NULL,
  `purchasing_type` varchar(255) NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `item_name`, `dop`, `chemical_amount`, `quantity`, `total_amount`, `supplier`, `payment_mode`, `limit_amount`, `added_by`, `cheque_number`, `cheque_image`, `limit_cheque_date`, `payment_status`, `due_date`, `due_amount`, `purchasing_type`, `total_quantity`, `created_at`, `updated_at`) VALUES
(1, 'drum', '2018-04-23', 50000, 2, 100000, 33, 'cash', 5000, 1, NULL, NULL, NULL, 'cash', NULL, NULL, 'kg', 25, '2018-04-24 08:35:44', '2018-04-24 08:35:44');

-- --------------------------------------------------------

--
-- Table structure for table `item_purchase_type`
--

CREATE TABLE `item_purchase_type` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_type` varchar(255) NOT NULL,
  `item_purchase_type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_purchase_type`
--

INSERT INTO `item_purchase_type` (`id`, `item_name`, `item_type`, `item_purchase_type`, `created_at`, `updated_at`) VALUES
(1, 'drum', '25', 'kg', '2018-04-23 08:37:07', '2018-04-23 08:37:07'),
(2, 'bottle', '10', 'liter', '2018-04-23 08:37:28', '2018-04-23 08:37:28'),
(3, 'caton', '2', 'kg', '2018-04-23 08:38:11', '2018-04-23 08:38:11'),
(4, 'truck', '50', 'kg', '2018-04-23 08:38:27', '2018-04-23 08:38:27');

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
(33, 'Pepsi', '0212526523', 'nazimabad # 2', 'cleared', 'post_dated_cheques', '2018-04-23 12:42:20', '2018-04-23 12:42:20'),
(34, 'Lays', '0212121526', 'Site Industrial area Landhi', 'cleared', 'cash', '2018-04-21 12:12:16', '2018-04-21 12:12:16'),
(35, 'kolson', '02126452185', 'House # 2 nazimabad # 3', 'cleared', 'post_dated_cheques', '2018-04-24 09:12:50', '2018-04-24 09:12:50');

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
(8, 33, 60000, '2018-04-23 12:42:20', '2018-04-23 12:42:20'),
(9, 34, 20000, '2018-04-23 12:08:29', '2018-04-21 11:52:45'),
(10, 35, 50000, '2018-04-24 09:12:51', '2018-04-24 09:12:51');

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
(17, 33, '20', 25000, '2018-04-23 12:42:20', '2018-04-23 12:42:20'),
(18, 34, NULL, 0, '2018-04-21 11:52:45', '2018-04-21 11:52:45'),
(19, 35, '20', 50000, '2018-04-24 09:12:50', '2018-04-24 09:12:50');

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
(30, 34, '2018-04-30', 50000, 'due', '2018-04-21 11:52:45', '2018-04-21 11:52:45'),
(31, 35, NULL, 0, 'cleared', '2018-04-24 09:08:09', '2018-04-24 09:08:09');

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
(1, 'admin', 'ammarkhan94.ak@gmail.com', '$2y$10$/EsUzRn5r3ExIPUENuCzDuYUb9WQlGhu1FydCaNLghi4wx2A7lRLe', 1, '03313960846', 'Nazimabad', '', 'KhPaY71THCdQ5PrRQhc9BFdfFZn208tS4VTBWbCITlXLJ28Zl6nEoatcBxW4', '2018-04-17 07:29:23', '2018-04-17 07:29:23'),
(6, 'jack sparrow', 'jack_sparrow@gmail.com', '$2y$10$YzIobXNy6LuU1kemqU.xPuKcdP3innnQqnX6pHaIKXLCYB8Ar5CqG', 2, '0012454214', 'new york', '2018-04-17', NULL, '2018-04-17 11:10:18', '2018-04-24 08:59:47'),
(7, 'wennie', 'wennie@minibig.com', '$2y$10$mTzJuRiqYwlWv38fTLOrHuUrRU93RWwxccg0DxBxy5rzIFJnFgLkq', 4, '002125412415', 'Malir Cant', '2018-04-26', 'Ad6O7a4PmrIYi1xTQiOR1PbHrFx0pb469jAmSEJ2FisOVeztpvrexRN1q2fv', '2018-04-24 09:07:01', '2018-04-24 09:07:32');

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
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_purchase_type`
--
ALTER TABLE `item_purchase_type`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_amount_limit`
--
ALTER TABLE `customer_amount_limit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_cheque_limit`
--
ALTER TABLE `customer_cheque_limit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_payment_status`
--
ALTER TABLE `customer_payment_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `item_purchase_type`
--
ALTER TABLE `item_purchase_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `supplier_amount_limit`
--
ALTER TABLE `supplier_amount_limit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `supplier_cheques`
--
ALTER TABLE `supplier_cheques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `supplier_payment`
--
ALTER TABLE `supplier_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
