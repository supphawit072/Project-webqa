-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2024 at 10:44 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_qa`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(10) NOT NULL,
  `coursecode` varchar(10) NOT NULL,
  `coursename` varchar(50) NOT NULL,
  `credits` int(10) NOT NULL,
  `instructor` varchar(50) NOT NULL,
  `groups` varchar(20) NOT NULL,
  `receives` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `coursecode`, `coursename`, `credits`, `instructor`, `groups`, `receives`) VALUES
(2, '002', 'rr', 3, '99', '33', '50'),
(3, '003', 'oop', 3, 'กฤษ', '102', '110'),
(4, '005', 'ttp', 0, 'tpp', '55', '55'),
(7, '002', 'rr', 5, 'tt', '', ''),
(10, 'fd', 'dddd', 0, 'dd', 'd', 'x'),
(11, '0006', 'tt', 0, 'f', 'f', 'f'),
(21, 'bb', 'yy', 1, 'dd', '102', '20');

-- --------------------------------------------------------

--
-- Table structure for table `create_form`
--

CREATE TABLE `create_form` (
  `form_id` int(10) NOT NULL,
  `course_code` char(7) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `credits` int(3) NOT NULL,
  `groups` varchar(10) NOT NULL,
  `A` int(3) NOT NULL,
  `B_plus` int(3) NOT NULL,
  `B` int(3) NOT NULL,
  `C_plus` int(3) NOT NULL,
  `C` int(3) NOT NULL,
  `D_plus` int(3) NOT NULL,
  `D` int(3) NOT NULL,
  `E` int(3) NOT NULL,
  `F` int(3) NOT NULL,
  `F_percent` int(3) NOT NULL,
  `I` int(3) NOT NULL,
  `W` int(3) NOT NULL,
  `W_percent` int(3) NOT NULL,
  `VG` int(3) NOT NULL,
  `G` int(3) NOT NULL,
  `S` int(3) NOT NULL,
  `total` int(10) NOT NULL,
  `instructor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `create_form`
--

INSERT INTO `create_form` (`form_id`, `course_code`, `course_name`, `credits`, `groups`, `A`, `B_plus`, `B`, `C_plus`, `C`, `D_plus`, `D`, `E`, `F`, `F_percent`, `I`, `W`, `W_percent`, `VG`, `G`, `S`, `total`, `instructor`) VALUES
(3, '009', 'yy', 1, '102', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 6, 5, 0, 0, 0, 13, 'dd'),
(4, '005', '00', 1, '102', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 'pp'),
(5, '003', 'bb', 1, '102', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'cc'),
(18, 'bb', 'bb', 3, '102', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 2, 'cc');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(125) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `role`) VALUES
(25, 'nana', '123456789', 'nana', 'admin'),
(26, '', '', '', ''),
(27, 'nanaka', '123456789', 'nn', 'admin'),
(28, 'ww', 'www', 'ww', 'admin'),
(29, 'ผผ', '1256789', 'ทท', 'user'),
(30, 'nn', '123456789', 'mm', 'admin'),
(31, 'll', '12', 'll', 'user'),
(32, 'tt', '123', 'tt', 'user'),
(34, 'tt', '123', 'tt', 'user'),
(35, 'tt', '123', 'tt', 'user'),
(36, 'tt', '123', 'tt', 'user'),
(40, 'sumkub', '123456789', 'sum', 'user'),
(41, 'sumkub', '123456789', 'sum', 'user'),
(65, '001', '111', 'Test072046', 'user'),
(66, 'taey', '111', 'Test072046', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `create_form`
--
ALTER TABLE `create_form`
  ADD PRIMARY KEY (`form_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `create_form`
--
ALTER TABLE `create_form`
  MODIFY `form_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
