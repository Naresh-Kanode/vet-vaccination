-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 08, 2024 at 06:34 AM
-- Server version: 5.7.40
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vet_vaccination`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

DROP TABLE IF EXISTS `admin_table`;
CREATE TABLE IF NOT EXISTS `admin_table` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`email`, `password`) VALUES
('admin@gmail.com', '123'),
('admin@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `vaccination_table`
--

DROP TABLE IF EXISTS `vaccination_table`;
CREATE TABLE IF NOT EXISTS `vaccination_table` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `petname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(255) NOT NULL,
  `typeofappointment` varchar(255) NOT NULL,
  `symptoms` varchar(255) NOT NULL,
  `datetime` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vaccination_table`
--

INSERT INTO `vaccination_table` (`id`, `name`, `petname`, `email`, `phone`, `typeofappointment`, `symptoms`, `datetime`) VALUES
(1, 'mahin', 'paro', 'mahi@gmail.com', 9878890989, 'regular checkup', 'rash', '2024-01-12T16:26'),
(2, 'akshat', 'tomy', 'aksaht@gmail.com', 9878676545, 'vaccination', 'cough', '2023-12-20 18:09:00'),
(3, 'ajay', 'kitty', 'ajay@gmail.com', 8790987878, 'wellness exam', 'cough', '2023-12-21T10:00'),
(4, 'rinki', 'tinu', 'rinu@gmail.com', 9878675456, 'vaccination', 'rabis', '2023-12-25 11:47:00'),
(5, 'adam', 'nikko', 'adam@gmail.com', 7867567878, 'other', 'nnl', '2023-12-22 17:30:00'),
(6, 'Naresh Vilasrao Kanode', 'nik', 'nik@gmail.com', 9284522886090, 'grooming', 'nil', '2023-12-20 18:15:00'),
(7, 'parag', 'parul', 'parag@gmail.com', 9878676578, 'wellness exam', 'nil', '2023-12-22 14:17:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
