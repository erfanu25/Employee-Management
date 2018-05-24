-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2017 at 04:39 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee`
--
CREATE DATABASE IF NOT EXISTS `employee` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `employee`;

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE `attendence` (
  `a_id` int(10) NOT NULL,
  `ID` int(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `intime` time DEFAULT NULL,
  `outtime` time DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `status2` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendence`
--

INSERT INTO `attendence` (`a_id`, `ID`, `Date`, `intime`, `outtime`, `status`, `status2`) VALUES
(7, 1535, '2016-12-08', '15:45:06', '01:01:58', NULL, NULL),
(8, 1515, '2016-12-08', '15:53:38', '01:04:24', NULL, 'Early Leave'),
(10, 1514, '2016-12-08', '16:16:40', '00:54:50', NULL, NULL),
(11, 1535, '2016-12-09', '16:45:26', '01:01:58', NULL, NULL),
(12, 1514, '2016-12-09', '16:46:53', '00:54:50', NULL, NULL),
(13, 1530, '2016-12-08', '17:46:56', '15:48:47', NULL, 'Early Leave'),
(14, 1521, '2016-12-08', '17:49:09', '00:02:45', NULL, 'Early Leave'),
(15, 1510, '2016-12-08', '20:37:48', '00:19:05', NULL, NULL),
(16, 1513, '2016-12-08', '20:49:02', '11:54:25', NULL, NULL),
(17, 1516, '2016-12-08', '20:49:57', '01:06:55', NULL, 'Ontime'),
(18, 1517, '2016-12-08', '20:50:33', '18:30:57', NULL, NULL),
(19, 1518, '2016-12-08', '20:51:03', '20:51:06', NULL, NULL),
(20, 1519, '2016-12-08', '20:51:39', '18:33:18', NULL, NULL),
(21, 1522, '2016-12-08', '20:52:17', '00:24:36', NULL, NULL),
(22, 1526, '2016-12-08', '20:52:50', '20:52:53', NULL, NULL),
(23, 1534, '2016-12-08', '20:53:32', '17:14:59', NULL, NULL),
(24, 1522, '2016-12-12', '16:58:42', '00:24:36', NULL, NULL),
(25, 1510, '2016-12-12', '16:59:23', '00:19:05', NULL, NULL),
(26, 1532, '2016-12-12', '17:08:02', '21:18:36', NULL, NULL),
(27, 1531, '2016-12-12', '17:08:32', '00:48:32', NULL, NULL),
(28, 1536, '2016-12-12', '17:14:50', '16:34:28', NULL, 'Ontime'),
(29, 1515, '2016-12-12', '18:03:22', '01:04:24', NULL, 'Early Leave'),
(30, 1516, '2016-12-12', '00:00:00', '01:06:55', NULL, 'Ontime'),
(31, 1517, '2016-12-12', '18:25:00', '18:30:57', NULL, NULL),
(32, 1519, '2016-12-12', '18:33:02', '18:33:18', NULL, NULL),
(33, 1513, '2016-12-13', '11:54:16', '11:54:25', NULL, NULL),
(34, 1514, '2016-12-13', '11:57:53', '00:54:50', NULL, NULL),
(35, 1534, '2016-12-13', '17:13:59', '17:14:59', NULL, NULL),
(36, 1521, '2016-12-13', '23:03:31', '00:02:45', NULL, 'Early Leave'),
(37, 1527, '2016-12-13', '23:51:38', '00:03:59', NULL, NULL),
(38, 1510, '2016-12-13', '00:16:31', '00:19:05', NULL, NULL),
(39, 1522, '2016-12-13', '00:21:53', '00:24:36', NULL, NULL),
(40, 1535, '2016-12-13', '00:59:39', '01:01:58', NULL, NULL),
(41, 1537, '2016-12-14', '01:05:34', '01:06:22', NULL, NULL),
(42, 1530, '2016-12-14', '01:09:49', '15:48:47', NULL, 'Early Leave'),
(43, 1531, '2016-12-14', '01:14:00', '00:48:32', NULL, NULL),
(44, 1532, '2016-12-15', '21:05:35', '21:18:36', NULL, NULL),
(45, 1514, '2016-12-15', '21:10:09', '00:54:50', 'Late', NULL),
(46, 1531, '2016-12-15', '21:22:04', '00:48:32', 'Late', NULL),
(48, 1531, '2016-12-16', '00:47:44', '00:48:32', 'Ontime', NULL),
(49, 1514, '2016-12-16', '00:49:17', '00:54:50', 'Late', NULL),
(50, 1515, '2016-12-16', '01:01:35', '01:04:24', 'Late', 'Early Leave'),
(51, 1516, '2016-12-16', '01:06:46', '01:06:55', 'Late', 'Ontime'),
(53, 1521, '2016-12-16', '12:47:20', '00:02:45', 'Late', 'Early Leave'),
(54, 1530, '2016-12-16', '15:48:43', '15:48:47', 'Late', 'Early Leave'),
(55, 1521, '2016-12-17', '00:01:58', '00:02:45', 'Ontime', 'Early Leave'),
(56, 1536, '2016-12-17', '16:34:21', '16:34:28', 'Late', 'Ontime');

-- --------------------------------------------------------

--
-- Table structure for table `date`
--

CREATE TABLE `date` (
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `date`
--

INSERT INTO `date` (`Date`) VALUES
('2016-12-08'),
('2016-12-09'),
('2016-12-12'),
('2016-12-13'),
('2016-12-14'),
('2016-12-15'),
('2016-12-16'),
('2016-12-17');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `NAME` varchar(50) NOT NULL,
  `LOCATION` varchar(50) DEFAULT NULL,
  `dep_id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`NAME`, `LOCATION`, `dep_id`) VALUES
('Production', 'Gazipur', 1),
('Research and Development', 'Uttara', 2),
('Purchasing', 'Gazipur', 3),
('Marketing', 'Uttara', 4),
('Human Resource Management', 'Uttara', 5),
('Accounting and Finance', 'Uttara', 6);

-- --------------------------------------------------------

--
-- Table structure for table `employee_info`
--

CREATE TABLE `employee_info` (
  `ID` int(10) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Adress` varchar(50) NOT NULL,
  `Bdate` date NOT NULL,
  `Sex` varchar(10) NOT NULL,
  `Salary` int(8) DEFAULT NULL,
  `dep_id` int(10) NOT NULL,
  `pic` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_info`
--

INSERT INTO `employee_info` (`ID`, `Name`, `contact`, `Email`, `Adress`, `Bdate`, `Sex`, `Salary`, `dep_id`, `pic`) VALUES
(1510, 'Md. Erfan ullah bhuiyan', '01521438868', 'mderfan2@gmail.com', 'Dhaka Cant', '1997-11-22', 'Male', 60000, 1, '07A66641-898B-AC51-963F-125D447B9019.jpg'),
(1513, 'erfanuu', '015246895', 'md@fd.com', '054454', '2001-09-11', 'male', 10000, 6, 'C48AA25C-7D3B-3A06-EBFF-C9B3711A6A15.jpg'),
(1514, 'Munira', '01815061969', 'munira@gmail.com', 'Chitagong', '2001-01-08', 'Female', 1000, 3, 'C4CC3AE7-0153-B2F1-FFB0-EAF032EB4778.jpg'),
(1515, 'Rakib', '01716302503', 'rakib@gmail.com', 'Rampura', '1990-10-11', 'Male', 20000, 6, '5DC0AF63-2B2B-F326-B482-F30FF16EF7E4.jpg'),
(1516, 'Maliha', '01620356895', 'maliha@gmail.com', 'Savar', '1994-01-22', 'Female', 10000, 5, '27EE59FF-21F3-6B4C-196D-E698DF645D68.jpg'),
(1517, 'Jamil', '01815069874', 'mail@gmail.com', 'Uttara', '1995-10-24', 'Male', 10000, 4, '15743D45-89F4-00B4-05BD-680306D608EA.jpg'),
(1518, 'Maria', '01920467962', 'iubat@edu.com', 'dhaka', '1997-11-22', 'Female', 20000, 4, 'F02670D0-77EA-EA54-DE1E-72C940163BD6.jpg'),
(1519, 'Moni', '01716589468', 'md@fd.com', 'dhaka', '1956-11-05', 'Male', 1000, 2, '5985F002-3711-8148-472A-5C1A1DC7E96E.jpg'),
(1521, 'Sagor', '01524566565', 'sagor@gmail.com', 'Uttara', '1995-11-14', 'Male', 20000, 3, '8E0FAB95-1369-4113-8DC0-25D8E32DDFF6.png'),
(1524, 'Name', '05454', 'Email', 'Adress', '1997-01-01', 'Male', 10000, 1, 'C32C31AD-8CDA-35FB-1AFF-AC82C71314E8.png'),
(1526, 'Mahjuba', '0192568978', 'mail@gmail.com', 'Dhaka Cant', '2001-09-25', 'Female', 10000, 5, '0A32FDB6-484B-09E7-7434-EBF8915FA733.jpg'),
(1527, 'Bhuiyan', '01716302503', 'mdershad13@gmail.com', 'Rampura', '1995-10-11', 'Male', 10000, 6, 'D9B520EB-F88F-546E-ED34-81B53EA7E1B8.jpg'),
(1530, 'Kimi', '0156544545', 'k@gmail.com', 'dhaka', '1995-10-11', 'Female', 10000, 2, 'no_image.png'),
(1531, 'Munia', '0156544545', 'gmail.com', 'dhaka', '1995-10-11', 'Female', 10000, 2, '4E06E69D-1F5E-FF36-5E4B-426E5B6C4C77.png'),
(1532, 'Md Erfan', '01524566565', 'gfgf.com', 'Dhaka Cant', '1035-10-25', 'Male', 50000, 2, '82D8CC82-6973-4561-5714-26D97E7A3E72.png'),
(1534, 'Fahim', '01521438868', 'mderfan2@gmail.com', 'Dhaka Cant', '1995-10-11', 'Male', 10000, 1, 'no_image.png'),
(1535, 'Mahjabin', '01620356895', 'mderfan4.me@gmail.com', 'Dhaka Cant', '1997-02-21', 'Female', 40000, 4, '73006EC5-165F-6E95-B623-0215A0D7922A.png'),
(1536, 'Farha', '0175846866', 'mail@yahoo.com', 'Savar', '2001-10-11', 'Female', 20000, 5, '57D23A93-C6FA-43AB-3A83-D9665A80BFEA.png'),
(1537, 'Joy', '01521458869', 'jou@gmail.com', 'Khulna', '1995-10-11', 'Male', 30000, 1, 'no_image.png'),
(1548, 'Julfiqur', '01920467962', 'mailgmail@g.com', 'Dhaka', '1995-10-11', 'Male', 10000, 5, '65D8BFE9-E14C-C00D-C93F-286097658B2C.png'),
(1549, 'Swapnil t', '01521438865', 'mailgmail@g.com', 'Dhaka', '1995-10-22', 'Male', 30000, 1, 'no_image.png');

-- --------------------------------------------------------

--
-- Table structure for table `office_time`
--

CREATE TABLE `office_time` (
  `o_id` int(4) NOT NULL,
  `intime` time DEFAULT NULL,
  `outtime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `office_time`
--

INSERT INTO `office_time` (`o_id`, `intime`, `outtime`) VALUES
(1, '10:00:00', '16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `password`, `level`) VALUES
(1, 'erfan', '123', 1),
(1510, 'Md. Erfan ullah bhuiyan', '1234', 2),
(1513, 'erfanuu', '1234', 2),
(1514, 'Munira', '1234', 2),
(1515, 'Rakib', '1234', 2),
(1516, 'Maliha', '1234', 2),
(1517, 'Jamil', '1234', 2),
(1518, 'MD', '1234', 2),
(1519, 'Moni', '1234', 2),
(1521, 'Sagor', '123', 2),
(1524, 'Name', '1234', 2),
(1526, 'Mahjuba', '1234', 2),
(1527, 'Bhuiyan', '1234', 2),
(1530, 'Kimi', '1234', 2),
(1531, 'Munia', '1234', 2),
(1532, 'Md Erfan', '1234', 2),
(1534, 'Fahim', '1234', 2),
(1535, 'Mahjabin', '1234', 2),
(1536, 'Farha', '1234', 2),
(1537, 'Joy', '1234', 2),
(1548, 'Julfiqur', '1234', 2),
(1549, 'Swapnil', '1234', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendence`
--
ALTER TABLE `attendence`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `date`
--
ALTER TABLE `date`
  ADD PRIMARY KEY (`Date`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`NAME`);

--
-- Indexes for table `employee_info`
--
ALTER TABLE `employee_info`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `office_time`
--
ALTER TABLE `office_time`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendence`
--
ALTER TABLE `attendence`
  MODIFY `a_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `employee_info`
--
ALTER TABLE `employee_info`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1550;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
