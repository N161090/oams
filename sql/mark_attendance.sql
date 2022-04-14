-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2022 at 03:06 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oams`
--

-- --------------------------------------------------------

--
-- Table structure for table `mark_attendance`
--

CREATE TABLE `mark_attendance` (
  `idno` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mark_attendance`
--

INSERT INTO `mark_attendance` (`idno`, `year`, `branch`, `subject`, `date`, `id`) VALUES
('N140229', 'e1', 'cse', 'COA', '2022-04-09', 1),
('N140229', 'e1', 'cse', 'Data Structures', '2022-04-09', 4),
('N140229', 'e1', 'cse', 'C', '2022-04-09', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mark_attendance`
--
ALTER TABLE `mark_attendance`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mark_attendance`
--
ALTER TABLE `mark_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
