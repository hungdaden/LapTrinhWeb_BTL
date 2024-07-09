-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2024 at 07:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(250) NOT NULL,
  `admin_email` text NOT NULL,
  `admin_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(4, 'hungdaden', 'hunghoang00c@gmail.com', '3d204a2499d4b882d7b4d0ac8b4038c2');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_cost` decimal(6,2) NOT NULL,
  `order_status` varchar(100) NOT NULL DEFAULT 'on_hold',
  `user_id` int(11) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_cost`, `order_status`, `user_id`, `user_phone`, `user_city`, `user_address`, `order_date`) VALUES
(26, 27.00, 'Not Paid', 5, 353168393, 'cam pha', 'quang ninh', '2024-07-09 04:06:56');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(6,0) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_quantity`, `user_id`, `order_date`) VALUES
(13, 15, '1', 'Dong phuc Beta', 'xuantung.png', 12, 7, 5, '2024-07-06 17:56:45'),
(14, 16, '1', 'Dong phuc Beta', 'xuantung.png', 12, 6, 5, '2024-07-07 00:50:02'),
(15, 17, '1', 'Dong phuc Beta', 'xuantung.png', 12, 5, 5, '2024-07-07 02:26:07'),
(16, 18, '1', 'Dong phuc Beta', 'xuantung.png', 12, 4, 5, '2024-07-07 02:35:24'),
(17, 19, '1', 'Dong phuc Beta', 'xuantung.png', 12, 1, 5, '2024-07-07 20:39:03'),
(18, 20, '1', 'Dong phuc Beta', 'xuantung.png', 12, 1, 5, '2024-07-08 19:00:30'),
(19, 21, '1', 'Dong phuc Beta', 'xuantung.png', 12, 1, 5, '2024-07-08 19:08:25'),
(20, 22, '1', 'Dong phuc Beta', 'xuantung.png', 12, 1, 5, '2024-07-08 19:10:01'),
(21, 23, '1', 'Dong phuc Beta', 'xuantung.png', 12, 1, 5, '2024-07-08 19:15:40'),
(22, 24, '1', 'Dong phuc Beta', 'xuantung.png', 12, 1, 5, '2024-07-09 02:30:50'),
(23, 25, '1', 'Dong phuc Beta', 'xuantung.png', 12, 1, 5, '2024-07-09 04:03:58'),
(24, 26, '1', 'Dong phuc Beta', 'xuantung.png', 12, 1, 5, '2024-07-09 04:06:56'),
(25, 26, '4', 'Dong phuc Beta 2', 'dongphucbeta2.png', 15, 1, 5, '2024-07-09 04:06:56');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_image4` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_special_offer` int(100) NOT NULL,
  `product_color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_special_offer`, `product_color`) VALUES
(1, 'Dong phuc Beta', 'Ao', 'Dep nhat le van thiem', 'xuantung.png', '', '', '', 12.60, 0, 'Blue'),
(4, 'Dong phuc Beta 2', 'Ao', 'Dep nhat ha noi', 'dongphucbeta2.png', '', '', '', 15.00, 0, 'Xanh'),
(7, 'Love Me Harder', 'Ao', '100% Cotton, Oversize', 'Love Me Harder1.jepg', 'Love Me Harder2.jepg', 'Love Me Harder3.jepg', 'Love Me Harder4.jepg', 490.00, 0, 'Black'),
(8, 'Hades Elev', 'Ao', '11!', 'Hades Elev1.jepg', 'Hades Elev2.jepg', 'Hades Elev3.jepg', 'Hades Elev4.jepg', 599.00, 0, 'Black'),
(9, 'Flower On A Hoodie', 'Ao', 'Red Róse Hoodie', 'Flower On A Hoodie1.jepg', 'Flower On A Hoodie2.jepg', 'Flower On A Hoodie3.jepg', 'Flower On A Hoodie4.jepg', 699.00, 0, 'Red'),
(10, 'I Love You', 'Ao', 'But You Broke Me', 'I Love You1.jepg', 'I Love You2.jepg', 'I Love You3.jepg', 'I Love You4.jepg', 299.00, 0, 'White'),
(11, 'Hades Chrysanthemum', 'Ao', 'Asteracae', 'Hades Chrysanthemum1.jepg', 'Hades Chrysanthemum2.jepg', 'Hades Chrysanthemum3.jepg', 'Hades Chrysanthemum4.jepg', 399.00, 0, 'Black'),
(12, 'Hades Basic Hoodie', 'Ao', 'Basic, super basic', 'Hades Basic Hoodie1.jepg', 'Hades Basic Hoodie2.jepg', 'Hades Basic Hoodie3.jepg', 'Hades Basic Hoodie4.jepg', 350.00, 0, 'Black'),
(13, 'Hades Lium Coat', 'Ao', 'Liummmmm', 'Hades Lium Coat1.jepg', 'Hades Lium Coat2.jepg', 'Hades Lium Coat3.jepg', 'Hades Lium Coat4.jepg', 350.00, 0, 'Black'),
(14, 'Rammus Bag', 'Balo', 'OK!', 'Rammus Bag1.jepg', 'Rammus Bag2.jepg', 'Rammus Bag3.jepg', 'Rammus Bag4.jepg', 230.00, 0, 'Black'),
(17, 'Who\'s that Pokemon', 'Balo', 'Ugly..', 'Who\'s that Pokemon1.jpeg', 'Who\'s that Pokemon2.jpeg', 'Who\'s that Pokemon3.jpeg', 'Who\'s that Pokemon4.jpeg', 270.00, 0, 'Black'),
(18, 'Big Boy', 'Balo', 'Big Bag actually', 'Big Boy1.jpeg', 'Big Boy2.jpeg', 'Big Boy3.jpeg', 'Big Boy4.jpeg', 500.00, 0, 'Black'),
(19, 'Lady Lucky Smiling', 'Balo', 'Milk Tea', 'Lady Lucky Smiling1.jpeg', 'Lady Lucky Smiling2.jpeg', 'Lady Lucky Smiling3.jpeg', 'Lady Lucky Smiling4.jpeg', 600.00, 0, 'Wheat'),
(20, 'Fat Boy', 'Balo', '60 Litter Bag', 'Fat Boy1.jpeg', 'Fat Boy2.jpeg', 'Fat Boy3.jpeg', 'Fat Boy4.jpeg', 350.00, 0, 'Black'),
(21, 'Very Big Boy', 'Balo', 'Bigger than Big Boy', 'Very Big Boy1.jpeg', 'Very Big Boy2.jpeg', 'Very Big Boy3.jpeg', 'Very Big Boy4.jpeg', 560.00, 0, 'Black'),
(22, 'Orange Juice', 'Balo', 'Juicyyyyyyy Bag', 'Orange Juice1.jpeg', 'Orange Juice2.jpeg', 'Orange Juice3.jpeg', 'Orange Juice4.jpeg', 250.00, 0, 'Black'),
(23, 'Hades Low Sock', 'Phu_kien', 'Just low', 'Hades Low Sock1.jpeg', 'Hades Low Sock2.jpeg', 'Hades Low Sock3.jpeg', 'Hades Low Sock4.jpeg', 120.00, 0, 'White/Black'),
(24, 'Hades Grey Fly Hat', 'Phu_kien', 'Flyyyyyy', 'Hades Grey Fly Hat1.jpeg', 'Hades Grey Fly Hat2.jpeg', 'Hades Grey Fly Hat3.jpeg', 'Hades Grey Fly Hat4.jpeg', 100.00, 0, 'Grey'),
(25, 'Hades High Sock', 'Phu_kien', 'Higher than Low', 'Hades High Sock1.jpeg', 'Hades High Sock2.jpeg', 'Hades High Sock3.jpeg', 'Hades High Sock4.jpeg', 160.00, 0, 'White/Black'),
(27, 'Hades Short', 'Quan', 'Yeah, SHORT!', 'Hades Short1.jpeg', 'Hades Short2.jpeg', 'Hades Short3.jpeg', 'Hades Short4.jpeg', 300.00, 0, 'White/Black'),
(28, 'Hades Fancy Short', 'Quan', 'Yeb, It\'s FANCY', 'Hades Fancy Short1.jpeg', 'Hades Fancy Short2.jpeg', 'Hades Fancy Short3.jpeg', 'Hades Fancy Short4.jpeg', 360.00, 0, 'Black'),
(29, 'Big Boy Pant', 'Quan', 'Bigest', 'Big Boy Pant1.jpeg', 'Big Boy Pant2.jpeg', 'Big Boy Pant3.jpeg', 'Big Boy Pant4.jpeg', 500.00, 0, 'Black'),
(30, 'Hades Basic Cargo', 'Quan', 'I dont know, but Cargo', 'Dont Know What That Is1.jpeg', 'Dont Know What That Is2.jpeg', 'Dont Know What That Is3.jpeg', 'Dont Know What That Is4.jpeg', 380.00, 0, 'Black/Green'),
(31, 'Pinky Jogger', 'Quan', 'Pinky Blinder', 'Pinky Jogger1.jpeg', 'Pinky Jogger2.jpeg', 'Pinky Jogger3.jpeg', 'Pinky Jogger4.jpeg', 280.00, 0, 'Pink/Brown'),
(32, 'Pant Short', 'Quan', 'Pant, but Short', 'Pant Short1.jpeg', 'Pant Short2.jpeg', 'Pant Short3.jpeg', 'Pant Short4.jpeg', 250.00, 0, 'Clay'),
(33, 'Gray Cargo', 'Quan', 'Our last product', 'Gray Cargo1.jpeg', 'Gray Cargo2.jpeg', 'Gray Cargo3.jpeg', 'Gray Cargo4.jpeg', 780.00, 0, 'Grey');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(5, 'Hung', 'hunghoang00a@gmail.com', '17bcad3e11a3c93065b22382ce11ea73'),
(6, 'hungdaden', 'hunghoang00b@gmail.com', '97936f7f1c6069c0a6e4b296b5f6098d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UX_Constraint` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
