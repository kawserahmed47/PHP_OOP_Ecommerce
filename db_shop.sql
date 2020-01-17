-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2019 at 10:33 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(32) NOT NULL,
  `level` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_username`, `admin_email`, `admin_password`, `level`) VALUES
(1, 'Kawser Ahmed', 'admin', 'admin@info.com', '25d55ad283aa400af464c76d713c07ad', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(1, 'Motorala'),
(2, 'Walton'),
(3, 'Xiaomi'),
(4, 'Samsung'),
(5, 'Nokia'),
(6, 'Vivo'),
(7, 'Dell'),
(8, 'Lenovo'),
(9, 'HP');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(30) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(7, 'Women Dress'),
(8, 'Sports'),
(12, 'Desktop'),
(13, 'Laptop');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customerId` int(11) NOT NULL,
  `customerName` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customerId`, `customerName`, `address`, `email`, `phone`, `password`) VALUES
(5, 'Rony', 'tallabag', 'rony@info.com', '5455', '25d55ad283aa400af464c76d713c07ad'),
(6, 'Safayet', 'Framget', 'safayet@info.com', '333333', '25d55ad283aa400af464c76d713c07ad'),
(7, 'Niloy', 'Sukrabad', 'niloy@info.com', '1234567', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `body` varchar(255) NOT NULL,
  `price` float(10,3) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `body`, `price`, `image`, `type`) VALUES
(3, 'Product Name three', 8, 6, '<p>This is ti</p>', 6000.000, 'upload/c9c44071a7.jpg', 1),
(5, 'sdafasdf', 13, 7, '<p>fasdfdasfasdf</p>', 544.000, 'upload/492d4c3ec8.jpg', 1),
(6, 'three', 7, 3, '<p>this is women</p>', 522.000, 'upload/15ed9e1a6c.jpg', 1),
(7, 'four', 8, 5, '<p>this is&nbsp;</p>', 4555.000, 'upload/6fe1ed9128.jpg', 1),
(8, 'six', 13, 7, '<p>dsfsda</p>', 456.000, 'upload/b0b817104b.jpg', 1),
(9, 'seven', 8, 1, '<p>sdafs</p>', 4522.000, 'upload/d132b6f227.jpeg', 0),
(10, 'eight', 12, 5, '<p>sdafdsaf</p>', 5421.000, 'upload/b353c1079e.jpg', 0),
(11, 'nine', 8, 4, '<p>dsfsda</p>', 522.000, 'upload/7239320986.jpeg', 0),
(13, 'eleven', 8, 6, '<p>sdafsda</p>', 5236.000, 'upload/bd83d75896.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `shippingName` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(15) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `order_id`, `shippingName`, `address`, `email`, `phone`, `city`) VALUES
(1, 5, 'Shovon', 'narayngang', 'shovon@info.com', 55555, 'dhaka'),
(2, 6, 'Shovon', 'narayngang', 'shovon@info.com', 55555, 'dhaka'),
(3, 7, 'Kawser', 'mirpur', 'kaw@info.com', 6542, 'Dhaka'),
(4, 8, 'Kawser', 'mirpur', 'kaw@info.com', 6542, 'Dhaka'),
(5, 7, 'Kawser', 'mirpur', 'fiha@info.com', 456, 'Dhaka'),
(6, 8, 'Kawser', 'mirpur', 'fiha@info.com', 456, 'Dhaka'),
(7, 9, 'Kawser', 'mirpur', 'fiha@info.com', 456, 'Dhaka'),
(8, 7, 'Kawser', 'mirpur', 'niloy@info.com', 456, 'Dhaka'),
(9, 8, 'Kawser', 'mirpur', 'niloy@info.com', 456, 'Dhaka'),
(10, 9, 'Kawser', 'mirpur', 'niloy@info.com', 456, 'Dhaka'),
(11, 10, 'Kawser', 'mirpur', 'niloy@info.com', 456, 'Dhaka'),
(12, 7, 'Kawser', 'Sukrabad', 'kawserahmed47', 6542, 'Dhaka'),
(13, 8, 'Kawser', 'Sukrabad', 'kawserahmed47', 6542, 'Dhaka'),
(14, 9, 'Kawser', 'Sukrabad', 'kawserahmed47', 6542, 'Dhaka'),
(15, 10, 'Kawser', 'Sukrabad', 'kawserahmed47', 6542, 'Dhaka'),
(16, 11, 'Kawser', 'Sukrabad', 'kawserahmed47', 6542, 'Dhaka'),
(17, 7, 'Kawser', 'Sukrabad', 'fiha@info.com', 456, 'Dhaka'),
(18, 8, 'Kawser', 'Sukrabad', 'fiha@info.com', 456, 'Dhaka'),
(19, 9, 'Kawser', 'Sukrabad', 'fiha@info.com', 456, 'Dhaka'),
(20, 10, 'Kawser', 'Sukrabad', 'fiha@info.com', 456, 'Dhaka'),
(21, 11, 'Kawser', 'Sukrabad', 'fiha@info.com', 456, 'Dhaka'),
(22, 12, 'Kawser', 'Sukrabad', 'fiha@info.com', 456, 'Dhaka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
