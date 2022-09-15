-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 12, 2022 at 09:58 PM
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
-- Table structure for table `prop_message_tble`
--

CREATE TABLE `prop_message_tble` (
  `status` int(200) NOT NULL DEFAULT '0',
  `date` varchar(200) NOT NULL,
  `id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` int(200) NOT NULL,
  `prop_id` int(100) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(30000) NOT NULL,
  `city` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `ip_address` varchar(200) NOT NULL,
  `reply` varchar(1200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prop_message_tble`
--

INSERT INTO `prop_message_tble` (`status`, `date`, `id`, `name`, `email`, `phone`, `prop_id`, `subject`, `message`, `city`, `country`, `ip_address`, `reply`) VALUES
(1, 'June 16, 2022, 5:04 am', 15, 'Test', 'rssw2019@gmail.com', 2147483647, 0, 'Test', 'Hello', 'Kathmandu', 'Nepal', '45.64.161.26', ''),
(0, 'June 16, 2022, 6:21 am', 16, 'Test', 'test@gmail.com', 2147483647, 0, 'test', 'test message.', 'Kathmandu', 'Nepal', '45.64.161.26', ''),
(0, 'June 16, 2022, 6:24 am', 17, 'Test', 'test@gmail.com', 2147483647, 0, 'test', 'test message.', 'Kathmandu', 'Nepal', '45.64.161.26', ''),
(0, 'June 16, 2022, 6:28 am', 18, 'Test', 'test@gmail.com', 2147483647, 0, 'test', 'test message.', 'Kathmandu', 'Nepal', '45.64.161.26', ''),
(0, 'June 23, 2022, 5:07 am', 19, 'test', 'test@gmail.com', 4444444, 0, 'hi', 'hi', 'Kathmandu', 'Nepal', '45.64.161.198', ''),
(0, 'August 1, 2022, 3:08 am', 20, 'Smith ', 'smith@gmail.com', 2147483647, 0, 'Seal', 'Text ', '', 'Nepal', '45.123.222.18', ''),
(0, 'August 8, 2022, 7:41 am', 21, 'tom', 'tm@gmail.com', 0, 0, 'hi', 'hi how are you?', 'Flowery Branch', 'United States', '68.184.109.190', ''),
(0, 'August 16, 2022, 5:40 pm', 22, 'Test', 'r@gmail.com', 9999999, 0, 'Hi', 'Hi', 'Flowery Branch', 'United States', '68.184.109.190', ''),
(0, 'August 30, 2022, 11:10 am', 23, 'User', 'user@gmail.com', 9999, 68, 'Hello', 'Is this property still available?', 'Flowery Branch', 'United States', '68.184.109.190', 'Yes it is. Please send us your contact information and we will send you details about the property. Thank you.'),
(0, 'August 30, 2022, 11:26 am', 24, 'User', 'user@gmail.com', 0, 68, 'Hello', 'I would like to see the property.', 'Flowery Branch', 'United States', '68.184.109.190', ' '),
(0, 'August 30, 2022, 3:22 pm', 25, 'User', 'user@gmail.com', 0, 63, 'Hello', 'Is this still available?', 'Flowery Branch', 'United States', '68.184.109.190', ' '),
(0, 'August 30, 2022, 5:37 pm', 26, 'User', 'user@gmail.com', 0, 68, 'Hello', 'What is the floor level of this property?', 'Flowery Branch', 'United States', '68.184.109.190', ' '),
(0, 'September 3, 2022, 1:58 pm', 27, 'Purnim', 'purnim@gmail.com', 2147483647, 67, 'Location', 'Where in Pulchok is this property located?', 'Flowery Branch', 'United States', '68.184.109.190', ' ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prop_message_tble`
--
ALTER TABLE `prop_message_tble`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prop_message_tble`
--
ALTER TABLE `prop_message_tble`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
