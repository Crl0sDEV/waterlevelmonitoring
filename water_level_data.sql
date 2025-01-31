-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql307.byetcluster.com
-- Generation Time: Jan 30, 2025 at 10:10 AM
-- Server version: 10.6.19-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_37733364_water_level`
--

-- --------------------------------------------------------

--
-- Table structure for table `water_level_data`
--

CREATE TABLE `water_level_data` (
  `id` int(11) NOT NULL,
  `water_level` decimal(5,2) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(20) DEFAULT NULL,
  `action_required` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `water_level_data`
--

INSERT INTO `water_level_data` (`id`, `water_level`, `last_updated`, `status`, `action_required`) VALUES
(1, '5.00', '2024-11-14 18:00:00', NULL, NULL),
(2, '5.10', '2024-11-14 18:05:00', NULL, NULL),
(3, '5.20', '2024-11-14 18:10:00', NULL, NULL),
(4, '5.30', '2024-11-14 18:15:00', NULL, NULL),
(5, '5.40', '2024-11-14 18:20:00', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `water_level_data`
--
ALTER TABLE `water_level_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `water_level_data`
--
ALTER TABLE `water_level_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
