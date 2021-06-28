-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2021 at 06:17 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffee_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `mobile_number`, `email`, `password`, `status`, `created_datetime`) VALUES
(1, 'Coffee', 'Shop', '9876543210', 'admin@gmail.com', '$2y$10$MYcPJ1ZMO1K.Y19jfo44sOyzGSOXDLfPx5yH/2kPSrSBoXBkxZlVa', 1, '2021-06-27 16:53:39');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `amount` float(65,2) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product`, `amount`, `status`, `created_datetime`) VALUES
(1, 3, 1, 1000.00, 'Processed', '2021-06-28 13:50:10'),
(2, 1, 1, 1000.00, 'Pending', '2021-06-28 15:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` float(65,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `price`, `description`, `image`, `status`, `created_datetime`) VALUES
(1, 'test product', 1000.00, 'test product description', '4c6146584a4bd4c69cefd093abb1fb32.jpg', 1, '2021-06-28 09:07:38'),
(2, 'Test Product 2', 149.00, 'Test Product Description2', 'd4b8f0de884ea310623d5d1df7a49a43.jpg', 1, '2021-06-28 21:34:09');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` float(65,2) NOT NULL,
  `trans_type` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `created_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `amount`, `trans_type`, `status`, `remarks`, `created_datetime`) VALUES
(1, 3, 10.00, 'credit', 1, '', '2021-06-28 08:34:08'),
(2, 3, 10.00, 'credit', 1, '', '2021-06-28 08:34:20'),
(3, 3, 1000.00, 'debit', 1, 'Order Placed', '2021-06-28 13:50:10'),
(4, 1, 1000.00, 'credit', 1, 'Wallet Deposit', '2021-06-28 14:34:51'),
(5, 1, 1000.00, 'credit', 1, 'Wallet Deposit', '2021-06-28 14:35:02'),
(6, 1, 100.00, 'credit', 1, 'Wallet Deposit', '2021-06-28 14:36:49'),
(7, 1, 10.00, 'credit', 1, 'Wallet Deposit', '2021-06-28 14:37:15'),
(8, 1, 1000.00, 'debit', 1, 'Order Placed', '2021-06-28 15:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `balance` float(65,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(1) NOT NULL,
  `created_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `mobile`, `email`, `password`, `remember_token`, `balance`, `status`, `created_datetime`) VALUES
(1, 'Preethi', 'Vijayaragunathan', '9659929960', 'preethi@gmail.com', '$2y$10$6dD3nHWuKxd89c0luFzobeYSTHKLpEjP2O1lZzQMAUfGXZN/Im86K', 'JOtgKixtWvib2kP9OF7wDYrbzsrEa4E7c7LOPLMdUVZDiW5JbOYCsadl7MVl', 1110.00, 1, '2021-06-27 15:37:01'),
(3, 'Jaisan', 'V', '9876543210', 'jaisan45@live.com', '$2y$10$EzwrWJZ40vYBS3n8Ni7tIOqHVzc4EDl3s/cH9O4iOqTRnBpyO4.ia', NULL, 1000.00, 1, '2021-06-28 05:28:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
