-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2020 at 02:10 PM
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
(75, 'idrees mirza', 'idressmirza1122@gmail.com', 'abc', 'd09bf41544a3365a46c9077ebb5e35c3', 0, '', '2020-06-01 15:20:27'),
(76, 'marsad akbar', 'marsadakbar1@gmail.com', 'marsad.0.0', 'fbd7939d674997cdb4692d34de8633c4', 1, '17625094125ee7f2505d550.jpg', '2020-06-15 21:47:34');

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
(1, 'Apple', '1', '2020-06-06 00:50:56'),
(2, 'Logo', '1', '2020-06-06 00:51:24'),
(3, 'New', '1', '2020-06-06 00:51:31'),
(4, 'Abc', '1', '2020-06-20 09:31:46'),
(5, 'abc', '1', '2020-06-20 09:42:27');

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
(4, 'art', '1', '2020-06-06 00:49:13');

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
(3, 'abc', 'abc@abc.com', 'abc', '143113', '18376991915ee7fa7dc7c40.jpg', 'Pakistan', '12000', 'kfj vbnkjafn', 1, '2020-05-31 20:54:33'),
(11, 'marsad akbar', 'abc@abc.com1', 'abc', '6512bd43d9caa6e02c990b0a82652dca', '', '', '', '', 0, '2020-06-15 18:33:25'),
(12, 'marsad akbar', 'abc@abc.comd', 'marsad.0.0', 'c20ad4d76fe97759aa27a0c99bff6710', '', '', '', '', 0, '2020-06-15 18:37:03'),
(13, 'marsad akbar', 'abc@abc.comaaaa', 'abc', 'c51ce410c124a10e0db5e4b97fc2af39', '', '', '', '', 0, '2020-06-15 18:51:05'),
(15, 'marsad akbar', 'abc@abc.comd765', 'marsad.0.0', '9bf31c7ff062936a96d3c8bd1f8f2ff3', '', '', '', '', 0, '2020-06-15 18:56:36'),
(16, 'marsad akbar', 'abc@abc.com4657', 'abc', 'c74d97b01eae257e44aa9d5bade97baf', '', '', '', '', 0, '2020-06-15 18:58:23'),
(18, 'marsad akbar', 'marsadakbar1@gmail.com', 'abc', '6f4922f45568161a8cdf4ad2299f6d23', '6268779505ee807a014dea.jpg', '', '', '', 1, '2020-06-15 23:39:31');

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
(8, 'nature', 'rdyfgh', '10', '1', '1', '1', '15759228855ee228e29849e.JPG', '55', '5', '2020-06-06 11:09:04'),
(15, 'nature', 'abc', '120', '2', '2', '1', '9410612985ee225d1d82a8.jpg', '55', '5', '2020-06-11 12:23:41'),
(21, 'levish', 'kb', '20', '1', '2', '1', '377305625eea04e18df14.jpg', '', '3', '2020-06-17 11:52:00'),
(24, 'new', 'ygkhjn', '10', '1', '1', '1', '18034817735eeb2f3dd452a.jpg', '76', '', '2020-06-18 09:09:17'),
(25, 'levish', 'yfgh', '10', '1', '1', '1', '6480449705eeb2fcf1c1a9.jpeg', '76', '', '2020-06-18 09:11:43'),
(26, 'cup', 'ihbjkn', '10', '3', '2', '1', '2879099705eecb755500e3.jpeg', '', '3', '2020-06-19 13:02:13');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `item_price` float(10,2) NOT NULL,
  `item_price_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `paid_amount` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `paid_amount_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(10, 2, 18, '2020-06-12 18:40:47'),
(11, 2, 21, '2020-06-18 11:55:30'),
(12, 2, 22, '2020-06-18 12:15:32'),
(13, 2, 23, '2020-06-18 12:28:17'),
(14, 2, 24, '2020-06-18 12:29:54'),
(15, 2, 25, '2020-06-18 12:31:06'),
(16, 2, 26, '2020-06-18 12:34:38'),
(17, 2, 27, '2020-06-18 12:37:06'),
(18, 2, 28, '2020-06-18 12:40:29'),
(19, 2, 29, '2020-06-18 12:47:07'),
(20, 2, 30, '2020-06-18 14:55:25'),
(21, 2, 31, '2020-06-18 17:12:01'),
(22, 2, 32, '2020-06-18 17:15:20'),
(23, 2, 0, '2020-06-20 16:54:38'),
(24, 2, 0, '2020-06-20 16:56:41'),
(25, 2, 0, '2020-06-20 17:18:51'),
(26, 2, 0, '2020-06-20 17:43:41'),
(27, 2, 0, '2020-06-20 17:54:49'),
(28, 2, 0, '2020-06-20 17:55:48'),
(29, 2, 0, '2020-06-20 18:26:20'),
(30, 2, 9, '2020-06-20 18:32:25'),
(31, 2, 34, '2020-06-20 18:38:37'),
(32, 2, 9, '2020-06-20 18:48:44'),
(33, 2, 9, '2020-06-20 18:52:38'),
(34, 2, 9, '2020-06-20 18:54:41'),
(35, 2, 9, '2020-06-21 20:55:28'),
(36, 2, 9, '2020-06-21 21:03:30'),
(37, 2, 9, '2020-06-21 21:14:52');

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
(18, 10, 8, 10, '2020-06-12 18:40:47'),
(19, 11, 21, 20, '2020-06-18 11:55:30'),
(20, 12, 21, 20, '2020-06-18 12:15:32'),
(21, 13, 21, 20, '2020-06-18 12:28:17'),
(22, 14, 21, 20, '2020-06-18 12:29:54'),
(23, 15, 21, 20, '2020-06-18 12:31:06'),
(24, 16, 21, 20, '2020-06-18 12:34:38'),
(25, 17, 21, 20, '2020-06-18 12:37:06'),
(26, 18, 21, 20, '2020-06-18 12:40:29'),
(27, 19, 21, 20, '2020-06-18 12:47:07'),
(28, 20, 21, 20, '2020-06-18 14:55:25'),
(29, 21, 21, 20, '2020-06-18 17:12:01'),
(30, 22, 21, 20, '2020-06-18 17:15:20'),
(31, 27, 21, 20, '2020-06-20 17:54:49'),
(32, 27, 26, 10, '2020-06-20 17:54:49'),
(33, 28, 21, 20, '2020-06-20 17:55:48'),
(34, 28, 26, 10, '2020-06-20 17:55:48'),
(35, 29, 21, 20, '2020-06-20 18:26:20'),
(36, 29, 26, 10, '2020-06-20 18:26:20'),
(37, 30, 21, 20, '2020-06-20 18:32:26'),
(38, 30, 26, 10, '2020-06-20 18:32:26'),
(39, 32, 21, 20, '2020-06-20 18:48:44'),
(40, 32, 26, 10, '2020-06-20 18:48:44'),
(41, 33, 21, 20, '2020-06-20 18:52:38'),
(42, 33, 26, 10, '2020-06-20 18:52:38'),
(43, 34, 21, 20, '2020-06-20 18:54:41'),
(44, 34, 26, 10, '2020-06-20 18:54:41'),
(45, 35, 21, 20, '2020-06-21 20:55:28'),
(46, 35, 26, 10, '2020-06-21 20:55:28'),
(47, 36, 21, 20, '2020-06-21 21:03:30'),
(48, 36, 26, 10, '2020-06-21 21:03:30'),
(49, 37, 21, 20, '2020-06-21 21:14:53'),
(50, 37, 26, 10, '2020-06-21 21:14:53');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `order_id`, `txn_id`, `payment_gross`, `currency_code`, `payment_status`) VALUES
(1, 'item_number', 'txn_id', 0.00, 'curre', 'payment_status');

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
-- Table structure for table `promos`
--

CREATE TABLE `promos` (
  `promo_id` int(11) NOT NULL,
  `promo_name` text NOT NULL,
  `promo_date` date NOT NULL,
  `promo_sts` text NOT NULL,
  `promo_type` text NOT NULL,
  `promo_amt` text NOT NULL,
  `promo_valid_amt` text NOT NULL,
  `promo_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promos`
--

INSERT INTO `promos` (`promo_id`, `promo_name`, `promo_date`, `promo_sts`, `promo_type`, `promo_amt`, `promo_valid_amt`, `promo_time`) VALUES
(3, 'covid', '2020-06-26', '1', 'per', '10', '25', '2020-06-21 20:55:05'),
(5, 'newyear', '2020-06-20', '1', 'per', '10', '30', '2020-06-21 20:54:41'),
(6, 'halloween', '2020-06-27', '1', 'fix', '20', '20', '2020-06-21 21:13:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
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

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `user_city`, `user_state`, `user_country`, `user_address`, `order_id`, `order_sts`) VALUES
(9, 'admin', 'abc@abc.com', 'abc', 'gujranwala', 'punjab', 'pakisatn', 'cgvjh', '', ''),
(10, 'admin', 'abc@abc.ocm', '', 'gujranwala', 'punjab', 'pakisatn', 'xcgjvhk', '', ''),
(11, 'admin', 'marsadakbar1@gmail.com', 'ab', 'gujranwala', 'punjab', 'pakisatn', 'abc', '', ''),
(12, 'admin', 'superadmin@gmail.com', '', 'gujranwala', 'punjab', 'pakisatn', 'dryfguh', '', ''),
(13, 'new', 'new@an', '', 'abc', 'hkj', 'yghk', 'ikjb', '', ''),
(14, 'admin', 'new@anaaa', '', 'ucgvjh', 'ujvhb', 'ucvjh', 'cvjh', '', ''),
(15, 'admin', 'new@an46tyh', '', 'tfuygh', 'ufth', 'fyufyi', 'iyg', '', ''),
(16, 'admin', 'abc@abcytcuvh', '', 'utfh', 'uyg ygh', 'i yh', 't ', '', ''),
(17, 'admin', 'abc@abcughjfuygkh', '', 'ygkh', 'ybh', ' utygjh', 't ygj', '', ''),
(18, 'admin', 'marsadakbar1@gmail.comtufgvjh', '', 'yg hb', 'yugh', 'tfuygh', 'uyh', '', ''),
(21, 'new', 'new@new.com', '', 'kmk', 'punjab', 'pakistan', 'akbar marriage hall railway road kamoke', '', ''),
(22, 'admin', 'abc@abc.ocmaaa', '', 'kamoke', 'punjab', 'pakistan', 'akbar marriage hall railway road kamoke', '', ''),
(23, 'ik', 'ik@ik.com', '', 'kamoke', 'punjab', 'pakistan', 'akbar marriage hall railway road kamoke', '', ''),
(24, 'abc', 'k@k', '', 'kamoke', 'punjab', 'pakistan', 'akbar marriage hall railway road kamoke', '', ''),
(25, 'a', 'a@a', '', 'kamoke', 'punjab', 'pakistan', 'akbar marriage hall railway road kamoke', '', ''),
(26, 'admin', 'fdhgv@tfugvj', '', 'kamoke', 'punjab', 'pakistan', 'akbar marriage hall railway road kamoke', '', ''),
(27, 'new', 'tyfgj@fgvjhb', '', 'kamoke', 'punjab', 'pakistan', 'akbar marriage hall railway road kamoke', '', ''),
(28, 'gyh', 'ghj@vhjb', '', 'kamoke', 'punjab', 'pakistan', 'akbar marriage hall railway road kamoke', '', ''),
(29, 'ftgh', 'fgjh@gvhb', '', 'kamoke', 'punjab', 'pakistan', 'akbar marriage hall railway road kamoke', '', ''),
(30, 'chgvjhb', 'hfcgvj@chgvjmb', '', 'kamoke', 'punjab', 'pakistan', 'akbar marriage hall railway road kamoke', '', ''),
(31, 'e5tyg', 'tfgjh@gfvhbmtfugjh', '', 'kamoke', 'punjab', 'pakistan', 'akbar marriage hall railway road kamoke', '', ''),
(32, '6uy', 'tufygj@dhfjvh', '', 'kamoke', 'punjab', 'pakistan', 'akbar marriage hall railway road kamoke', '', ''),
(33, '', '', '', '', '', '', '', '', ''),
(34, 'marsadakbar', 'abc@abc.com1', 'abc', 'kamoke', 'punjab', 'pakistan', 'akbar marriage hall railway road kamoke', '', '');

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
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `promos`
--
ALTER TABLE `promos`
  ADD PRIMARY KEY (`promo_id`);

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contributors`
--
ALTER TABLE `contributors`
  MODIFY `contr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `promos`
--
ALTER TABLE `promos`
  MODIFY `promo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
