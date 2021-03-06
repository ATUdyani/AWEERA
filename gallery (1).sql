-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2017 at 05:44 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aweeradb`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(100) NOT NULL,
  `date_added` datetime(6) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=126 ;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
