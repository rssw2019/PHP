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
-- Table structure for table `prop_listing_tble`
--

CREATE TABLE `prop_listing_tble` (
  `verification` int(10) NOT NULL DEFAULT '0',
  `published` int(10) NOT NULL DEFAULT '0',
  `status` varchar(200) NOT NULL DEFAULT 'active',
  `date` varchar(100) NOT NULL,
  `id` int(100) NOT NULL,
  `selltype` varchar(100) NOT NULL,
  `proptype` varchar(100) NOT NULL,
  `username` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone1` varchar(10) NOT NULL,
  `phone2` varchar(9) NOT NULL,
  `district` varchar(100) NOT NULL,
  `municipality` varchar(100) NOT NULL,
  `ward` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(200) NOT NULL,
  `housenumber` int(100) NOT NULL,
  `street` varchar(200) NOT NULL,
  `area` varchar(100) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `storynumber` int(11) NOT NULL,
  `floorlevel` varchar(200) NOT NULL,
  `bedroomnumber` int(11) NOT NULL,
  `age` int(200) NOT NULL,
  `price` int(100) NOT NULL,
  `message` varchar(2000) NOT NULL,
  `agentnotes` varchar(500) NOT NULL,
  `visitnumber` int(100) NOT NULL DEFAULT '0',
  `likednumber` int(100) NOT NULL DEFAULT '0',
  `savednumber` int(100) NOT NULL DEFAULT '0',
  `confirmation` varchar(200) NOT NULL,
  `image1` varchar(200) NOT NULL,
  `image2` varchar(200) NOT NULL,
  `image3` varchar(200) NOT NULL,
  `image4` varchar(200) NOT NULL,
  `image5` varchar(200) NOT NULL,
  `user_review` varchar(5000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prop_listing_tble`
--

INSERT INTO `prop_listing_tble` (`verification`, `published`, `status`, `date`, `id`, `selltype`, `proptype`, `username`, `name`, `email`, `phone1`, `phone2`, `district`, `municipality`, `ward`, `city`, `state`, `housenumber`, `street`, `area`, `unit`, `storynumber`, `floorlevel`, `bedroomnumber`, `age`, `price`, `message`, `agentnotes`, `visitnumber`, `likednumber`, `savednumber`, `confirmation`, `image1`, `image2`, `image3`, `image4`, `image5`, `user_review`) VALUES
(1, 1, 'active', 'July 6, 2022, 9:48 pm', 57, 'sale', 'house', 'prabhas', 'Purnim Realty', 'ccontactus@purnimonline.com', '', '', 'Sindhuli', 'Golanjor', '7', 'Khurkot', '', 4, '', '10', 'anas', 4, '', 0, 0, 10000000, 'Beautiful house', '', 47, 1, 0, '', 'house_for_sale.png', 'house_for_sale.png', 'house_for_sale.png', 'house_for_sale.png', 'house_for_sale.png', ''),
(1, 1, 'active', 'July 13, 2022, 6:33 am', 58, 'rent', 'flat', 'admin2', 'Purnim Realty', 'contactus@purnimonline.com', '', '', 'Kathmandu', 'Kathmandu', '', 'Balaju', '', 0, '', '4', 'rooms', 0, '1', 0, 0, 21000, '', '', 21, 1, 0, '', 'flat_for_rent.png', 'flat_for_rent.png', 'flat_for_rent.png', 'flat_for_rent.png', 'flat_for_rent.png', ''),
(1, 1, '0', 'August 1, 2022, 3:17 am', 59, 'sale', 'land', 'vanukas3', 'Purnim Realty', 'contactus@purnimonline.com', '', '', 'Bhaktapur', 'Suryebinayek', '', 'Sano Thimi', '', 0, '', '5', 'aanas', 0, '', 0, 0, 2700000, '', '', 16, 2, 0, '', 'land_for_sale.png', 'land_for_sale.png', 'land_for_sale.png', 'land_for_sale.png', 'land_for_sale.png', ''),
(0, 0, '', 'June 28, 2022, 12:00 pm', 54, 'rent', 'house', 'vanukas3', 'Purnim Realty', 'contactus@purnimonline.com', '', '', 'Kaski', 'Pokhara', '', 'Pokhara', '', 0, '', '6', 'rooms', 0, '', 0, 0, 30000, '', 'yyyy Submitted by: agent1', 92, 16, 0, '', 'house_for_rent.png', 'house_for_rent.png', 'house_for_rent.png', 'house_for_rent.png', 'house_for_rent.png', ''),
(1, 1, 'active', 'August 1, 2022, 10:29 am', 60, 'sale', 'land', 'agent1', 'Purnim Realty', 'contactus@purnimonline.com', '', '', 'Kathmandu', '', '', 'Baneshwor', '', 0, '', '15', 'aanas', 0, '', 0, 0, 350000000, '', '', 4, 12, 0, '', 'land_for_sale.png', 'land_for_sale.png', 'land_for_sale.png', 'land_for_sale.png', 'land_for_sale.png', ''),
(1, 1, 'active', 'August 7, 2022, 4:24 am', 61, 'sale', 'land', 'vanukas2', 'Purnim Realty', 'contactus@purnimonline.com', '', '', 'Sarlahi', 'Lalbandi', '', 'Nawalpur', '', 0, '', '10', 'kattha', 0, '', 0, 0, 4443345, '', '', 17, 1, 0, '', 'land_for_sale.png', 'land_for_sale.png', 'land_for_sale.png', 'land_for_sale.png', 'land_for_sale.png', ''),
(1, 1, 'active', 'August 7, 2022, 11:22 pm', 62, 'rent', 'flat', 'vanukas2', 'Purnim Realty', 'contactus@purnimonline.com', '', '', 'Chitawan', 'Bharatpur', '', 'Bharatpur', '', 0, '', '4', 'rooms', 0, '', 0, 0, 18000, '', '', 28, 7, 0, '', 'flat_for_rent.png', 'flat_for_rent.png', 'flat_for_rent.png', 'flat_for_rent.png', 'flat_for_rent.png', ''),
(1, 1, 'active', 'August 8, 2022, 1:09 am', 63, 'rent', 'room', 'vanukas2', 'Purnim Realty', 'contactus@purnimonline.com', '', '', 'Kathmandu', 'Kathmandu', '', 'Maharajganj', '', 0, '', '1', 'rooms', 0, '', 0, 0, 11000, '', '', 63, 9, 0, '', 'room_for_rent.png', 'room_for_rent.png', 'room_for_rent.png', 'room_for_rent.png', 'room_for_rent.png', ''),
(1, 1, 'active', 'August 10, 2022, 10:19 pm', 64, 'sale', 'land', 'vanukas2', 'Purnim Realty', 'contactus@purnimonline.com', '', '', 'Kathmandu', '', '', 'Koteshwor', '', 0, '', '4', 'ropanis', 0, '', 0, 0, 640000000, '', '', 45, 0, 0, '', 'land_for_sale.png', 'land_for_sale.png', 'land_for_sale.png', 'land_for_sale.png', 'land_for_sale.png', ''),
(0, 1, '', 'August 16, 2022, 3:51 pm', 65, 'sale', 'land', 'agent1', 'Purnim Realty', 'contactus@purnimonline.com', '', '', 'Kathmandu', '', '', 'Panipokhari', '', 0, '', '4', 'aanas', 0, '', 0, 0, 40000000, '', '', 65, 1, 0, '', 'land_for_sale.png', 'land_for_sale.png', 'land_for_sale.png', 'land_for_sale.png', 'land_for_sale.png', ''),
(0, 0, 'active', 'August 23, 2022, 6:11 pm', 66, 'sale', 'land', 'admin2', 'Purnim Realty', 'contactus@purnimonline.com', '', '', 'Bhaktapur', '', '', 'Sallaghari', '', 33, '', '4', 'aanas', 0, '', 4, 33, 2100000, '', '', 31, 7, 0, '63055051a519e', 'land_for_sale.png', 'land_for_sale.png', 'land_for_sale.png', 'land_for_sale.png', 'land_for_sale.png', ''),
(0, 1, 'active', 'August 29, 2022, 7:04 am', 67, 'sale', 'land', 'vanukas1', 'Purnim Realty', 'contactus@purnimonline.com', '', '', 'Lalitpur', 'Lalitpur', '', 'Pulchok', '', 0, '', '4', 'aanas', 0, '', 0, 0, 45000000, 'Nice property', '', 9, 2, 0, '630c9c8e492a5', 'land_for_sale.png', 'land_for_sale.png', 'land_for_sale.png', 'land_for_sale.png', 'land_for_sale.png', ''),
(0, 1, 'active', 'August 29, 2022, 4:12 pm', 68, 'rent', 'room', '', 'Purnim Realty', 'contactus@purnimonline.com', '', '', 'Kathmandu', 'Kathmandu', '', '', '', 0, '', '', 'Select', 0, '', 1, 0, 5000, 'Nice rooms', '', 136, 7, 0, '630d1d229ba7f', 'room_for_rent.png', 'room_for_rent.png', 'room_for_rent.png', 'room_for_rent.png', 'room_for_rent.png', ''),
(1, 1, 'active', 'August 29, 2022, 4:23 pm', 69, 'rent', 'room', '', 'Purnim Realty', 'contactus@purnimonline.com', '', '', 'Kathmandu', 'Gokarneshwor', '', 'Jorpati', '', 0, '', '', 'Select', 0, '', 0, 0, 5000, 'Very nice rooms', '', 17, 3, 0, '630d201eb0c5f', 'room_for_rent.png', 'room_for_rent.png', 'room_for_rent.png', 'room_for_rent.png', 'room_for_rent.png', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prop_listing_tble`
--
ALTER TABLE `prop_listing_tble`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prop_listing_tble`
--
ALTER TABLE `prop_listing_tble`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
