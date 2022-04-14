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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idno` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idno`, `name`, `email`, `branch`, `year`, `password`, `id`) VALUES
('Ramya', 'anitha', 'anitha@gmail.com', 'cse', 'e1', '$2y$10$mGZ0URNgGCo1Ut4Ig93bYuwfIqJLwofOOOsVB/vLDG32HqAFaKHv2', 2),
('saishiva', 'anitha', 'anitha@gmail.com', 'cse', 'e1', '$2y$10$EHwEdvqDImbVyyfBLKNzIuURCiU7UCZcNVhcQS.mv/6LmCBl0ve.6', 3),
('pruthvi', 'anitha', 'anitha@gmail.com', 'cse', 'e1', '$2y$10$QH2pk5.LzF6c9372Yl3L.uPf6TC4ksTYOukjKFTfif9yDA4hDbp06', 4),
('Lalitha', 'pruthvi', 'abpruthvi07@gmail.com', 'cse', 'e1', '$2y$10$H1L1cawXZ51pWWCgShYD1OJy0YQ88Ka.aOg1JfdniGWyJLIU3LcYS', 5),
('anitha', 'anitha', 'abpruthvi07@gmail.com', 'cse', 'e1', '$2y$10$i/DjB2FmLwZTH1wAt.dEA.XYjsHfVSqEmIwvvRDPYmMW/wYSDI5b2', 6),
('sandeepthi', 'sandeepthi', 'sandeepthi@gmail.com', 'cse', 'e1', '$2y$10$EhERZcGnU4gl/SYXSiYukOK.ls1hT4uJrlvteUM98eYrizZTqJ/8q', 7),
('N140229', 'Anitha', 'aniramya222@gmail.com', 'cse', 'e1', '$2y$10$IFfwQtI8v4zYhQYbV.1Hr.ip3rPZO15SkmNWSLyz2ev9EWVLt.Qji', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
