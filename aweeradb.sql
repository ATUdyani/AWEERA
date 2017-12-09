-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2017 at 06:30 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aweeradb`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `appointment_id` varchar(20) NOT NULL,
  `appointment_date` date NOT NULL,
  `start_time` varchar(11) NOT NULL,
  `end_time` varchar(11) NOT NULL,
  `payment_id` varchar(20) NOT NULL DEFAULT 'none',
  `cust_id` varchar(20) NOT NULL,
  `service_id` varchar(20) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `comment` varchar(1000) DEFAULT NULL,
  `is_approved` tinyint(4) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`appointment_id`,`payment_id`,`cust_id`),
  KEY `fk_Appointment_Payment1` (`payment_id`),
  KEY `fk_Appointment_Customer1` (`cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `appointment_date`, `start_time`, `end_time`, `payment_id`, `cust_id`, `service_id`, `emp_id`, `comment`, `is_approved`) VALUES
('APP0000002', '2017-10-10', '1130', '1200', 'none', 'REG0000004', 'SER0000001', 'EMP0000003', 'AWEERA is the best!', -1),
('APP0000003', '2017-10-10', '1400', '1430', 'none', 'REG0000004', 'SER0000001', 'EMP0000003', 'Great Service!', -1),
('APP0000004', '2017-10-11', '1000', '1045', 'none', 'REG0000004', 'SER0000003', 'EMP0000005', 'Got the perfect solution!', 1),
('APP0000005', '2017-10-11', '0930', '1000', 'none', 'REG0000004', 'SER0000001', 'EMP0000005', 'Nice work, thanks', -1),
('APP0000006', '2017-10-11', '1315', '1345', 'none', 'REG0000004', 'SER0000001', 'EMP0000005', 'Good good!', 0),
('APP0000007', '2017-10-17', '0930', '1000', 'none', 'REG0000004', 'SER0000002', 'EMP0000006', 'Professional Touch! PERFECT! All the best, keep it up', 1),
('APP0000008', '2017-10-17', '1300', '1345', 'none', 'REG0000004', 'SER0000006', 'EMP0000007', 'Hair Care, perfectly handled!', 1),
('APP0000009', '2017-10-18', '1200', '1230', 'none', 'REG0000001', 'SER0000002', 'EMP0000008', 'Thanks! Hope to come again ...', 1),
('APP0000010', '2017-10-18', '1030', '1115', 'none', 'REG0000001', 'SER0000006', 'EMP0000007', 'Like to come again, thanks', 1),
('APP0000011', '2017-10-20', '1300', '1330', 'none', 'REG0000001', 'SER0000002', 'EMP0000003', 'Thank you AWEERA, Great Job!', 1),
('APP0000012', '2017-10-20', '1300', '1330', 'none', 'REG0000001', 'SER0000002', 'EMP0000006', 'Best haircut I''ve ever had!', 1),
('APP0000013', '2017-10-20', '1400', '1430', 'none', 'REG0000001', 'SER0000004', 'EMP0000006', 'Got an experience of a REAL facial!', 1),
('APP0000014', '2017-10-29', '1100', '1130', 'none', 'REG0000004', 'SER0000001', 'EMP0000003', 'Nice haircut with professional touch!', 1),
('APP0000015', '2017-11-03', '1230', '1300', 'none', 'REG0000001', 'SER0000001', 'EMP0000003', 'Got very good advices, Like to come again!', 1),
('APP0000017', '2017-12-01', '1200', '1245', 'none', 'REG0000007', 'SER0000003', 'EMP0000005', 'Best cleanup I''ve ever had, thanks AWEERA!', 1),
('APP0000019', '2017-12-05', '1500', '1530', 'none', 'REG0000007', 'SER0000001', 'EMP0000003', NULL, -1),
('APP0000020', '2017-12-06', '1300', '1345', 'none', 'REG0000007', 'SER0000003', 'EMP0000005', NULL, -1),
('APP0000021', '2017-12-06', '1200', '1230', 'none', 'REG0000007', 'SER0000001', 'EMP0000003', NULL, -1),
('APP0000022', '2017-12-06', '1500', '1530', 'none', 'REG0000007', 'SER0000001', 'EMP0000003', NULL, -1),
('APP0000023', '2017-12-08', '1430', '1500', 'none', 'REG0000007', 'SER0000001', 'EMP0000003', NULL, -1),
('APP0000024', '2017-12-08', '1400', '1430', 'none', 'REG0000007', 'SER0000001', 'EMP0000003', NULL, -1),
('APP0000025', '2017-12-09', '1230', '1300', 'none', 'REG0000007', 'SER0000001', 'EMP0000003', NULL, -1);

-- --------------------------------------------------------

--
-- Table structure for table `beautician`
--

DROP TABLE IF EXISTS `beautician`;
CREATE TABLE IF NOT EXISTS `beautician` (
  `emp_id` varchar(20) NOT NULL,
  `job_title` varchar(20) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `beautician_service`
--

DROP TABLE IF EXISTS `beautician_service`;
CREATE TABLE IF NOT EXISTS `beautician_service` (
  `emp_id` varchar(20) NOT NULL,
  `service_id` varchar(20) NOT NULL,
  PRIMARY KEY (`emp_id`,`service_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beautician_service`
--

INSERT INTO `beautician_service` (`emp_id`, `service_id`) VALUES
('EMP0000003', 'SER0000001'),
('EMP0000003', 'SER0000002'),
('EMP0000005', 'SER0000001'),
('EMP0000005', 'SER0000003'),
('EMP0000006', 'SER0000002'),
('EMP0000006', 'SER0000003'),
('EMP0000006', 'SER0000004'),
('EMP0000007', 'SER0000003'),
('EMP0000007', 'SER0000004'),
('EMP0000007', 'SER0000005'),
('EMP0000007', 'SER0000006'),
('EMP0000007', 'SER0000007'),
('EMP0000008', 'SER0000001'),
('EMP0000008', 'SER0000002'),
('EMP0000009', 'SER0000001'),
('EMP0000009', 'SER0000005'),
('EMP0000009', 'SER0000006'),
('EMP0000009', 'SER0000007');

-- --------------------------------------------------------

--
-- Table structure for table `choice`
--

DROP TABLE IF EXISTS `choice`;
CREATE TABLE IF NOT EXISTS `choice` (
  `choice_id` int(255) NOT NULL AUTO_INCREMENT,
  `choice_name` varchar(20) NOT NULL,
  PRIMARY KEY (`choice_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `cust_id` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `cust_phone` varchar(12) NOT NULL,
  `cust_address` varchar(60) DEFAULT NULL,
  `cust_email` varchar(30) DEFAULT NULL,
  `date_joined` date DEFAULT NULL,
  `cust_gender` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `first_name`, `last_name`, `cust_phone`, `cust_address`, `cust_email`, `date_joined`, `cust_gender`) VALUES
('REG0000001', 'Vishni', 'Ganepola', '0775896548', 'Kandana', 'vishni@gmail.com', '2017-09-01', NULL),
('REG0000004', 'Hisan', 'Hunais', '0768526186', 'Dehiwala', 'hisanhunais.live@gmail.com', '2017-10-08', NULL),
('REG0000005', 'Sandunika', 'Wattearachchi', '0771380014', 'Moratuwa', 'sw97100@gmail.com', '2017-10-08', NULL),
('REG0000007', 'Ama', 'Gamage', '0776325654', 'Panadura', 'wasurawattearachchi@gmail.com', '2017-11-28', NULL),
('UNR0000001', 'Anne ', 'Fernando', '0778956565', NULL, NULL, NULL, 'Female'),
('UNR0000002', 'Shanilka', 'Soyza', '0714554412', NULL, NULL, NULL, 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` varchar(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `emp_email` varchar(50) NOT NULL,
  `emp_phone` varchar(12) NOT NULL,
  `emp_address` varchar(60) NOT NULL,
  `emp_type` varchar(20) DEFAULT NULL,
  `emp_gender` varchar(10) NOT NULL,
  `is_user` tinyint(1) NOT NULL DEFAULT '0',
  `profile_pic` varchar(30) NOT NULL DEFAULT 'none.jpg',
  PRIMARY KEY (`emp_id`),
  UNIQUE KEY `emp_email_UNIQUE` (`emp_email`),
  UNIQUE KEY `emp_phone_UNIQUE` (`emp_phone`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `first_name`, `last_name`, `emp_email`, `emp_phone`, `emp_address`, `emp_type`, `emp_gender`, `is_user`, `profile_pic`) VALUES
('EMP0000001', 'Wasura', 'Wattearachchi', 'wasuradananjith@gmail.com', '0713888888', 'Moratuwa', 'Administrator', 'Male', 1, '5a2ad93694d070.65134330.jpg'),
('EMP0000002', 'Thilakshika', 'Udyani', 'thilakshika@gmail.com', '0713132431', 'Panadura', 'Receptionist', 'Female', 1, '5a2add240a3460.91513380.jpg'),
('EMP0000003', 'Dharana', 'Weerawarna', 'wdharana@gmail.com', '0714589656', 'Moratuwa', 'Beautician', 'Male', 1, '5a2ade7c916ff8.20644714.jpg'),
('EMP0000004', 'Elankumaran', 'Thanga', 'elankumaran@gmail.com', '0774565456', 'Jaffna', 'Administrator', 'Male', 0, 'none.jpg'),
('EMP0000005', 'Avishka', 'Perera', 'avishka@gmail.com', '0774589653', 'Rathmalana', 'Beautician', 'Male', 0, 'none.jpg'),
('EMP0000006', 'Sachini', 'Fernando', 'sachini@gmail.com', '0714589652', 'Rajagiriya', 'Beautician', 'Female', 0, 'none.jpg'),
('EMP0000007', 'Surangi', 'De Silva', 'surangi@gmail.com', '0778965412', 'Moratuwa', 'Beautician', 'Female', 0, 'none.jpg'),
('EMP0000008', 'Mohammed', 'Imdad', 'imdad@gmail.com', '0789655412', 'Jaffna', 'Beautician', 'Male', 1, 'none.jpg'),
('EMP0000009', 'Aruna', 'Silva', 'aruna@gmail.com', '0714556656', 'Mt. Lavania', 'Beautician', 'Male', 0, 'none.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(100) NOT NULL,
  `date_added` datetime(6) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=MyISAM AUTO_INCREMENT=126 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`image_id`, `path`, `date_added`) VALUES
(102, '5a2b4c96d77782.68887619.jpg', '2017-12-09 03:38:14.000000'),
(103, '5a2b4c9b94a9a7.27950312.jpg', '2017-12-09 03:38:19.000000'),
(104, '5a2b4ca06dd9c6.74813994.jpg', '2017-12-09 03:38:24.000000'),
(105, '5a2b4cb4604a52.69521685.jpg', '2017-12-09 03:38:44.000000'),
(106, '5a2b4cb969a622.20023392.jpg', '2017-12-09 03:38:49.000000'),
(107, '5a2b4cbd40dd64.98441235.jpg', '2017-12-09 03:38:53.000000'),
(108, '5a2b4cc8255867.74657040.jpg', '2017-12-09 03:39:04.000000'),
(109, '5a2b4ccc6ddc39.52670047.jpg', '2017-12-09 03:39:08.000000'),
(110, '5a2b4cd1a063b1.76978851.jpg', '2017-12-09 03:39:13.000000'),
(111, '5a2b4cd60c15c9.02916322.jpg', '2017-12-09 03:44:29.000000'),
(112, '5a2b4cdcc3ee22.17730291.jpg', '2017-12-09 03:39:24.000000'),
(113, '5a2b4ce04c1950.30817687.jpg', '2017-12-09 03:39:28.000000'),
(114, '5a2b4ceb86d996.13853536.jpg', '2017-12-09 03:39:39.000000'),
(115, '5a2b4cf06f9932.75507801.jpg', '2017-12-09 03:39:44.000000'),
(116, '5a2b4cf67d1457.04715045.jpg', '2017-12-09 03:39:50.000000'),
(117, '5a2b4cfad2d255.75791899.jpg', '2017-12-09 03:39:54.000000'),
(118, '5a2b4d027539d2.44384737.jpg', '2017-12-09 03:40:02.000000'),
(119, '5a2b4d07066511.30805068.jpg', '2017-12-09 03:40:07.000000'),
(120, '5a2b4d4e313e04.91419306.jpg', '2017-12-09 03:44:00.000000'),
(121, '5a2b4d5c2b44e5.28157187.jpg', '2017-12-09 03:41:32.000000'),
(122, '5a2b4d618ba992.80285379.jpg', '2017-12-09 03:42:35.000000'),
(123, '5a2b4d6661dd13.40525659.jpg', '2017-12-09 03:42:30.000000'),
(124, '5a2b4d6ab563c7.38855003.jpg', '2017-12-09 03:41:46.000000'),
(125, '5a2b4d6f4c40f2.53341047.jpg', '2017-12-09 03:44:43.000000');

-- --------------------------------------------------------

--
-- Table structure for table `mirror`
--

DROP TABLE IF EXISTS `mirror`;
CREATE TABLE IF NOT EXISTS `mirror` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(256) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mirror`
--

INSERT INTO `mirror` (`image_id`, `image`) VALUES
(1, 'img\\mirror\\hairstyle1.png'),
(2, 'img\\mirror\\hairstyle2.png'),
(3, 'img\\mirror\\hairstyle3.png'),
(4, 'img\\mirror\\hairstyle4.png'),
(5, 'img\\mirror\\hairstyle5.png'),
(6, 'img\\mirror\\hairstyle6.png');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` varchar(20) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_time` time NOT NULL,
  `payment_mode` varchar(20) NOT NULL,
  `paid_amount` float(10,2) NOT NULL,
  `balance` float(10,2) NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_date`, `payment_time`, `payment_mode`, `paid_amount`, `balance`, `type`) VALUES
('PAY0000001', '2017-12-06', '03:00:00', 'Cash', 1500.00, 250.00, 'Appointment'),
('PAY0000002', '2017-12-06', '08:00:00', 'Cash', 3000.00, 1000.00, 'Appointment'),
('PAY0000003', '2017-12-06', '12:00:00', 'Card', 1000.00, 0.00, 'Purchase'),
('PAY0000004', '2017-12-06', '18:00:00', 'Cash', 1500.00, 150.00, 'Purchase');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
CREATE TABLE IF NOT EXISTS `purchase` (
  `purchase_id` varchar(20) NOT NULL,
  `payment_id` varchar(20) NOT NULL,
  PRIMARY KEY (`purchase_id`,`payment_id`),
  KEY `fk_Purchase_Payment1` (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchase_id`, `payment_id`) VALUES
('PUR0000001', 'PAY0000003'),
('PUR0000002', 'PAY0000004');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_stock`
--

DROP TABLE IF EXISTS `purchase_stock`;
CREATE TABLE IF NOT EXISTS `purchase_stock` (
  `purchase_id` varchar(20) NOT NULL,
  `stock_id` varchar(20) NOT NULL,
  `quantity` int(10) NOT NULL,
  PRIMARY KEY (`purchase_id`,`stock_id`),
  KEY `fk_Purchase_has_Stock_Item_Stock_Item1` (`stock_id`),
  KEY `fk_Purchase_has_Stock_Item_Purchase` (`purchase_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registered_customer`
--

DROP TABLE IF EXISTS `registered_customer`;
CREATE TABLE IF NOT EXISTS `registered_customer` (
  `cust_id` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `cust_phone` varchar(12) NOT NULL,
  `cust_address` varchar(60) NOT NULL,
  `cust_email` varchar(30) NOT NULL,
  `date_joined` date NOT NULL,
  `password` varchar(40) NOT NULL,
  `profile_pic` varchar(30) DEFAULT 'none.jpg',
  PRIMARY KEY (`cust_id`),
  UNIQUE KEY ` cust_phone_UNIQUE` (`cust_phone`),
  UNIQUE KEY `cust_email_UNIQUE` (`cust_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registered_customer`
--

INSERT INTO `registered_customer` (`cust_id`, `first_name`, `last_name`, `cust_phone`, `cust_address`, `cust_email`, `date_joined`, `password`, `profile_pic`) VALUES
('REG0000001', 'Vishni', 'Ganepola', '0775896548', 'Kandana', 'vishni@gmail.com', '2017-09-01', '900150983cd24fb0d6963f7d28e17f72', 'none.jpg'),
('REG0000004', 'Hisan', 'Hunais', '0768526186', 'Dehiwala', 'hisanhunais.live@gmail.com', '2017-10-08', '900150983cd24fb0d6963f7d28e17f72', 'none.jpg'),
('REG0000005', 'Sandunika', 'Wattearachchi', '0771380014', 'Moratuwa', 'sw97100@gmail.com', '2017-10-08', '900150983cd24fb0d6963f7d28e17f72', 'none.jpg'),
('REG0000007', 'Ama', 'Gamage', '0776325654', 'Panadura', 'wasurawattearachchi@gmail.com', '2017-11-28', '900150983cd24fb0d6963f7d28e17f72', 'none.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `register_request`
--

DROP TABLE IF EXISTS `register_request`;
CREATE TABLE IF NOT EXISTS `register_request` (
  `reg_id` int(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `cust_phone` varchar(12) NOT NULL,
  `cust_address` varchar(60) NOT NULL,
  `cust_email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`reg_id`),
  KEY `reg_id` (`reg_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_request`
--

INSERT INTO `register_request` (`reg_id`, `first_name`, `last_name`, `cust_phone`, `cust_address`, `cust_email`, `password`) VALUES
(21, 'Shehan', 'Dinuka', '0771256589', 'Awissawella', 'homewsp@gmail.com', '900150983cd24fb0d6963f7d28e17f72');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `service_id` varchar(20) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `service_charge` float(10,2) NOT NULL,
  `description` varchar(50) NOT NULL,
  `duration` int(3) NOT NULL,
  `commission_percentage` int(3) NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_name`, `service_charge`, `description`, `duration`, `commission_percentage`) VALUES
('SER0000001', 'Gents Haircut', 1500.00, 'Haircut', 30, 20),
('SER0000002', 'Ladies Haircut', 1500.00, 'Haircut', 30, 20),
('SER0000003', 'Gold Cleanup', 2500.00, 'Cleanup', 45, 20),
('SER0000004', 'Gold Facial', 1500.00, 'Facial', 30, 10),
('SER0000005', 'Oil Treatment', 800.00, 'Hair Treatment', 45, 20),
('SER0000006', 'Conditioning Treatment', 1200.00, 'Hair Treatment', 45, 20),
('SER0000007', 'Protein Treatment', 1200.00, 'Hair Treatment', 45, 20),
('SER0000008', 'Gold Pedicure', 1000.00, 'Pedicure', 30, 10);

-- --------------------------------------------------------

--
-- Table structure for table `stock_item`
--

DROP TABLE IF EXISTS `stock_item`;
CREATE TABLE IF NOT EXISTS `stock_item` (
  `stock_id` varchar(20) NOT NULL,
  `stock_brand` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `stock_count` int(10) NOT NULL,
  `price` float(10,2) NOT NULL,
  `description` varchar(50) NOT NULL,
  `supplier_id` varchar(20) NOT NULL,
  PRIMARY KEY (`stock_id`,`supplier_id`),
  KEY `fk_Stock_Item_Supplier1` (`supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_item`
--

INSERT INTO `stock_item` (`stock_id`, `stock_brand`, `type`, `stock_count`, `price`, `description`, `supplier_id`) VALUES
('STK0000001', 'Una', 'Shampo', 20, 2000.00, '500ml, Dandruff', 'SUP0000001'),
('STK0000002', 'Una', 'Conditioner', 10, 1500.00, '500ml, Hair Fall Rescue', 'SUP0000001'),
('STK0000003', 'Gliss', 'Shampo', 5, 1250.00, '250ml, Asia Straight', 'SUP0000002');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `supplier_id` varchar(20) NOT NULL,
  `supplier_name` varchar(20) NOT NULL,
  `supplier_phone` varchar(12) NOT NULL,
  `supplier_address` varchar(60) NOT NULL,
  `supplier_email` varchar(30) NOT NULL,
  PRIMARY KEY (`supplier_id`),
  UNIQUE KEY `supplier_email_UNIQUE` (`supplier_email`),
  UNIQUE KEY `supplier_phone_UNIQUE` (`supplier_phone`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_phone`, `supplier_address`, `supplier_email`) VALUES
('SUP0000001', 'Dushani Perera', '0778546933', 'Ja Ela', 'dushanimasha@gmail.com'),
('SUP0000002', 'Nimesh Kalinga', '078965412', 'Maradana', 'nimesh@gmail.com'),
('SUP0000003', 'Pasindu Perera', '0714526985', 'Dehiwala', 'pasindu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `unregistered_customer`
--

DROP TABLE IF EXISTS `unregistered_customer`;
CREATE TABLE IF NOT EXISTS `unregistered_customer` (
  `cust_id` varchar(20) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) NOT NULL,
  `cust_phone` varchar(12) NOT NULL,
  `cust_gender` varchar(10) NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unregistered_customer`
--

INSERT INTO `unregistered_customer` (`cust_id`, `first_name`, `last_name`, `cust_phone`, `cust_gender`) VALUES
('UNR0000001', 'Anne ', 'Fernando', '0778956565', 'Female'),
('UNR0000002', 'Shanilka', 'Soyza', '0714554412', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `type` varchar(15) NOT NULL,
  `user_reg_id` varchar(20) NOT NULL,
  `profile_pic` varchar(30) NOT NULL DEFAULT 'none.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `last_login`, `is_deleted`, `type`, `user_reg_id`, `profile_pic`) VALUES
(17, 'Thilakshika', 'Udyani', 'thilakshika@gmail.com', '900150983cd24fb0d6963f7d28e17f72', '2017-12-09 11:57:18', 0, 'Receptionist', 'EMP0000002', '5a2add240a3460.91513380.jpg'),
(18, 'Wasura', 'Wattearachchi', 'wasuradananjith@gmail.com', '900150983cd24fb0d6963f7d28e17f72', '2017-12-09 11:33:13', 0, 'Administrator', 'EMP0000001', '5a2ad93694d070.65134330.jpg'),
(19, 'Vishni', 'Ganepola', 'vishni@gmail.com ', '900150983cd24fb0d6963f7d28e17f72', '2017-11-02 09:58:26', 0, 'Customer', 'REG0000001', 'none.jpg'),
(26, 'Dharana', 'Weerawarna', 'wdharana@gmail.com', '900150983cd24fb0d6963f7d28e17f72', '2017-12-09 00:18:39', 0, 'Beautician', 'EMP0000003', '5a2ade7c916ff8.20644714.jpg'),
(29, 'Hisan', 'Hunais', 'hisanhunais.live@gmail.com', '900150983cd24fb0d6963f7d28e17f72', '2017-12-04 12:29:36', 0, 'Customer', 'REG0000004', 'none.jpg'),
(30, 'Sandunika', 'Wattearachchi', 'sw97100@gmail.com', '900150983cd24fb0d6963f7d28e17f72', NULL, 0, 'Customer', 'REG0000005', 'none.jpg'),
(31, 'Ama', 'Gamage', 'wasurawattearachchi@gmail.com', '900150983cd24fb0d6963f7d28e17f72', '2017-12-08 15:40:25', 0, 'Customer', 'REG0000007', 'none.jpg'),
(35, 'Shehan', 'Dinuka', 'homewsp@gmail.com', '900150983cd24fb0d6963f7d28e17f72', NULL, 0, 'Customer', 'REG0000008', 'none.jpg'),
(36, 'Hermione', 'Granger', 'wasuradananjith@ieee.org', '900150983cd24fb0d6963f7d28e17f72', NULL, 0, 'Customer', 'REG0000009', 'none.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `fk_Purchase_Payment1` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`payment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `purchase_stock`
--
ALTER TABLE `purchase_stock`
  ADD CONSTRAINT `fk_Purchase_has_Stock_Item_Purchase` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`purchase_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Purchase_has_Stock_Item_Stock_Item1` FOREIGN KEY (`stock_id`) REFERENCES `stock_item` (`stock_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stock_item`
--
ALTER TABLE `stock_item`
  ADD CONSTRAINT `fk_Stock_Item_Supplier1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
