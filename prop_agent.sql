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
-- Table structure for table `prop_agent`
--

CREATE TABLE `prop_agent` (
  `id` int(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prop_agent`
--

INSERT INTO `prop_agent` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'agent1', '$2y$10$pA/JQlmdsnrKJ/qUbBqryOopNWgJdNvLSYFeVWszHKoSiMUUiiloa', '2022-08-01 09:49:37'),
(2, 'agent2', '$2y$10$B49gxgLJfbiDGyiALQTsQO93i0vJ4ACzsT6ipR7knAVUS1nVmqFpC', '2022-08-17 15:43:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prop_agent`
--
ALTER TABLE `prop_agent`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prop_agent`
--
ALTER TABLE `prop_agent`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
