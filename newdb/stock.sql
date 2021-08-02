-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 08, 2020 at 12:03 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_details`
--

CREATE TABLE IF NOT EXISTS `category_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(120) NOT NULL,
  `category_description` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `category_details`
--

INSERT INTO `category_details` (`id`, `category_name`, `category_description`) VALUES
(5, 'category1', ''),
(6, 'category2', ''),
(7, 'category3', ''),
(8, 'category4', ''),
(9, 'category6', ''),
(10, 'category7', ''),
(11, 'category8', ''),
(12, 'category9', ''),
(13, 'category10', ''),
(14, 'category11', ''),
(15, 'category18', ''),
(16, '', ''),
(17, 'newcategory', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE IF NOT EXISTS `customer_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(200) NOT NULL,
  `customer_address` varchar(500) NOT NULL,
  `customer_contact1` varchar(100) NOT NULL,
  `customer_contact2` varchar(100) NOT NULL,
  `balance` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`id`, `customer_name`, `customer_address`, `customer_contact1`, `customer_contact2`, `balance`) VALUES
(1, 'Customer1', 'address1', '8523544', '75254552', -7788),
(2, 'customer2', 'customer 2 address', '86789789', '9879889789', 4872);

-- --------------------------------------------------------

--
-- Table structure for table `stock_avail`
--

CREATE TABLE IF NOT EXISTS `stock_avail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `stock_avail`
--

INSERT INTO `stock_avail` (`id`, `name`, `quantity`) VALUES
(1, 'truzo super', 0),
(2, 'alanto', 0),
(3, 'Swipe 60 GM', 14195),
(4, 'Swipe 120 GM', 100),
(5, 'newstock', 1331);

-- --------------------------------------------------------

--
-- Table structure for table `stock_details`
--

CREATE TABLE IF NOT EXISTS `stock_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stock_id` varchar(120) NOT NULL,
  `stock_name` varchar(120) NOT NULL,
  `stock_quatity` int(11) NOT NULL,
  `supplier_id` varchar(250) NOT NULL,
  `company_price` decimal(10,2) NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `category` varchar(120) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `expire_date` datetime NOT NULL,
  `uom` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `stock_details`
--

INSERT INTO `stock_details` (`id`, `stock_id`, `stock_name`, `stock_quatity`, `supplier_id`, `company_price`, `selling_price`, `category`, `date`, `expire_date`, `uom`) VALUES
(1, 'SD1', 'Swipe 60 GM', 0, 'Biotic life science', 77.00, 80.00, '', '2010-04-22 23:31:10', '0000-00-00 00:00:00', ''),
(2, 'SD2', 'newstock', 0, 'Biotic life science', 452.00, 452.00, 'category1', '2010-05-11 17:37:41', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `stock_entries`
--

CREATE TABLE IF NOT EXISTS `stock_entries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stock_id` varchar(120) NOT NULL,
  `stock_name` varchar(260) NOT NULL,
  `p` varchar(500) NOT NULL,
  `stock_supplier_name` varchar(200) NOT NULL,
  `category` varchar(120) NOT NULL,
  `quantity` int(11) NOT NULL,
  `company_price` decimal(10,2) NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `opening_stock` int(11) NOT NULL,
  `closing_stock` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `username` varchar(120) NOT NULL,
  `type` varchar(50) NOT NULL,
  `salesid` varchar(120) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `mode` varchar(150) NOT NULL,
  `description` varchar(500) NOT NULL,
  `due` datetime NOT NULL,
  `subtotal` int(11) NOT NULL,
  `count1` int(11) NOT NULL,
  `bacth` varchar(500) NOT NULL,
  `billnumber` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=203 ;

--
-- Dumping data for table `stock_entries`
--

INSERT INTO `stock_entries` (`id`, `stock_id`, `stock_name`, `p`, `stock_supplier_name`, `category`, `quantity`, `company_price`, `selling_price`, `opening_stock`, `closing_stock`, `date`, `username`, `type`, `salesid`, `total`, `payment`, `balance`, `mode`, `description`, `due`, `subtotal`, `count1`, `bacth`, `billnumber`) VALUES
(197, 'SE1', 'Swipe 60 GM', '', 'Biotic life science', '', 14, 77.00, 80.00, 14189, 14203, '2010-05-11 00:00:00', 'admin', 'entry', '', 1078.00, 39498.00, 0.00, 'cash', 'sdfds', '2010-05-11 00:00:00', 39498, 1, '', '14452'),
(198, 'SE1', 'newstock', '', 'Biotic life science', '', 85, 452.00, 452.00, 1280, 1365, '2010-05-11 00:00:00', 'admin', 'entry', '', 38420.00, 39498.00, 0.00, 'cash', 'sdfds', '2010-05-11 00:00:00', 39498, 2, '', '14452'),
(199, 'SA5', 'newstock', '', '', '', 34, 0.00, 452.00, 1365, 1331, '2010-05-11 00:00:00', 'admin', 'sales', 'SA5', 15368.00, 0.00, 0.00, '', '', '0000-00-00 00:00:00', 0, 0, '', '876'),
(200, 'SA5', 'Swipe 60 GM', '', '', '', 47, 0.00, 80.00, 14203, 14156, '2010-05-11 00:00:00', 'admin', 'sales', 'SA5', 3760.00, 0.00, 0.00, '', '', '0000-00-00 00:00:00', 0, 0, '', '876'),
(201, 'SA7', 'Swipe 60 GM', '', '', '', 1, 0.00, 80.00, 14156, 14155, '2020-07-08 00:00:00', 'admin', 'SA7', '', 80.00, 0.00, 0.00, '', '', '0000-00-00 00:00:00', 0, 0, '', ''),
(202, 'SE202', 'Swipe 60 GM', '360', 'MDK', '', 10, 77.00, 80.00, 14185, 14195, '2020-07-08 00:00:00', 'admin', 'entry', '', 770.00, 770.00, 0.00, 'cash', '', '2021-07-03 00:00:00', 770, 1, 'XDFYU12', '');

-- --------------------------------------------------------

--
-- Table structure for table `stock_sales`
--

CREATE TABLE IF NOT EXISTS `stock_sales` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `transactionid` varchar(250) NOT NULL,
  `stock_name` varchar(200) NOT NULL,
  `p` varchar(100) NOT NULL,
  `attendant` varchar(500) NOT NULL,
  `category` varchar(120) NOT NULL,
  `supplier_name` varchar(200) NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` datetime NOT NULL,
  `username` varchar(120) NOT NULL,
  `customer_id` varchar(120) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `due` datetime NOT NULL,
  `mode` varchar(250) NOT NULL,
  `description` varchar(500) NOT NULL,
  `count1` int(11) NOT NULL,
  `billnumber` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `stock_sales`
--

INSERT INTO `stock_sales` (`id`, `transactionid`, `stock_name`, `p`, `attendant`, `category`, `supplier_name`, `selling_price`, `quantity`, `amount`, `date`, `username`, `customer_id`, `subtotal`, `payment`, `balance`, `due`, `mode`, `description`, `count1`, `billnumber`) VALUES
(2, 'SA1', 'swipe 60 GM', '', '', '', '', 80.00, 114.00, 80.00, '2010-05-11 00:00:00', 'admin', 'customer1', 80.00, 9120.00, 0.00, '2010-05-11 00:00:00', 'cash', 'dsfds', 1, '897897'),
(3, 'SA3', 'swipe 60 GM', '', '', '', '', 80.00, 67.00, 80.00, '2010-05-11 00:00:00', 'admin', 'customer1', 65620.00, 69544.00, 0.00, '2010-05-11 00:00:00', 'cash', '', 1, '64564'),
(4, 'SA3', 'newstock', '', '', '', '', 452.00, 145.00, 65540.00, '2010-05-11 00:00:00', 'admin', 'customer1', 65620.00, 69544.00, 0.00, '2010-05-11 00:00:00', 'cash', '', 2, '64564'),
(5, 'SA5', 'newstock', '', '', '', '', 452.00, 34.00, 15368.00, '2010-05-11 00:00:00', 'admin', 'customer2', 19128.00, 14256.00, 4872.00, '2010-05-11 00:00:00', 'cash', 'lkh', 1, '876'),
(6, 'SA5', 'Swipe 60 GM', '', '', '', '', 80.00, 47.00, 3760.00, '2010-05-11 00:00:00', 'admin', 'customer2', 19128.00, 14256.00, 4872.00, '2010-05-11 00:00:00', 'cash', 'lkh', 2, '876'),
(7, 'SA7', 'Swipe 60 GM', '0', 'admin', '', '', 80.00, 1.00, 80.00, '2020-07-08 00:00:00', 'admin', 'KATO D', 80.00, 80.00, 0.00, '2020-07-08 00:00:00', 'cash', '', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `stock_user`
--

CREATE TABLE IF NOT EXISTS `stock_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `stock_user`
--

INSERT INTO `stock_user` (`id`, `username`, `password`, `user_type`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_details`
--

CREATE TABLE IF NOT EXISTS `supplier_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(200) NOT NULL,
  `supplier_address` varchar(500) NOT NULL,
  `supplier_contact1` varchar(100) NOT NULL,
  `supplier_contact2` varchar(100) NOT NULL,
  `balance` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `supplier_details`
--

INSERT INTO `supplier_details` (`id`, `supplier_name`, `supplier_address`, `supplier_contact1`, `supplier_contact2`, `balance`) VALUES
(2, 'supplier1', 'ldsfl\r\ndsf\r\n\r\nds', '22324324', '09043590', 0),
(3, 'MDK', 'MITYANA', '0753890765', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `customer` varchar(250) NOT NULL,
  `supplier` varchar(250) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `due` datetime NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rid` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `type`, `customer`, `supplier`, `subtotal`, `payment`, `balance`, `due`, `date`, `rid`) VALUES
(1, 'entry', '', '12455', 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '2010-03-11 17:31:26', 'SE123'),
(2, 'entry', '', '12455', 0.00, 100.00, 900.00, '2010-03-10 00:00:00', '2010-03-11 17:39:19', 'SE125'),
(3, 'entry', '', '12455', 0.00, 900.00, 0.00, '2010-03-10 00:00:00', '2010-03-11 17:39:28', 'SE125'),
(4, 'entry', '', '12455', 6086.00, 1000.00, 86.00, '2010-03-10 00:00:00', '2010-03-11 17:42:00', 'SE132'),
(5, 'sales', '', '', 57902.00, 50000.00, 5902.00, '2010-03-25 00:00:00', '2010-03-12 17:43:17', 'SA82'),
(6, 'sales', '', '', 57902.00, 2000.00, 3902.00, '2010-03-25 00:00:00', '2010-03-12 17:43:23', 'SA82'),
(7, 'sales', 'customer1', '', 5712.00, 2000.00, 1712.00, '2010-03-13 00:00:00', '2010-03-12 17:45:46', 'SA64'),
(8, 'entry', '', '12455', 3060.00, 100.00, 960.00, '2010-03-11 00:00:00', '2010-03-21 20:16:46', 'SE155'),
(9, 'sales', 'customer1', '', 80.00, 7668.00, 0.00, '2010-05-11 00:00:00', '2020-07-08 09:55:06', 'SA1'),
(10, 'sales', 'customer1', '', 80.00, 7668.00, 0.00, '2010-05-11 00:00:00', '2020-07-08 09:59:31', 'SA1');

-- --------------------------------------------------------

--
-- Table structure for table `uom_details`
--

CREATE TABLE IF NOT EXISTS `uom_details` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `spec` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `uom_details`
--

INSERT INTO `uom_details` (`id`, `name`, `spec`) VALUES
(0000000006, 'UOM1', 'UOM1 Specification'),
(0000000007, 'UOM2', 'UOM2 Specification'),
(0000000008, 'UOM3', 'UOM3 Specification'),
(0000000009, 'UOM4', 'UOM4 Specification');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
