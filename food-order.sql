-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2023 at 04:49 AM
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
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignment_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `driver_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignment_id`, `order_id`, `driver_id`) VALUES
(30, 39, 5),
(31, 40, 6),
(32, 41, 7);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_drivers`
--

CREATE TABLE `delivery_drivers` (
  `driver_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `vechile_no` varchar(50) NOT NULL,
  `phone_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_drivers`
--

INSERT INTO `delivery_drivers` (`driver_id`, `name`, `vechile_no`, `phone_no`) VALUES
(5, 'Harish K', 'HR26DQ5551', '9742669807'),
(6, 'Dinesh', 'KA12DE1433', '9606424244'),
(7, 'Swathi', 'KA19P8488', '9538339933'),
(8, 'Veena', 'KA14A1478', '8970605456'),
(9, 'Mohan', 'KA19EQ1316', '8310429895'),
(10, 'Khushi', 'KA19H1103', '9876543210'),
(11, 'Datta Kishor', 'KAH1234', '9856346785'),
(12, 'Rithik Mahesh', 'KA19H5678', '9874532187'),
(13, 'Nivam Prashath', 'kA19H5635', '7865945678'),
(14, 'Hiyansh G', 'KA191234', '8796424567');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(12, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(13, 'varna', 'varna', '57c086539e211b77becc87fd0a2cb637'),
(14, 'sameeksha', 'sameeksha', 'a725193fc1cf499934bbf6e957369b0e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(11, 'Pizza', 'Food_Category_90.jpg', 'Yes', 'Yes'),
(12, 'Cake', 'Food_Category_470.jpg', 'No', 'Yes'),
(13, 'Pasta', 'Food_Category_978.jpg', 'Yes', 'Yes'),
(14, 'Burger', 'Food_Category_921.jpg', 'Yes', 'No'),
(15, 'Pancake', 'Food_Category_332.jfif', 'No', 'Yes'),
(16, 'Momos', 'Food_Category_849.jpg', 'No', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(11, 'Farm house pizza', 'Delightful combination of onion, capsicum, tomato and grilled mushroom.', 269.00, 'Food-Name-9245.jpg', 11, 'Yes', 'Yes'),
(12, 'Fruit cake', 'This incredible cake starts with buttery cracker crust, a creamy vanilla center and  fresh fruits on the top...', 350.00, 'Food-Name-3366.jfif', 12, 'Yes', 'Yes'),
(13, 'White sauce pasta', 'Simply cooked pasta mixed with a silky smooth and decadent white sauce made of milk, butter and flour....', 180.00, 'Food-Name-9937.avif', 11, 'Yes', 'Yes'),
(14, 'Paneer Burger', 'Soft yet perfectly fried Paneer patties are paired with fresh cucumber ,tomato and onion and topped with delicious mayo.....', 209.00, 'Food-Name-2288.jpg', 14, 'No', 'Yes'),
(15, 'Steamed momos', 'Juicy and tender minced chicken mixed with choicest herbs and spices handcrafted into half-moon dumplings steamed and served with spicy mayo sauce....', 80.00, 'Food-Name-3121.jpg', 11, 'No', 'No'),
(16, 'Blueberry Cheesecake', 'This incredible cheesecake starts with buttery cracker crust, a creamy cheesecake center and a tangy blueberry compote on top....', 849.00, 'Food-Name-6754.jpg', 12, 'Yes', 'Yes'),
(17, 'Pancake', 'Drizzled with blueberry compote and served with maple syrup! Simple yet delicious....', 210.00, 'Food-Name-2925.webp', 15, 'No', 'Yes'),
(18, 'Margherita pizza', 'The classic Margherita pizza topped with a Mediterranean flavoured tomato sauce and our fresh homemade mozzarella cheese...', 259.00, 'Food-Name-9052.jpg', 11, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(27, 'Farm house pizza', 269.00, 2, 538.00, '2023-09-07 12:30:26', 'Delivered', 'Tvisha', '9742669807', 'tvisha@order', ' Pandeshwar'),
(28, 'Fruit cake', 350.00, 1, 350.00, '2023-09-07 12:35:30', 'Delivered', 'Chinmay', '8970605456', 'chinnu@Order', 'Kunjathbail'),
(29, 'White sauce pasta', 180.00, 3, 540.00, '2023-09-07 12:36:17', 'Delivered', 'Shreyansh', '7865434578', 'shonu@order', 'Konaje'),
(30, 'Paneer Burger', 209.00, 4, 836.00, '2023-09-07 12:36:55', 'Cancelled', 'Advith', '8974569034', 'advi@order', 'Ullal'),
(31, 'Blueberry Cheesecake', 849.00, 1, 849.00, '2023-09-07 12:37:52', 'Delivered', 'Akanksh', '8976354601', 'anshu@order', 'Bengre'),
(32, 'Pancake', 210.00, 1, 210.00, '2023-09-07 12:38:41', 'Delivered', 'Diya', '8975364786', 'diya@order', 'Kapikad'),
(33, 'Margherita pizza', 259.00, 4, 1036.00, '2023-09-07 12:39:55', 'Cancelled', 'Sanjana', '7864567893', 'sanju@order', 'Kavoor'),
(34, 'Paneer Burger', 209.00, 9, 1881.00, '2023-09-07 12:41:57', 'Delivered', 'Arushi', '896734568', 'arushi@order', 'Surathkal'),
(35, 'Pancake', 210.00, 3, 630.00, '2023-09-07 12:42:49', 'On Delivery', 'Anusha', '7896545686', 'anusha@order', 'Attavar'),
(36, 'White sauce pasta', 180.00, 2, 360.00, '2023-09-07 12:43:44', 'Ordered', 'Ayush', '5678345679', 'ayush@order', 'Mulki'),
(37, 'Fruit cake', 350.00, 1, 350.00, '2023-09-07 02:10:56', 'Ordered', 'wertyuj', '23456', 'aqswedrf@aswdefrg', 'sdefrgh'),
(38, 'Fruit cake', 350.00, 1, 350.00, '2023-09-07 02:11:50', 'Ordered', 'wsdef', '23456', 'asdfg@aswedrf', 'serfgthjk'),
(39, 'Fruit cake', 350.00, 1, 350.00, '2023-09-07 02:12:19', 'Ordered', 'sxdfgbhnj', '345678', 'sdefrgt@werty', 'werftgyhuj'),
(40, 'Farm house pizza', 269.00, 1, 269.00, '2023-09-07 02:16:38', 'Ordered', 'wertyu', '23456', 'ASDXCF@WSERFT', 'QAWSEDFR'),
(41, 'Farm house pizza', 269.00, 2, 538.00, '2023-09-07 02:21:17', 'Ordered', 'Tvisha', '8970605456', 'tvisha@order', 'Pandeshwar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignment_id`);

--
-- Indexes for table `delivery_drivers`
--
ALTER TABLE `delivery_drivers`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `delivery_drivers`
--
ALTER TABLE `delivery_drivers`
  MODIFY `driver_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
