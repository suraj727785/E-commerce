-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2020 at 05:50 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easyshops`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mob_no` int(255) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_product_id` int(11) NOT NULL,
  `order_name` varchar(256) NOT NULL,
  `order_rate` int(11) NOT NULL,
  `order_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `checkout_id` int(11) NOT NULL,
  `order_user_id` int(11) NOT NULL,
  `placed_order_id` int(11) NOT NULL,
  `placed_product_id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `full_name` varchar(256) NOT NULL,
  `mob_no` int(255) NOT NULL,
  `order_name` varchar(256) NOT NULL,
  `order_rate` int(11) NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `full_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`checkout_id`, `order_user_id`, `placed_order_id`, `placed_product_id`, `username`, `full_name`, `mob_no`, `order_name`, `order_rate`, `order_quantity`, `order_date`, `full_address`) VALUES
(4, 1, 0, 1, 'isuraj86', 'Suraj Kumar', 2147483647, 'good day', 10, 3, '2020-12-06', 'gaya');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_user_id`) VALUES
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_name` varchar(256) NOT NULL,
  `product_manufacturer` varchar(256) NOT NULL,
  `product_distributor` varchar(256) NOT NULL,
  `product_quantities` int(11) NOT NULL,
  `product_image` varchar(256) NOT NULL,
  `product_purchase_rate` int(11) NOT NULL,
  `net_purchase_rate` float NOT NULL,
  `product_sale_rate` int(11) NOT NULL,
  `product_mrp` int(11) NOT NULL,
  `c_gst` int(11) NOT NULL,
  `s_gst` int(11) NOT NULL,
  `product_mfg` date NOT NULL,
  `product_exp` date NOT NULL,
  `product_barcode` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_category_id`, `product_name`, `product_manufacturer`, `product_distributor`, `product_quantities`, `product_image`, `product_purchase_rate`, `net_purchase_rate`, `product_sale_rate`, `product_mrp`, `c_gst`, `s_gst`, `product_mfg`, `product_exp`, `product_barcode`) VALUES
(1, 1, 'good day', 'britainia', 'prabhu kripa', 106, 'IMG-20180628-WA0008.jpeg', 7, 7.42, 10, 10, 3, 3, '2006-12-20', '2006-12-20', 123456789);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `categories_id` int(11) NOT NULL,
  `categories_title` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`categories_id`, `categories_title`) VALUES
(1, 'Biscuits');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_firstname` varchar(256) NOT NULL,
  `user_lastname` varchar(256) NOT NULL,
  `user_image` varchar(256) NOT NULL,
  `user_role` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `user_mobileno` bigint(255) NOT NULL,
  `user_address` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_password` varchar(256) NOT NULL,
  `user_randSalt` varchar(256) NOT NULL DEFAULT 'ilovemycountry'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_firstname`, `user_lastname`, `user_image`, `user_role`, `username`, `user_mobileno`, `user_address`, `user_email`, `user_password`, `user_randSalt`) VALUES
(1, 'Suraj', 'Kumar', '', 'Admin', 'isuraj86', 9162741700, 'Gaya', 'surajke727785@gmail.com', '$1$nj53t.cT$AUprgpGGT7qYHa.TCm4sx/', 'ilovemycountry'),
(2, 'sdfg', 'gh', '', 'Subscriber', 'sura123', 123456789, 'Patna', 'dfgh@sdfgh.dfghj', 'ilusYA.MG4nBA', 'ilovemycountry');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`checkout_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `checkout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
