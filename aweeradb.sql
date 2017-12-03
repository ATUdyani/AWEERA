-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2017 at 01:14 PM
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
  `payment_id` varchar(20) NOT NULL,
  `cust_id` varchar(20) NOT NULL,
  `service_id` varchar(20) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `comment` varchar(100) DEFAULT NULL,
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
('APP0000018', '2017-12-02', '1430', '1500', 'none', 'REG0000007', 'SER0000001', 'EMP0000003', NULL, -1),
('APP0000021', '2017-12-02', '1100', '1145', 'none', 'REG0000007', 'SER0000003', 'EMP0000006', NULL, -1),
('APP0000022', '2017-12-02', '1445', '1515', 'none', 'REG0000007', 'SER0000004', 'EMP0000006', NULL, -1),
('APP0000023', '2017-12-04', '1230', '1300', 'none', 'REG0000007', 'SER0000001', 'EMP0000003', NULL, -1);

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
  `cust_type` varchar(20) NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(16) DEFAULT NULL,
  `emp_type` varchar(20) DEFAULT NULL,
  `emp_gender` varchar(10) NOT NULL,
  `is_user` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`emp_id`),
  UNIQUE KEY `emp_email_UNIQUE` (`emp_email`),
  UNIQUE KEY `emp_phone_UNIQUE` (`emp_phone`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `first_name`, `last_name`, `emp_email`, `emp_phone`, `emp_address`, `username`, `password`, `emp_type`, `emp_gender`, `is_user`) VALUES
('EMP0000001', 'Wasura', 'Wattearachchi', 'wasuradananjith@gmail.com', '0775706398', 'Moratuwa', NULL, NULL, 'Administrator', 'Male', 1),
('EMP0000002', 'Thilakshika', 'Udyani', 'thilakshika@gmail.com', '0771236547', 'Panadura', NULL, NULL, 'Receptionist', 'Female', 1),
('EMP0000003', 'Dharana', 'Weerawarna', 'wdharana@gmail.com', '0714589656', 'Moratuwa', NULL, NULL, 'Beautician', 'Male', 1),
('EMP0000004', 'Elankumaran', 'Thanga', 'elankumaran@gmail.com', '0774565456', 'Jaffna', NULL, NULL, 'Administrator', 'Male', 0),
('EMP0000005', 'Avishka', 'Perera', 'avishka@gmail.com', '0774589653', 'Rathmalana', NULL, NULL, 'Beautician', 'Male', 0),
('EMP0000006', 'Sachini', 'Fernando', 'sachini@gmail.com', '0714589652', 'Rajagiriya', NULL, NULL, 'Beautician', 'Female', 0),
('EMP0000007', 'Surangi', 'De Silva', 'surangi@gmail.com', '0778965412', 'Moratuwa', NULL, NULL, 'Beautician', 'Female', 0),
('EMP0000008', 'Mohammed', 'Imdad', 'imdad@gmail.com', '0789655412', 'Jaffna', NULL, NULL, 'Beautician', 'Male', 1),
('EMP0000009', 'Aruna', 'Silva', 'aruna@gmail.com', '0714556656', 'Mt. Lavania', NULL, NULL, 'Beautician', 'Male', 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`image_id`, `path`, `date_added`) VALUES
(14, '5a22e23488c252.72833552.jpg', '2017-12-02 17:26:12.000000'),
(13, '5a22e22668b2c0.04614764.jpg', '2017-12-02 17:32:26.000000'),
(15, '5a22e23cbdd1f9.81109506.jpg', '2017-12-03 06:02:12.000000'),
(16, '5a22e241b7bfe1.08574175.jpg', '2017-12-03 06:03:13.000000'),
(17, '5a22e2461fa328.00562190.jpg', '2017-12-03 06:19:28.000000'),
(18, '5a22e24f182d91.57808924.jpg', '2017-12-02 17:26:39.000000'),
(19, '5a22e261603ec5.10481279.jpg', '2017-12-03 06:21:03.000000'),
(20, '5a22e37ea4bde7.07960825.jpg', '2017-12-02 17:31:42.000000'),
(21, '5a22e4f8bfd295.32807720.jpg', '2017-12-03 06:04:01.000000'),
(22, '5a22e552cf2bb8.47819109.jpg', '2017-12-03 06:20:58.000000'),
(23, '5a238b2263aa21.00655776.jpg', '2017-12-03 06:13:29.000000');

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
('none', '2017-10-09', '00:00:00', '', 0.00, 0.00, '');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
CREATE TABLE IF NOT EXISTS `purchase` (
  `purchase_id` varchar(20) NOT NULL,
  `purchase_date` date NOT NULL,
  `cust_id` varchar(20) NOT NULL,
  `payment_id` varchar(20) NOT NULL,
  PRIMARY KEY (`purchase_id`,`cust_id`,`payment_id`),
  KEY `fk_Purchase_Payment1` (`payment_id`),
  KEY `fk_Purchase_Customer1` (`cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  PRIMARY KEY (`cust_id`),
  UNIQUE KEY ` cust_phone_UNIQUE` (`cust_phone`),
  UNIQUE KEY `cust_email_UNIQUE` (`cust_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registered_customer`
--

INSERT INTO `registered_customer` (`cust_id`, `first_name`, `last_name`, `cust_phone`, `cust_address`, `cust_email`, `date_joined`, `password`) VALUES
('REG0000001', 'Vishni', 'Ganepola', '0775896548', 'Kandana', 'vishni@gmail.com', '2017-09-01', '900150983cd24fb0d6963f7d28e17f72'),
('REG0000004', 'Hisan', 'Hunais', '0768526186', 'Dehiwala', 'hisan.live@gmail.com', '2017-10-08', '900150983cd24fb0d6963f7d28e17f72'),
('REG0000005', 'Sandunika', 'Wattearachchi', '0771380014', 'Moratuwa', 'sw97100@gmail.com', '2017-10-08', '900150983cd24fb0d6963f7d28e17f72'),
('REG0000007', 'Ama', 'Gamage', '0776325654', 'Panadura', 'wasurawattearachchi@gmail.com', '2017-11-28', '900150983cd24fb0d6963f7d28e17f72');

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_request`
--

INSERT INTO `register_request` (`reg_id`, `first_name`, `last_name`, `cust_phone`, `cust_address`, `cust_email`, `password`) VALUES
(15, 'Harry', 'Potter', '0771256565', 'Mt. Lavania', 'wasuradananjith@ieee.org', '900150983cd24fb0d6963f7d28e17f72');

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
('SER0000001', 'Gents Haircut', 1000.00, 'Haircut', 30, 20),
('SER0000002', 'Ladies Haircut', 1500.00, 'Haircut', 30, 20),
('SER0000003', 'Gold Cleanup', 2500.00, 'Cleanup', 45, 20),
('SER0000004', 'Gold Facial', 1500.00, 'Facial', 30, 10),
('SER0000005', 'Oil Treatment', 800.00, 'Hair Treatment', 45, 20),
('SER0000006', 'Conditioning Treatment', 1200.00, 'Hair Treatment', 45, 20),
('SER0000007', 'Protein Treatment', 1200.00, 'Hair Treatment', 45, 20);

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
('STK0000001', 'Una', 'Shampo', 15, 2000.00, '500ml, Dandruff', 'SUP0000001'),
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
('SUP0000001', 'Dushani Perera', '0778546932', 'Ja Ela', 'dushanimasha@gmail.com'),
('SUP0000002', 'Nimesh Kalinga', '078965412', 'Maradana', 'nimesh@gmail.com'),
('SUP0000003', 'Pasindu Perera', '0714526985', 'Dehiwala', 'pasindu@gmail.com');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `last_login`, `is_deleted`, `type`, `user_reg_id`) VALUES
(17, 'Thilakshika', 'Udyani', 'thilakshika@gmail.com', '900150983cd24fb0d6963f7d28e17f72', '2017-12-03 18:40:00', 0, 'Receptionist', 'EMP0000002'),
(18, 'Wasura', 'Wattearachchi', 'wasuradananjith@gmail.com', '900150983cd24fb0d6963f7d28e17f72', '2017-12-03 18:16:40', 0, 'Administrator', 'EMP0000001'),
(19, 'Vishni', 'Ganepola', 'vishni@gmail.com ', '900150983cd24fb0d6963f7d28e17f72', '2017-11-02 09:58:26', 0, 'Customer', 'REG0000001'),
(26, 'Dharana', 'Weerawarna', 'wdharana@gmail.com', '900150983cd24fb0d6963f7d28e17f72', '2017-12-03 18:18:40', 0, 'Beautician', 'EMP0000003'),
(29, 'Hisan', 'Hunais', 'hisan.live@gmail.com', '900150983cd24fb0d6963f7d28e17f72', '2017-11-30 17:34:53', 0, 'Customer', 'REG0000004'),
(30, 'Sandunika', 'Wattearachchi', 'sw97100@gmail.com', '900150983cd24fb0d6963f7d28e17f72', NULL, 0, 'Customer', 'REG0000005'),
(31, 'Ama', 'Gamage', 'wasurawattearachchi@gmail.com', '900150983cd24fb0d6963f7d28e17f72', '2017-12-03 18:17:37', 0, 'Customer', 'REG0000007');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `fk_Appointment_Payment1` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`payment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `fk_Purchase_Customer1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
