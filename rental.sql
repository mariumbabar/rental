-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 11, 2022 at 09:04 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `pay_id` int(11) NOT NULL,
  `t_id` int(10) NOT NULL,
  `Date_Paid` date NOT NULL,
  `Time_Paid` time NOT NULL,
  `Amount_Paid` int(50) NOT NULL,
  `CC_Number` varchar(255) NOT NULL,
  `Status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`pay_id`, `t_id`, `Date_Paid`, `Time_Paid`, `Amount_Paid`, `CC_Number`, `Status`) VALUES
(1, 2, '2022-08-10', '11:25:00', 60000, '79927398713', 1),
(6, 5, '2022-08-10', '12:30:00', 30000, '4111111111111111', 2);

-- --------------------------------------------------------

--
-- Table structure for table `payment_status`
--

CREATE TABLE `payment_status` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_status`
--

INSERT INTO `payment_status` (`id`, `type`) VALUES
(1, 'Paid'),
(2, 'Payment Overdue');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `p_id` int(255) NOT NULL,
  `property_name` varchar(255) NOT NULL,
  `rent` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `deposit` int(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `description` varchar(650) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`p_id`, `property_name`, `rent`, `image`, `deposit`, `address`, `description`, `type`, `status`) VALUES
(1, 'Traditional Arabic Villa', '60000', 'property1.png', 30000, 'Al Dhaid, Sharjah', 'A Beautiful Traditional Villa Set In The Heart Of The Desert, With Moroccan Tiles And Artwork And Minimalistic Interior That Embodies Both Modern And Traditional Aspects.', 'House', '2'),
(2, 'Lavish Marble Villa', '40000', 'property2.png', 20000, 'Nahda, Dubai', 'A stunning white house located in the heart of Dubai, with five bedrooms and a big pool and garden, it is the ultimate dream.', 'House', '2'),
(3, 'Modern Villa', '30000', 'property3.png', 20000, 'Downtown Dubai', 'This luxurious house sits in one of the best areas in town, with 4 bedrooms and 2 maid rooms. It is made to meet the standards of modern design and architecture.', 'House', '1'),
(4, 'Downtown Luxury Penthouse Flat', '80000', 'property4.png', 50000, 'Dubai', 'This penthouse is one of a kind, it outlooks the Burj Khalifa and has a gorgeous view of the downtown skyline. It has 8 rooms, with 2 maid rooms, an outdoor swimming pool and is centrally air-conditioned.', 'Flat', '1'),
(5, 'Luxury Glass Penthouse Flat', '50000', 'property6.png', 25000, 'Sharjah', 'A penthouse located in the heart of Sharjah. It has 6 bedrooms, 2 maid rooms and a stunning view of the city.', 'Flat', '1'),
(6, 'Lola Penthouse Near Beach - Flat', '45000', 'property5.png', 20000, 'Sharjah', 'Stunning Penthouse outside the city, away from the hustle and bustle of everyday. 5km from the city. 5 bedrooms & 2 bathrooms.', 'Flat', '1'),
(7, 'Vacant Shop', '25000', 'property7.png', 15000, 'Dubai', 'Shop located in MCC and ready to move in. ', 'Shop', '1'),
(8, 'Vacant Shop Space with Glass Panels', '30000', 'property8.png', 30000, 'Dubai', 'Located in the metropolitan city of Dubai. Near lots of other shops. 1500sqft. ', 'Shop', '1');

-- --------------------------------------------------------

--
-- Table structure for table `property_status`
--

CREATE TABLE `property_status` (
  `id` int(11) DEFAULT NULL,
  `type` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_status`
--

INSERT INTO `property_status` (`id`, `type`) VALUES
(2, 'Occupied'),
(1, 'Vacant');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `r_id` int(11) NOT NULL,
  `p_name` text NOT NULL,
  `agree_Start_Date` date NOT NULL,
  `agree_End_Date` date NOT NULL,
  `t_id` int(10) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`r_id`, `p_name`, `agree_Start_Date`, `agree_End_Date`, `t_id`, `status`) VALUES
(1, 'Traditional Arabic Villa', '2022-08-10', '2022-11-10', 2, 'approved'),
(5, 'Modern Villa', '2022-08-17', '2022-11-17', 3, 'approved'),
(6, 'Luxury Glass Penthouse Flat', '2022-08-12', '2022-09-03', 2, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `u_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`u_id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'marium', 'mariumb@gmail.com', '92b22a80bd21ff9266b2765c31566ffc', 'owner'),
(2, 'sandra', 'sandrab@gmail.com', 'f40a37048732da05928c3d374549c832', 'tenant'),
(3, 'henna', 'hennashahid@gmail.com', '05ffef54c1a79867f2538bd83ab7c424', 'tenant');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `payment_status`
--
ALTER TABLE `payment_status`
  ADD PRIMARY KEY (`type`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `property_status`
--
ALTER TABLE `property_status`
  ADD PRIMARY KEY (`type`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `p_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `u_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
