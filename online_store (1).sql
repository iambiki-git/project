-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2023 at 04:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'chandraman8989@gmail.com', '$2y$10$KW/EoPnizto9xEViYqOF1eiBJW0snDWzFY9DQOmfW4tQxAVrfgMaq');

-- --------------------------------------------------------

--
-- Table structure for table `billing_details`
--

CREATE TABLE `billing_details` (
  `bill_no` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `street_address` varchar(200) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `delivery_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Tokyo'),
(2, 'Barcode'),
(3, 'Gucci'),
(4, 'Levis'),
(5, 'Zara');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `total_products` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(255) NOT NULL,
  `gender` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`, `gender`) VALUES
(1, 'Causal Shirt', 'male'),
(2, 'Formal Shirt', 'male'),
(3, 'Hoodie', 'male'),
(4, 'Jeans Pant', 'male'),
(5, 'T-shirt', 'male'),
(6, 'Crop Top', 'female'),
(7, 'Formal Pant', 'female'),
(8, 'Jacket', 'female'),
(9, 'Tank Top', 'female'),
(10, 'Kurthi', 'female'),
(11, 'TShirt', 'female'),
(12, 'Jeans', 'female'),
(13, 'Cargo', 'male'),
(14, 'Joggers', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_table`
--

CREATE TABLE `contact_us_table` (
  `sn` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `userId` int(11) NOT NULL,
  `ip_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(100) NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `isVerified` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(200) NOT NULL,
  `product_description` text NOT NULL,
  `product_keywords` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`, `gender`) VALUES
(1, 'Crop Top', 'Women crop top available now.', 'crop top women black gray yellow red zara', 6, 5, 'IMG-20230706-WA0098.jpg', 'IMG-20230706-WA0100.jpg', 'IMG-20230706-WA0099.jpg', 2400, '2023-07-19 11:54:28', 'true', 'female'),
(2, 'Crop Top ', 'Women Crop top.', 'crop top women tokyo', 6, 1, 'IMG-20230706-WA0094.jpg', 'IMG-20230706-WA0092.jpg', 'IMG-20230706-WA0093.jpg', 2200, '2023-07-19 11:55:39', 'true', 'female'),
(4, 'Tank Top', 'Women Tank Top', 'tank top women', 9, 3, 'IMG-20230706-WA0007.jpg', 'IMG-20230706-WA0006.jpg', 'IMG-20230706-WA0003.jpg', 1700, '2023-07-19 11:58:58', 'true', 'female'),
(5, 'Tank Top', 'New tank top available.', 'tank top women tokyo pink blue', 9, 1, 'IMG-20230706-WA0004.jpg', 'IMG-20230706-WA0001.jpg', 'IMG-20230706-WA0011.jpg', 1100, '2023-07-19 12:00:49', 'true', 'female'),
(6, 'TShirt', 'Women new Tshirt', 'tshirt women white black levis', 11, 4, 'IMG-20230706-WA0053.jpg', 'IMG-20230706-WA0054.jpg', 'IMG-20230706-WA0055.jpg', 1300, '2023-07-19 12:02:17', 'true', 'female'),
(7, 'Tshirt', 'Women tshirt', 'tshirt women zara', 11, 5, 'IMG-20230706-WA0062.jpg', 'IMG-20230706-WA0058.jpg', 'IMG-20230706-WA0060.jpg', 1200, '2023-07-19 12:03:03', 'true', 'female'),
(8, 'Formal Pant', 'Women formal pant', 'formal pant women barcode', 7, 2, 'IMG-20230706-WA0045.jpg', 'IMG-20230706-WA0042.jpg', 'IMG-20230706-WA0052.jpg', 1800, '2023-07-19 12:05:03', 'true', 'female'),
(9, 'Formal Pant', 'Women formal pant', 'formal pant women tokyo', 7, 1, 'IMG-20230706-WA0050.jpg', 'IMG-20230706-WA0051.jpg', 'IMG-20230706-WA0049.jpg', 1900, '2023-07-19 12:05:53', 'true', 'female'),
(10, 'Jeans Pant', 'Women Jeans', 'jeans women barcode black, gray, blue', 12, 2, 'IMG-20230706-WA0033.jpg', 'IMG-20230706-WA0032.jpg', 'IMG-20230706-WA0034.jpg', 2100, '2023-07-19 12:08:31', 'true', 'female'),
(11, 'Causal Shirt', 'Men causal shirt', 'causal shirt men levis', 1, 4, 'shirt3.webp', 'shirt1.jpg', 'shirt2.jpg', 1100, '2023-07-19 12:09:41', 'true', 'male'),
(12, 'Formal Shirt', 'Men formal shirt', 'formal shirt men zara green blue', 2, 5, 'IMG-20230706-WA0073.jpg', 'IMG-20230706-WA0078.jpg', 'IMG-20230706-WA0079.jpg', 1600, '2023-07-19 12:11:17', 'true', 'male'),
(13, 'Hoodie', 'Men hoodie', 'hoodie men tokyo', 3, 1, 'IMG-20230706-WA0086.jpg', 'IMG-20230706-WA0088.jpg', 'IMG-20230706-WA0089.jpg', 3000, '2023-07-19 12:12:38', 'true', 'male'),
(14, 'Jeans', 'Men Jeans', 'jean men barcode', 4, 2, 'mensjeans-2048px-3861.webp', 'mensjeans-2048px-3809.webp', 'mensjeans-2048px-4026-2x1-1.webp', 2800, '2023-07-19 12:13:50', 'true', 'male'),
(15, 'T-shirt', 'Men tshirt', 'tshirt men black blue white yellow', 5, 4, 'IMG-20230706-WA0065.jpg', 'IMG-20230706-WA0068.jpg', 'IMG-20230706-WA0067.jpg', 1300, '2023-07-19 12:14:59', 'true', 'male'),
(16, 'Cargo pant', 'Men cargo pant', 'cargo pant men zara light color', 13, 5, 'cargo2.webp', 'cargo1.jpg', 'cargo3.jpg', 1900, '2023-07-19 12:16:58', 'true', 'male'),
(17, 'Joggers', 'Men joggers', 'joggers men tokyo', 14, 1, 'joggers1.webp', 'joggers2.jpeg', 'joggers3.jpeg', 1000, '2023-07-19 12:17:46', 'true', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `product_rating`
--

CREATE TABLE `product_rating` (
  `sn` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` float NOT NULL,
  `review` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_rating`
--

INSERT INTO `product_rating` (`sn`, `product_id`, `rating`, `review`, `username`, `date_created`) VALUES
(1, 13, 3, 'nice product', 'biki', '2023-12-08 05:24:59'),
(2, 13, 3, 'nice', 'biki', '2023-12-08 13:18:14');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_address`
--

CREATE TABLE `shipping_address` (
  `sno` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `street_address` varchar(100) NOT NULL,
  `postal_code` int(11) NOT NULL,
  `order_notes` text NOT NULL,
  `phone` varchar(50) NOT NULL,
  `invoice_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `total_products` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(200) NOT NULL,
  `user_mobile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD PRIMARY KEY (`bill_no`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact_us_table`
--
ALTER TABLE `contact_us_table`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_rating`
--
ALTER TABLE `product_rating`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billing_details`
--
ALTER TABLE `billing_details`
  MODIFY `bill_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact_us_table`
--
ALTER TABLE `contact_us_table`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_rating`
--
ALTER TABLE `product_rating`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping_address`
--
ALTER TABLE `shipping_address`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
