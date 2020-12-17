-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2020 at 02:17 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bluemark`
--

-- --------------------------------------------------------

--
-- Table structure for table `ts_attendance`
--

CREATE TABLE `ts_attendance` (
  `ts_attendance_id` int(11) NOT NULL,
  `weekValue_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `todaysDate_id` int(11) NOT NULL,
  `todaysDate` date NOT NULL,
  `term_id` int(11) NOT NULL,
  `mark_m` tinyint(1) DEFAULT '0',
  `mark_a` tinyint(1) DEFAULT '0',
  `reasons` char(32) NOT NULL DEFAULT 'None',
  `sys_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ts_attendance`
--

INSERT INTO `ts_attendance` (`ts_attendance_id`, `weekValue_id`, `student_id`, `class_id`, `todaysDate_id`, `todaysDate`, `term_id`, `mark_m`, `mark_a`, `reasons`, `sys_date`) VALUES
(1, 6, 31, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(2, 6, 32, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(3, 6, 33, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(4, 6, 34, 1, 4, '2020-06-10', 1, 1, 1, 'None', '2020-06-10 15:25:02'),
(5, 6, 31, 1, 5, '2020-06-11', 1, 1, 1, 'None', '2020-06-11 09:12:58'),
(6, 6, 32, 1, 5, '2020-06-11', 1, 1, 1, 'None', '2020-06-11 09:12:59'),
(7, 6, 33, 1, 5, '2020-06-11', 1, 1, 1, 'None', '2020-06-11 09:12:59'),
(8, 6, 34, 1, 5, '2020-06-11', 1, 1, 0, 'None', '2020-06-11 09:12:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ts_attendance`
--
ALTER TABLE `ts_attendance`
  ADD PRIMARY KEY (`ts_attendance_id`),
  ADD KEY `idx_school_weekValue_id` (`weekValue_id`),
  ADD KEY `idx_school_student_id` (`student_id`),
  ADD KEY `idx_school_class_id` (`class_id`),
  ADD KEY `idx_school_todaysDate_id` (`todaysDate_id`),
  ADD KEY `idx_school_term_id` (`term_id`),
  ADD KEY `idx_ts_attendance_todaysDate` (`todaysDate`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ts_attendance`
--
ALTER TABLE `ts_attendance`
  MODIFY `ts_attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
