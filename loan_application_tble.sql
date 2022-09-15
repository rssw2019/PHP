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
-- Table structure for table `loan_application_tble`
--

CREATE TABLE `loan_application_tble` (
  `id` int(30) NOT NULL,
  `date` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `citizenship` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `proptype` varchar(100) NOT NULL,
  `propdistrict` varchar(100) NOT NULL,
  `propmunicipality` varchar(100) NOT NULL,
  `propward` int(100) NOT NULL,
  `propcity` varchar(100) NOT NULL,
  `income` int(100) NOT NULL,
  `incomesource` varchar(100) NOT NULL,
  `ipaddress` varchar(100) NOT NULL,
  `applicationcity` varchar(100) NOT NULL,
  `applicationcountry` varchar(100) NOT NULL,
  `confirmation` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loan_application_tble`
--
ALTER TABLE `loan_application_tble`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loan_application_tble`
--
ALTER TABLE `loan_application_tble`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
