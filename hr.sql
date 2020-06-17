-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2019 at 06:12 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_req`
--

CREATE TABLE `account_req` (
  `Req_id` int(11) NOT NULL,
  `email` varchar(24) NOT NULL,
  `acc_password` varchar(24) NOT NULL,
  `FirstName` varchar(25) NOT NULL,
  `LastName` varchar(25) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_req`
--

INSERT INTO `account_req` (`Req_id`, `email`, `acc_password`, `FirstName`, `LastName`, `job_id`, `status`) VALUES
(1, 'haider_mahmoud@hotmail.c', '1234', 'mahmoud', 'heidar', 2, 'Pending'),
(4, 'mmmmhhhh@gmail.com', '1234', 'mahmoud', 'heidar', 10, 'Pending'),
(5, 'jkdckb', 'jcsbn', 'nmdv', 'vmn dxm', 10, 'Pending'),
(6, 'vsfb', ',fsv', 'mahmoud', 'mostafa', 15, 'Pending'),
(7, 'dcn fv', 'jdcb', 'mahmoud', 'heidar', 15, 'Pending'),
(8, 'haider_mahmoud@hotmail.c', '1234', 'mahmoud', 'heidar', 2, 'Pending'),
(9, 'mmmmhhhh@gmail.com', '1234', 'mahmoud', 'heidar', 10, 'Pending'),
(10, 'jkdckb', 'jcsbn', 'nmdv', 'vmn dxm', 10, 'Pending'),
(11, 'vsfb', ',fsv', 'mahmoud', 'mostafa', 15, 'Pending'),
(12, 'dcn fv', 'jdcb', 'mahmoud', 'heidar', 15, 'Pending'),
(13, 'haider_mahmoud@hotmail.c', '1234', 'mahmoud', 'heidar', 2, 'Pending'),
(14, 'mmmmhhhh@gmail.com', '1234', 'mahmoud', 'heidar', 10, 'Pending'),
(15, 'jkdckb', 'jcsbn', 'nmdv', 'vmn dxm', 10, 'Pending'),
(16, 'vsfb', ',fsv', 'mahmoud', 'mostafa', 15, 'Pending'),
(17, 'dcn fv', 'jdcb', 'mahmoud', 'heidar', 15, 'Pending'),
(18, 'haider_mahmoud@hotmail.c', '1234', 'mahmoud', 'heidar', 2, 'Pending'),
(19, 'mmmmhhhh@gmail.com', '1234', 'mahmoud', 'heidar', 10, 'Pending'),
(20, 'jkdckb', 'jcsbn', 'nmdv', 'vmn dxm', 10, 'Pending'),
(21, 'vsfb', ',fsv', 'mahmoud', 'mostafa', 15, 'Pending'),
(22, 'dcn fv', 'jdcb', 'mahmoud', 'heidar', 15, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DepID` int(11) NOT NULL,
  `Dep_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DepID`, `Dep_name`) VALUES
(1, 'Human Resources'),
(2, 'Quality Control'),
(3, 'OPERATIONS'),
(4, 'INFORMATION TECHNOLOGY');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `Emp_ID` int(11) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `email` varchar(24) DEFAULT NULL,
  `emp_password` varchar(24) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  `Job_ID` int(11) NOT NULL,
  `Emp_Img` longblob,
  `Type` int(11) DEFAULT NULL,
  `Birthdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`Emp_ID`, `LastName`, `FirstName`, `email`, `emp_password`, `address`, `mobile`, `Job_ID`, `Emp_Img`, `Type`, `Birthdate`) VALUES
(1, 'THOMPSON', 'MICHAEL', 'michael@gmail.com', '1234', 'Cairo', ' 3476', 3, '', NULL, NULL),
(2, 'KWAN', 'SALLY', 'sally@gmail.com', '12345', 'Cairo', '4738', 3, '', NULL, NULL),
(3, 'JONES', 'JAMES', 'james@gmail.com', 'james123', 'Cairo', '0942', 1, '', NULL, NULL),
(4, 'KIM', 'ROBERT', 'robert@gmail.com', 'robert123', 'Cairo', '2945', 4, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `JobID` int(11) NOT NULL,
  `Job_title` varchar(255) NOT NULL,
  `Dep_ID` int(11) NOT NULL,
  `Salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`JobID`, `Job_title`, `Dep_ID`, `Salary`) VALUES
(1, 'HR Manager', 1, 20000),
(2, 'Talent Acquisition Specialist', 1, 10000),
(3, 'Talent Management Specialist', 1, 10000),
(4, 'Senior HR Specialist', 1, 15000),
(5, 'IOS Developer', 4, 15000),
(6, 'Android Developer', 4, 10000),
(7, 'Fullstack Developer ', 4, 20000),
(8, 'Senior Project Manager', 4, 25000),
(9, 'IT Manager', 4, 30000),
(10, 'Operations Manager', 3, 20000),
(11, 'Junior Marketing Specialist', 3, 5000),
(12, 'Senior Marketing Specialist', 3, 10000),
(13, 'Sales Executive', 3, 15000),
(14, 'Quality Assurance Manager', 2, 20000),
(15, 'Quality Assurance Specialist', 2, 5000),
(16, 'Quality Assurance Team Lead', 2, 10000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_req`
--
ALTER TABLE `account_req`
  ADD PRIMARY KEY (`Req_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DepID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`Emp_ID`),
  ADD KEY `Job_ID` (`Job_ID`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`JobID`),
  ADD KEY `Dep_ID` (`Dep_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_req`
--
ALTER TABLE `account_req`
  MODIFY `Req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `DepID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `Emp_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `JobID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
