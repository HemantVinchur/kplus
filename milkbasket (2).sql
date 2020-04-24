-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2020 at 06:16 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `milkbasket`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `house_no` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `house_no`, `area`, `city`, `user_id`) VALUES
(2, '25 ER', 'Scheme no.-51', 'Indore', 13),
(3, '25', 'Sangam Nagar', 'Indore', 13),
(4, '25', 'Sangam Nagar', 'Indore', 13);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `parent_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `meta_data`
--

CREATE TABLE `meta_data` (
  `meta_id` int(11) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meta_data`
--

INSERT INTO `meta_data` (`meta_id`, `meta_title`, `meta_description`, `post_id`, `product_id`) VALUES
(1, 'kndsx', 'sx', 13, 0),
(2, 'NKX', 'SJX', 0, 9),
(3, 'XZ', 'Az', 0, 10),
(4, 'Hemant', 'Vndsj', 14, 0),
(5, 'emjl', 'hzx', 15, 0),
(6, 'vc', 'dfs', 16, 0),
(7, 'nmbj', 'hh', 17, 0),
(8, 'd', 'vfd', 18, 0),
(9, 'SDX', 'ds', 19, 0),
(10, 'SDX', 'nkhes', 20, 0),
(11, 'jknsd', 'kshd', 21, 0),
(12, 'fd', 'fdc', 22, 0),
(13, 'xz', 'x', 23, 0),
(14, 'sxaz', 'zZ', 0, 11),
(15, 'hj', 'vg', 24, 0),
(16, 'bj', 'b', 25, 0),
(17, 'vn', 'tgf', 26, 0),
(18, 'bbnb ', 'hgv', 27, 0),
(19, 'jkdcx', 'iued', 28, 0),
(20, 'hjz', 'bzk', 29, 0),
(21, 'hjz', 'bzk', 30, 0),
(22, 'gfdxac', 'sdc', 0, 12);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dtime` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `contact number` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `post_type` varchar(25) NOT NULL DEFAULT 'post'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `description`, `category_id`, `post_type`) VALUES
(1, 'Post', 'XYZ', 0, 'post'),
(2, 'Maharas', '<p>xyz</p>\n', 0, 'post'),
(24, 'Maharas', '<p>vgh</p>\n', 0, 'post'),
(25, 'Maharas', '<p>vgj</p>\n', 0, 'post'),
(26, 'Maharas', '<p>hjvg</p>\n', 0, 'post'),
(27, 'bmn', '<p>hg</p>\n', 0, 'post'),
(28, 'Maharas', '<p>ghvj</p>\n', 1, 'post'),
(29, 'Maharas', '<p>hxkn</p>\n', 1, 'post'),
(30, 'Maharas', '<p>hxkn</p>\n', 2, 'post');

-- --------------------------------------------------------

--
-- Table structure for table `pricing`
--

CREATE TABLE `pricing` (
  `pricing_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pricing`
--

INSERT INTO `pricing` (`pricing_id`, `item_id`, `type`, `restaurant_id`, `price`) VALUES
(1, 1, '1', 1, '45'),
(2, 13, 'Everyday', 16, '80'),
(3, 15, 'Everyday', 15, '40');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `model_name` varchar(100) NOT NULL,
  `in_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `description`, `category_id`, `model_name`, `in_stock`) VALUES
(3, 'Lassi', 'ABC', 6, '', 0),
(4, 'Dahi', 'ABC', 6, '', 0),
(5, 'Milk', 'XYZ', 6, '', 0),
(7, 'Maharas', '<p>dids</p>\n', 0, 'model', 0),
(8, 'Maharas', '<p>sdnjknlx</p>\n', 0, 'model', 1),
(9, 'Maharas', '<p>dsX</p>\n', 0, 'model', 0),
(10, 'KJSD ', '<p>AZ</p>\n', 0, 'ASX', 1),
(11, 'bhksxa', '<p>hbksxz</p>\n', 0, 'model', 1),
(12, 'Maharas', '<p>vcxz</p>\n', 9, 'model', 0);

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(11) NOT NULL,
  `name` varchar(110) NOT NULL,
  `slug_name` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `icon` text NOT NULL,
  `sort_id` int(11) NOT NULL,
  `dtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `name`, `slug_name`, `parent`, `type`, `icon`, `sort_id`, `dtime`) VALUES
(1, 'web services', 'web-services', 0, 'category', '', 0, '2020-02-22 11:30:07'),
(2, 'mobile development', 'mobile-development', 0, 'category', '', 0, '2020-02-22 11:30:24'),
(6, 'advanced development', 'advanced-development', 0, 'category', '', 0, '2020-02-22 11:31:05'),
(9, 'digital marketing', 'digital-marketing', 0, 'category', '', 0, '2020-02-28 01:11:35'),
(10, 'ds', '', 0, 'category', '', 0, '2020-04-22 03:58:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nice_name` varchar(100) NOT NULL,
  `number` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `permission` varchar(10) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nice_name`, `number`, `email`, `password`, `permission`, `balance`) VALUES
(1, 'harshit mishras', '8349789345', 'harshittmishra@gmail.com', '$2y$10$fGWT7SL/ugA2YIQ3YF5myukpplvCHfUiWVcmKKIAD12edu//eJ9be', 'admin', 0),
(13, 'Hemant Vinchur', '7869044206', 'hemantvinchur96@gmail.com', '$2y$10$PDQlKcPtfN19ZUuhGRxEYe/cvbXhUjD0mu0LrHCW7EBNi/WG4yKV.', 'user', 0),
(14, 'Hemant', '123', 'hemantvinchur96@gmail.com', '$2y$10$O9VO3VlbCjcCRVvFTjT5B.bdfy8hBB4gCwaRllfNBLyxxtEHpZUm.', 'user', 0),
(15, 'Hemant', '123', 'hemantvinchur96@gmail.com', '$2y$10$TzZ8tNT8e2yCQ0isW9jaRu2pwo/SktvWr5P5bT5IuPXLsw.slOham', 'user', 0),
(16, 'Hemant', '123', 'hemantvinchur96@gmail.com', '$2y$10$k/KVNznM5SmYgGWDVCKGteMSoSM4iBh.NSNhW3mo9Wb4lmoYn.Kom', 'user', 0),
(17, 'Hemant Vinchur', '7869044206', 'hemantvinchur96@gmail.com', '$2y$10$jdwgEHwrd7fidWAc0MbnO.D6m.lNPM2Nu.XYI94fyzqPuvIO3BX7.', 'user', 1000),
(18, 'Hemant Vinchur', '9039852594', 'hemantvinchur96@gmail.com', '$2y$10$yWxg4mZ30k074RmrL1MQ5.0ILgN7qWFakA8Fqyag.Jc4wzTfUIDNa', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_token`
--

CREATE TABLE `users_token` (
  `id` bigint(20) NOT NULL,
  `token` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `valid_till` datetime NOT NULL,
  `dtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `users_token`
--

INSERT INTO `users_token` (`id`, `token`, `user_id`, `valid_till`, `dtime`) VALUES
(1, 'ecv3Usr1m0i1V1MAPAL4V1cshlWiRxKBSesd0RgGKS44xtpuVW', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'ouFPVGnqr0MLxnV91aGebndaeuZ1wQIE1aT73LqqeKA7ZAfAB5', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'BQiEfQpQGg6apRXZUEJRbLtnlUJF95aCQ5DGZqMP2rsasl7Wmq', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '6uOSyCxA9bx3ixqXqo7QzI10NsCprUox8tBONJnY9sPWJHhJXh', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'DKwtYBIGYCCW9sytjyhb0ohpwx3VQQcPts7hDjUEzmxq8U10kQ', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'jWfPnopnGvd3KQIDRWRZNNNELyCAE4mB8USi4VKEs8rsq3oZLX', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'OqtKvFbs0zuDwzVqGqt3rdZ0gPEKyT7fmw8rubaVTSGhBbItGF', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'DIHUtty5LV7NzHwaEM9DKwNodZ0N5DhRzqvlWS0ts2LUP3l3vU', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'rAI3ZSyZseg3vDCMcFzgSAOhCo31M0q7b5oxP9nRV0TiA5Goqh', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'WkwnVH2djE9FWaUOkl7pcY9S6nahwByRWF4HXjzOhalsrqrp1f', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'HHbzxmwSN2vz1RR3StjfxkOHxlDBIbJTBX2Rm1CGEhbZbEgKX0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'S3jy0P44o6mPEU1ZUKhsXJAnjIcYnPbividvAafNEPp36LErN7', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'ZP33mKz2OhrSqQh4TCxJDT5GU3T7AnqoJJlNbc2DAQZelsJpqO', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'ZPzhZKVeR79OUW0fWU75a11EsTjvcD3Ohg5ijupPhT5iQ0u0S0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'TlfHbTueWB92LKRWhyVtIMze7QsYISYqqzZ9dUAc7fZz0COeYo', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'biI3Rx6jocReZea1r25ACR9C8p4RtdDHM4HKn8jnA3dbj9OTo4', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'FyFU6KQPIFK18WQGSV4dSCk1tHxoe8fUV3WAE1lFHsypN495Vg', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'oFsku300EdaPn1Y4K0fsG4OlsJMfWtNk3JNd9tHfS4LUS8bBgs', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'WPXsFTz7UvDgGTetPs6d24bM5u2k2YuTAnKe38MCnWact84MmL', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'FWNbYL4ocI2Ds7ieTGPTHrT9jF5IGG5NJ52intEqR0RJBpfNUv', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'm7boMD1t9UZJofugr9iHpOtxMuNGjyO6TCkwZ85Bfjx6jyFurr', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'xtYVnpiLJTHMOXXV4LPPGCYyPvQGQ5p4wESFSuLYOoqt7Wgx2p', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'YWr34WfKHspXgeX876jwfy8JnEvw54DS5lkAB9f9f7ITFTedDz', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'i4kC3v3amo4nbxCbfAeVWSQqxVTK0qmCUMfOScmY3zwvOK26Df', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, '9nugop1zG0oqs9SWAnlqwhSYQMffz1nEKCN6P17cNT0uYdP4ZR', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `meta_data`
--
ALTER TABLE `meta_data`
  ADD PRIMARY KEY (`meta_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `pricing`
--
ALTER TABLE `pricing`
  ADD PRIMARY KEY (`pricing_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_token`
--
ALTER TABLE `users_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `meta_data`
--
ALTER TABLE `meta_data`
  MODIFY `meta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pricing`
--
ALTER TABLE `pricing`
  MODIFY `pricing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users_token`
--
ALTER TABLE `users_token`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
