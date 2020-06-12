-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2020 at 08:53 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imagery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_otp` varchar(255) NOT NULL,
  `admin_sts` int(11) NOT NULL,
  `admin_img` text NOT NULL,
  `admin_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_otp`, `admin_sts`, `admin_img`, `admin_timestamp`) VALUES
(53, 'marsad', 'abc@abc.coma', 'abc', '455306', 0, '', '2020-05-31 23:20:08'),
(55, 'abcdef', 'abc@abc.com', 'abc', '571768', 0, '14876225915edae9161ad25.jpg', '2020-05-31 23:20:28'),
(74, '74', 'marsadakbar1@gmail.coma', 'abc', 'ad61ab143223efbc24c7d2583be69251', 1, '', '2020-06-01 14:09:49'),
(75, 'idrees mirza', 'idressmirza1122@gmail.com', 'abc', 'd09bf41544a3365a46c9077ebb5e35c3', 0, '', '2020-06-01 15:20:27');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_sts` varchar(255) NOT NULL,
  `brand_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_sts`, `brand_timestamp`) VALUES
(1, 'apple', '1', '2020-06-06 00:50:56'),
(2, 'logos', '1', '2020-06-06 00:51:24'),
(3, 'kids', '0', '2020-06-06 00:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(255) NOT NULL,
  `cate_sts` varchar(255) NOT NULL,
  `cate_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cate_id`, `cate_name`, `cate_sts`, `cate_timestamp`) VALUES
(1, 'nature', '1', '2020-06-06 00:48:57'),
(2, 'travel', '1', '2020-06-06 00:49:02'),
(3, 'portrait', '1', '2020-06-06 00:49:07'),
(4, 'art', '1', '2020-06-06 00:49:13'),
(5, 'sun rise', '1', '2020-06-06 00:50:40');

-- --------------------------------------------------------

--
-- Table structure for table `contributors`
--

CREATE TABLE `contributors` (
  `contr_id` int(11) NOT NULL,
  `contr_name` varchar(255) NOT NULL,
  `contr_email` varchar(255) NOT NULL,
  `contr_pass` varchar(255) NOT NULL,
  `contr_otp` varchar(255) NOT NULL,
  `contr_img` text NOT NULL,
  `contr_country` text NOT NULL,
  `contr_age` text NOT NULL,
  `contr_desc` text NOT NULL,
  `contr_sts` int(11) NOT NULL,
  `contr_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contributors`
--

INSERT INTO `contributors` (`contr_id`, `contr_name`, `contr_email`, `contr_pass`, `contr_otp`, `contr_img`, `contr_country`, `contr_age`, `contr_desc`, `contr_sts`, `contr_timestamp`) VALUES
(1, 'idrees', 'abc@gmail.com', 'abc', '877300', '608251585edb7e0fe9824.jpg', '', '', '', 1, '2020-05-31 20:31:26'),
(3, 'abc', 'abc@abc.com', 'abc', '143113', '608251585edb7e0fe9824.jpg', 'Pakistan', '1200', 'kfj vbnkjafn', 1, '2020-05-31 20:54:33'),
(4, 'idrees mirza', 'idressmirza1122@gmail.com', 'abc', '935562', '', '', '', '', 0, '2020-06-01 15:19:41'),
(5, 'Check', 'marsadakbar1@gmail.com', 'abc', 'e4da3b7fbbce2345d7772b0674a318d5', '16528742965ed5a57672c1a.jpg', 'Pakistan', '10', 'abc', 1, '2020-06-02 00:10:23'),
(7, 'idrees mirza', 'abc@abc.com1', 'abc', '', '', '', '', '', 1, '2020-06-06 00:30:50'),
(8, 'idrees mirza', 'abc@abc.com2', 'abc', '', '', '', '', '', 1, '2020-06-06 00:30:58'),
(9, 'marsad', 'abc@abc.com4', 'abc', '', '', '', '', '', 1, '2020-06-06 00:36:45'),
(10, 'marsad', 'abc@abc.com8', 'abc', 'd3d9446802a44259755d38e6d163e820', '', '', '', '', 1, '2020-06-06 00:47:30');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `img_id` int(11) NOT NULL,
  `img_title` varchar(255) NOT NULL,
  `img_description` varchar(255) NOT NULL,
  `img_price` varchar(255) NOT NULL,
  `cate_id` varchar(255) NOT NULL,
  `brand_id` varchar(255) NOT NULL,
  `img_sts` varchar(255) NOT NULL,
  `img_file` text NOT NULL,
  `admin_id` varchar(255) NOT NULL,
  `contr_id` varchar(255) NOT NULL,
  `img_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`img_id`, `img_title`, `img_description`, `img_price`, `cate_id`, `brand_id`, `img_sts`, `img_file`, `admin_id`, `contr_id`, `img_timestamp`) VALUES
(6, 'nature', 'abc', '10', '1', '2', '1', '9597396795edb91cbcb887.jpg', '55', '5', '2020-06-06 10:45:23'),
(8, 'nature', 'rdyfgh', '10', '1', '1', '1', '15759228855ee228e29849e.JPG', '55', '5', '2020-06-06 11:09:04'),
(15, 'nature', 'abc', '120', '2', '2', '1', '9410612985ee225d1d82a8.jpg', '55', '5', '2020-06-11 12:23:41');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_sts` int(11) NOT NULL,
  `user_order` int(11) NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_sts`, `user_order`, `order_time`) VALUES
(1, 2, 10, '2020-06-11 22:55:03'),
(2, 2, 10, '2020-06-11 22:55:03'),
(3, 2, 11, '2020-06-12 18:18:29'),
(4, 2, 12, '2020-06-12 18:19:36'),
(5, 2, 13, '2020-06-12 18:25:14'),
(6, 2, 14, '2020-06-12 18:26:19'),
(7, 2, 15, '2020-06-12 18:35:25'),
(8, 2, 16, '2020-06-12 18:36:28'),
(9, 2, 17, '2020-06-12 18:37:22'),
(10, 2, 18, '2020-06-12 18:40:47');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `img_id` int(11) NOT NULL,
  `img_price` double NOT NULL,
  `order_detail_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `order_id`, `img_id`, `img_price`, `order_detail_time`) VALUES
(1, 4, 6, 10, '2020-06-12 18:19:36'),
(2, 4, 15, 120, '2020-06-12 18:19:36'),
(3, 5, 6, 10, '2020-06-12 18:25:14'),
(4, 5, 15, 120, '2020-06-12 18:25:14'),
(5, 6, 6, 10, '2020-06-12 18:26:19'),
(6, 6, 15, 120, '2020-06-12 18:26:19'),
(7, 7, 6, 10, '2020-06-12 18:35:25'),
(8, 7, 15, 120, '2020-06-12 18:35:25'),
(9, 7, 8, 10, '2020-06-12 18:35:25'),
(10, 8, 6, 10, '2020-06-12 18:36:28'),
(11, 8, 15, 120, '2020-06-12 18:36:28'),
(12, 8, 8, 10, '2020-06-12 18:36:28'),
(13, 9, 6, 10, '2020-06-12 18:37:22'),
(14, 9, 15, 120, '2020-06-12 18:37:22'),
(15, 9, 8, 10, '2020-06-12 18:37:22'),
(16, 10, 6, 10, '2020-06-12 18:40:47'),
(17, 10, 15, 120, '2020-06-12 18:40:47'),
(18, 10, 8, 10, '2020-06-12 18:40:47');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `item_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` float(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active | 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `status`) VALUES
(1, 'Abc', '9410612985ee225d1d82a8.jpg', 5.00, 1),
(2, 'Abc', '9410612985ee225d1d82a8.jpg', 20.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_city` text NOT NULL,
  `user_state` text NOT NULL,
  `user_country` text NOT NULL,
  `user_address` text NOT NULL,
  `order_id` text NOT NULL,
  `order_sts` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `user_city`, `user_state`, `user_country`, `user_address`, `order_id`, `order_sts`) VALUES
(9, 'admin', 'abc@abc', 'gujranwala', 'punjab', 'pakisatn', 'cgvjh', '', ''),
(10, 'admin', 'abc@abc.ocm', 'gujranwala', 'punjab', 'pakisatn', 'xcgjvhk', '', ''),
(11, 'admin', 'marsadakbar1@gmail.com', 'gujranwala', 'punjab', 'pakisatn', 'abc', '', ''),
(12, 'admin', 'superadmin@gmail.com', 'gujranwala', 'punjab', 'pakisatn', 'dryfguh', '', ''),
(13, 'new', 'new@an', 'abc', 'hkj', 'yghk', 'ikjb', '', ''),
(14, 'admin', 'new@anaaa', 'ucgvjh', 'ujvhb', 'ucvjh', 'cvjh', '', ''),
(15, 'admin', 'new@an46tyh', 'tfuygh', 'ufth', 'fyufyi', 'iyg', '', ''),
(16, 'admin', 'abc@abcytcuvh', 'utfh', 'uyg ygh', 'i yh', 't ', '', ''),
(17, 'admin', 'abc@abcughjfuygkh', 'ygkh', 'ybh', ' utygjh', 't ygj', '', ''),
(18, 'admin', 'marsadakbar1@gmail.comtufgvjh', 'yg hb', 'yugh', 'tfuygh', 'uyh', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `contributors`
--
ALTER TABLE `contributors`
  ADD PRIMARY KEY (`contr_id`),
  ADD UNIQUE KEY `contr_email` (`contr_email`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contributors`
--
ALTER TABLE `contributors`
  MODIFY `contr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
