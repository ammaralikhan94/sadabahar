-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2018 at 04:09 PM
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
-- Table structure for table `barrel`
--

CREATE TABLE `barrel` (
  `id` int(11) NOT NULL,
  `barrel_type` varchar(225) NOT NULL,
  `barrel_strength` varchar(255) NOT NULL,
  `barrel_measure` varchar(255) NOT NULL,
  `chemical_name` int(11) NOT NULL,
  `empty_barrel` float NOT NULL,
  `fully_occupied_barrel` float NOT NULL,
  `total_barrel` float NOT NULL,
  `item_purchase_type` varchar(255) NOT NULL,
  `current_volume` float NOT NULL,
  `current_unit` varchar(255) NOT NULL,
  `total_volume` float NOT NULL,
  `remaining_volume` float DEFAULT NULL,
  `purchase_unit` varchar(255) DEFAULT NULL,
  `unit_purchased` varchar(255) DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barrel`
--

INSERT INTO `barrel` (`id`, `barrel_type`, `barrel_strength`, `barrel_measure`, `chemical_name`, `empty_barrel`, `fully_occupied_barrel`, `total_barrel`, `item_purchase_type`, `current_volume`, `current_unit`, `total_volume`, `remaining_volume`, `purchase_unit`, `unit_purchased`, `added_by`, `created_at`, `updated_at`) VALUES
(36, 'Drum', '25', 'kg', 1, 0, 2, 2, 'new', 50, 'kg', 25, -25, 'kg', '50', 1, '2018-05-08 14:05:47', '2018-05-08 14:05:47'),
(37, 'Bottle', '10', 'liter', 2, 0, 1, 1, 'new', 10, 'liter', 10, 0, 'liter', '10', 1, '2018-05-08 14:06:12', '2018-05-08 14:06:12');

-- --------------------------------------------------------

--
-- Table structure for table `chemical`
--

CREATE TABLE `chemical` (
  `id` int(11) NOT NULL,
  `chemical_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chemical`
--

INSERT INTO `chemical` (`id`, `chemical_name`) VALUES
(1, 'sulphur'),
(2, 'Nelson'),
(3, 'sodium');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `cheque_status` varchar(255) DEFAULT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `phone_number`, `address`, `cheque_status`, `payment_mode`, `created_at`, `updated_at`) VALUES
(2, 'jack sparrow', '02225252', 'Malir Cant', NULL, 'credit_limit', '2018-05-08 07:59:29', '2018-05-08 07:59:29');

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

--
-- Dumping data for table `customer_amount_limit`
--

INSERT INTO `customer_amount_limit` (`id`, `customer_id`, `customer_amount_limit`, `created_at`, `updated_at`) VALUES
(1, 1, 10000, '2018-05-04 11:26:52', '2018-05-04 11:26:52'),
(2, 2, 25000, '2018-05-08 07:59:29', '2018-05-08 07:59:29');

-- --------------------------------------------------------

--
-- Table structure for table `customer_cheque_limit`
--

CREATE TABLE `customer_cheque_limit` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `cheque_date_limit` varchar(255) DEFAULT NULL,
  `cheque_date_amount` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_cheque_limit`
--

INSERT INTO `customer_cheque_limit` (`id`, `customer_id`, `cheque_date_limit`, `cheque_date_amount`, `created_at`, `updated_at`) VALUES
(1, 1, '10', '20000', '2018-05-04 11:26:52', '2018-05-04 11:26:52'),
(2, 2, '20', '25000', '2018-05-08 07:59:29', '2018-05-08 07:59:29');

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
  `chemical_name` varchar(255) NOT NULL,
  `chemical_amount` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `cash_recieved` int(11) DEFAULT NULL,
  `supplier` int(11) NOT NULL,
  `limit_amount` int(11) DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `cheque_number` varchar(255) DEFAULT NULL,
  `cheque_amount` int(11) DEFAULT NULL,
  `cheque_image` varchar(255) DEFAULT NULL,
  `limit_cheque_date` varchar(255) DEFAULT NULL,
  `payment_cash` int(11) DEFAULT NULL,
  `payment_credit` int(11) DEFAULT NULL,
  `payment_cheque` int(11) DEFAULT NULL,
  `payment_status` varchar(255) NOT NULL,
  `purchase_amount` int(11) DEFAULT NULL,
  `due_date` varchar(255) DEFAULT NULL,
  `due_amount` int(11) DEFAULT NULL,
  `purchasing_type` varchar(255) NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `purchase_unit` varchar(255) DEFAULT NULL,
  `unit_purchased` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `item_name`, `dop`, `chemical_name`, `chemical_amount`, `quantity`, `total_amount`, `cash_recieved`, `supplier`, `limit_amount`, `added_by`, `cheque_number`, `cheque_amount`, `cheque_image`, `limit_cheque_date`, `payment_cash`, `payment_credit`, `payment_cheque`, `payment_status`, `purchase_amount`, `due_date`, `due_amount`, `purchasing_type`, `total_quantity`, `purchase_unit`, `unit_purchased`, `created_at`, `updated_at`) VALUES
(7, 'Drum', '2018-05-08', '1', 25000, 2, 50000, 25000, 41, 25000, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'cleared', NULL, NULL, NULL, 'kg', 50, 'kg', '50', '2018-05-08 14:05:47', '2018-05-08 14:05:47'),
(8, 'Bottle', '2018-05-08', '2', 25000, 1, 25000, 25000, 41, 0, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'cleared', NULL, NULL, NULL, 'liter', 10, 'liter', '10', '2018-05-08 14:06:12', '2018-05-08 14:06:12');

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
(6, 'Drum', '25', 'kg', '2018-04-27 13:25:45', '2018-04-27 13:25:45'),
(7, 'Bottle', '10', 'liter', '2018-04-27 13:25:55', '2018-04-27 13:25:55'),
(8, 'cotton', '18', 'quantity', '2018-04-28 07:40:56', '2018-04-28 07:40:56'),
(10, 'Drum', '25', 'liter', '2018-05-08 14:04:55', '2018-05-08 14:04:55');

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
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `notify_title` varchar(255) NOT NULL,
  `notify_redirect` varchar(255) NOT NULL,
  `notify_role` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `chemical_name` varchar(255) NOT NULL,
  `chemical_available_quantity` varchar(255) NOT NULL,
  `chemical_barrel` varchar(255) NOT NULL,
  `current_volume` varchar(255) DEFAULT NULL,
  `sale_unit` varchar(255) DEFAULT NULL,
  `dop` varchar(255) DEFAULT NULL,
  `customer` varchar(255) DEFAULT NULL,
  `limit_amount` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `cash_recieved` varchar(255) DEFAULT NULL,
  `cheque_number` varchar(255) DEFAULT NULL,
  `cheque_amount` varchar(255) DEFAULT NULL,
  `cheque_image` varchar(255) DEFAULT NULL,
  `limit_cheque_date` varchar(255) DEFAULT NULL,
  `payment_cash` varchar(255) DEFAULT NULL,
  `payment_credit` int(11) DEFAULT NULL,
  `payment_cheque` int(11) DEFAULT NULL,
  `barrel_measure` varchar(255) NOT NULL,
  `total_barrel` varchar(255) NOT NULL,
  `sale_price` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `chemical_name`, `chemical_available_quantity`, `chemical_barrel`, `current_volume`, `sale_unit`, `dop`, `customer`, `limit_amount`, `added_by`, `cash_recieved`, `cheque_number`, `cheque_amount`, `cheque_image`, `limit_cheque_date`, `payment_cash`, `payment_credit`, `payment_cheque`, `barrel_measure`, `total_barrel`, `sale_price`, `created_at`, `updated_at`) VALUES
(174, '1', '85', 'Drum,Bottle', '75,10', '1,1', '2018-05-08', '2', '25000', '1', '', '', '', '', '', '0', 1, 0, 'kg,liter', '3,1', '22,22', '2018-05-08 14:00:37', '2018-05-08 14:00:37'),
(175, '1', '85', 'Drum,Bottle', '75,10', '1,1', '2018-05-08', '2', '25000', '1', '', '', '', '', '', '0', 1, 0, 'kg,liter', '3,1', '22,22', '2018-05-08 14:01:09', '2018-05-08 14:01:09');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `cheque_status` varchar(255) DEFAULT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `phone_number`, `address`, `cheque_status`, `payment_mode`, `created_at`, `updated_at`) VALUES
(41, 'Pepsi', '02125252856', 'nazimabad # 2', NULL, 'credit_limit', '2018-05-03 08:44:58', '2018-05-03 08:44:58');

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
(15, 41, 25000, '2018-05-03 08:44:58', '2018-05-03 08:44:58');

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
(24, 41, '25', 25000, '2018-05-03 08:44:58', '2018-05-03 08:44:58');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_payment`
--

CREATE TABLE `supplier_payment` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `due_date` varchar(255) DEFAULT NULL,
  `due_amount` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_payment_amounts`
--

CREATE TABLE `supplier_payment_amounts` (
  `id` int(11) NOT NULL,
  `chemical_id` int(11) NOT NULL,
  `chemical_unit` int(11) NOT NULL,
  `credit_amount` int(11) DEFAULT NULL,
  `return_credit_date` varchar(255) DEFAULT NULL,
  `cheque_due_date` int(11) DEFAULT NULL,
  `cheque_due_amount` int(11) DEFAULT NULL,
  `credit_limit` int(11) DEFAULT NULL,
  `post_cheque` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated-by` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'admin', 'ammarkhan94.ak@gmail.com', '$2y$10$/EsUzRn5r3ExIPUENuCzDuYUb9WQlGhu1FydCaNLghi4wx2A7lRLe', 1, '03313960846', 'Nazimabad', '', '1EfZF0JO6uGDmS2V4HnbUOQWaFsOjVG2hSSaM7RPW6q6RuyKKiPDyvTqnbOH', '2018-04-17 07:29:23', '2018-04-17 07:29:23'),
(6, 'jack sparrow', 'jack_sparrow@gmail.com', '$2y$10$YzIobXNy6LuU1kemqU.xPuKcdP3innnQqnX6pHaIKXLCYB8Ar5CqG', 2, '0012454214', 'new york', '2018-04-17', NULL, '2018-04-17 11:10:18', '2018-04-24 08:59:47'),
(7, 'wennie', 'wennie@minibig.com', '$2y$10$mTzJuRiqYwlWv38fTLOrHuUrRU93RWwxccg0DxBxy5rzIFJnFgLkq', 4, '002125412415', 'Malir Cant', '2018-04-26', 'Ad6O7a4PmrIYi1xTQiOR1PbHrFx0pb469jAmSEJ2FisOVeztpvrexRN1q2fv', '2018-04-24 09:07:01', '2018-04-24 09:07:32'),
(8, 'Marny Cunningham', 'vyju@mailinator.net', '$2y$10$5U48NYjUAg4hi1p8P6o4YeX4neON8Kp.6OpdRW.9vrNbn9Gve5gVu', 2, '453', 'Sint maxime assumenda eu et ut quia labore sapiente reiciendis eius laboris accusantium qui quis neque', '1982-02-07', NULL, '2018-04-24 12:54:31', '2018-04-24 12:54:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barrel`
--
ALTER TABLE `barrel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chemical`
--
ALTER TABLE `chemical`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
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
-- Indexes for table `supplier_payment_amounts`
--
ALTER TABLE `supplier_payment_amounts`
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
-- AUTO_INCREMENT for table `barrel`
--
ALTER TABLE `barrel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `chemical`
--
ALTER TABLE `chemical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer_amount_limit`
--
ALTER TABLE `customer_amount_limit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer_cheque_limit`
--
ALTER TABLE `customer_cheque_limit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `item_purchase_type`
--
ALTER TABLE `item_purchase_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `supplier_amount_limit`
--
ALTER TABLE `supplier_amount_limit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `supplier_cheques`
--
ALTER TABLE `supplier_cheques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `supplier_payment`
--
ALTER TABLE `supplier_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier_payment_amounts`
--
ALTER TABLE `supplier_payment_amounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
