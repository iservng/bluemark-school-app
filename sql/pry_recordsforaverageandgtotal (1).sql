-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2020 at 12:22 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `pry_recordsforaverageandgtotal`
--

CREATE TABLE `pry_recordsforaverageandgtotal` (
  `pry_recordsForAverageAndGtotal_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `record_date` date NOT NULL,
  `student_id` int(11) NOT NULL,
  `gtotal` int(11) NOT NULL,
  `average` decimal(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pry_recordsforaverageandgtotal`
--
ALTER TABLE `pry_recordsforaverageandgtotal`
  ADD PRIMARY KEY (`pry_recordsForAverageAndGtotal_id`),
  ADD KEY `idx_pry_recordsForAverageAndGtotal_classId` (`class_id`),
  ADD KEY `idx_pry_recordsForAverageAndGtotal_termId` (`term_id`),
  ADD KEY `idx_pry_recordsForAverageAndGtotal_recordDate` (`record_date`),
  ADD KEY `idx_pry_recordsForAverageAndGtotal_studentId` (`student_id`),
  ADD KEY `idx_pry_recordsForAverageAndGtotal_gtotal` (`gtotal`),
  ADD KEY `idx_pry_recordsForAverageAndGtotal_avarage` (`average`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pry_recordsforaverageandgtotal`
--
ALTER TABLE `pry_recordsforaverageandgtotal`
  MODIFY `pry_recordsForAverageAndGtotal_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
