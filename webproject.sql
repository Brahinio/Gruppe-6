-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 10, 2017 at 02:01 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE IF NOT EXISTS `markers` (
  `id` int(11) NOT NULL,
  `name` varchar(60) CHARACTER SET utf8 NOT NULL,
  `area` varchar(100) CHARACTER SET utf8 NOT NULL,
  `city` varchar(100) CHARACTER SET utf8 NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) CHARACTER SET utf8 NOT NULL,
  `description` varchar(300) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `name`, `area`, `city`, `lat`, `lng`, `type`, `description`) VALUES
(1, 'Delicatessen Majorstuen', 'frogner', 'oslo', 59.928627, 10.759843, 'restaurant', ''),
(2, 'Meny Oslo City', 'sentrum', 'oslo', 59.912827, 10.752672, 'matbutikk', ''),
(3, 'Altethic Vulkan', 'grunerløkka', 'oslo', 59.923149, 10.752198, 'aktivitet', ''),
(4, 'Elvebakken videregående skole', 'gamle oslo', 'oslo', 59.918999, 10.752918, 'skole', ''),
(28, 'brrsbrb', 'rebworki', 'bwob', 59.913109, 10.743685, 'restaurant', ''),
(29, 'rgeqrbwpæk', 'gregwkæp', 'greqpgære', 59.912766, 10.743685, 'restaurant', ''),
(30, 'regelr', 'rbwreb', 'fdvbadf,', 59.912807, 10.744114, 'restaurant', 'dfbflsbgvdvaeblø');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
