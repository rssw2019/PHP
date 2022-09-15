-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 12, 2022 at 09:56 PM
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
-- Table structure for table `job_application_tble`
--

CREATE TABLE `job_application_tble` (
  `id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `age` int(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `citizenship` varchar(100) NOT NULL,
  `citizenshipnumber` varchar(100) NOT NULL,
  `citizenshipplace` varchar(100) NOT NULL,
  `fathername` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `phone` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `education` varchar(100) NOT NULL,
  `district` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  `smartphone` varchar(100) NOT NULL,
  `vibernumber` int(100) NOT NULL,
  `realestateagent` varchar(100) NOT NULL,
  `computerskills` varchar(100) NOT NULL,
  `internetskills` varchar(100) NOT NULL,
  `socialmediatype` varchar(100) NOT NULL,
  `socialmediaact` varchar(100) NOT NULL,
  `ipaddress` varchar(100) NOT NULL,
  `applicationcity` varchar(100) NOT NULL,
  `applicationcountry` varchar(100) NOT NULL,
  `confirmation` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job_application_tble`
--
ALTER TABLE `job_application_tble`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job_application_tble`
--
ALTER TABLE `job_application_tble`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
