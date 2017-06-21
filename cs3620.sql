-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2017 at 03:36 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs3620`
--

-- --------------------------------------------------------

--
-- Table structure for table `dvdactors`
--

CREATE TABLE `dvdactors` (
  `actorID` int(5) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dvdtitles`
--

CREATE TABLE `dvdtitles` (
  `asin` varchar(15) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` decimal(5,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dvdtitles`
--

INSERT INTO `dvdtitles` (`asin`, `title`, `price`) VALUES
('B0007DFJ0G', 'Fight Club', '14.20'),
('B01MAZGH7Z', 'Moana', '14.99'),
('B00003CXA2', 'Forest Gump', '17.40'),
('B004SIP95G', 'Pulp Fiction', '5.19'),
('B00AEFXESQ', 'American Beauty', '6.56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dvdactors`
--
ALTER TABLE `dvdactors`
  ADD PRIMARY KEY (`actorID`);

--
-- Indexes for table `dvdtitles`
--
ALTER TABLE `dvdtitles`
  ADD PRIMARY KEY (`asin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dvdactors`
--
ALTER TABLE `dvdactors`
  MODIFY `actorID` int(5) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
