-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2021 at 03:49 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Cat_ID` varchar(10) NOT NULL,
  `Cat_Name` varchar(30) NOT NULL,
  `Cat_Des` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Cat_ID`, `Cat_Name`, `Cat_Des`) VALUES
('C001', 'Pen', 'Pen Product of the Bamboo brand'),
('C002', 'Device', 'Device Product'),
('C003', 'Notebook', 'Notebook product');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `CustName` varchar(30) NOT NULL,
  `gender` int(11) NOT NULL,
  `Address` varchar(1000) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `CusDate` int(11) NOT NULL,
  `CusMonth` int(11) NOT NULL,
  `CusYear` int(11) NOT NULL,
  `ActiveCode` varchar(100) NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Username`, `Password`, `CustName`, `gender`, `Address`, `telephone`, `email`, `CusDate`, `CusMonth`, `CusYear`, `ActiveCode`, `state`) VALUES
('duong', '25d55ad283aa400af464c76d713c07ad', 'Nguyen Quoc Duong', 0, '21, Tran Hung Dao street, Ninh Kieu District, Can Tho City', '0333119897', 'duong29@gmail.com', 4, 11, 2001, '', 0),
('duongadmin', '25d55ad283aa400af464c76d713c07ad', 'Huynh Quoc Duong', 0, '23 Nguyen Trung Truc, Ninh Kieu Distrist, Can Tho City', '0333119697', 'duonghqgcc19037@fpt.edu.vn', 4, 12, 2001, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_ID` varchar(10) NOT NULL,
  `Product_Name` varchar(30) NOT NULL,
  `Price` bigint(20) NOT NULL,
  `oldPrice` decimal(12,2) NOT NULL,
  `SmallDesc` varchar(1000) NOT NULL,
  `DetailDesc` text NOT NULL,
  `ProDate` datetime NOT NULL,
  `Pro_qty` int(11) NOT NULL,
  `Pro_image` varchar(200) NOT NULL,
  `Cat_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_ID`, `Product_Name`, `Price`, `oldPrice`, `SmallDesc`, `DetailDesc`, `ProDate`, `Pro_qty`, `Pro_image`, `Cat_ID`) VALUES
('P001', 'Pen-Pro', 1000000, '1500000.00', 'New Pen', '<p>\r\n	New Pen of Bamboo in 2019</p>\r\n', '2021-05-05 16:07:44', 32, 'Bamboo_Duo_gallery_2.jpg', 'C001'),
('P002', 'Keybord keychron k4', 20000000, '0.00', 'New Keybord ', '<p>\r\n	New Keybord of Silicon in 2020</p>\r\n', '2021-05-05 16:05:00', 10, 'keyboard.jpg', 'C002'),
('P003', 'Book', 20000, '0.00', 'New Book', '<p>\r\n	New Book of Dery 2021</p>\r\n', '2021-05-05 18:46:53', 20, 'notebook.jpg', 'C003'),
('P004', 'Casio-AX-12B', 500000, '0.00', 'New Casio', '<p>\r\n	New&nbsp; Casio-AX-12B of&nbsp;&nbsp;Casio</p>\r\n', '2021-05-06 05:39:08', 13, 'casio-AX-12B.jpg', 'C002'),
('P005', 'Parker signing pen', 500000, '0.00', 'signing pen', '<h1 class=\"product-title product_title entry-title\" style=\"box-sizing: border-box; color: rgb(28, 28, 28); width: 575px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: &quot;Roboto Slab&quot;, sans-serif;\">\r\n	<font style=\"box-sizing: border-box; vertical-align: inherit;\">Parker signing pen of Bamboo</font></h1>\r\n', '2021-05-08 05:54:40', 50, 'but-ky-parker.jpg', 'C001'),
('P006', 'Casio fx-580VN X', 600000, '0.00', 'Casio fx-580VN X of Casio ', '<p>\r\n	Casio fx-580VN X of Casio brand</p>\r\n', '2021-05-08 13:36:15', 20, 'Casio fx-580VN X.png', 'C002');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Cat_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_ID`),
  ADD KEY `Cat_ID` (`Cat_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Cat_ID`) REFERENCES `category` (`Cat_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
