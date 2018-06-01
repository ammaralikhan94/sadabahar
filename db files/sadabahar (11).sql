-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2018 at 09:44 PM
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
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `bank_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `bank_name`) VALUES
(1, 'Habib Bank'),
(2, 'Al habib bank'),
(3, 'Meezan bank'),
(4, 'faysal Bank'),
(5, 'Silk Bank'),
(6, 'Allied Bank'),
(7, 'Standard chartered Bank'),
(8, 'JS Bank'),
(9, 'Askari Bank'),
(10, 'Alfalah Bank'),
(11, 'Habib Metro Bank'),
(12, 'MCB Bank'),
(13, 'UBL Bank'),
(14, 'Islamic Bank'),
(15, 'Dubai Islamic Bank');

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

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand_name`, `created_at`, `updated_at`) VALUES
(1, 'wiki', '2018-05-23 12:05:37', '2018-05-23 12:05:37'),
(2, 'boom boom', '2018-05-23 12:44:36', '2018-05-23 12:44:36');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `main_category` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category_charter`
--

CREATE TABLE `category_charter` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_charter`
--

INSERT INTO `category_charter` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bond', '2018-06-01 19:03:37', '2018-06-01 19:03:37');

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
(4, 'bond'),
(5, 'Card sheet');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
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

INSERT INTO `customer` (`id`, `name`, `company_name`, `phone_number`, `address`, `cheque_status`, `payment_mode`, `created_at`, `updated_at`) VALUES
(5, 'ammar khan', 'Texbroad', '121211', 'saDSA', NULL, 'credit_limit', '2018-05-31 10:27:42', '2018-05-31 10:10:11');

-- --------------------------------------------------------

--
-- Table structure for table `customer_amount_limit`
--

CREATE TABLE `customer_amount_limit` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_amount_limit` int(11) DEFAULT NULL,
  `credit_date_limit` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_amount_limit`
--

INSERT INTO `customer_amount_limit` (`id`, `customer_id`, `customer_amount_limit`, `credit_date_limit`, `created_at`, `updated_at`) VALUES
(4, 5, 25000, '25', '2018-05-31 10:24:55', '2018-05-31 10:10:11');

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
(4, 5, '25', '25000', '2018-05-31 10:10:11', '2018-05-31 10:10:11');

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
  `invoice_number` varchar(255) DEFAULT NULL,
  `item_code` varchar(255) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `storage_type` varchar(255) DEFAULT NULL,
  `dop` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `kg` varchar(255) DEFAULT NULL,
  `gram` varchar(255) DEFAULT NULL,
  `cash_recieved` int(11) DEFAULT NULL,
  `supplier` int(11) DEFAULT NULL,
  `customer` varchar(255) DEFAULT NULL,
  `limit_amount` int(11) DEFAULT NULL,
  `cheque_number` varchar(255) DEFAULT NULL,
  `cheque_amount` varchar(255) DEFAULT NULL,
  `cheque_image` varchar(255) DEFAULT NULL,
  `limit_cheque_date` varchar(255) DEFAULT NULL,
  `payment_cash` varchar(255) DEFAULT NULL,
  `payment_credit` varchar(255) DEFAULT NULL,
  `payment_cheque` varchar(255) DEFAULT NULL,
  `purchase_amount` int(11) DEFAULT NULL,
  `due_date` varchar(255) DEFAULT NULL,
  `due_amount` int(11) DEFAULT NULL,
  `purchasing_type` varchar(255) DEFAULT NULL,
  `purchase_unit` varchar(255) DEFAULT NULL,
  `unit_purchased` varchar(255) DEFAULT NULL,
  `purchased_gram` varchar(255) DEFAULT NULL,
  `carriage` varchar(255) DEFAULT NULL,
  `net_total` int(11) DEFAULT NULL,
  `amount_credit` int(11) DEFAULT NULL,
  `credit_date_limit` int(11) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `exc_tax` varchar(255) DEFAULT NULL,
  `inc_code` varchar(255) DEFAULT NULL,
  `storeage_quantity` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `invoice_number`, `item_code`, `item_name`, `storage_type`, `dop`, `quantity`, `cost`, `kg`, `gram`, `cash_recieved`, `supplier`, `customer`, `limit_amount`, `cheque_number`, `cheque_amount`, `cheque_image`, `limit_cheque_date`, `payment_cash`, `payment_credit`, `payment_cheque`, `purchase_amount`, `due_date`, `due_amount`, `purchasing_type`, `purchase_unit`, `unit_purchased`, `purchased_gram`, `carriage`, `net_total`, `amount_credit`, `credit_date_limit`, `bank_name`, `created_at`, `updated_at`, `exc_tax`, `inc_code`, `storeage_quantity`) VALUES
(1, NULL, 'b1', 'samad bond', NULL, '02-06-2018', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Kg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-01 19:06:02', '2018-06-01 19:06:02', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_number`
--

CREATE TABLE `invoice_number` (
  `id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_number`
--

INSERT INTO `invoice_number` (`id`, `inventory_id`, `invoice_number`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 3, 3),
(5, 1, 5),
(6, 1, 6),
(7, 2, 6),
(8, 3, 6),
(9, 4, 6),
(10, 5, 6),
(11, 6, 6),
(12, 7, 6),
(13, 8, 6),
(14, 9, 6),
(15, 10, 6),
(16, 11, 6),
(17, 12, 6),
(18, 13, 6),
(19, 14, 6),
(20, 15, 6),
(21, 16, 6),
(22, 17, 6),
(23, 1, 23),
(24, 2, 23),
(25, 3, 23),
(26, 4, 23),
(27, 5, 23);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `item_code` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `purchase_price` varchar(255) NOT NULL,
  `selling_price` varchar(255) NOT NULL,
  `measurment_unit` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `parent_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `supplier` varchar(255) NOT NULL DEFAULT 'sadabahar'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_code`, `item_name`, `item_description`, `brand_name`, `purchase_price`, `selling_price`, `measurment_unit`, `status`, `created_at`, `updated_at`, `parent_id`, `sub_id`, `supplier`) VALUES
(1, 'b1', 'samad bond', 'test bond', 'wiki', '200', '500', 'Kg', '0', '2018-06-01 19:06:02', '2018-06-01 19:06:02', 1, 1, 'sadabahar');

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
(2, 'basket', '2', 'quantity', '2018-05-25 11:20:59', '2018-05-25 11:20:59'),
(3, 'drum', '25', 'kg', '2018-05-26 05:42:55', '2018-05-26 05:42:55');

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

-- --------------------------------------------------------

--
-- Table structure for table `sub_category_charter`
--

CREATE TABLE `sub_category_charter` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category_charter`
--

INSERT INTO `sub_category_charter` (`id`, `parent_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'new bonds', '2018-06-01 19:03:46', '2018-06-01 19:03:46');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
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

INSERT INTO `supplier` (`id`, `name`, `company_name`, `phone_number`, `address`, `cheque_status`, `payment_mode`, `created_at`, `updated_at`) VALUES
(1, 'John martin', 'Pepsi', '42154542', 'saDSA', NULL, 'credit_limit', '2018-05-31 10:11:15', '2018-05-31 10:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_amount_limit`
--

CREATE TABLE `supplier_amount_limit` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `supplier_amount_limit` int(11) NOT NULL,
  `credit_date_limit` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_amount_limit`
--

INSERT INTO `supplier_amount_limit` (`id`, `supplier_id`, `supplier_amount_limit`, `credit_date_limit`, `created_at`, `updated_at`) VALUES
(20, 1, 26000, 26, '2018-05-31 10:11:15', '2018-05-31 10:11:15');

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
(1, 1, '26', 26000, '2018-05-31 10:11:15', '2018-05-31 10:11:15');

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
(1, 'admin', 'ammarkhan94.ak@gmail.com', '$2y$10$/EsUzRn5r3ExIPUENuCzDuYUb9WQlGhu1FydCaNLghi4wx2A7lRLe', 1, '03313960846', 'Nazimabad', '', 'E6Pf623CbBGm9T0vaf2U0aPNZ5IJ1sR5sZeIuPIDAjyYSa2qtu5Ezd7McKzn', '2018-04-17 07:29:23', '2018-04-17 07:29:23'),
(6, 'jack sparrow', 'jack_sparrow@gmail.com', '$2y$10$alUOqRP/kDpvvD.8DkIdx.D99R3IvXAgPkXvggHHfT3QU2ynImWiK', 2, '0012454214', 'new york', '2018-04-17', 'ATmdh3q3216vJpwWk9FRNh56pf8VB4KJ2F9kRNaFL5NIazK7ZPPqvmF2chXR', '2018-04-17 11:10:18', '2018-05-23 05:09:44'),
(7, 'wennie', 'wennie@minibig.com', '$2y$10$mTzJuRiqYwlWv38fTLOrHuUrRU93RWwxccg0DxBxy5rzIFJnFgLkq', 4, '002125412415', 'Malir Cant', '2018-04-26', 'Ad6O7a4PmrIYi1xTQiOR1PbHrFx0pb469jAmSEJ2FisOVeztpvrexRN1q2fv', '2018-04-24 09:07:01', '2018-04-24 09:07:32'),
(8, 'Marny Cunningham', 'vyju@mailinator.net', '$2y$10$5U48NYjUAg4hi1p8P6o4YeX4neON8Kp.6OpdRW.9vrNbn9Gve5gVu', 2, '453', 'Sint maxime assumenda eu et ut quia labore sapiente reiciendis eius laboris accusantium qui quis neque', '1982-02-07', NULL, '2018-04-24 12:54:31', '2018-04-24 12:54:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barrel`
--
ALTER TABLE `barrel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_charter`
--
ALTER TABLE `category_charter`
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
-- Indexes for table `invoice_number`
--
ALTER TABLE `invoice_number`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
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
-- Indexes for table `sub_category_charter`
--
ALTER TABLE `sub_category_charter`
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
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `barrel`
--
ALTER TABLE `barrel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category_charter`
--
ALTER TABLE `category_charter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `chemical`
--
ALTER TABLE `chemical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `customer_amount_limit`
--
ALTER TABLE `customer_amount_limit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `customer_cheque_limit`
--
ALTER TABLE `customer_cheque_limit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `invoice_number`
--
ALTER TABLE `invoice_number`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `item_purchase_type`
--
ALTER TABLE `item_purchase_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sub_category_charter`
--
ALTER TABLE `sub_category_charter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `supplier_amount_limit`
--
ALTER TABLE `supplier_amount_limit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `supplier_cheques`
--
ALTER TABLE `supplier_cheques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
