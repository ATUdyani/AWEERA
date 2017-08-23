-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2017 at 07:32 AM
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
  `appointment_time` time NOT NULL,
  `payment_id` varchar(20) NOT NULL,
  `cust_id` varchar(20) NOT NULL,
  PRIMARY KEY (`appointment_id`,`payment_id`,`cust_id`),
  KEY `fk_Appointment_Payment1` (`payment_id`),
  KEY `fk_Appointment_Customer1` (`cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('EMP0000003', 'SER0000002');

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
('EMP0000003', 'Dharana', 'Weerawarna', 'wdharana@gmail.com', '0714589656', 'Moratuwa', NULL, NULL, 'Beautician', 'Male', 0),
('EMP0000004', 'Elankumaran', 'Thanga', 'elankumaran@gmail.com', '0774565456', 'Jaffna', NULL, NULL, 'Administrator', 'Male', 0);

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
  `username` varchar(30) NOT NULL,
  `password` varchar(16) NOT NULL,
  PRIMARY KEY (`cust_id`),
  UNIQUE KEY ` cust_phone_UNIQUE` (`cust_phone`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `cust_email_UNIQUE` (`cust_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registered_customer`
--

INSERT INTO `registered_customer` (`cust_id`, `first_name`, `last_name`, `cust_phone`, `cust_address`, `cust_email`, `date_joined`, `username`, `password`) VALUES
('REG0000001', 'Vishni', 'Ganepola', '0714858989', 'Kotte', 'vishni@gmail.com', '2017-08-01', 'vishni@gmail.com', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `register_user`
--

DROP TABLE IF EXISTS `register_user`;
CREATE TABLE IF NOT EXISTS `register_user` (
  `reg_id` int(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `cust_phone` varchar(12) NOT NULL,
  `cust_address` varchar(60) NOT NULL,
  `cust_email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`reg_id`),
  KEY `reg_id` (`reg_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_user`
--

INSERT INTO `register_user` (`reg_id`, `first_name`, `last_name`, `cust_phone`, `cust_address`, `cust_email`, `password`) VALUES
(1, 'Aruna', 'Jayathilake', '0774589658', 'Panadura', 'arunajaya@gmail.com', '202cb962ac59075b964b07152d234b70'),
(2, 'Vishni', 'Ganepola', '0774896547', 'Moratuwa', 'vishnxvi@gmail.com', '900150983cd24fb0d6963f7d28e17f72');

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
('SER0000001', 'Gents Haircut', 1000.00, 'Haircut', 30, 15),
('SER0000002', 'Ladies Haircut', 1500.00, 'Haircut', 30, 20),
('SER0000003', 'Gold Cleanup', 2500.00, 'Cleanup', 45, 20);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `last_login`, `is_deleted`, `type`) VALUES
(17, 'Thilakshika', 'Udyani', 'thilakshika@gmail.com', '900150983cd24fb0d6963f7d28e17f72', NULL, 0, 'Receptionist'),
(18, 'Wasura', 'Wattearachchi', 'wasuradananjith@gmail.com', '900150983cd24fb0d6963f7d28e17f72', '2017-08-23 12:58:13', 0, 'Administrator');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `fk_Appointment_Customer1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
