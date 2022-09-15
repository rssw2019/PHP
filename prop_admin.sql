-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 12, 2022 at 09:57 PM
-- Server version: 5.7.39-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `purnimon_realty2`
--

-- --------------------------------------------------------

--
-- Table structure for table `prop_admin`
--

CREATE TABLE `prop_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prop_admin`
--

INSERT INTO `prop_admin` (`id`, `username`, `password`, `created_at`) VALUES
(2, 'admin1', '$2y$10$5q023x3tuVmZ41YbLI9Ao.toqtsjg06w8gJj4a5pmYhrrPrLOvDrG', '2022-06-29 09:01:38'),
(3, 'admin2', '$2y$10$nS/1/QkSDde64Oxdk/Fb2.SVGpg3n20GPwYNhmW8zLmT/xyALXWYS', '2022-07-07 03:01:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prop_admin`
--
ALTER TABLE `prop_admin`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
