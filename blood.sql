-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 09, 2023 at 02:11 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `username`, `password`) VALUES
(1, 'Rifkee', 'Rifkee', '123'),
(2, 'Kishan', 'Kishan', '123'),
(3, 'kiristhi', 'Kirish', '123');

-- --------------------------------------------------------

--
-- Table structure for table `blood_stock`
--

DROP TABLE IF EXISTS `blood_stock`;
CREATE TABLE IF NOT EXISTS `blood_stock` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `blood_group` varchar(5) NOT NULL,
  `donation_date` date NOT NULL,
  `donation_time` time NOT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_stock`
--

INSERT INTO `blood_stock` (`d_id`, `blood_group`, `donation_date`, `donation_time`) VALUES
(7, 'B+', '2023-03-12', '02:03:00'),
(8, 'AB+', '2023-03-12', '02:03:00'),
(9, 'AB+', '2023-03-08', '02:03:00');

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

DROP TABLE IF EXISTS `donation`;
CREATE TABLE IF NOT EXISTS `donation` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `nic_no` varchar(30) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `blood_group` enum('A+','A-','B+','B-','AB+','AB-','O+','O-') DEFAULT NULL,
  `donation_date` date NOT NULL,
  `donation_time` time NOT NULL,
  PRIMARY KEY (`d_id`),
  KEY `nic_no` (`nic_no`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`d_id`, `nic_no`, `full_name`, `blood_group`, `donation_date`, `donation_time`) VALUES
(1, '200061503149', 'cathu kishan', 'B+', '2023-02-28', '03:03:00'),
(6, '200061503149', 'cathu kishan', 'B+', '2023-01-06', '23:02:00'),
(7, '200061503149', 'cathu kishan', 'B+', '2023-01-14', '07:06:00'),
(8, '983391176v', 'Logendrakumar kishan', 'AB+', '2023-03-16', '02:03:00'),
(9, '200061503149', 'cathu kishan', 'B+', '2023-03-09', '12:03:00'),
(10, '200061503149', 'cathu kishan', 'B+', '2023-03-11', '02:03:00'),
(11, '200061503149', 'cathu kishan', 'B+', '2023-03-12', '02:03:00'),
(12, '983391176v', 'Logendrakumar kishan', 'AB+', '2023-03-12', '02:03:00'),
(13, '983391176v', 'Logendrakumar kishan', 'AB+', '2023-03-08', '02:03:00');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(255) NOT NULL,
  `location` varchar(100) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `location`, `event_date`, `event_time`, `contact_no`) VALUES
(1, 'blood bank', 'Batticaloa', '2023-03-24', '08:00:00', '0773425161'),
(2, 'hh', 'j', '2023-05-24', '14:15:00', '0755084230');

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

DROP TABLE IF EXISTS `personal_info`;
CREATE TABLE IF NOT EXISTS `personal_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `blood_group` enum('A+','A-','B+','B-','AB+','AB-','O+','O-') NOT NULL,
  `nic_no` varchar(12) NOT NULL,
  `residential_address` text NOT NULL,
  `mobile_no` int(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nic_no` (`nic_no`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_info`
--

INSERT INTO `personal_info` (`id`, `full_name`, `date_of_birth`, `gender`, `blood_group`, `nic_no`, `residential_address`, `mobile_no`, `email`) VALUES
(1, 'cathu kishan', '2000-04-24', 'female', 'B+', '200061503149', 'urani', 774534567, 'Catharinpraba20@gmail.com'),
(2, 'Logendrakumar kishan', '1998-12-04', 'male', 'AB+', '983391176v', 'Batticaloa', 770560974, 'kishanshan1998@gmail.com'),
(3, 'rishanthan', '2000-05-01', 'male', 'O+', '200011001183', 'tyyu', 755084230, 'R@gmail.com'),
(4, 'rishanthan', '2023-05-09', 'male', 'B-', '200011001184', 'g', 755084231, 'h@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_request`
--

DROP TABLE IF EXISTS `user_request`;
CREATE TABLE IF NOT EXISTS `user_request` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `blood_group` varchar(5) NOT NULL,
  `units_requested` int(11) NOT NULL,
  `request_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_request`
--

INSERT INTO `user_request` (`id`, `blood_group`, `units_requested`, `request_date`, `status`) VALUES
(5, 'B+', 2, '2023-03-24 08:47:13', 1),
(6, 'A+', 1, '2023-03-26 22:06:40', 0),
(7, 'B-', 2, '2023-05-08 16:40:29', 0),
(8, 'O-', 5, '2023-05-08 16:40:42', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
