-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2020 at 11:12 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project-7`
--

-- --------------------------------------------------------

--
-- Table structure for table `qanda`
--

CREATE TABLE `qanda` (
  `Q_ID` int(11) NOT NULL,
  `Q_type` text NOT NULL,
  `user_ID` int(11) NOT NULL,
  `Q` text DEFAULT NULL,
  `A` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qanda`
--

INSERT INTO `qanda` (`Q_ID`, `Q_type`, `user_ID`, `Q`, `A`) VALUES
(0, 'faq', 1, 'How can i update my email address?', 'Head to your profile, choose edit and wait for HR approval.'),
(1, 'faq', 1, 'How can i change my password?', 'Edit profile section.'),
(2, 'faq', 1, 'Requesting a raise', 'send your HR a letter regarding your salary status.'),
(3, 'password', 1, 'How can i reset my password?', 'Please send an email to your HR.'),
(4, 'profile', 1, 'Change profile name', 'Edit profile section.'),
(5, 'passport', 1, 'Passport papers', 'Send you HR a letter'),
(6, 'faq', 1, 'Health insurance papers', 'Send your HR a request');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `qanda`
--
ALTER TABLE `qanda`
  ADD PRIMARY KEY (`Q_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `qanda`
--
ALTER TABLE `qanda`
  ADD CONSTRAINT `qanda_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `employees` (`Emp_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
