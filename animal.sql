-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2021 at 10:50 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `animal`
--

-- --------------------------------------------------------

--
-- Table structure for table `animal_info`
--

CREATE TABLE `animal_info` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `description` varchar(100) NOT NULL,
  `expectancy` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `visitor_counter` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animal_info`
--

INSERT INTO `animal_info` (`id`, `name`, `category`, `photo`, `description`, `expectancy`, `created_at`, `visitor_counter`) VALUES
(53, 'Dog', 'Herbivores', 'Koala.jpg', '	 	    This is Dog', '[0-1 year]', '2021-09-06 05:00:00', 0),
(54, 'Cat', 'Omnivores', 'cat.jpg', '	 	    This is cat', '[1-5 year]', '2021-09-06 05:02:28', 0),
(55, 'sheep', 'Carnvores', 'sheep.jpg', '	 	    This Is Sheep', '[10+ year]', '2021-09-06 05:09:32', 0),
(56, 'Cow', 'Omnivores', 'cow.jpg', '	 	    This is Cow', '[5-10 year]', '2021-09-06 05:10:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vc`
--

CREATE TABLE `vc` (
  `id` int(11) NOT NULL,
  `visitor_conter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vc`
--

INSERT INTO `vc` (`id`, `visitor_conter`) VALUES
(1, 153);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal_info`
--
ALTER TABLE `animal_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visitor_counter` (`visitor_counter`);

--
-- Indexes for table `vc`
--
ALTER TABLE `vc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal_info`
--
ALTER TABLE `animal_info`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `vc`
--
ALTER TABLE `vc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
