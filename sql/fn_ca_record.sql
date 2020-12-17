-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2020 at 02:31 PM
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
-- Database: `bluemark`ts
--

-- --------------------------------------------------------

--
-- Table structure for table `fn_ca_record`
--

CREATE TABLE `ts_ca_record` (
  `ts_ca_record_id` int(11) NOT NULL,
  `firstca` tinyint(3) NOT NULL,
  `secondca` tinyint(3) NOT NULL DEFAULT '0',
  `thirdca` tinyint(3) NOT NULL DEFAULT '0',
  `exams` smallint(3) NOT NULL DEFAULT '0',
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `supDate` date NOT NULL,
  `sysDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ts_ca_record`
--
ALTER TABLE `ts_ca_record`
  ADD PRIMARY KEY (`ts_ca_record_id`),
  ADD KEY `idx_ts_ca_record_firstca` (`firstca`),
  ADD KEY `idx_ts_ca_records_secondca` (`secondca`),
  ADD KEY `idx_ts_ca_records_thirdca` (`thirdca`),
  ADD KEY `idx_ts_ca_records_exams` (`exams`),
  ADD KEY `idx_ts_ca_records_studentId` (`student_id`),
  ADD KEY `idx_ts_ca_records_subjectId` (`subject_id`),
  ADD KEY `idx_ts_ca_records_classId` (`class_id`),
  ADD KEY `idx_ts_ca_records_termId` (`term_id`),
  ADD KEY `idx_ts_ca_records_supDate` (`supDate`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ts_ca_record`
--
ALTER TABLE `ts_ca_record`
  MODIFY `ts_ca_record_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
