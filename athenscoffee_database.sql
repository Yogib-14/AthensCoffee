-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2021 at 05:08 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `athenscoffee_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_cart`
--

CREATE TABLE `tabel_cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `roast_id` int(11) NOT NULL,
  `grind_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_cart`
--

INSERT INTO `tabel_cart` (`cart_id`, `user_id`, `product_id`, `roast_id`, `grind_id`, `quantity`) VALUES
(33, 6, 3, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_grind`
--

CREATE TABLE `tabel_grind` (
  `grind_id` int(11) NOT NULL,
  `grind_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_grind`
--

INSERT INTO `tabel_grind` (`grind_id`, `grind_type`) VALUES
(1, 'Coarse Grind'),
(2, 'Medium-Coarse Grind'),
(3, 'Medium Grind'),
(4, 'Medium-Fine Grind'),
(5, 'Fine Grind'),
(6, 'Whole Bean');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_order`
--

CREATE TABLE `tabel_order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `method_id` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `order_status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_order`
--

INSERT INTO `tabel_order` (`order_id`, `user_id`, `method_id`, `total_price`, `order_status`, `created_at`, `payment_image`) VALUES
(5, 6, 5, 140000, 'Arrived', '2021-05-03 15:47:12', 'assets/img/payment_proof/6-1620058622.jpg'),
(6, 6, 1, 60000, 'Payment Declined', '2021-05-03 16:18:50', 'assets/img/payment_proof/6-1620058730.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_order_detail`
--

CREATE TABLE `tabel_order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `roast_id` int(11) DEFAULT NULL,
  `grind_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_order_detail`
--

INSERT INTO `tabel_order_detail` (`order_detail_id`, `order_id`, `product_id`, `roast_id`, `grind_id`, `quantity`) VALUES
(11, 5, 1, 1, 2, 3),
(12, 5, 2, 2, 2, 1),
(13, 6, 1, 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_payment_method`
--

CREATE TABLE `tabel_payment_method` (
  `method_id` int(11) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `account_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_payment_method`
--

INSERT INTO `tabel_payment_method` (`method_id`, `payment_method`, `account_number`) VALUES
(1, 'Bank Central Asia', '1234567890123456'),
(2, 'Bank Mandiri', '1234567890123'),
(3, 'Bank Negara Indonesia', '1234567890'),
(4, 'Bank Tabungan Negara', '1234567890123456'),
(5, 'Bank CIMB Niaga', '1234567890123');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_product`
--

CREATE TABLE `tabel_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_description` varchar(200) NOT NULL,
  `product_price` float NOT NULL,
  `product_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_product`
--

INSERT INTO `tabel_product` (`product_id`, `product_name`, `product_description`, `product_price`, `product_image`) VALUES
(1, 'Puntang Natural', 'Daerah : Gunung Puntang, Bandung', 70000, 'assets/img/puntangnatural.png'),
(2, 'Java Preanger Fullwash', 'Daerah : Frinsa Estate, Bandung', 55000, 'assets/img/javapreangerfullwash.png'),
(3, 'Athens Blend', 'Daerah : Toraja, Aceh, Bogor', 85000, 'assets/img/athensblend.png'),
(4, 'Gayo Wine', 'Daerah : Gayo Aceh', 90000, 'assets/img/gayowine.png'),
(5, 'Semendo Natural', 'Daerah : Semendo, Sumatera Selatan', 65000, 'assets/img/semendonatural.png'),
(6, 'Sunda Aromanis Natural', 'Daerah : Garut Papandayan, Jawa Barat', 70000, 'assets/img/sundaaromanisnatural.png');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_roast`
--

CREATE TABLE `tabel_roast` (
  `roast_id` int(11) NOT NULL,
  `roast_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_roast`
--

INSERT INTO `tabel_roast` (`roast_id`, `roast_type`) VALUES
(1, 'Filter'),
(2, 'Espresso');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_user`
--

CREATE TABLE `tabel_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_address` varchar(100) DEFAULT NULL,
  `user_phone` varchar(20) DEFAULT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_user`
--

INSERT INTO `tabel_user` (`user_id`, `user_name`, `user_address`, `user_phone`, `user_email`, `user_password`, `user_type`) VALUES
(1, 'Admin Athens', NULL, NULL, 'athens2277@gmail.com', '_1014dm1n4th3n5c0ff33202_', 'admin'),
(2, 'Natanael Benediktus', 'BSD No. 27', '081234512345', 'natanaelbenediktus@gmail.com', 'natan', 'customer'),
(6, 'Reuzzicus', 'Jalan Raya No. 7', '08123123123', 'reuzzicus@gmail.com', 'reuz', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_cart`
--
ALTER TABLE `tabel_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `grind_id` (`grind_id`),
  ADD KEY `roast_id` (`roast_id`);

--
-- Indexes for table `tabel_grind`
--
ALTER TABLE `tabel_grind`
  ADD PRIMARY KEY (`grind_id`);

--
-- Indexes for table `tabel_order`
--
ALTER TABLE `tabel_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id_metode` (`method_id`);

--
-- Indexes for table `tabel_order_detail`
--
ALTER TABLE `tabel_order_detail`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `roast_id` (`roast_id`),
  ADD KEY `grind_id` (`grind_id`);

--
-- Indexes for table `tabel_payment_method`
--
ALTER TABLE `tabel_payment_method`
  ADD PRIMARY KEY (`method_id`);

--
-- Indexes for table `tabel_product`
--
ALTER TABLE `tabel_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tabel_roast`
--
ALTER TABLE `tabel_roast`
  ADD PRIMARY KEY (`roast_id`);

--
-- Indexes for table `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_cart`
--
ALTER TABLE `tabel_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tabel_grind`
--
ALTER TABLE `tabel_grind`
  MODIFY `grind_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tabel_order`
--
ALTER TABLE `tabel_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tabel_order_detail`
--
ALTER TABLE `tabel_order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tabel_payment_method`
--
ALTER TABLE `tabel_payment_method`
  MODIFY `method_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tabel_product`
--
ALTER TABLE `tabel_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tabel_roast`
--
ALTER TABLE `tabel_roast`
  MODIFY `roast_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_cart`
--
ALTER TABLE `tabel_cart`
  ADD CONSTRAINT `tabel_cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tabel_user` (`user_id`),
  ADD CONSTRAINT `tabel_cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `tabel_product` (`product_id`),
  ADD CONSTRAINT `tabel_cart_ibfk_3` FOREIGN KEY (`grind_id`) REFERENCES `tabel_grind` (`grind_id`),
  ADD CONSTRAINT `tabel_cart_ibfk_4` FOREIGN KEY (`roast_id`) REFERENCES `tabel_roast` (`roast_id`);

--
-- Constraints for table `tabel_order`
--
ALTER TABLE `tabel_order`
  ADD CONSTRAINT `tabel_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tabel_user` (`user_id`),
  ADD CONSTRAINT `tabel_order_ibfk_2` FOREIGN KEY (`method_id`) REFERENCES `tabel_payment_method` (`method_id`);

--
-- Constraints for table `tabel_order_detail`
--
ALTER TABLE `tabel_order_detail`
  ADD CONSTRAINT `tabel_order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `tabel_order` (`order_id`),
  ADD CONSTRAINT `tabel_order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `tabel_product` (`product_id`),
  ADD CONSTRAINT `tabel_order_detail_ibfk_3` FOREIGN KEY (`roast_id`) REFERENCES `tabel_roast` (`roast_id`),
  ADD CONSTRAINT `tabel_order_detail_ibfk_4` FOREIGN KEY (`grind_id`) REFERENCES `tabel_grind` (`grind_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
