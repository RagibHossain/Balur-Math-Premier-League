-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2020 at 05:30 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bmpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `p_id` int(10) NOT NULL,
  `p_name` varchar(20) NOT NULL,
  `img_location` varchar(200) NOT NULL,
  `starting_bid` int(10) NOT NULL DEFAULT 1,
  `current_bid` int(10) DEFAULT 0,
  `t_id` int(10) NOT NULL DEFAULT 0,
  `category` varchar(20) NOT NULL,
  `start_time` int(20) NOT NULL DEFAULT 0,
  `end_time` int(20) NOT NULL DEFAULT 0,
  `sold` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`p_id`, `p_name`, `img_location`, `starting_bid`, `current_bid`, `t_id`, `category`, `start_time`, `end_time`, `sold`) VALUES
(1, 'Mashrur Rahman Anto', '15941161_1249295485162426_7401775760877231267_n (1).jpg', 1, 1, 1, 'all rounder', 1, 1, 1),
(3, 'Umar Faiaz Moon', '81876735_2545752359030043_1953365402692091904_o.jpg', 1, 1, 1, 'Batsman', 1580004900, 158001240, 1),
(4, 'Sabbir Hossain', '49349009_2010704425711742_5934697367646240768_o.jpg', 1, 7, 1, 'all rounder', 0, 158001252, 1);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `t_id` int(10) NOT NULL,
  `t_name` varchar(20) NOT NULL,
  `logo_location` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `balance` int(10) NOT NULL DEFAULT 100
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`t_id`, `t_name`, `logo_location`, `password`, `balance`) VALUES
(1, 'Desi Dengue', 'Starry-Mantis-1150x568.png', '123456', 94),
(2, 'Barishal Bulls', 'bull-logo.jpg', '456123', 100),
(3, 'Kathaltala Vipers', '51cslboao3L._SY450_.jpg', '123456', 97);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
