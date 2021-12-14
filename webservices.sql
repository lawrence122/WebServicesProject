-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2021 at 12:21 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webservices`
--
CREATE DATABASE IF NOT EXISTS `webservices` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `webservices`;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE `client` (
  `clientID` int(11) NOT NULL,
  `clientName` varchar(64) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `licenseNumber` int(10) NOT NULL,
  `licenseStartDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `licenseEndDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `licenseKey` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fileconversion`
--

DROP TABLE IF EXISTS `fileconversion`;
CREATE TABLE `fileconversion` (
  `conversionID` int(11) NOT NULL,
  `clientID` int(11) NOT NULL,
  `requestDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `completionDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `originalFormat` varchar(10) NOT NULL,
  `targetFormat` varchar(10) NOT NULL,
  `file` varchar(64) NOT NULL,
  `outputFile` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `videoconversion`
--

DROP TABLE IF EXISTS `videoconversion`;
CREATE TABLE `videoconversion` (
  `conversionID` int(11) NOT NULL,
  `clientID` int(11) NOT NULL,
  `requestDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `completionDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `originalFormat` varchar(10) NOT NULL,
  `targetFormat` varchar(10) NOT NULL,
  `file` varchar(64) NOT NULL,
  `outputFile` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientID`),
  ADD UNIQUE KEY `licenseNumber` (`licenseNumber`);

--
-- Indexes for table `fileconversion`
--
ALTER TABLE `fileconversion`
  ADD PRIMARY KEY (`conversionID`);

--
-- Indexes for table `videoconversion`
--
ALTER TABLE `videoconversion`
  ADD PRIMARY KEY (`conversionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `clientID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fileconversion`
--
ALTER TABLE `fileconversion`
  MODIFY `conversionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `videoconversion`
--
ALTER TABLE `videoconversion`
  MODIFY `conversionID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
