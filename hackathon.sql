-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2015 at 12:15 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hackathon`
--
CREATE DATABASE IF NOT EXISTS `hackathon` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hackathon`;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plate_number` varchar(10) NOT NULL,
  `vehicle_type` varchar(256) NOT NULL,
  `date_incident` datetime NOT NULL,
  `date_submitted` datetime NOT NULL,
  `incident_type` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `description` mediumtext NOT NULL,
  `image` varchar(100) NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `plate_number`, `vehicle_type`, `date_incident`, `date_submitted`, `incident_type`, `location`, `lat`, `lon`, `description`, `image`, `score`) VALUES
(1, 'ABC-123', 'Taxi', '2015-04-01 00:00:00', '0000-00-00 00:00:00', 'Theft', 'Quezon City', 14.63, 121.03, 'Black hair', 'report1.jpg', 1),
(2, 'AAA-1234', 'Jeep', '2015-04-15 00:00:00', '0000-00-00 00:00:00', 'Bullying', 'Quezon City', 14.58, 121, 'Taxi', 'report2.png', -2),
(5, 'ABC-123', 'Taxi', '2015-04-24 00:00:00', '2015-04-24 00:00:00', 'Bullying', 'Quezon City', 14.67, 121.05, 'asdf', 'asdf', 2),
(6, 'JKL-234', 'Jeep', '2015-04-25 00:00:00', '2015-04-24 00:00:00', 'Overcharging', 'UP Sunken Garden, Roxas Avenue, Quezon City, Metro Manila, Philippines', 14.655216, 121.07184800000005, 'Toki jeep is like shizz', 'asdf', 0),
(7, 'KLO-456', 'Jeep', '2015-04-11 00:00:00', '2015-04-24 00:00:00', 'Overcharging', 'UP Sunken Garden, Roxas Avenue, Quezon City, Metro Manila, Philippines', 14.655216, 121.07184800000005, 'hello', 'asdf', 0),
(8, 'QWE-123', 'Taxi', '2015-04-03 00:00:00', '2015-04-24 00:00:00', 'Violation of Traffic Laws', 'U.P. Village, Quezon City, Metro Manila, Philippines', 14.648611, 121.05611099999999, 'oye', 'asdf', 0),
(9, 'FGH-456', 'Jeep', '2015-04-25 00:00:00', '2015-04-24 00:00:00', 'Overcharging', 'Krus na Ligas, Quezon City, Metro Manila, Philippines', 14.641984, 121.06289140000001, 'adsfhjkl', 'asdf', 0),
(10, 'FGH-455', 'Jeep', '2015-04-25 00:00:00', '2015-04-24 00:00:00', 'Overcharging', 'Krus na Ligas, Quezon City, Metro Manila, Philippines', 14.641984, 121.06289140000001, 'adsfhjkl', 'asdf', 0),
(12, 'FGH-415', 'Jeep', '2015-04-25 00:00:00', '2015-04-24 00:00:00', 'Overcharging', 'Krus na Ligas, Quezon City, Metro Manila, Philippines', 14.641984, 121.06289140000001, 'adsfhjkl', 'asdf', 0),
(13, 'GJL-789', 'Jeep', '2015-04-25 00:00:00', '2015-04-24 00:00:00', 'Violation of Traffic Laws', 'UP Diliman Monorail, Quezon City, Metro Manila, Philippines', 14.6537054, 121.0604525, 'ashdaslfj', 'asdf', 0),
(14, 'GJL-789', 'Jeep', '2015-04-25 00:00:00', '2015-04-24 00:00:00', 'Violation of Traffic Laws', 'UP Diliman Monorail, Quezon City, Metro Manila, Philippines', 14.6537054, 121.0604525, 'ashdaslfj', 'asdf', 0),
(15, 'GDF-567', 'Jeep', '2015-04-25 00:00:00', '2015-04-25 00:00:00', 'Overcharging', 'Krus na Ligas, Quezon City, Metro Manila, Philippines', 14.641984, 121.06289140000001, 'Overcharging si kuya ikot driver', 'asdf', 0),
(16, 'ABC-124', 'Jeep', '2015-04-25 00:00:00', '2015-04-25 00:00:00', 'Overcharging', 'Pantranco Jeepney Stop, Quezon City, Metro Manila, Philippines', 14.654326, 121.07307200000002, 'overcharging si kuya ng 1cent', 'asdf', 0),
(17, 'AZX-543', 'Taxi', '2015-04-25 00:00:00', '2015-04-25 00:00:00', 'Harassment', 'University of the Philippines Diliman, Quezon City, Metro Manila, Philippines', 14.6526624, 121.06504100000006, 'ouch', 'asdf', 0),
(18, 'FJK-432', 'Bus', '2015-04-25 00:00:00', '2015-04-25 00:00:00', 'Violation of Traffic Laws', 'Litex, Quezon City, Metro Manila, Philippines', 14.69906, 121.08708999999999, 'Sobrang bilis', 'asdf', 0),
(19, 'ABC-123', 'Bus', '2015-04-25 00:00:00', '2015-04-25 00:00:00', 'Violation of Traffic Laws', 'Delta Drive, Quezon City, Metro Manila, Philippines', 14.6656659, 121.0809236, 'Mahal tiket', 'asdf', 0),
(20, 'ABC-123', 'Taxi', '2015-12-31 00:00:00', '2015-04-25 00:00:00', 'Theft', 'U.P. Lagoon, Quezon City, Metro Manila, Philippines', 14.6549401, 121.06741439999996, 'asf', 'asdf', 0),
(21, 'ABC-123', 'Taxi', '2015-12-31 00:00:00', '2015-04-25 00:00:00', 'Theft', 'UP Bonsai Garden, I. Delos Reyes Street, Quezon City, Metro Manila, Philippines', 14.650034, 121.06477199999995, 'adf', 'asdf', 0),
(22, 'ABC-123', 'Taxi', '0000-00-00 00:00:00', '2015-04-25 00:00:00', 'Theft', 'Litex, Quezon City, Metro Manila, Philippines', 0, 0, '', 'asdf', 0),
(23, 'ABC-123', 'Taxi', '2015-12-31 00:00:00', '2015-04-25 00:00:00', 'Theft', 'UP Bonsai Garden, I. Delos Reyes Street, Quezon City, Metro Manila, Philippines', 14.650034, 121.06477199999995, 'asdf', 'asdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facebook_id` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` mediumtext NOT NULL,
  `credibility` int(11) NOT NULL,
  `date_created` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `facebook_id` (`facebook_id`,`username`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `facebook_id`, `username`, `email`, `password`, `credibility`, `date_created`) VALUES
(1, 'heyandieeee', 'andie', 'andie_rabino@yahoo.com', 'aaa', 2, '2015-04-08');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
